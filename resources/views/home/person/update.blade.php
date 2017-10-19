@extends('home.layouts.app')

@section('title', '我的信息')

@section('style')
    <style type="text/css">
        body {
            position: fixed;
            overflow: scroll;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #f3f5f9;
        }
        .user-info {
            background-color: #fff;
            margin-bottom: 1em;
        }
        .user-info li {
            height: 45px;
            margin: 0 15px;
            padding-left: 5px;
            background-color: #fff;
            border-bottom: 1px solid #e7e7e7;
            color: #666;
            font-size: 16px;
            line-height: 45px;
        }
        .user-info li input {
            float: right;
            height: 100%;
            padding-right: 5px;
            outline: none;
            border: 0;
            text-align: right;
        }
        .user-info li:nth-child(1) {
            position: relative;
            height: 70px;
            margin-top: 10px;
            line-height: 70px;
        }
        .user-info li:nth-child(1) .pic {
            position: relative;
            position: absolute;
            top: 5px;
            right: 5px;
            width: 55px;
            height: 55px;
            border-radius: 50%;
        }
        .user-info li:nth-child(1) .pic #portrait-file {
            float: right;
            height: 100%;
            padding-right: 5px;
            outline: none;
            border: 0;
            text-align: right;
            margin-top: 1em;
        }
        .user-info li:nth-child(1) .pic #user-portrait {
            float: left;
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }
        /*.user-info li:nth-child(3) {
            border-bottom: 0;
        }*/
        /*.user-info li:nth-child(4) {
            height: 10px;
            padding: 0;
            margin: 0;
            background-color: #f3f5f9;
            border-bottom: 0;
        }*/
        .user-info li:nth-last-child(1) {
            border-bottom: 0;
            height: 100px;
            line-height: 100px;
        }
        .user-info li:nth-last-child(1) label {
            float: left;
            width: 20%;
            height: 100%;
            text-align: left;
            line-height: 45px;
        }
        .user-info li:nth-last-child(1) textarea {
            float: right;
            resize: none;
            outline: none;
            border: 0;
            height: 74px;
            padding: 13px 0;
            width: 70%;
        }
        button {
            width: 60%;
            float: left;
            margin-left: 20%;
            background: #ccc;
            border: 1px solid #333;
            height: 2em;
            line-height: 2em;
            margin-bottom: 1em;
        }
        .back{
            width: 100%;
            float: left;
            text-align: center;
        }
    </style>
@endsection

@section('body')
    <form action="{{ route('home.person_update') }}" enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
        <ul class="user-info">
            <li>
                头像<div class="pic">
                    <input name="avatar" type="file" id="portrait-file" />
                </div>
            </li>
            <li>
                姓名<input name="name" type="text" value="{{ $user['name'] }}" id="user-name"/>
            </li>
            <li>
                手机<input name="phone" type="text" value="{{ $user['phone'] }}" id="user-phone"/>
            </li>
            <li>
                <label class="form-input-label">详细地址</label>
                <textarea name="address" id="user-city" cols="30" rows="10" placeholder="请输入您的详细地址">{{ $user['address'] }}</textarea>
            </li>
        </ul>
        <button type="submit">保存</button>
    </form>
    <button type="button" onclick="location='{{ route('home.logout') }}'">退出登录</button>
    <a href="{{ route('home.person') }}" class="back">返回个人中心</a>
@endsection