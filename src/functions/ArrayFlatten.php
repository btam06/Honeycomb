<?php
namespace Honeycomb;

if (!function_exists('array_flatten')) {
    function array_flatten($array, $namespace = '') {
        $output = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $output = $output + array_flatten($value, $key);
            } else {
                $key = !empty($namespace) ? $namespace . '.' . $key : $key;
                $output[$key] = $value;
            }
        }
    }
}
