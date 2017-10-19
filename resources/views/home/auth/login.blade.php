@extends('home.layouts.app')

@section('title', '登录')

@section('style')
    <style type="text/css">
        .login{
            margin-top: 1em;
        }
        .register{
            width: 100%;
            float: left;
            text-align: center;
        }
        #login-dialog{
            width: 100%;
            float: left;
        }
        #user{
            width: 80%;
            float: left;
            margin-left: 10%;
        }
        input{
            width: 70%;
            float: right;
            height: 0.5em;
            padding: 1em;
            border: 1px solid #ccc;
            margin-bottom: 1em;
        }
        lable{
            width: 30%;
            height: 2.5em;
            line-height:2.5em;
        }
        #login-button{
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
    <div class="login">
        <form action="{{ route('home.login') }}" method="post">
            {{ csrf_field() }}
            <div id="login-dialog">
                <div id="user">
                    <lable>账号：</lable>
                    <input type="email" name="email" placeholder="请输入登录邮箱"/>
                </div>
                <div id="user">
                    <lable>密码：</lable>
                    <input type="password" name="password" placeholder="请输入密码"/>
                </div>

                @foreach($errors as $error)
                    <div class="error">{{ $error }}</div>
                @endforeach
            </div>
            <button type="submit" id="login-button">登录</button>
        </form>
        <a href="{{ route('home.register') }}" class="register">还没有账号？</a>
    </div>
    <script>
        @foreach($errors->all() as $error)
            alert('{{ $error }}');
        @endforeach
    </script>
@endsection