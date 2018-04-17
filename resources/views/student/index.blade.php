@extends('common.layouts')



@section('content')

    @include('common.message');

    <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-fw fa-users"></i> 学生列表</div>
        <table class="table table-responsive table-hover">
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>性别</th>
                <th>年龄</th>
                <th>操作</th>
            </tr>
            @foreach($student_list as $student)
            <tr>
                <td>{{$student -> id}}</td>
                <td>{{$student->name}}</td>
                <td>{{$student->getSex($student->sex)}}</td>
                <td>{{$student->age}}</td>
                <td>
                    <a href="{{url('student/detail',['id'=>$student ->id])}}" class="btn btn-default btn-xs"><i class="fa fa-fw fa-archive"></i> 详情</a>
                    <a href="{{url('student/update',['id'=>$student ->id])}}" class="btn btn-default btn-xs"><i class="fa fa-fw fa-edit"></i> 修改</a>
                    <a href="{{url('student/delete',['id'=>$student ->id])}}" class="btn btn-danger btn-xs" onclick="return confirm('is del or not???')"><i class="fa fa-fw fa-trash-o"></i> <删></删>除</a>
                </td>
            </tr>
            @endforeach
        </table>

    </div>
    <nav aria-label="..." class="pull-right">
        {{$student_list->render()}}
    </nav>
@endsection