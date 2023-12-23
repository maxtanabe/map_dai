<?php
namespace App\Http\Controllers;
use App\Models\User;

class MapsController extends Controller{
  public function index(){
    //ユーザー情報を取得
    $user = User::find(session()->get("user_id"));
    if($user){
      //ユーザー情報をビューに渡して表示
      $users = User::all();
      if($users){
         return view("maps.index",["users"=>$users]);
      }
    } else {
      return redirect("/users/login");
    }
  }
}