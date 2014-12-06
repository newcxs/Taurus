<?php

class BaseController extends Controller {
    public function __construct(){}
    static public function showMsg($msg, $url='javascript:history.go(-1);'){
        return View::make('msg')
                    ->withMsg($msg)
                    ->withUrl($url);
    }
    public function __destruct(){}
}
