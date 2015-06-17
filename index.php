<?php
error_reporting(-1);
ini_set('display_errors', 1);
require './scripts/ini.php';
$activeTab = "active";
$dashboardTab = $listTab = 'noactive';
if (isset($_GET['page']) || isset($_GET['search']))
{
    if (isset($_GET['page']))
    {
        $include = $_GET['page'];
    }
    if (isset($_GET['search']))
    {
        $include = 'list';
    }
    switch ($include) {
        case 'registration' :
            $dashboardTab = $activeTab;
            include('./scripts/register.php'); break;
        case 'dashboard' :
            $dashboardTab = $activeTab;
            include ('./template/dashboard.php'); break;
        case 'list' :
            $listTab = $activeTab ;
            require_once ('./scripts/list_action.php'); break;
        case 'inspect' :
            $dashboardTab = $activeTab;
            include ('./template/inspect.php'); break;
        default :
            header('Content-Type: text/html; charset=UTF-8');
            header("HTTP/1.0 404 Not Found");
            die('Произошла ошибка: <b>Страница не найдена.</b>');
    }
}
else {
    include 'template/main.php';
}




