<?php

function format_size($bytes) {
    $bytes = intval($bytes);
    if ($bytes <= 0)
    {
        return $bytes;
    }
    $formats = array("%d байт", "%.1f Кб", "%.1f Мб", "%.1f Гб", "%.1f Тб");

    $logsize = min((int)(log($bytes) / log(1024)), count($formats) - 1);
    return sprintf($formats[$logsize], $bytes / pow(1024, $logsize));

}