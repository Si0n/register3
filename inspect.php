<?php
error_reporting(-1);
ini_set('display_errors', 1);
require_once './scripts/ini.php';
require './scripts/inspect_action.php';
require './scripts/messages.php';
$errorForMessage = FALSE;
if (isset($_POST['submit'])) {
    $text      = isset($_POST['text']) ? strval($_POST['text']) : '';
    $id_author      = isset($_POST['id_author']) ? intval($_POST['id_author']) : '';
    $id_target     = isset($_POST['id_target']) ? intval($_POST['id_target']) : '';
    $message = new Message();
    if ($message->isThisTextValid($text)) {
        $messenger->addMessage($id_author, $id_target, $text);
    } else {
        $errorForMessage = 'Вы ничего не ввели, либо ваше сообщение содержит запрещенные символы';
    }
}

require 'template/inspect.php';