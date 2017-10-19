@extends('manage.layouts.app')

@section('title', '主页')

@section('style')
    <!--dashboard calendar-->
    <link href="{{ asset('/static/adminex/css/clndr.css') }}" rel="stylesheet">
    @parent
@endsection

@section('breadcrumb')

@endsection

@section('body')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    我的花店
                    <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                </header>
                <div class="panel-body">
                    <section id="unseen">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>分类</th>
                                <th>名称</th>
                                <th>价格</th>
                                <th>库存</th>
                                <th>计量单位</th>
                                <th>状态</th>
                                <th>分组</th>
                                <th>更新时间</th>
                            </tr>
                            </thead>

                            <tbody id="target">
                            @foreach($lists as $list)
                                <tr>
                                    <td>{{ $list['id'] }}</td>
                                    <td>{{ $list->category->name }}</td>
                                    <td>{{ $list['name'] }}</td>
                                    <td>{{ $list['price'] }}</td>
                                    <td>{{ $list['stock'] }}</td>
                                    <td>{{ $list['unit'] }}</td>
                                    <td>{{ config('site.commodity_status')[$list['status']] }}</td>
                                    <td>{{ config('site.commodity_type')[$list['type']] }}</td>
                                    <td>{{ $list['updated_at'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('script')
    @parent
    <!--Calendar-->
    <script src="{{ asset('/static/adminex/js/calendar/clndr.js') }}"></script>
    <script src="{{ asset('/static/adminex/js/calendar/evnt.calendar.init.js') }}"></script>
    <script src="{{ asset('/static/adminex/js/calendar/moment-2.2.1.js') }}"></script>
    <script src="{{ asset('http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js') }}"></script>

@endsection
