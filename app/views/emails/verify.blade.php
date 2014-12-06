<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>邮箱验证 - {{Setting::find('sitename')->value}}</title>
</head>
<body>
    <h1>{{Setting::find('sitename')->value}}</h1>
    <hr>
    <p>&nbsp;</p>
    <p>您的验证链接：{{$url}}</p>
    <p>&nbsp;</p>
    <p>{{Setting::find('sitename')->value}} 团队</p>
    <p>{{date("Y-m-d H:i:s")}}</p>
</body>
</html>
