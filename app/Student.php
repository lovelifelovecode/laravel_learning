<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Student extends Model{
    const SEX_UN = 0;
    const SEX_BOY = 1;
    const SEX_GRIL = 2;

    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'student';

    //Eloquent 默认每张表的主键名为 id，你可以在模型类中定义一个 $primaryKey 属性来覆盖该约定。
    protected $primaryKey = 'id';

    //改为时间戳
    protected $dateFormat = 'U';

    //定义哪些模型字段允许批量赋值
    protected $fillable = ['name','age'];

    //定义哪些模型字段是受保护的，不能显式进行批量赋值
    protected $guarded = [];

    protected function getDateFormat(){
        return time();
    }

    protected function asDateTime($value){
        return $value;
    }

    public function getSex($ind = null){
        $arr = [
            self::SEX_BOY =>'男',
            self::SEX_GRIL =>'女',
            self::SEX_UN =>'未知',
        ];
        if($ind !==null){
            return array_key_exists($ind,$arr)?$arr[$ind]:$arr[self::SEX_UN];
        }
        return $arr;
    }

}