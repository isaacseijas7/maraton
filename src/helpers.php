<?php

if (! function_exists('dd')) {
    function dd(...$values)
    {
        foreach ($values as $value) {
            var_dump($value);
        }

        exit();
    }
}

if (! function_exists('view')) {
    function view($template, array $vars = array())
    {
        extract($vars);
        $path = __DIR__ . '/../views/';
        ob_start();
        require($path . $template . '.php');
        $templateContent = ob_get_clean();
        require($path . 'layout.php');
    }
}

if (! function_exists('asset')) {
    function asset($file)
    {
        $request_uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $script_name = explode('/', trim($_SERVER['SCRIPT_NAME'], '/'));
        $parts = array_diff_assoc($request_uri, $script_name);

        return "../public/$file";
    }
}