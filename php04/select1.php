<?php
//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！ -->
require_once("funcs1.php");    //一番上に書く
$pdo = db_conn();
//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");

// 登録が新しい順に並び替える
$stmt = $pdo->prepare("SELECT * FROM gs_user_table ORDER BY id DESC");
$status = $stmt->execute();

// 管理者かどうか？

// if ($kanri_flg == 0) {
//  $kanri_flg = "管理者";
// echo ($kanri_flg);
// } else {
// $kanri_flg = "一般社員";
// } 
// $kanri_flg = $result($kanri_flg);
// var_dump($kanri_flg);

//３．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //GETデータ送信リンク作成
        // <a>で囲う。
        $view .= '<p>';
        // <a href="detail.php?id=XXX">
        $view .= '<a href="detail1.php?id=' . $result["id"] . '">';
        // $view .= $result["indate"] . "：" . $result["name"] . " " .$result["price"]. " " .$result["text"]. " " .$result["kanri_flg"];
        $view .= $result["kanri_flg"] . "：" . $result["name"] . " " .$result["price"] . "億ドル " .$result["text"];
        $view .= '</a>';
        // 削除
        $view .= '<a href="delete1.php?id=' . $result["id"] . '">';
        $view .= '   /  [ 削除 ]';
        $view .= '</a>';
        // // 更新
        $view .= '<a href="update1.php?id=' . $result["id"] . '">';
        $view .= '  .  [ 更新 ]';
        $view .= '</a>';
        $view .= '</p>';

    }
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>表示表示</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body id="main">
<!-- <p>世界の富豪</p> -->
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index1.php">登録画面へ</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->
    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
            <a href="detail1.php"></a>
            <?= $view ?>
            
        </div>
    </div>
    <!-- Main[End] -->
    <!-- <a href=""></a> -->
    <p class="h4">0は、管理者権限なし、1は、管理者権限あり</p>
</body>
</html>