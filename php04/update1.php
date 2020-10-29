<?php
require_once('funcs1.php');
//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る
//2. $id = POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更

// include('funcs.php');
//1. POSTデータ取得
$name   = $_POST["name"];
$price  = $_POST["price"];
$text = $_POST["text"];
// $kanri_flg = $_POST["kanri_flg"];
// $age    = $_POST["age"];
$id    = $_POST["id"];
// var_dump($id);
//2. DB接続します
//*** function化する！  *****************
// ※returnを変数にちゃんと入れる！
$pdo = db_conn();
//３．データ登録SQL作成
// $stmt = $pdo->prepare('UPDATE FROM gs_user_table WHERE id = :id');
$stmt = $pdo->prepare("UPDATE gs_user_table SET name = :name, price = :price, text = :text, indate = sysdate() WHERE id = :id; ");
$stmt->bindValue(':name', h($name), PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':price', h($price), PDO::PARAM_INT);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':text', h($text), PDO::PARAM_STR);        //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':kanri_flg', h($kanri_flg), PDO::PARAM_INT);        //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':naiyou', h($naiyou), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', h($id), PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行



//４．データ登録処理後
if($status==false){
//     //*** function化する！*****************
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}else{
//     //*** function化する！*****************
    header("Location: select1.php");
    exit();
}

//４．データ登録処理後
// if ($status == false) {
//     sql_error($stmt);
// } else {
//     // redirect('select1.php');
//     header("Location: select1.php");
// }

?>