<?php
include('./lib/form_inspect.php');
    foreach ($err as $error) : ?>
    <div class="alert alert-warning" role="alert"><p></p><?=$error; ?></p></div>
<?php endforeach;
if ($successRegister):?>
<div class="alert alert-success" role="alert">Регистрация прошла успешно.</div>
<?php endif;
include 'edit.php';




