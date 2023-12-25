<?php
namespace App\Http\Controllers;
use App\Models\User;

class MapsController extends Controller{
  public function index(){
    //ユーザー情報を取得
    $users = User::all();
    return view("maps.index",["users"=>$users]);
  }
}