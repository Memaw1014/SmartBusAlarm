<?php

use Illuminate\Support\Debug\Dumper;

if (PHP_SAPI === 'cli-server') {
    $url = parse_url($_SERVER['REQUEST_URI']);

    if ($url['path'] !== '/' && file_exists(__DIR__.'/public'.$url['path'])) {
        return false;
    }

    if (in_array($url['path'], ['/favicon.ico', '/robots.txt'])) {
        return false;
    }

    $file = __DIR__.'/public/index.php';

    if (file_exists($file)) {
        require $file;
    } else {
        (new Dumper)->dump($file);
    }
}
