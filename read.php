<?php



// DB接続情報
$dbn = 'mysql:dbname=gsmcf_d7_06;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

$sql = 'SELECT * FROM question_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output = "";
  foreach ($result as $record) {
    $output .= "<li class='question'>";
    $output .= "<h2 style='margin: 0;'>{$record["title"]}</h2>";
    $output .= "<p>{$record["question"]}</p>";
    $output .= "</li>";
  }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>programming Q&A</title>
  <link rel="stylesheet" href="css/read.css">
</head>

<body>
  <header>
    <p>programming Q&A</p>
    <button id="send" type="button" onclick="location.href='input.php'">質問する</button>
  </header>
  <div class='question_colection'>
    <ul><?= $output ?></ul>
  </div>
</body>

</html>