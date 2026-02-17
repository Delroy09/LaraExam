<?php

if (!function_exists('format_student_name')) {
    function format_student_name($name)
    {
        return 'STD-' . strtoupper($name);
    }
}
