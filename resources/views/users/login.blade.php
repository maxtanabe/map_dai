<h2>ユーザーログイン</h2>
<form method="POST" action="{{ url('/users/login') }}">
    @csrf
    <label for="email">メールアドレス:</label>
    <input type="email" name="email" id="email" required>
    <label for="password">パスワード:</label>
    <input type="password" name="password" id="password" required>
    <button type="submit">ログイン</button>
</form>
<p>未登録の方は <a href="{{ url('/users/register') }}">ユーザー登録</a> を行なってください。</p>
