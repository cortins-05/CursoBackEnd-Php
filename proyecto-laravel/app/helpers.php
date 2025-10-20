<?php
if (! function_exists('long_time_filter')) {
    function long_time_filter($date) {
        if ($date == null) return "Sin fecha";
        $diff = $date->diff(now());
        if ($diff->y) return "Hace $diff->y año" . ($diff->y > 1 ? 's' : '');
        if ($diff->m) return "Hace $diff->m mes" . ($diff->m > 1 ? 'es' : '');
        if ($diff->d) return "Hace $diff->d día" . ($diff->d > 1 ? 's' : '');
        if ($diff->h) return "Hace $diff->h hora" . ($diff->h > 1 ? 's' : '');
        if ($diff->i) return "Hace $diff->i minuto" . ($diff->i > 1 ? 's' : '');
        return "Hace $diff->s segundo" . ($diff->s > 1 ? 's' : '');
    }
}
