<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    public function index()
    {
        // personsテーブルのデータを全て取得
        $persons = Person::all();
        return view('persons.person', compact('persons'));
    }
    // personsテーブルのデータを新規登録するページ
    public function create(Request $request)
    {
        return view('persons.create');
    }
    // personsテーブルのデータを新規登録する処理
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:persons,email',
        ]);
    
        $data = $request->except('_token'); // _tokenを除外
        $persons = Person::create($data);
        return redirect('/persons');
    }
    // personsテーブルのデータを削除する処理
    public function destroy($id)
    {
        $person = Person::find($id);
        $person->delete();
        return redirect('/persons');
    } 
}
