<?php

/**
 * dd
 * function to dump data & die
 * [FOR DEVELOPMENT PURPOSE ONLY]
 */
if (!function_exists("dd")) {
    function dd($variable)
    {
        echo "<pre>";
        print_r($variable);
        die;
    }
}

/**
 * response_api
 * function to convert data to be json response
 * 
 */
if (!function_exists("response_api")) {
    function response_api($variable)
    {
        $default_response = [
            "success" => true,
            "message" => "Action Success",
            "data" => null,
            "code" => 200
        ];

        $variable = array_merge($default_response, $variable);

        header('Content-Type: application/json; charset=utf-8');
        http_response_code($variable['code']);
        echo json_encode($variable);
        die;
    }
}

/**
 * url
 * helper to replace index.php
 */
if (!function_exists("url")) {
    function url($variable, $schema =  false)
    {
        $schema = $_SERVER['HTTP_HOST'];
        $suffix = str_replace("server.php", '', $_SERVER['SCRIPT_NAME']);
        if ($schema) $suffix = $schema . $suffix;
        return $suffix . $variable;
    }
}

if (!function_exists("pascal2camel")) {
    function pascal2camel($input)
    {
        $output = strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $input));
        return $output;
    }
}

if (!function_exists('dq')) {
    function dq($query, $params)
    {
        $keys = array();

        # build a regular expression for each parameter
        foreach ($params as $key => $value) {
            if (is_string($key)) {
                $keys[] = '/' . $key . '/';
            } else {
                $keys[] = '/[?]/';
            }
        }
        // dd($keys);

        $query = preg_replace($keys, $params, $query, 1, $count);
        dd($query);
    }
}
