<?php
// var_dump($_POST);
// exit();

// DB接続情報
$dbn = 'mysql:dbname=gsmcf_d7_06;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// データを変数に格納
$title = $_POST['title'];
$question = $_POST['question'];


// データ受信側の処理
// 入力チェック(未入力の場合は弾く,commentのみ任意)
if (
  !isset($_POST['title']) || $_POST['title'] == '' ||
  !isset($_POST['question']) || $_POST['question'] == ''
) {
  exit('ParamError'); // 「ParamError」が表示されたら,必須データが送られていないことがわかる
}

// DB接続
// 「dbname」「port」「host」「username」「password」を設定
$dbn
  = 'mysql:dbname=gsmcf_d7_06;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = ''; // (空文字)

// 「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる.
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// SQL作成&実行
$sql = 'INSERT INTO question_table(id, title, question, deadline, created_at, updated_at) VALUES(NULL, :title, :question, sysdate(), sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':question', $question, PDO::PARAM_STR);
//$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);
$status = $stmt->execute(); // SQLを実行

// 失敗時にエラーを出力し,成功時は登録画面に戻る
if ($status == false) {
  $error = $stmt->errorInfo();
  // データ登録失敗次にエラーを表示
  exit('sqlError:' . $error[2]);
} else {
  // 登録ページへ移動
  header('Location:input.php');
}
