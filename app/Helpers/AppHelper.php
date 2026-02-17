<?php

if (!function_exists('format_students_name')) {
    function format_students_name($name)
    {

        return 'STD-' . strtoupper($name);
    }
}
