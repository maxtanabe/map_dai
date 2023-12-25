<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Log;

class UsersController extends Controller{
  public function login(Request $request){
    if($request->isMethod('post')) {
      //ログイン処理
      $credentials = $request->only('email', 'password');
      if(Auth::attempt($credentials)){
          //認証成功時の処理
          //ログイン状態をセッションに保存
          $user = Auth::user();
          session()->put('user_id', $user->id);
          return redirect()->intended('/maps/index');
        }
        //認証失敗時の処理
        return back()->withErrors(['email' => '認証に失敗しました。']);
      }
    return view('users.login');
  }
  public function logout(Request $request){
    //ログアウト処理
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/users/login');
  }
  public function register(Request $request){
    if($request->isMethod('post')){
      //登録処理
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'hometown' => 'required',
      ]);
      $user = \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'hometown' => $request->hometown,
      ]);
      Auth::login($user);
      return redirect('/users/login');
    }
    //会員登録フォームの表示
    return view('users.register');
  }
  public function manage(Request $request){
    $user = Auth::user();
    if($request->isMethod('post')){
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|unique:users,email,'.$user->id,
        'hometown' => 'required'
      ]);
      $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'hometown' => $request->hometown,
      ]);
      return redirect('/maps/index')->with('success', 'ユーザー情報を変更しました。');
    }
    return view('users.manage',["user"=>$user]);
  }
//   public function test_connect(){
//     //DB書き込みテスト
//     DB::beginTransaction();
//     try{
//       $user = \App\Models\User::create([
//         'name' => $request->name,
//         'email' => $request->email,
//         'password' => bcrypt($request->password),
//       ]);
//       Auth::login($user);
//       //トランザクションをコミット
//       DB::commit();
//     } catch(\Exception $e){
//         //トランザクションをロールバック
//         DB::rollback();
//         //エラーをログに出力
//         Log::error($e->getMessage());
//         //例外を再スロー
//         throw $e;
//     }
//   }
}
