<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//基础路由 http://laravel.com/index.php/basic1
Route::get('basic1',function(){
	return 'basic1 good';
});


//基础路由
Route::post('basic2',function(){
	return 'basic2 good';
});


//多请求路由
Route::match(['get','post'],'multy1',function(){
	return 'multy1  good';
});


//多请求路由
Route::any('multy2',function(){
	return 'multy2 good';
});


//路由参数 http://laravel.com/index.php/user/137
Route::get('user/{id}', function ($id) {
    return 'User id is ' . $id;
});


//路由参数 可选参数
Route::get('user/{name?}', function ($name = 'John') {
    return $name;
});


//多个路由参数
Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return $postId . '-' . $commentId;
});


//路由别名
Route::get('user/member-center',['as' => 'center',function(){
	return route('center');
}]);


//路由前缀 ps:http://laravel.com/admin/users
Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        // Matches The "/admin/users" URL
        return 'The line is '.__LINE__;
    });
});


//路由视图
Route::view('/welcome', 'welcome');

//定义指向该控制器动作的路由
Route::any('member/{id}','MemberController@info')->where('id', '[0-9]+');

//定义指向该控制器动作的路由 ,this is the second method.
Route::any('member/{id}',['uses' => 'MemberController@info']);

//定义指向该控制器动作的路由 ,alias
Route::any('member/{id}',[
    'uses' => 'MemberController@info',
    'as' => 'memberinfo'
]);

//数据库连接 DB运行原生 SQL 查询
Route::get('db1','Student\StudentController@db1');

//数据库连接 通过查询构建器实现高级功
Route::get('query1','Student\StudentController@query1');

//数据库连接 使用 Eloquent 模型进行数据库操作
Route::get('orm1','Student\StudentController@orm1');

//Blade 模板引擎 使用 Eloquent 模型进行数据库操作
Route::any('blade','Student\StudentController@blade');

//Controller之Request
Route::any('request1','Student\StudentController@request1');

//Session
Route::any('session1','Student\StudentController@session1');

//Controller之Response
Route::any('response1','Student\StudentController@response1');

//中间件
Route::any('activity0',['uses'=> 'Student\StudentController@activity0']);
Route::group(['middleware'=> ['activity']],function(){
    Route::any('activity1',['uses'=> 'Student\StudentController@activity1']);
    Route::any('activity2',['uses'=> 'Student\StudentController@activity2']);
});


//表单案例
Route::group(['middleware'=>['web']],function(){
    Route::any('student/index',['uses'=>'Student\StudentController@index']);
    Route::any('student/create',['uses'=>'Student\StudentController@create']);
    Route::any('student/save',['uses'=>'Student\StudentController@save']);
});
Route::any('student/update/{id}',['uses'=>'Student\StudentController@update']);
Route::any('student/detail/{id}',['uses'=>'Student\StudentController@detail']);
Route::any('student/delete/{id}',['uses'=>'Student\StudentController@delete']);