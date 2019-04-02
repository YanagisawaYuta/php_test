<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\posts;
use App\Model\Bbs;
use App\Model\DBtests;

class PagesController extends Controller
{
    // Homeを表示
    public function getHome(){
        $db_tests = \App\Model\DBtests::all();
        return view('home',['db_tests' => $db_tests]);
    }

    public function postIndex(Request $request){
        // バリデーションチェック
        $request->validate([
            'name' => 'required|max:20',
            'comment' => 'required|min:1|max:140',
            'image' => 'required|file|image|mimes:jpeg,png',

        ]);

        $name = $request->input('name');
        $comment = $request->input('comment');
        $image = base64_encode(file_get_contents($request->image->getRealPath()));//画像をbase64エンコード

        DBtests::insert(["name" => $name, "comment" => $comment, "image" => $image]); // データベーステーブルdb_testに投稿内容を入れる
        $db_tests = DBtests::all(); // 全データの取り出し

        return view('home', ['db_tests' => $db_tests]);
    }
  
    // controlを表示
    public function getControl(){
        $db_tests = DBtests::all();
        return view('control',['db_tests' => $db_tests]);
    }



    // 投稿削除
    public function delete (Request $request){
        DBtests::find($request->id)->delete();
        $db_tests = DBtests::all();
        return view('control',['db_tests' => $db_tests]);
    }


  
}
