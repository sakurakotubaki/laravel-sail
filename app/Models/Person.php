<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    // テーブル名を指定
    protected $table = 'persons';
    // テーブルのカラムを指定
    protected $fillable = ['name', 'email'];
}
