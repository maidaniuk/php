<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
        <title>Домашні улюбленці</title>
	<meta name="description" content="Домашні улюбленці">
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
<!-- NAVIGATION -->
<div class="row">
    <div class="col-md-2 col-sm-2 container-fluid pagination">
        <h4 class="text-center">Хто цікавить?</h4>
        <nav class="navbar navbar-default">
            <ul class="nav nav-tabs-justified nav-stacked  navmenu1">
		<?php
                    get_ul($menu);
		?>
            </ul>
        </nav>
    </div>
<!-- MAIN -->
    <main class="col-md-10 col-sm-10 main-container">
        <?php 				
            list($breed, $about, $id)=get_row();
            if (isset ($id)) {
                echo '<h1>'.$breed.'</h1>';
                echo '<div class="thumbnail">';
                echo '<img src="includes/get_img.php?id='.$id.'" alt="'.$breed.'"  class="img-responsive img">';
                echo '<p class="caption">'.$about.'</p>';
                echo '</div>';
            }
            else {
                echo '<h1>З чого почати</h1>';
                echo '<div class="thumbnail">';
                echo '<p class="caption">Щоб отримати інформацію оберіть пункт в меню зліва.</p>';
                echo '</div>';
            }
        ?>
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