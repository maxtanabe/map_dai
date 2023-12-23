<h2>ユーザー登録</h2>
<form method="POST" action="{{ url('/users/register') }}" style="max-width: 400px;">
    @csrf
    <label for="email" style="display: block; margin-bottom: 10px; width: 100%;">ニックネーム</label>
    <input type="text" name="name" id="name" required style="display: block; margin-bottom: 10px; width: 100%;">
    <label for="email" style="display: block; margin-bottom: 10px; width: 100%;">メールアドレス</label>
    <input type="email" name="email" id="email" required style="display: block; margin-bottom: 10px; width: 100%;">
    <label for="hometown" style="display: block; margin-bottom: 10px; width: 100%;">居住地</label>
    <select name="hometown" id="hometown" required style="display: block; margin-bottom: 10px; width: 100%;">
        <option value="">選択</option>
        @foreach (\App\Models\User::getHometown() as $hometown)
            <option value="{{ $hometown }}">{{ $hometown }}</option>
        @endforeach
    </select>
    <label for="password" style="display: block; margin-bottom: 10px; width: 100%;">パスワード</label>
    <input type="password" name="password" id="password" required style="display: block; margin-bottom: 10px; width: 100%;">
    <button type="submit" style="width: 100%;">登録</button>
</form>
<p>登録済の方は <a href="{{ url('/users/login') }}">ユーザーログイン</a> を行なってください。</p>
