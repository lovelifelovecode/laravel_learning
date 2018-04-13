<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Student extends Model{

    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'student';

    //Eloquent 默认每张表的主键名为 id，你可以在模型类中定义一个 $primaryKey 属性来覆盖该约定。
    protected $primaryKey = 'id';
}