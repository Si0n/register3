<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <title>Сайт Абитуриентов</title>
    <link href="./../css/css/bootstrap.min.css" rel="stylesheet">


</head>
<!-- Проверка куки -->
<?php
include('./../lib/check.php');
$include = $_GET['page'];
$incAction = $_GET['action'];
?>

<!-- форма регистрация -->

<div role="tabpanel">
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="main.php" aria-controls="profile" role="tab" data-toggle="tab">Главная</a></li>

    <?php if (isset($student['Name'])) : ?>
    <li role="presentation" class="noactive"><a href="main.php?page=dashboard" aria-controls="home" role="tab" data-toggle="tab">Личный кабинет</a></li>
    <?php else : ?>
    <li role="presentation" class="noactive"><a href="main.php?page=registration" aria-controls="home" role="tab" data-toggle="tab">Регистрация</a></li>
    <?php endif ?>
    <li role="presentation" class="noactive"><a href="main.php?page=list" aria-controls="profile" role="tab" data-toggle="tab">Список студентов</a></li>


</ul>
</div>
<!-- форма поиска среди зарегистрированных пользователей-->
<br>
<form action="main.php" method="get" name="go">
    <div class="col-lg-6">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Поиск среди студентов..." name="search" type="text" size="40">
        </div><!-- /.col-lg-6 -->
    </div>
</form>
<br>
<body>



<?php
switch ($include) :
    case 'registration' : include ('register.php'); break;
    case 'dashboard' : include ('dashboard.php'); break;
    case 'list' : include ('list.php'); break;
endswitch;
switch ($incAction) :
    case 'edit' : include 'edit.php' ; break;
    case 'inspect' : include 'inspect.php' ; break;

endswitch;

include('./../lib/SearchAction.php');
