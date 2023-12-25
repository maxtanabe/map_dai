<div id="header">
  @guest
    <a href="{{url('/users/login')}}">ログイン</a>
  @else
    <a href="{{url('/users/manage')}}">設定</a>
    <a href="{{url('/users/logout')}}">ログアウト</a>
  @endguest
</div>