<?php
require_once('funcs1.php');
$id = $_GET['id'];
$pdo = db_conn();
$stmt = $pdo->prepare('DELETE FROM gs_user_table WHERE id = :id');
$stmt->bindValue(':id', h($id), PDO::PARAM_INT);
$status = $stmt->execute(); //実行
//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    // redirect('select.php');
    header("Location: select1.php");
}
?>L