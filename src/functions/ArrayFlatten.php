<?php
namespace Honeycomb;

if (!function_exists('array_flatten')) {
    function array_flatten($array, $namespace = '') {
        $output = [];
        foreach ($array as $key => $value) {
            $key = !empty($namespace) ? $namespace . '.' . $key : $key;
            if (is_array($value)) {
                $output = $output + array_flatten($value, $key);
            } else {
                $output[$key] = $value;
            }
        }

        return $output;
    }
}
