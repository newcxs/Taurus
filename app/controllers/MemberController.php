<?php

class MemberController extends BaseController {
    public function __construct(){
        parent::__construct();
        $this->beforeFilter('guest', array('except' => 'getLogout'));
    }
    public function getLogin(){
        return View::make('login');
    }
    public function getRegister(){
        return View::make('register');
    }
    public function postLogin(){
        $email = Input::get('email');
        $password = Input::get('password');
        if(!$email || !$password) return self::showMsg('信息不完整');
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            $user = User::find(Auth::user()->id);
            Session::put('tm_logintime', $user->logintime);
            Session::put('tm_loginip', $user->loginip);
            $user->logintime = time();
            $user->loginip = User::ip();
            $user->save();
            return Redirect::intended('/dashboard/index');
        }else{
            return self::showMsg('邮箱或密码错误');
        }
    }
    public function postRegister(){
        $email = Input::get('email');
        $password = Input::get('password');
        $qq = Input::get('qq');
        if(!$email || !$password || !$qq) return self::showMsg('信息不完整');
        $uid = User::add($email, $password, $qq);
        if(!$uid) return self::showMsg('系统错误，请重试');
        return self::showMsg('注册成功，请登录', URL::to('/member/login'));
    }
    public function getLogout(){
        Session::put('tm_logintime', '');
        Session::put('tm_loginip', '');
        Auth::logout();
        return BaseController::showMsg('退出登录成功', URL::to('/index'));
    }
}
