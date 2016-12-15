<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
        <title>Робота з контентом</title>
	<meta name="description" content="Робота з контентом">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
<!-- HEADER -->
<header class="row header">
    <h1 class="header-title">Домашні улюбленці</h1>
    <h2 class="header-text">Дізнайся більше!</h2>
</header>
<!-- MAIN -->
<div class="row">
    <main class="col-md-12 col-sm-12 main-container">
        <form  enctype="multipart/form-data" class="form-horizontal" method="post" action="includes/insert.php">
            <div class="form-group">
                <div class="col-xs-offset-3 col-xs-9">
                <h1>Внесення статті</h1>
            </div>
            <div class="form-group">
              <label class="control-label col-xs-3" for="kind">Категорія:</label>
              <div class="col-xs-9">
                <select name = "id_kind" class="form-control" id="kind">
                    <option>Оберіть категорію</option>
                    <?php
                    get_kind();
                    ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-xs-3" for="breed">Порода:</label>
              <div class="col-xs-9">
                <input type="text" name="breed" class="form-control" id="breed" placeholder="Введіть породу">
              </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-3 col-xs-9">
                    <label class="btn btn-primary" for="inputfoto">
                    <input name="image" id="inputfoto" type="file" style="display:none;">
                    Додати фото
                    </label>
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-xs-3" for="about">Опис:</label>
              <div class="col-xs-9">
                <textarea name="about" rows="5" class="form-control" id="about" placeholder="Введіть опис породи"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-offset-3 col-xs-9">
                <input type="submit" class="btn btn-primary" value="Зареєструвати" name="ins">
                <input type="reset" class="btn btn-default" value="Очистити">
              </div>
            </div>
        </form>
</main>
</div>
<!-- FOOTER -->
<footer class="row footer">
    <h2>&copy; maidaniuk, 2016</h2>
</footer>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>