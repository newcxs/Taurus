<?php

class ServiceController extends BaseController {
    public function __construct(){
        parent::__construct();
        $this->beforeFilter('auth');
    }
    public function postVpn(){
        if(Services::findByUIDAndType(Auth::user()->id, 'vpn'))
            return self::showMsg('目前一个用户仅允许开通一个账户');
        $account = Input::get('account');
        $pwd = Input::get('password');
        if(Vpnusers::find($account))
            return self::showMsg("账户名已经存在");
        $vpnuser = new Vpnusers;
        $vpnuser->account = $account;
        $vpnuser->pwd = $pwd;
        $vpnuser->save();
        require __DIR__.'/../http.class.php';
        $http = new Http;
        $http->initialize([
            'user_agent' => 'GazerPHP/'.GAZER_VERSION.' (Release/'.GAZER_RELEASE.')'
        ]);

        //**********************************

        Services::add(Auth::user()->id, '1', 'vpn', [
            'account' => $account,
            'pwd' => $pwd
        ], 0, '1');
        return self::showMsg("服务开通成功", URL::to('/dashboard/service'));
    }
    public function postSs(){
        if(Services::findByUIDAndType(Auth::user()->id, 'ss'))
            return self::showMsg('目前一个用户仅允许开通一个账户');
        $pwd = Input::get('password');
        $uid = Auth::user()->id;
        $port = 8000 + $uid;
        require __DIR__.'/../http.class.php';
        $http = new Http;
        $http->initialize([
            'user_agent' => 'GazerPHP/'.GAZER_VERSION.' (Release/'.GAZER_RELEASE.')'
        ]);

        //**********************************

        Services::add(Auth::user()->id, '1', 'ss', [
            'pwd' => $pwd,
            'port' => $port
        ], 0, '1');
        return self::showMsg("服务开通成功", URL::to('/dashboard/service'));
    }
}
