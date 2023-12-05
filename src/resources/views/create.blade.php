<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>submit画面</title>
</head>

<body>
<h1>新規作成</h1>
<form method="POST" action="{{route('memo.store')}}" novalidate>
  @csrf

    @error('title')
        <div class="error"><span>{{ $message }}</span></div>
    @enderror
  <div>
    <label for="form-name">タイトル</label>
    <input type="text" name="title" id="form-name">
  </div>

    @error('content')
        <div class="error"><span>{{ $message }}</span></div>
    @enderror
  <div>
    <label for="form-tel">本文</label>
    <input type="tel" name="content" id="form-tel">
  </div>

  <button type="submit">登録</button>

</form>
</body>

</html>