<?php 

require_once 'config/app.php';
require_once 'connection/database.php';

session_start();

if (isset($_SESSION['usuario'])) {
    if (isset($_GET['vp']) and !empty($_GET['vp'])) {
        $page = $_GET['vp'];
        require_once 'views/pages/'.$page.'.php';
    } else if (isset($_GET['ac']) and !empty($_GET['ac'])) {
        $page = $_GET['ac'];
        require_once 'actions/'.$page.'.php';
    } else {
        require_once 'views/pages/home.php';
    }
} else if (isset($_GET['ac']) and $_GET['ac'] == 'autenticar') {
    require_once 'actions/autenticar.php';
} else {
    require_once 'views/pages/login.php';
}

session_write_close();