<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="{{Setting::find('keywords')->value}}">
    <meta name="description" content="{{Setting::find('description')->value}}">
    <meta name="generator" content="Gazer {{GAZER_VERSION}} Release {{GAZER_RELEASE}}">
    <meta name="author" content="newcxs">
    <meta name="copyright" content="Time Machine Group">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="{{URL::to('/public/css/bootstrap.min.css')}}">
    <title>{{Setting::find('sitename')->value}}</title>
    <link rel="stylesheet" href="{{URL::to('/public/css/home.css')}}">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{URL::to('/index')}}">{{Setting::find('sitename')->value}}</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{URL::to('/index')}}">首页</a></li>
                    <li><a href="{{URL::to('/about')}}">关于</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                    <li><a href="{{URL::to('/dashboard/index')}}">Dashboard</a></li>
                    <li><a href="{{URL::to('/member/logout')}}">退出</a></li>
                    @else
                    <li><a href="{{URL::to('/member/login')}}">登录</a></li>
                    <li><a href="{{URL::to('/member/register')}}">注册</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
