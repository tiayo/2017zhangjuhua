@inject('index', 'App\Services\Home\IndexService')
@extends('home.layouts.app')

@section('title', '商品分类')

@section('body')
    <div class="classification clearfix">
        <div class="search">{{ config('site.title') }}</div>
        <div class="banner clearfix"><img src="../picture/banner_top.jpg"/></div>
        <ul class="tab clearfix">
            @foreach($parents as $key => $parent)
                <li @if($key == 0) class="on" @endif>{{ $parent['name'] }}</li>
            @endforeach
        </ul>
        <ul class="tabcon">
            @foreach($parents as $parent)
                <li>
                    @foreach($index->getCategoryChildren($parent['id']) as $children)
                        <a class="tabcon-list" href="{{ route('home.category_view', ['id' => $children['id']]) }}">
                            {{ $children['name'] }}
                        </a>
                    @endforeach
                </li>
            @endforeach
        </ul>
        @include('home.layouts.nav')
    </div>
@endsection