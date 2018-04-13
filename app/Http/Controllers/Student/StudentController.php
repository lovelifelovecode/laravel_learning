<?php
    namespace App\Http\Controllers\Student;

    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\DB;
    use App\Student;

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
            /*$list = DB::table('student') -> get();
            dd($list);*/

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
            /*$info = Student::find(1077);
            var_dump($info);*/

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
        }
    }