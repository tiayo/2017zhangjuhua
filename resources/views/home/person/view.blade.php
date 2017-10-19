@inject('index', 'App\Services\Home\IndexService')
@extends('home.layouts.app')

@section('title', '个人中心')

@section('body')
    <div class="pc">
        <div class="info">
            <img src="{{ Auth::user()['avatar'] }}" class="portrait" />
            <a href="{{ route('home.person_update') }}" class="more"></a>
        </div>
        <div class="title">我的订单</div>
        <div class="content" id="content">
            <div class="con" style="display:block" >
                <ul class="all-list">
                    @foreach($orders_all as $order)
                        <li class="clearfix">
                            <div class="status">{{ config('site.order_status')[$order['status']] }}</div>
                            @foreach($order->orderDetail as $list_detail)
                                <a href="#" class="info clearfix">
                                    <h1 class="name">{{ $list_detail->commodity->name  }}</h1>
                                    <h3 class="pay-for">￥<em>
                                            {{ $list_detail->price * $list_detail->num }}</em>
                                    </h3>
                                </a>
                            @endforeach
                            <h4>全国包邮</h4>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @include('home.layouts.nav')
    </div>
    <script type="text/javascript">
        $(".order-nav li").click(function() {
            $(this).addClass('on').siblings().removeClass('on');
            $(".pc .content .con").hide().eq($(".order-nav li").index(this)).show();
        });
    </script>
@endsection