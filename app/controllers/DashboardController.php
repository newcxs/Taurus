<?php

class DashboardController extends BaseController {
    public function __construct(){
        parent::__construct();
        $this->beforeFilter('auth');
    }
    public function getIndex(){
        return View::make('dashboard.home');
    }
    public function getAccount(){
        return View::make('dashboard.account');
    }
    public function getService(){
        $services = Services::findByUID(Auth::user()->id);
        return View::make('dashboard.service')->withServices($services);
    }
    public function getNew(){
        //if(Auth::user()->emailverify != '1')
        //    return self::showMsg('您还没有验证邮箱', URL::to('/dashboard/account'));
        return View::make('dashboard.new');
    }
    public function postProfile(){
        $qq = Input::get('qq');
        $pwd = Input::get('password');
        if(!$qq) return self::showMsg('信息不完整');
        if(Hash::check($pwd, Auth::user()->password)){
            $user = User::find(Auth::user()->id);
            $user->qq = $qq;
            $user->save();
            return self::showMsg('资料修改成功', URL::to('/dashboard/account'));
        }else{
            return self::showMsg('账户密码验证失败');
        }
    }
    public function postEditpwd(){
        $pwd = Input::get('pwd');
        $password = Input::get('password');
        if(Hash::check($pwd, Auth::user()->password)){
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($password);
            $user->save();
            return self::showMsg('密码修改成功', URL::to('/dashboard/account'));
        }else{
            return self::showMsg('账户密码验证失败');
        }
    }
    public function postEmailverify(){
        $pwd = Input::get('pwd');
        if(Hash::check($pwd, Auth::user()->password)){
            if(Auth::user()->emailverify == '1') return self::showMsg('您已经验证过邮箱了');
            $uid = Auth::user()->id;
            $sendCode = md5(time().$uid);
            $code = Verify::firstOrNew(['id'=>$uid]);
            $code->code = $sendCode;
            $code->save();
            $url = URL::to('/email/'.$sendCode);
            Mail::send('emails.verify', array('url' => $url), function ($message){
                $message->to(Auth::user()->email)->subject(Setting::find('sitename')->value.' 邮箱验证');
            });
            return self::showMsg('邮件已发送，请查收', URL::to('/dashboard/account'));
        }else{
            return self::showMsg('账户密码验证失败');
        }
    }
}
