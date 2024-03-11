<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// DBのデーターを取得する
use App\Models\Flight;

class FlightController extends Controller
{
    public function index()
    {
        // データを全件取得する。変数に代入しておく
        $values = Flight::all();
        // dump関数のようにデータを表示する
        // dd($values);

        // compact関数を使ってデータをビューに渡す。文字列になる
        return view('flights.flight', compact('values'));
    }
}
