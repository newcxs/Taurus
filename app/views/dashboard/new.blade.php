@include ('header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                @include ('dashboard.menu')
            </div>
            <div class="col-md-7">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#vpn" role="tab" data-toggle="tab">VPN</a></li>
                    <li role="presentation"><a href="#ss" role="tab" data-toggle="tab">ShadowSocks</a></li>
                </ul><br>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="vpn">
                        <h4>开通VPN</h4>
                        <hr>
                        {{ Form::open(array('url' => '/service/vpn', 'class' => 'form-horizontal', 'role' => 'form')) }}
                            <div class="form-group">
                                {{ Form::label('inputAccount', '帐号', array('class' => 'col-sm-2 control-label')) }}
                                <div class="col-sm-7">
                                    {{ Form::text('account', '', array('id' => 'inputAccount', 'class' => 'form-control', 'placeholder' => '请输入将要开通的帐号', 'required' => 'true')) }}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('inputPwd', '密码', array('class' => 'col-sm-2 control-label')) }}
                                <div class="col-sm-7">
                                    {{ Form::password('password', array('id' => 'inputPwd', 'class' => 'form-control', 'placeholder' => '请输入密码', 'required' => 'true')) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-7">
                                    {{ Form::submit('提交', array('class' => 'btn btn-primary')) }}
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                    <div role="tabpanel" class="tab-pane" id="ss">
                        <div role="tabpanel" class="tab-pane active" id="vpn">
                        <h4>开通ShadowSocks</h4>
                        <hr>
                        {{ Form::open(array('url' => '/service/ss', 'class' => 'form-horizontal', 'role' => 'form')) }}
                            <div class="form-group">
                                {{ Form::label('inputPwd', '密码', array('class' => 'col-sm-2 control-label')) }}
                                <div class="col-sm-7">
                                    {{ Form::password('password', array('id' => 'inputPwd', 'class' => 'form-control', 'placeholder' => '请输入密码', 'required' => 'true')) }}
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
        </div>
    </div>
@include ('dashboard.js')
@include ('footer')