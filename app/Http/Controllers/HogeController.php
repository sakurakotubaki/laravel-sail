<?php

namespace App\Http\Controllers;

use App\Models\Hoge;
use Illuminate\Http\Request;

class HogeController extends Controller
{
    public function index()
    {
        // hogeテーブルの全データを取得
        $hoge = Hoge::all();
        // jsonメソッドでJSON形式に変換して返す
        return response()->json($hoge);
    }
}