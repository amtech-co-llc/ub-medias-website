<?php
function timeAgo($timestamp)
{
    $time = strtotime($timestamp);
    $diff = time() - $time;

    if ($diff < 60)
        return 'Just now';
    elseif ($diff < 3600)
        return floor($diff / 60) . ' min ago';
    elseif ($diff < 86400)
        return floor($diff / 3600) . ' hour' . (floor($diff / 3600) > 1 ? 's' : '') . ' ago';
    elseif ($diff < 604800)
        return floor($diff / 86400) . ' day' . (floor($diff / 86400) > 1 ? 's' : '') . ' ago';
    elseif ($diff < 2419200)
        return floor($diff / 604800) . ' week' . (floor($diff / 604800) > 1 ? 's' : '') . ' ago';
    elseif ($diff < 29030400)
        return floor($diff / 2419200) . ' month' . (floor($diff / 2419200) > 1 ? 's' : '') . ' ago';
    else
        return floor($diff / 29030400) . ' year' . (floor($diff / 29030400) > 1 ? 's' : '') . ' ago';
}

$publication_time = "2025-04-23 15:56:00"; // this comes from your DB (timestamp)
echo timeAgo($publication_time);
