@include ('header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                @include ('dashboard.menu')
            </div>
            <div class="col-md-7">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>类型</th>
                            <th>服务器</th>
                            <th>开通时间</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($services)
                            @foreach ($services as $val)
                            <tr>
                                <td>{{$val->id}}</td>
                                <td>{{$val->type}}</td>
                                <td>{{$val->sid}}</td>
                                <td>{{date("Y-m-d H:i:s", $val->stime)}}</td>
                                <td>{{$val->status}}</td>
                                <td>{{$val->id}}</td>
                            </tr>
                            @endforeach
                        @else
                        <tr><td colspan="7">没有查询到数据</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@include ('dashboard.js')
@include ('footer')