@include ('header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                @include ('dashboard.menu')
            </div>
            <div class="col-md-7">
                <h1>欢迎 ！</h1>
                <hr>
                <h4>您的个人信息</h4>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th width="20%">UID</th>
                            <td>{{Auth::user()->id}}</td>
                        </tr>
                        <tr>
                            <th>邮箱</th>
                            <td>{{Auth::user()->email}}</td>
                        </tr>
                        <tr>
                            <th>QQ</th>
                            <td>{{Auth::user()->qq}}</td>
                        </tr>
                        <tr>
                            <th>邮箱验证</th>
                            <td>
                                @if (Auth::user()->emailverify == '1')
                                <span class="label label-success">通过</span>
                                @else
                                <span class="label label-danger">未验证</span>
                                <a href="{{URL::to('/dashboard/account')}}" class="btn btn-primary btn-xs">立刻验证</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>注册时间</th>
                            <td>{{date("Y-m-d H:i:s", Auth::user()->regtime)}}</td>
                        </tr>
                        <tr>
                            <th>注册IP</th>
                            <td>{{Auth::user()->regip}}</td>
                        </tr>
                        <tr>
                            <th>上次登录时间</th>
                            <td>{{date("Y-m-d H:i:s", Session::get('tm_logintime'))}}</td>
                        </tr>
                        <tr>
                            <th>上次登录IP</th>
                            <td>{{Session::get('tm_loginip')}}</td>
                        </tr>
                    </tbody>
                </table>
                <hr>
            </div>
        </div>
    </div>
@include ('dashboard.js')
@include ('footer')