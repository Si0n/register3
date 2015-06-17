<?php require 'main.php';
if ($student->getName() != '') :?>
<a class="btn btn-default" href="index.php?page=registration" role="button">Редактировать мои данные
    <a class="btn btn-default" href="index.php?page=inspect" role="button">Посмотреть мои данные</a>
    <?php else : ?>
    <a class="btn btn-default" href="index.php?page=registration" role="button">Форма регистрации</a>
    <?php endif ?>

<?php
include 'footer.php';


