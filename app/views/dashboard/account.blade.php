@include ('header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                @include ('dashboard.menu')
            </div>
            <div class="col-md-7">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#profile" role="tab" data-toggle="tab">个人资料</a></li>
                    <li role="presentation"><a href="#editpwd" role="tab" data-toggle="tab">修改密码</a></li>
                    <li role="presentation"><a href="#email-verify" role="tab" data-toggle="tab">邮箱验证</a></li>
                </ul><br>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="profile">
                        {{ Form::open(array('url' => '/dashboard/profile', 'class' => 'form-horizontal', 'role' => 'form')) }}
                            <div class="form-group">
                                {{ Form::label('inputQQ', 'QQ', array('class' => 'col-sm-2 control-label')) }}
                                <div class="col-sm-7">
                                    {{ Form::text('qq', Auth::user()->qq, array('id' => 'inputQQ', 'class' => 'form-control', 'placeholder' => '请输入QQ', 'required' => 'true')) }}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('inputPwd', '验证密码', array('class' => 'col-sm-2 control-label')) }}
                                <div class="col-sm-7">
                                    {{ Form::password('password', array('id' => 'inputPwd', 'class' => 'form-control', 'placeholder' => '请输入账号密码', 'required' => 'true')) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-7">
                                    {{ Form::submit('提交', array('class' => 'btn btn-primary')) }}
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                    <div role="tabpanel" class="tab-pane" id="editpwd">
                        {{ Form::open(array('url' => '/dashboard/editpwd', 'class' => 'form-horizontal', 'role' => 'form')) }}
                            <div class="form-group">
                                {{ Form::label('inputPwd', '验证密码', array('class' => 'col-sm-2 control-label')) }}
                                <div class="col-sm-7">
                                    {{ Form::password('pwd', array('id' => 'inputPwd', 'class' => 'form-control', 'placeholder' => '请输入账号密码', 'required' => 'true')) }}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('inputPassword', '新密码', array('class' => 'col-sm-2 control-label')) }}
                                <div class="col-sm-7">
                                    {{ Form::password('password', array('id' => 'inputPassword', 'class' => 'form-control', 'placeholder' => '请输入新密码', 'required' => 'true')) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-7">
                                    {{ Form::submit('提交', array('class' => 'btn btn-primary')) }}
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                    <div role="tabpanel" class="tab-pane" id="email-verify">
                        @if (Auth::user()->emailverify == "0")
                        {{ Form::open(array('url' => '/dashboard/emailverify', 'class' => 'form-horizontal', 'role' => 'form')) }}
                            <div class="form-group">
                                {{ Form::label('inputPwd', '验证密码', array('class' => 'col-sm-2 control-label')) }}
                                <div class="col-sm-7">
                                    {{ Form::password('pwd', array('id' => 'inputPwd', 'class' => 'form-control', 'placeholder' => '请输入账号密码', 'required' => 'true')) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-7">
                                    {{ Form::submit('发送验证邮件', array('class' => 'btn btn-primary')) }}
                                </div>
                            </div>
                        {{ Form::close() }}
                        @else
                        <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>提示</strong> 邮箱已经验证
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@include ('dashboard.js')
@include ('footer')