@inject('car', 'App\Services\Home\CarService')

@extends('home.layouts.app')

@section('title', '商品详情')

@section('style')
    <style type="text/css">
        #back {
            position: fixed;
            top: 10px;
            left: 10px;
            width: 25px;
            height: 25px;
            background: rgba(0, 0, 0, 0.5) url(/style/home/icon/icon_arrow_left.png) no-repeat center;
            background-size: 15px 15px;
            box-shadow: 1px 1px 5px #000;
            z-index: 999;
        }
        .show-details{
            padding: 1em;
        }
        .show-details img {
            width: 92%;
        }
    </style>
@endsection

@section('body')
    <div class="goods-details">
        <a href="/" id="back"></a>
        <form id="car_add_gorm" action="{{ route('home.car_add', ['id' => $commodity['id']]) }}" method="post" class="clearfix">
            {{ csrf_field() }}
            <div class="swiper-container bigpic clearfix">
                <div class="swiper-wrapper">
                    @for($i=0; $i<9; $i++)
                        @if (!empty($commodity['image_'.$i]))
                            <div class="swiper-slide">
                                <img src="{{ $commodity['image_'.$i] }}"/>
                            </div>
                        @endif
                    @endfor
                </div>
                <!-- 分页器 -->
                <div class="swiper-pagination"></div>
            </div>
            <div class="info">
                <div class="title clearfix">
                    <span>{{ $commodity['name'] }}</span>
                </div>
                <div class="price clearfix">
                    <h1>{{ $commodity['price'] }}</h1>
                </div>
            </div>
            <ul class="show-details">
                {!! $commodity['description'] !!}
            </ul>
            <div class="nav-bottom">
                <span class="join-cart">加入购物车</span>
            </div>
            <div class="mask">
                <h1 class="join-failure">请选择商品规格</h1>
                <div class="mask-con">
                    <div class="mask-title">
                        <h4>选择商品规格</h4>
                        <div class="mask-close"></div>
                    </div>
                    <ul class="mask-content">
                        @foreach($attributes as $attribute)
                            <li>
                                <p>{{ $attribute['name'] }}</p>
                                <div class="type-choose clearfix">
                                    @foreach(explode(',', $attribute['value']) as $value)
                                        <input type="text" id="attribute[{{ $attribute['name'] }}]" value="{{ $value }}" readonly/>
                                    @endforeach
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mask-num">
                        <p>数量</p>
                        <div class="form">
                            <div>
                                <input type="number" name="num" class="num" value="1"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav3">
                    <button type="button" class="confirm" onclick="car_add_gorm()">
                        确定
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        var mySwiper = new Swiper ('.swiper-container', {
            direction: 'horizontal',
            loop: true,
            autoplay: 3000,
            autoplayDisableOnInteraction : false,
            // 分页器
            pagination: '.swiper-pagination',
        });
        var len = $(".goods-details .mask .mask-con .mask-content li").length;
        if(len == 0) {
            $(".goods-details .mask .mask-con .mask-content").remove();
            $(".goods-details .mask .mask-con").css({"height" : 101});
            $(".quick-nav").css({"bottom" : 155});
        }

        //提交
        function car_add_gorm() {
            $('.type-choose').find('.on').each(function () {
                var value = $(this).attr('id');
                $(this).attr('name', value);
            });
            $('#car_add_gorm').submit();
        }
    </script>
@endsection