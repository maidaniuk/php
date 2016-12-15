<?php
function get_img(){
   if (!empty($_FILES))
    { 
    $image=file_get_contents('../images/'.$_FILES['image']['name']);
    //$image=addslashes($image);
    return $image; 
    }
}
//реєстрація в базі
if (isset($_POST['ins']))
{
    if (isset($_POST['id_kind'])&&isset($_POST['breed'])&&isset($_POST['about']))
    {
        $id_kind = $_POST['id_kind'];
        $breed = $_POST['breed'];
        $about = $_POST['about'];
        $image = get_img();
        require "../config/database.php";
        $link = connect();
        $breed = mysqli_real_escape_string ($link , $breed);
        $about = mysqli_real_escape_string ($link , $about);
        $query = "insert into nature.pets(id_kind, breed, about, foto) values (".$id_kind.", '".$breed."', '".$about."', ?)";
        $stmt = mysqli_stmt_init($link);

        if(mysqli_stmt_prepare($stmt, $query))  
        {   
            mysqli_stmt_bind_param($stmt, "b", $image);
            mysqli_stmt_send_long_data ($stmt, 0, $image);

            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }   
        mysqli_close($link);
        echo '<h1>Реєстрація прошла успішно!</h1>';
    }
    exit('<meta http-equiv="refresh" content="3; url=../article.php">');
} 