<?php
require_once 'classLoader.php';
$cookies = getCookie('errors');
    $redirect = new ErrorsMapper($pdo);
    $errors = $redirect->getErrorsFromDB($cookies);
    $err = $redirect->inspectErrors($errors);
    $redirect->deleteErrorsInDB($cookies);
    if (getCookie('errors') && count($err) <= 0)
    {
        $successRegister = TRUE;
    }





