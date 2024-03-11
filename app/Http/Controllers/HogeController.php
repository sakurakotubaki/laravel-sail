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
    // hogeテーブルのデータを更新
    public function update(Request $request, $id)
    {
        // テーブルからidが一致するデータを取得
        $hoge = Hoge::find($id);
        // データを更新
        $hoge->update($request->all());
        // 更新したデータを返す
        return response()->json($hoge);
    }
    // hogeテーブルのデータを削除
    public function destroy($id)
    {
        // テーブルからidが一致するデータを取得
        $hoge = Hoge::find($id);
        // データを削除
        $hoge->delete();
        // 削除したデータを返す
        return response()->json($hoge);
    }
}