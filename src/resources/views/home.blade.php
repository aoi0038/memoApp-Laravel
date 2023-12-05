<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>タイトル</th>
      <th>本文</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($memos as $memo)
    <tr>
      <td>{{ $memo->id }}</td>
      <td>{{ $memo->title }}</td>
      <td>{{ $memo->content }}</td>
      <td>
        <form action="{{ route('memo.edit', ['id' => $memo->id]) }}" method="GET">
          @csrf
          <button type="submit" class="">編集</button>
        </form>
      </td>
      <td>
        <form action="{{ route('memo.destroy', ['id' => $memo->id]) }}" method="POST">
          @csrf
          <button type="submit" class="">削除</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<a href="{{ route('memo.create') }}" role="button">
  新規作成
</a>