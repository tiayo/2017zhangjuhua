@extends('home.layouts.app')

@section('title', '我的购物车')

@section('body')
    <form class="shopping-cart">
        <div class="search">{{ config('site.title') }}</div>
        <div class="delete-mask">
            <div class="delete-list">
                确定将这个宝贝删除？
                <span class="cancel-delete">取消</span>
                <span class="confirm-delete">确定</span>
            </div>
        </div>
        <div class="delete-prompt">您未选中任何商品</div>
        <div class="content">
            @foreach($lists as $list)
                @php
                    $attributes = explode('|', $list['remark']);
                @endphp
                <div class="list">
                    <span class="choose"><em></em></span>
                    <h2>{{ $list->commodity->name ?? '未找到' }}</h2>
                    <h3>
                        @foreach($attributes as $attribute)
                            @php
                                $attribute = explode(':', $attribute)
                            @endphp
                            <span>{{ $attribute[0] }}:<strong>{{ $attribute[1] }}</strong></span>
                        @endforeach
                        <span>数量:<input type="number" value="{{ $list['num'] }}" readonly="readonly" class="num" /></span>
                    </h3>
                    <h4>
                        <span class="price" data-price="{{ $list['price'] }}">
                            ￥{{ $list['price'] * $list['num'] }}
                        </span>
                    </h4>
                </div>
            @endforeach
        </div>
        <div class="total-price">
            <div class="all-choose"><em></em>全选</div>
            <div class="all-price">
                <span class="total"><em>0</em></span>
            </div>
            @include('home.layouts.nav')
        </div>
        <div class="settlement">
            <button type="button" onclick="location='{{ route('home.order_add') }}'">去结算(<em>0</em>)</button>
        </div>
    </form>
@endsection