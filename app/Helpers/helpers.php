<?php

if (!function_exists('readableDuration')) {
    function readableDuration($seconds)
    {
        if ($seconds >= 3600) {
            $hours = floor($seconds / 3600);
            $minutes = floor(($seconds % 3600) / 60);
            return "{$hours} hr " . ($minutes > 0 ? "{$minutes} min" : "");
        } elseif ($seconds >= 60) {
            $minutes = floor($seconds / 60);
            $seconds = $seconds % 60;
            return "{$minutes} min " . ($seconds > 0 ? "{$seconds} sec" : "");
        } else {
            return "{$seconds} sec";
        }
    }
}
