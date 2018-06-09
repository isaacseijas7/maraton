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
        if (isset($_SERVER['https'])) {
            $protocol = 'https';
        } else {
            $protocol = 'http';
        }

        return "$protocol://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}public/$file";
    }
}