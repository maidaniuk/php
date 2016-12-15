<?php 
// Отсылаем браузеру заголовок, сообщающий о том, что сейчас будет передаваться файл изображения
//выбор страницы для показа
if (!empty($_GET["id"]))
{
    header("Content-type: image/*");
    require("../config/database.php");
    $link = connect();
    $id = htmlspecialchars($_GET["id"]);
    $query = "SELECT p.foto FROM nature.pets p where p.id=?";
    $stmt = mysqli_stmt_init($link);
    if(mysqli_stmt_prepare($stmt, $query))
    {
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        echo $row['foto'];
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link); 
    exit;
}