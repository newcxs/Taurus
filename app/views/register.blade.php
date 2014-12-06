@include ('header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>注册</h1>
                <hr>
                {{ Form::open(array('url' => '/member/register', 'class' => 'form-horizontal', 'role' => 'form')) }}
                    <div class="form-group">
                        {{ Form::label('inputEmail', '邮箱', array('class' => 'col-sm-2 control-label')) }}
                        <div class="col-sm-7">
                            {{ Form::email('email', '', array('id' => 'inputEmail', 'class' => 'form-control', 'placeholder' => '请输入邮箱', 'required' => 'true')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('inputPwd', '密码', array('class' => 'col-sm-2 control-label')) }}
                        <div class="col-sm-7">
                            {{ Form::password('password', array('id' => 'inputPwd', 'class' => 'form-control', 'placeholder' => '请输入密码', 'required' => 'true')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('inputQQ', 'QQ', array('class' => 'col-sm-2 control-label')) }}
                        <div class="col-sm-7">
                            {{ Form::text('qq', '', array('id' => 'inputQQ', 'class' => 'form-control', 'placeholder' => '请输入QQ号', 'required' => 'true')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-7">
                            {{ Form::submit('提交', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@include ('footer')