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
    // hogeテーブルにデータを追加
    public function store(Request $request)
    {
        // テーブルにデータを追加する
        $hoge = Hoge::create($request->all());
        // 追加したデータを返す
        return response()->json($hoge);
    }
}