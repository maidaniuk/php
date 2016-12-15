<?php
require "config/database.php";
//перечень левого меню, подменю - заполняем из таблиц
$menu = array();
$link = connect();
$query = "SELECT p.id, p.breed, p.id_kind, k.name FROM nature.pets p, nature.kind k
where p.id_kind=k.id order by name, breed";
$stmt = mysqli_stmt_init($link);
if(mysqli_stmt_prepare($stmt, $query))
{
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while($row = mysqli_fetch_assoc($result)){
        $menu[$row['name']][$row['id']] =  $row['breed'];
    }
    mysqli_stmt_close($stmt);
}   
//mysqli_close($link);

//выбор страницы для показа
function get_row() {
if (!empty($_GET["id"]))
{
    global $link;// = connect();
    $id = htmlspecialchars($_GET["id"]);
    $query = "SELECT p.breed, p.about, p.id FROM nature.pets p where p.id=?";
    $stmt = mysqli_stmt_init($link);
    if(mysqli_stmt_prepare($stmt, $query))
    {
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
    }
    mysqli_stmt_close($stmt);
    return array ($row['breed'], $row['about'], $row['id']);
}
}
//перелік будь-чого
function get_ul ($menu) {
if (isset($menu)) {
    foreach ($menu as $key => $value) {
        if (is_array($value)) {
                echo '<li class="dropdown"><a href=# class="dropdown-toggle" data-toggle="dropdown">'.$key.'<b class="caret"></b></a><ul class="dropdown-menu">'; 
                get_ul($value);
                echo '</ul></li>';
        }
        else {
            echo '<li><a href='.$_SERVER['PHP_SELF'].'?id='.$key.'>'.$value.'</a></li>';
        } 
    }
}
    return;
}
//for admin menu
function get_user () {
if (!empty($_GET["name"])&&!empty($_GET["pass"]))
{
    global $link;// = connect();
    $name = htmlspecialchars($_GET["name"]);
    $pass = htmlspecialchars($_GET["pass"]);
    $query = "SELECT u.id, u.admin FROM nature.users u 
                    where u.name = ? and u.pass = ? and u.del=0";
    $stmt = mysqli_stmt_init($link);
    if(mysqli_stmt_prepare($stmt, $query))
    {
        mysqli_stmt_bind_param($stmt, 'ss', $name, $pass);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
    }
    mysqli_stmt_close($stmt);
    return array ($row['id'], $row['admin']);
}   
}
//for admin menu
function get_kind () {
    global $link;// = connect();
    $query = "SELECT id, name FROM nature.kind";
    $stmt = mysqli_stmt_init($link);
    if(mysqli_stmt_prepare($stmt, $query))
    {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result)){
            echo '<option value = '.$row['id'].'>'.$row['name'].'</option>';
        }
    }
    mysqli_stmt_close($stmt);
} 