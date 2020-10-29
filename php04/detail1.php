<?php
require_once("funcs1.php"); //一番上に書く
$pdo = db_conn();
//１．PHP
//select.phpのPHPコードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。
$id = $_GET['id'];



//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！


//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=" . $id);   
$status = $stmt->execute();


//３．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
}
//     while ($result = $stmt->fetch()) {
//         //GETデータ送信リンク作成
//         // <a>で囲う。
//         $view .= '<p>';
//         // <a href="detail.php?id=XXX">
//         $view .= '<a href="detail.php?id=' . $result["id"] . '">';
//         $view .= $result["indate"] . "：" . $result["name"];
//         $view .= '</a>';
//         $view .= '</p>';
//     }
// }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>詳細画面</title>
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
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index1.php">詳細画面</a>
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


<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
理由：入力項目は「登録/更新」はほぼ同じになるからです。
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->

<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="update1.php">
<form method="POST" name="form"><input name="kanri_flg" type="hidden" value="0" />
<form method="POST" name="form"><input name="life_flg" type="hidden" value="0" />
  <!-- <div class="jumbotron"> -->
  <div class="jumbotron">
   <fieldset>
    <legend>フリーアンケート</legend>
     <label>名前：<input type="text" name="name" value=<?=$result['name']?>></label><br>
     <label>総資産：<input type="text" name="price" value=<?=$result['price']?>>億ドル</label><br>
     <label>役職：<input type="text" name="text" value=<?=$result['text']?>></label><br>
     <input type="hidden" name="id" value=<?=$result['id'] ?>>
     <!-- <label>役職：<textArea name="text" rows="4" cols="40"></textArea></label><br> -->
     <label>管理者：<input type="checkbox" name="kanri_flg" value="1"></label><br>
     <label>入退社：<input type="checkbox" name="life_flg" value="1"></label><br>
   
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
</body>

<a href="index1.php">登録画面へ</a>
</html>
