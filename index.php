<?php
$include = $_GET['page'];
require './template/main.php';
require './scripts/check_student.php';
switch ($include) :
    case 'registration' : include ('./template/register.php'); break;
    case 'dashboard' : include ('./template/dashboard.php'); break;
    case 'list' : include ('./lib/list_action.php'); break;
endswitch;
if (isset($_GET['search'])) {
    include('./lib/list_action.php');
}
require './template/footer.php';