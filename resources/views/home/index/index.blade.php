@extends('home.layouts.app')

@section('title', '首页')

@section('body')
    <div class="index clearfix">
        <div class="search">
            <a href="{{ route('home.category_list') }}" class="fenlei"></a>
            <a href="{{ route('home.search') }}" class="search-input"><input type="text" placeholder="搜索礼品"/></a>
            <a href="{{ route('home.car') }}" class="shopping-cartt"><em>{{ $car_count }}</em></a>
        </div>
        <div class="swiper-container index-bigpic clearfix">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="classification-list.html"><img src="../picture/bigpic1.jpg"/></a>
                </div>
                <div class="swiper-slide">
                    <a href="classification-list.html"><img src="../picture/bigpic2.jpg"/></a>
                </div>
                <div class="swiper-slide">
                    <a href="goods-details.html"><img src="../picture/bigpic3.jpg"/></a>
                </div>
            </div>
            <!-- 分页器 -->
            <div class="swiper-pagination"></div>
        </div>
        <div class="nav-top clearfix">
            <a href="classification-list.html">精选产品</a>
            <a href="classification-list.html">超值专区</a>
            <a href="classification-list.html">大牌专区</a>
            <a href="classification-list.html">折扣专区</a>
        </div>
        <!-- <div class="news clearfix">
            <strong></strong>
            <div class="swiper-containerNews clearfix">
                <div class="swiper-wrapper news-list">
                    <div class="swiper-slide">
                        <a href="news.html">1今年全球出现了20项黑科技今年全球出现了20项黑科技</a>
                    </div>
                    <div class="swiper-slide">
                        <a href="news.html">2今年全球出现了20项黑科技今年全球出现了20项黑科技</a>
                    </div>
                    <div class="swiper-slide">
                        <a href="news.html">3今年全球出现了20项黑科技今年全球出现了20项黑科技</a>
                    </div>
                </div>
            </div>
            <a href="news.html">更多</a>
        </div> -->
        <div class="goods">
            <b class="hot-exchange clearfix" style="width: 100%;padding-left: 0;">
                今日推荐
            </b>
            <ul class="goods-con clearfix">
                @foreach($recommend_today as $commodity)
                    <li>
                        <a href="{{ route('home.commodity_view', ['id' => $commodity['id']]) }}">
                            <h3>
                                <img src="{{ $commodity['image_0'] }}" height="750" width="750"/>
                            </h3>
                            <h2>{{ $commodity['name'] }}</h2>
                            <strong class="price clearfix">
                                <h4>{{ $commodity['price'] }}</h4>
                                <!-- <h5><em>100</em>.00</h5> -->
                            </strong>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- <a class="index-advertising clearfix">
            <img src="../picture/1ae1ccc0-9078-47ea-8c40-3578bbfc11cf.jpg" alt="" />
        </a> -->
        <div class="copyright">
            <h1>© {{ config('site.title') }} 版权所有</h1>
            <h2>李艺芳提供技术支持</h2>
        </div>
        <div class="nav clearfix">
            @include('home.layouts.sidebar')
        </div>
    </div>
    <em class="return-top">顶部</em>
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
    </script>
@endsection