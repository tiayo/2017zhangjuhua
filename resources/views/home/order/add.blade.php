@extends('home.layouts.app')

@section('title', '结算页面')

@section('body')
    <form action="{{ route('home.order_add_post') }}" method="post">
        {{ csrf_field() }}
        <div class="goods-settlement clearfix">
            <div class="content">
                @foreach($cars as $car)
                    @php
                        $attributes = explode('|', $car['remark']);
                    @endphp
                <div class="info clearfix">
                    <h2>{{ $car->commodity->name ?? '未找到' }}</h2>
                    <h3>
                        <span><b>不计重量</b></span>
                        @foreach($attributes as $attribute)
                            @php
                                $attribute = explode(':', $attribute)
                            @endphp
                            <span>{{ $attribute[0] }}:<strong>{{ $attribute[1] }}</strong></span>
                        @endforeach
                        <span>数量 <input type="number" value="{{ $car['num'] }}" readonly="readonly" class="num"/></span>
                    </h3>
                    <h4>
                        ￥<span class="price" data-price="{{ $car['price'] }}">
                            {{ $car['price'] }} * {{ $car['num'] }}
                        </span>
                    </h4>
                </div>
                @endforeach
                <div class="courier">配送方式<em>快递免邮</em></div>
                <h1>合计:<span>￥<em>{{ $total_price }}</em></span></h1>
                <div class="address-info">收货人
                    <input type="text" class="address-name" name="name" value="{{ $user['name'] }}"
                           placeholder="请在此填写收货人姓名"/>
                </div>
                <div class="address-info">联系电话
                    <input type="number" class="address-tel" name="phone" value="{{ $user['phone'] }}"
                           placeholder="请在此填写收货人联系方式"/>
                </div>
                <div class="address-info">收货地址
                    <input type="text" class="address-address" name="address" value="{{ $user['address'] }}"
                           placeholder="请在此填写收货地址"/>
                </div>
            </div>
            <div class="nav-bottom">
                <button type="submit">提交订单</button>
            </div>
        </div>
    </form>
@endsection