<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <div class="main-box">
      <h1>Todo List</h1>
      <div class="todo">
        @if (count($errors)>0)
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        @endif
        <form action="/todo/create" method="POST" class="form-create">
          @csrf
          <input type="text" name="content" class="input-create">
          <button class="btn create">追加</button>
        </form>
        <table>
          <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>更新</th>
            <th>削除</th>
          </tr>
          @foreach ($tasks as $task)
          <tr>
            <td>{{$task->created_at}}</td>
            <form action="/todo/update/{{$task->id}}" method="POST">
              @csrf
            <td><input type="text" name="content" value="{{$task->content}}" class="input-update"></td>
            <td><button class="btn update">更新</button></td>
            </form>
            <td>
              <form action="/todo/delete/{{$task->id}}" method="POST">
                @csrf
                <button class="btn delete">削除</button>
              </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</body>
</html>