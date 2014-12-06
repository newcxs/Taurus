<?php

class HomeController extends BaseController {
    public function __construct(){
        parent::__construct();
    }
    public function getIndex(){
        return View::make('home');
    }
    public function getAbout(){
        return View::make('about');
    }
}
