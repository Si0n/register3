<?php
$recordsPerPage = 4; //Количество результатов на страницу, для теста 4
$p =  isset($_GET['pmess'])   ? intval( $_GET['pmess'] ) : 1 ;
$offset = ($p -1) * $recordsPerPage;
$messages = $messenger->readMessage($ID, $offset);
$count = $messenger->getCountInDb($ID);
$numpages = ceil ($count/$recordsPerPage);
require 'template/inspect.php';
