<?php

$namespaceRoot = 'App\\';
$folderRoot = 'src/';

spl_autoload_register(function ($class) use ($namespaceRoot, $folderRoot) {
    $class = st_replace($namespaceRoot, '', $class);

    $path = $folderRoot . str_replace('\\', '/', $class) . '.php';
    //src/Container

    if (! file_exists($path)) {
        throw new Exception("The file $path does not exists.");
    }

    require $path;
});

require $folderRoot.'helpers.php';