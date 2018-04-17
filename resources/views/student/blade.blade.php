@extends('layouts')

@section('title', 'Laravel学院')

@section('sidebar')
    @parent
    <p>Laravel学院致力于提供优质Laravel中文学习资源 </p>
@endsection

@section('content')
    <p>这里是主体内容，完善中...</p>

    <!--数据显示-->
    <p>{{$name}}</p><hr />

    <!--可以将任何 PHP 代码放到 Blade 模板语句中：-->
    <p>{{date("Y-m-d",time())}}</p><hr />

    {{--原样输出--}}
    <p>@{{$name}}</p><hr />

    {{--包含子视图--}}
    @include('student.common')<hr />

    {{--流程控制 If 语句--}}
    @if($name == 'xiaojing')
        My names is xiaojing.
    @elseif($name == 'xj')
        My nickname is xj.
    @else
         Who am I?
    @endif

    <hr />
    {{--流程控制 unless 语句  表示除非--}}
    @unless($name != 'girl')
        I`m boy.
    @endunless


    {{--流程控制  循环--}}
    @for ($i = 0; $i < 10; $i++)
        The current value is {{ $i }}<br>
    @endfor
    <hr />


    @foreach ($user_list as $user)
        <p>This is user {{ $user -> name}}</p>
    @endforeach
    <hr />

    @forelse ($user_list as $user)
        <li>{{ $user->name }}</li>
    @empty
        <p>No users</p>
    @endforelse

    {{--php--}}
    @php
        echo '<hr />This is php code.';
    @endphp

    {{--模板中URL  url() action --}}
    <hr />
    <a href="{{url('query1')}}">url()</a><br>
    <a href="{{action('Student\StudentController@query1')}}">action</a>
@endsection

