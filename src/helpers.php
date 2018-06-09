<?php

if (! function_exists('dd')) {
    function dd(...$values) {
        foreach ($values as $value) {
            var_dump($value);
        }

        exit();
    }

    function view($template, array $vars = array())
    {
        extract($vars);
        $path = __DIR__ . '/../views/';
        ob_start();
        require ($path . $template . '.php');
        $templateContent = ob_get_clean();
        require ($path . 'layout.php');
    }
}