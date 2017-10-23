@extends('home.layouts.app')

@section('title', '搜索结果')

@section('body')
    <div class="classification-list">
        <div class="header">
            <div class="search">
                <a href="/" id="back"></a>
                <a href="{{ route('home.search') }}" class="search-input"><input type="text" placeholder="搜书"/></a>
            </div>
        </div>
        <div class="content" id="content">
            <ul class="content-con">
                @foreach($commodities as $commodity)
                    <li class="content-list">
                        <a href="{{ route('home.commodity_view', ['commodity_id' => $commodity['id']]) }}">
                            <div class="pic">
                                <img src="{{ $commodity['image_0'] }}"/>
                            </div>
                            <h2>{{ $commodity['name'] }}</h2>
                            <strong class="price clearfix">
                                <span>￥<b>{{ $commodity['price'] }}</b></span>
                            </strong>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @include('home.layouts.nav')
@endsection