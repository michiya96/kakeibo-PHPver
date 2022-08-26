<?php
//dbconnect.php読み込むよってdbに接続
include_once('./dbconnect.php');

//新しいレコードを追加する処理
//処理の流れ
//最終のゴール：家計簿が追加されてトップに戻る
//１.画面で入力される値の取得
//2.PHPからMYSQLへ接続
//3.SQL文を作成して、画面で入力された値を追加する
//4.index.phpに画面変遷する

//ポスト送信の内容確認
//var_dump( $_POST);


$date= $_POST['date'];
$title= $_POST['title'];
$amount= $_POST['amount'];
$type= $_POST['type'];

$sql="INSERT INTO records(title,type,amount,date,created_at,updated_at) VALUES(:title, :type,:amount,:date,now(),now())";
//作成したSQLを実行出来るように準備
$stmt=$pdo->prepare($sql);
//値の設定
$stmt->bindParam(':title',$title,PDO::PARAM_STR);
$stmt->bindParam(':type',$type,PDO::PARAM_INT);
$stmt->bindParam(':amount',$amount,PDO::PARAM_INT);
$stmt->bindParam(':date',$date,PDO::PARAM_STR);

//SQLを実行
$stmt->execute();
//index.phpに移動
header('Location: ./index.php');
exit;
/*
echo $date;
echo '<br>';
echo $title;
echo '<br>';
echo $amount;
echo '<br>';
echo $type;
*/
 ?>
