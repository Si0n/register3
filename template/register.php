<?php
require_once ('header.php');
if (isset($errors))  {
    foreach ($errors as $error) {
        ?>
        <div class="alert alert-warning" role="alert"><p></p><?=$error; ?></p></div>
    <?php
    }
}
if (isset($successfulRegister)) {

    if ($successfulRegister) {
        ?>
        <div class="alert alert-success" role="alert">Регистрация прошла успешно.</div>
    <?php
    }
}
require 'scripts/form_fill.php';
