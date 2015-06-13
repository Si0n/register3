<?php
if (isset($errors)):
    foreach ($errors as $error): ?>
        <div class="alert alert-warning" role="alert"><p></p><?=$error; ?></p></div>
    <?php endforeach;
    endif;
if (isset($successfulRegister)):
    if ($successfulRegister):?>
        <div class="alert alert-success" role="alert">Регистрация прошла успешно.</div>
    <?php endif;
    endif;?>