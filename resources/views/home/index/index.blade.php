@extends('home.layouts.app')

@section('title', '首页')

@section('body')
    <div class="index clearfix">
        <div class="search">
            <a href="{{ route('home.search') }}" class="search-input"><input type="text" placeholder="搜书"/></a>
        </div>
        <div class="swiper-container index-bigpic clearfix">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#"><img src="{{ asset('/style/home/picture/bigpic1.jpg') }}"/></a>
                </div>
                <div class="swiper-slide">
                    <a href="#"><img src="{{ asset('/style/home/picture/bigpic2.jpg') }}"/></a>
                </div>
                <div class="swiper-slide">
                    <a href="#"><img src="{{ asset('/style/home/picture/bigpic3.jpg') }}"/></a>
                </div>
            </div>
            <!-- 分页器 -->
            <div class="swiper-pagination"></div>
        </div>
        <div class="nav-top clearfix">
            <a href="#" class="on">精选图书</a>
            <a href="#">值得一读</a>
            <a href="#">名家大作</a>
            <a href="#">折扣图书</a>
        </div>
        <ul class="xs ulon">
            <li class="demo1 clearfix">
                @foreach($commodity_1 as $commodity)
                    <div class="goods1">
                        <a href="{{ route('home.commodity_view', ['commodity_id' => $commodity['id']]) }}">
                            <img src="{{ $commodity['image_0'] }}"/>
                            <span class="goods1-name">{{ $commodity['name'] }}</span>
                        </a>
                    </div>
                @endforeach
            </li>
        </ul>
        <ul class="rx">
            <li class="demo1 clearfix">
                @foreach($commodity_2 as $commodity)
                    <div class="goods1">
                        <a href="{{ route('home.commodity_view', ['commodity_id' => $commodity['id']]) }}">
                            <img src="{{ $commodity['image_0'] }}"/>
                            <span class="goods1-name">{{ $commodity['name'] }}</span>
                        </a>
                    </div>
                @endforeach
            </li>
        </ul>
        <ul class="cn">
            <li class="demo1 clearfix">
                @foreach($commodity_3 as $commodity)
                    <div class="goods1">
                        <a href="{{ route('home.commodity_view', ['commodity_id' => $commodity['id']]) }}">
                            <img src="{{ $commodity['image_0'] }}"/>
                            <span class="goods1-name">{{ $commodity['name'] }}</span>
                        </a>
                    </div>
                @endforeach
            </li>
        </ul>
        <ul class="jp">
            <li class="demo1 clearfix">
                @foreach($commodity_4 as $commodity)
                    <div class="goods1">
                        <a href="{{ route('home.commodity_view', ['commodity_id' => $commodity['id']]) }}">
                            <img src="{{ $commodity['image_0'] }}"/>
                            <span class="goods1-name">{{ $commodity['name'] }}</span>
                        </a>
                    </div>
                @endforeach
            </li>
        </ul>
        <div class="copyright">
            <h1>© {{ config('site.title') }} 版权所有</h1>
        </div>
        @include('home.layouts.nav')
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
        var mySwiperNews = new Swiper ('.swiper-containerNews', {
            direction: 'vertical',
            loop: true,
            autoplay: 3000,
            autoplayDisableOnInteraction : false,
        });
        $(".index .nav-top a").click(function() {
            $(".index .nav-top a").removeClass('on');
            $(this).addClass('on');
            $(".index ul").hide().eq($(".index .nav-top a").index(this)).show();
        });
    </script>
@endsection