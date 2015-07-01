<?php include 'header.php';

?>
<div class="well well-sm"><?=htmlProtect($headerMessage)?></div>
<?php if (isset($registerMessage)) :
    if ($register == 'ok') :?>
<div class="alert alert-success" role="alert">
    <?php else: ?>
        <div class="alert alert-danger" role="alert">
        <?php endif; ?><?=htmlProtect($registerMessage)?></div>
<?php endif ?>
       <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Главная</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php if ($password !='') : ?>
                    <li <?= ($include == 'inspect') ? ' class="active" ' : '' ?>><a href="inspect.php"><?= ($ID != 'self') ? 'Просмотр профиля' : 'Мой профиль' ?></a></li>
                    <li <?= ($include == 'registration') ? ' class="active" ' : '' ?>><a href="reg.php">Редактировать профиль<span class="sr-only">(current)</span></a></li>
                   <?php else : ?>
                    <li <?= ($include == 'registration') ? ' class="active" ' : '' ?>><a href="reg.php">Регистрация</a></li>
<?php endif ?>
                </ul>
                <form class="navbar-form navbar-left" role="search" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" name="search" placeholder="<?=htmlProtect(($search != '') ? $search : 'Поиск...') ?>">
                    </div>
                    <button type="submit" class="btn btn-default">Искать!</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li <?= ($include == 'list') ? ' class="active" ' : '' ?>><a href="list.php">Список абитуриентов</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

<?php include 'footer.php';?>
