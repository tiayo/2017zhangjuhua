<?php

$this->get('password', function() {
    return bcrypt('zhoujinsen.sb');
});

$this->group(['namespace' => 'Home'], function () {
    //登录注册
    $this->get('login', 'Auth\LoginController@showLoginForm')->name('home.login');
    $this->post('login', 'Auth\LoginController@login');
    $this->get('logout', 'Auth\LoginController@logout')->name('home.logout');
    $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('home.register');
    $this->post('register', 'Auth\RegisterController@register');

    $this->get('/', 'IndexController@index')->name('home.index');
    $this->get('/search', 'IndexController@search')->name('home.search');
    $this->get('/commodity/{id}', 'DetailController@view')->name('home.commodity_view');
    $this->get('/category', 'ListController@categoryList')->name('home.category_list');
    $this->get('/category/{id}', 'ListController@view')->name('home.category_view');

    //登录后操作
    $this->group(['middleware' => 'auth'], function () {
        $this->get('/car/list', 'CarController@view')->name('home.car');
        $this->post('/car/add/{commodity_id}', 'CarController@add')->name('home.car_add');
        $this->get('/car/destory/{commodity_id}', 'CarController@destory')->name('home.car_destory');

        //添加订单
        $this->get('/order/add', 'OrderController@addView')->name('home.order_add');
        $this->post('/order/add', 'OrderController@addPost');

        //个人页面
        $this->get('person', 'PersonController@view')->name('home.person');
        $this->get('person/update', 'PersonController@update')->name('home.person_update');
        $this->post('person/update', 'PersonController@updatePost');

        $this->get('order/{order_id}', 'OrderController@view')->name('home.order_view');
    });
});
