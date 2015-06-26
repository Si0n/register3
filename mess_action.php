<?php
error_reporting(-1);
ini_set('display_errors', 1);
require './scripts/ini.php';
if (isset($_POST['submit'])) {
    $redirect      = isset($_POST['redirect']) ? strval($_POST['redirect']) : '';
    $text      = isset($_POST['text']) ? strval($_POST['text']) : '';
    $id_author      = isset($_POST['id_author']) ? intval($_POST['id_author']) : '';
    $id_target     = isset($_POST['id_target']) ? intval($_POST['id_target']) : '';
    if (preg_match("/^.{1,}$/u", $text)) {
        $messenger->addMessage($id_author, $id_target, $text);
    } else {
        $link = array('err' => '4');
        $redirect = $redirect . '&' . http_build_query($link);


    }


    header("Location: $redirect");

}
