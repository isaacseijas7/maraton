<?php

if (! function_exists('dd')) {
    function dd(...$values) {
        foreach ($values as $value) {
            var_dump($value);
        }

        exit();
    }
}