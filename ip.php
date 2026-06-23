<?php
$ip = $_SERVER['REMOTE_ADDR'];
$ua = $_SERVER['HTTP_USER_AGENT'];
preg_match('/(Firefox|Chrome|Safari|Edge)[\/\s]?([0-9.]*)/',$ua,$bmatch);
$browser = $bmatch[1] ?? 'unknown';
$browserVersion = $bmatch[2] ?? 'unknown';
preg_match('/(windows|Android|Linux|Mac OS|iphone OS)[\/\s]?([0-9.]*)/',$ua,$osmatch);
$os = $osmatch[1] ?? 'unknown';
$osVersion = $osmatch[2] ?? 'unknown';

$data = "ip : $ip\nUser-Agent : $ua\nbrowser : $browser \nbrowserversion : $browserVersion \nos : $os\nosVersion : $osVersion\n";
file_put_contents('data_ip.txt',$data,FILE_APPEND);
?>