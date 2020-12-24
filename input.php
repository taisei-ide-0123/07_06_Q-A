<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>programming Q&A</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <form action="create.php" method="POST">
    <header>
      <p>programming Q&A</p>
    </header>
    <div class="title">
      <input type="text" name="title" id="title" placeholder="タイトル：わからないこと、解決したいことを10文字以上で書いてください">
    </div>
    <div class="details">
      <textarea type="text" name="question" id="text" cols="30" rows="10" placeholder="分からないこと、解決したいことの詳細を30~10000文字で入力してください。&#13;&#13;具体的なエラ〜メッセージや使用ライブラリ、バージョンなどの情報を記述して、どのような環境で何に困っているのかを明確にしたり、Markdown記法を使用したりすることで、すばやく的確な回答を得られるようになります。"></textarea>
    </div>
    <div class="post">
      <div class="button">
        <button id="send" type="button" onclick="location.href='read.php'">投稿する</button>
      </div>
    </div>
  </form>
</body>

</html>