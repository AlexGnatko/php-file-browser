<?php

$user = getenv("USERS");

$template = "default.php";

if ($user === false) {
    $template = "inc/notfound.php";
    require_once "templates/index.php";

    exit;
}
$x = explode("|", $user);

$username = $x[0];
$password = $x[1];

ini_set('display_errors', 0);

session_start();
ob_start();

if ($_POST['post_login']) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    if (($_SESSION['username'] == $username && $_SESSION['password'] == $password)) {
        header("Location: /");
        exit;
    }
}

if (!($_SESSION['username'] == $username && $_SESSION['password'] == $password)) {
    $template = "inc/login.php";
    require_once "templates/index.php";

    exit;
}

if ($_GET['logout']) {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header("Location: /");
    exit;
}

require_once "assets/functions.php";

$uri = $_SERVER['REQUEST_URI'];
$x = explode("?", $uri);
$path = $x[0];

$path_elements = explode("/", $path);

$filepath = __DIR__.$path;

$lst = scandir($filepath);
$files = [];
foreach ($lst as $name) {
    if ($path == "/") {
        if ($name == "assets") {
            continue;
        }
        if ($name == "templates") {
            continue;
        }
        if ($name == "index.php") {
            continue;
        }
        if ($name == "..") {
            continue;
        }
        if ($name == ".") {
            continue;
        }
    }

    if ($name == ".") {
        continue;
    }

    $file = [];
    $file['name'] = $name;
    $thispath = $filepath."/".$name;
    if (is_dir($thispath)) {
        $file['dir'] = true;
        $file['link'] = $path.urlencode($name)."/";
    } else {
        $file['dir'] = false;
        $file['size'] = filesize($thispath);
        $file['link'] = $path.urlencode($name);
    }

    $files[] = $file;
}

require_once "templates/index.php";

ob_end_flush();