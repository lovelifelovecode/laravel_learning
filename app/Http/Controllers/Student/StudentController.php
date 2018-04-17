<?php
    namespace App\Http\Controllers\Student;

    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\DB;
    use App\Student;
    use Illuminate\Http\Request;

    class StudentController extends Controller{
        /*
         * DB运行原生 SQL 查询
         */
        public function db1(){

            //运行插入语句
            /*$bool = DB::insert('insert into student (id, name,age) values (?, ?, ?)', [1, '学院君',27]);*/

            //运行 Select 查询
            $results = DB::select('select * from student where id = :id', ['id' => 1]);
            dd($results);

            //运行更新语句
            /*$affected = DB::update('update student set age = ? where name = ?', [37,'学院君']);*/

            //运行删除语句
            /*$bool = DB::delete('delete from student where id = ?',[1]);*/
        }

        /*
         * 通过查询构建器实现高级功
         */
        public function query1(){
            //插入（Insert）
            /*$bool = DB::table('student') -> insert(['name'=>'king','age'=>21]);*/


            //插入（Insert）多条记录
            /*$bool = DB::table('student') -> insert([['name'=>time(),'age'=>21],['name'=>rand(1,999),'age'=>23]]);*/

            //插入（Insert）自增ID
            /*$id = DB::table('student') -> insertGetId(['name'=>'king','age'=>21]);*/

            //更新（Update）
            /*$bool = DB::table('student') -> where('id',1001) -> update(['age'=>112]);*/


            //更新 JSON 字段 更新 JSON 字段的时候，需要使用 -> 语法访问 JSON 对象上相应的值，该操作只能用于支持 JSON 字段类型的数据库：
            /*DB::table('users')
                ->where('id', 1)
                ->update(['options->enabled' => true]);*/

            //增加/减少,常用在点赞收藏
            /*$affected = DB::table('student') -> where('id',1001) ->increment('grade',20);//加20
            $affected = DB::tabel('student') -> where('id',1001) ->decrement('age',2);//减少2*/

            //删除（Delete）
            /*$affected = DB::table('student') -> where('id','<','1071') -> delete();*/

            //用 get 方法获取表中所有记录
            $list = DB::table('student') -> get();
            dd($list);

            //从一张表中获取一行/一列
            /*$info = DB::table('student') -> first();
            $name = DB::table('student') -> where('id',1006) -> value('name');*/

            //获取数据列值列表
            /*$list = DB::table('student') -> pluck('name');
            dd($list);*/

            //获取数据列值列表,还可以在返回数组中为列值指定自定义键（该自定义键必须是该表的其它字段列名，否则会报错）：
            /*$list = DB::table('student') -> pluck('name','id');
            dd($list);*/

            //查询（Select）
            /*$list = DB::table('student') -> select('id','name as username') -> get();
            dd($list);*/

            //组块结果集    如果你需要处理成千上百条数据库记录，可以考虑使用 chunk 方法，该方法一次获取结果集的一小块，然后传递每一小块数据到闭包函数进行处理，该方法在编写处理大量数据库记录的 Artisan 命令的时候非常有用。例如，我们可以将处理全部 users 表数据分割成一次处理 100 条记录的小组块：
            /*DB::table('student')->orderBy('id')->chunk(100,function($students){
                var_dump($students);
            });*/

            //聚合函数  查询构建器还提供了多个聚合方法，如count, max, min, avg 和 sum
            /*$sum = DB::table('student') -> sum('age');*/
        }

        /*
         * 使用 Eloquent 模型进行数据库操作
         */
        public function orm1(){
            //获取模型
            /*$list = Student::all();
            dd($list);*/

            //获取单个模型/聚合结果  当然，除了从给定表中获取所有记录之外，还可以使用 find 和 first 获取单个记录。
            /*$info = Student::find(1081);
            dd($info);*/

            //Not Found 异常  有时候你可能想要在模型找不到的时候抛出异常，这在路由或控制器中非常有用
            /*$info = Student::findOrFail(77);
            var_dump($info);*/

            //组块结果集  如果你需要处理数据量很大的 Eloquent 结果集，可以使用 chunk 方法。
            /*Student::chunk(2,function($students){
                var_dump($students);
            });*/

            //获取聚合结果  可以使用查询构建器提供的聚合方法，例如 count、sum、max，以及其它查询构建器提供的聚合函数。
            /*$max = Student::where('id','>',100) ->  max('age');
            var_dump($max);*/

            //插入/更新模型  想要在数据库中插入新的记录，只需创建一个新的模型实例，设置模型的属性，然后调用 save 方法
            /*$student = new Student();
            $student -> name = 'king'.time();
            $student -> age = 26;
            $bool = $student -> save();
            dd($student);*/

            //插入/更新模型  还可以使用 create 方法保存一个新的模型。该方法返回被插入的模型实例。但是，在此之前，你需要指定模型的 fillable 或 guarded 属性
            /*$obj = Student::create(['name'=>'kingaa','age'=>72]);
            dd($obj);*/

            //firstOrCreate 方法先尝试通过给定列/值对在数据库中查找记录，如果没有找到的话则通过给定属性创建一个新的记录。
            /*$obj = Student::firstOrCreate(['name'=>'king']);
            dd($obj);*/

            //通过 firstOrNew 方法返回的模型实例并没有持久化到数据库中，你还需要调用 save 方法手动持久化：
            /*$obj = Student::firstOrNew(['name'=>'king2aa','age'=>72]);
            dd($obj);*/

            //更新
            /*$student = Student::find(1083);
            $student -> name = 'kitty';
            $bool = $student -> save();*/

            //批量更新
            /*$affected = Student::where('id','>','1000')->update(['age' => 21]);
            var_dump($affected);*/

            //删除模型 通过实例删除模型
            /*$student = Student::find(1071);
            $bool = $student -> delete();
            var_dump($bool);*/

            //删除模型  通过主键删除模型
            /*$bool = Student::destroy(1072);
            var_dump($bool);*/

            //删除模型  通过查询删除模型
            /*$affected = Student::where('age','<','18')->delete();
            var_dump($affected);*/
        }

        /*
         * Blade 模板引擎
         */
        public function blade()
        {
            $user_list = Student::all();
            return view('student.blade', ['name' => 'xiaojing','user_list'=>$user_list]);
        }

        /*
         * Controller之Request    http://laravel.com/request1?name=king
         */
        public function request1(Request $request){

            //HTTP 请求参数获取
            /*$name = $request->input('name','default_name');
            return 'My name is '.$name;*/

            //判断参数在请求中是否存在，可以使用 has 方法，如果参数存在则返回 true：
            /*if ($request->has('name')) {

            }*/

            //你可以使用 all 方法以数组格式获取所有输入值 http://laravel.com/request1?name=%27xiaing%27&sex=2
            /*$input_arr = $request->all();
            dd($input_arr);*/

            //获取请求方法
            /*$method = $request->method(); // GET/POST*/

            //判断请求方法
            /*if($request->isMethod('post')){
                // true or false
            }*/

            //is ajax method
            /*$bool = $request -> ajax();*/

            //获取请求URL

            $url = $request->url();// 不包含查询字符串
            $url_with_query = $request->fullUrl();// 包含查询字符串
        }

        /*
         * Controller之Session
         */
        public function session1(Request $request){
            //存储数据 通过调用请求实例的 put 方法
            $request->session()->put('key1', 'value1');

            //存储数据  通过全局辅助函数 session
            session(['key2' => 'value2']);

            //获取  通过 Request 实例来访问 Session 数据
            $value = $request->session()->get('key1');

            //获取  全局 Session 辅助函数
            $value2 = session('key2');

            //获取所有 Session 数据
            $data_arr = $request->session()->all();

            //推送数据到数组 Session
            $request->session()->push('user.teams', 'developers');

            //pull 方法将会通过一条语句从 Session 获取并删除数据：
            $value = $request->session()->pull('key1', 'default');
            var_dump($value);

            //判断 Session 中是否存在指定项
            //has 方法可用于检查数据项在 Session 中是否存在。如果存在并且不为 null 的话返回 true
            if ($request->session()->has('users')) {
                //
            }

            //删除数据  forget 方法从 Session 中移除指定数据，如果你想要从 Session 中移除所有数据，可以使用 flush 方法：
            $request->session()->forget('key1');
            $request->session()->flush();

            //一次性数据  有时候你可能想要在 Session 中存储只在下个请求中有效的数据，这可以通过 flash 方法来实现。使用该方法存储的 Session 数据只在随后的 HTTP 请求中有效，然后将会被删除：
            $request->session()->flash('status', '登录Laravel学院成功!');
        }

        /*
         * Controller之Response响应
         */
        public function response1(){
            //JSON响应
            //json 方法会自动将 Content-Type 头设置为 application/json，并使用 PHP 函数 json_encode 方法将给定数组转化为 JSON 格式数据
            /*$arr = ['name'=>'xiaojing','age'=>17];
            return response() -> json($arr);*/

            //重定向
            /*return redirect('blade');*/

            //重定向到控制器动作
            /*return redirect()->action('Student\StudentController@blade');*/

            //重定向到命名路由 别名
            return redirect()->route('memberinfo');

            //辅助函数 back 返回到前一个 URL
            /*return redirect()->back();*/
        }

        /*
         * Controller之Middleware
         */
        public function activity0(){return '活动快要开始了';}
        public function activity1(){return '活动进行中img';}
        public function activity2(){return '活动已结束';}



        public function index(){
            $student_list = Student::orderBy('id','desc')->paginate(15);
            return view('student.index',['student_list'=>$student_list]);
        }

        public function create(Request $request){
            //一开始是get的请求，表单提交后为post请求
            if($request->isMethod('POST') ){

                //验证方法 控制器验证
                /*$this->validate($request,[
                    'Student.name'=>'required|min:2|max:20',
                    'Student.age' => 'required|integer',
                    'Student.sex' => 'required|integer',
                ],[
                    'required' => ':attribute 为必填项',
                    'min' => ':attribute 长度不符合要求',
                    'integer' => ':attribute 必须为整数',
                ],[
                    'Student.name' => '姓名',
                    'Student.age' => '年龄',
                    'Student.sex' => '性别',
                ]);*/

                //验证方法  Validator类验证
                $validator = \Validator::make($request->input(),[
                    'Student.name'=>'required|min:2|max:20',
                    'Student.age' => 'required|integer',
                    'Student.sex' => 'required|integer',
                ],[
                    'required' => ':attribute 为必填项',
                    'min' => ':attribute 长度不符合要求',
                    'integer' => ':attribute 必须为整数',
                ],[
                    'Student.name' => '姓名',
                    'Student.age' => '年龄',
                    'Student.sex' => '性别',
                ]);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data = $request->input('Student');
                if(Student::create($data)){
                    return redirect('student/index')->with('success','good boy _xj');
                }else{
                    return rediret() -> back();
                }
            }
            $student = new Student();
            return view('student.create',['student'=>$student]);
        }

        public function update(Request $request,$id){
            $student = Student::find($id);
            if($request->isMethod('POST')){

                //验证方法  Validator类验证
                $validator = \Validator::make($request->input(),[
                    'Student.name'=>'required|min:2|max:20',
                    'Student.age' => 'required|integer',
                    'Student.sex' => 'required|integer',
                ],[
                    'required' => ':attribute 为必填项',
                    'min' => ':attribute 长度不符合要求',
                    'integer' => ':attribute 必须为整数',
                ],[
                    'Student.name' => '姓名',
                    'Student.age' => '年龄',
                    'Student.sex' => '性别',
                ]);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }


                $data = $request->input('Student');
                $student->name = $data['name'];
                $student -> age = $data['age'];
                $student -> sex = $data['sex'];
                if($student->save()){
                    return redirect('student/index')->with('success','The update is success');
                }
            }
            return view('student.update',['student'=>$student]);
        }

        public function detail($id){
            $student = Student::find($id);
            return view('student.detail',['student'=>$student]);
        }

        public function delete($id){
            $student = Student::find($id);
            if($student->delete()){
                return redirect('student/index')->with('success','The delete is good');
            }else{
                return redirect('student/index')->with('error','The delete is error.');
            }
        }
    }