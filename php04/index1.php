<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select1.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="insert1.php">
<form method="POST" name="form"><input name="kanri_flg" type="hidden" value="0" />
<form method="POST" name="form"><input name="life_flg" type="hidden" value="0" />
  <div class="jumbotron">
   <fieldset>
    <legend>登録画面</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label>総資産：<input type="text" name="price">億ドル</label><br>
     <label>役職：<input type="text" name="text"></label><br>
     <!-- <label>役職：<textArea name="text" rows="4" cols="40"></textArea></label><br> -->
     <label>管理者：<input type="checkbox" name="kanri_flg" value="1"></label><br>
     <label>入退社：<input type="checkbox" name="life_flg valiu=1"></label><br> 
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
