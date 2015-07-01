<?php
$recordsPerPage = 4; //Количество результатов на страницу, для теста 4
$p =  isset($_GET['pmess'])   ? intval( $_GET['pmess'] ) : 1 ;
$limit = ($p -1) * $recordsPerPage;
$messages = $messenger->readMessage($ID, $limit, $recordsPerPage);
$count = $messenger->getCountInDb($ID);
$numpages = ceil ($count/$recordsPerPage);
