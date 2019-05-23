<?php
namespace Honeycomb;

if (!function_exists('debracktize')) {
    function debracketize($string, Array $params) {
        foreach ($params as $key => $value) {
            $string = preg_replace("/{{\s*$key\s*}}/", $value);
        }
        return $string;
    }
}
