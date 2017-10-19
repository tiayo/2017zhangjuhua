@extends('home.layouts.app')

@section('title', '注册')

@section('style')
    <style type="text/css">
        .registration{
            margin-top: 1em;
        }
        .login{
            width: 100%;
            float: left;
            text-align: center;
        }
        #user{
            width: 80%;
            float: left;
            margin-left: 10%;
        }
        input{
            width: 60%;
            float: right;
            height: 0.5em;
            padding: 1em;
            border: 1px solid #ccc;
            margin-bottom: 1em;
        }
        lable{
            width: 40%;
            height: 2.5em;
            line-height:2.5em;
        }
        #registration-button{
            width: 60%;
            float: left;
            margin-left: 20%;
            background: #ccc;
            border: 1px solid #333;
            height: 2em;
            line-height: 2em;
            margin-bottom: 1em;
        }
    </style>
@endsection

@section('body')
<div class="registration">
    <form action="{{ route('home.register') }}" method="post">
        {{ csrf_field() }}
        <div id="registration-dialog">
            <div id="user">
                <lable>账号：</lable>
                <input type="email" name="email" placeholder="请输入邮箱" required/>
            </div>
            <div id="user">
                <lable>密码：</lable>
                <input type="password" name="password" placeholder="密码" required/>
            </div>
            <div id="user">
                <lable>确认密码：</lable>
                <input type="password" name="password_confirmation" placeholder="确认密码" required/>
            </div>
            <div id="user">
                <lable>姓名：</lable>
                <input type="text" name="name" placeholder="姓名" required/>
            </div>
            <div id="user">
                <lable>电话：</lable>
                <input type="text" name="phone" placeholder="电话" />
            </div>
            <div id="user">
                <lable>地址：</lable>
                <input type="text" name="address" placeholder="地址" />
            </div>
        </div>
        <button type="submit" id="registration-button">注册</button>
        <a href="{{ route('home.login') }}" class="login">已经有账号了？</a>
    </form>
</div>
@endsection