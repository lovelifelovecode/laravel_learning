<form class="form-horizontal" method="post" action="">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="姓名" class="col-sm-2 control-label">姓名</label>
        <div class="col-sm-3">
            <input type="text" name="Student[name]" class="form-control" value="{{old('Student')['name']?old('Student')['name']:$student->name}}" id="姓名" placeholder="姓名">
        </div>
        <div class="col-sm-3"><strong style="color: red;">{{$errors->first('Student.name')}}</strong></div>
    </div>

    <div class="form-group">
        <label for="年龄" class="col-sm-2 control-label">年龄</label>
        <div class="col-sm-3">
            <input type="number" name="Student[age] " value="{{old('Student')['age']?old('Student')['age']:$student->age}}" class="form-control" id="年龄" placeholder="年龄">
        </div>
        <div class="col-sm-3"><strong style="color: red;">{{$errors->first('Student.age')}}</strong></div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">性别</label>
        <div class="col-sm-3">
            <div class="checkbox">
                @foreach($student->getSex() as $ind=>$val)
                    <label>
                        <input {{(isset($student->sex) && $student->sex == $ind) ? 'checked' :''}} type="radio" name="Student[sex]" value="{{$ind}}"> {{$val}}
                    </label>
                @endforeach
            </div>
        </div>
        <div class="col-sm-3"><strong style="color: red;">{{$errors->first('Student.sex')}}</strong></div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-3">
            <button type="submit" class="btn btn-primary">添加</button>
        </div>
    </div>
</form>