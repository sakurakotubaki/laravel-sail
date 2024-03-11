<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoge extends Model
{
    use HasFactory;

    // テーブルが複数形のhogesになってしまうので、明示的に指定
    protected $table = 'hoge';
    
    // 追加のための設定。カラムはname, age, birthday
    protected $fillable = ['name', 'age', 'birthday'];

}
