<?php
//1. POSTデータ取得
$name   = $_POST["name"];
$price  = $_POST["price"];
$text = $_POST["text"];
$kanri_flg = $_POST["kanri_flg"];
$life_flg    = $_POST["life_flg"]; //追加されています


//2. DB接続します
//*** function化する！  *****************
try {
    $db_name = "gs_php02";    //データベース名
    $db_id   = "root";      //アカウント名
    $db_pw   = "root";      //パスワード：XAMPPはパスワード無しに修正してください。
    $db_host = "localhost"; //DBホスト
    $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
} catch (PDOException $e) {
    exit('DB Connection Error:'.$e->getMessage());
}


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_user_table(name,price,text,kanri_flg,life_flg,indate)VALUES(:name,:price,:text,:kanri_flg,:life_flg,sysdate())");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':price', $price, PDO::PARAM_INT);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':text', $text, PDO::PARAM_STR);        //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);        //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    //*** function化する！*****************
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}else{
    //*** function化する！*****************
    header("Location: index1.php");
    exit();
}
?>
