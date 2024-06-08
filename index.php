<?php
spl_autoload_register(static function ($className) {
    $path = str_replace('\\','/',$className. '.php');
    if(file_exists($path))
        include_once($path);
});

$route = $_GET['route'] ?? '';


$core = core\Core::get();
$core->run($route);
$core->done();


