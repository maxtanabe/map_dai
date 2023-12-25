<form method="POST" action="{{ url('/users/manage') }}" style="max-width: 400px;">
  @csrf
  <label for="name" style="display: block; margin-bottom: 10px; width: 100%;">ニックネーム:</label>
  <input type="text" name="name" id="name" value="{{ $user->name ?? '' }}" required style="display: block; margin-bottom: 10px; width: 100%; padding: 5px;">
  <label for="email" style="display: block; margin-bottom: 10px; width: 100%;">メールアドレス:</label>
  <input type="email" name="email" id="email" value="{{ $user->email ?? '' }}" required style="display: block; margin-bottom: 10px; width: 100%; padding: 5px;">
  <label for="hometown" style="display: block; margin-bottom: 10px; width: 100%;">居住地:</label>
  <select name="hometown" id="hometown" required style="display: block; margin-bottom: 10px; width: 100%; padding: 5px;">
      <option value="">選択</option>
      @foreach (\App\Models\User::getHometown() as $hometown)
        <option value="{{ $hometown }}" {{ isset($user) && $user->hometown == $hometown ? 'selected' : '' }}>{{ $hometown }}</option>
      @endforeach
  </select>
  @if(url()->current() == url('/users/register'))
      <label for="password" style="display: block; margin-bottom: 10px; width: 100%;">パスワード</label>
      <input type="password" name="password" id="password" required style="display: block; margin-bottom: 10px; width: 100%;">
  @endif
  <button type="submit" style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">登録</button>
</form>
