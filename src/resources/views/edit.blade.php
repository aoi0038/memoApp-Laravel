<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>submit画面</title>
</head>

<body>
<h1>編集</h1>

<tr>
<form method="GET" action="{{route('memo.update', [$memo->id])}}">
  @csrf

  <div>
    <label for="form-name">タイトル</label>
    <input value="{{$memo->title}}" type="text" name="title" id="form-name">
  </div>

  <div>
    <label for="form-tel">本文</label>
    <input value="{{$memo->content}}" type="tel" name="content" id="form-tel">
  </div>
  <button type="submit">登録</button>
</tr>
</body>

</html>