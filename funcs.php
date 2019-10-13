<?php
date_default_timezone_set('Europe/Istanbul');

$host="localhost";
$pass="serverDBpass";
$username="serverDBuser";
$db="serverDBname";
if($_SERVER['HTTP_HOST']==="127.0.0.1" || $_SERVER['HTTP_HOST'] === "localhost"){//local database settings
    $host="localhost";
    $pass="";
    $username="root";
    $db="deneme";
}
if(isset($_GET['timecheck'])){
    echo date("Ymd His");
}
$cache_dir = "cache";
function get_curl($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5); //timeout in second
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    $content = curl_exec($ch);
    curl_close($ch);
    return $content;
}
//$time değişkeni kaç saniye cache de kalacağını belirtir. saniye cinsinde.
function get_content($file, $hours = 12, $fn = '', $fn_args = '')
{
    $url = $file;
    $file = "cache/" . md5($file);
    $current_time = time();
    $expire_time = $hours * 60 * 60;
    //decisions, decisions
    if (file_exists($file) && ($current_time - $expire_time < filemtime($file))) {
        //echo 'returning from cached file';
        return simplexml_load_string(file_get_contents($file));
    } else {
        $content = get_url($url);
        if ($fn) {
            $content = $fn($content, $fn_args);
        }
        file_put_contents($file, $content);
        return simplexml_load_string($content);
    }
}

/* gets content from a URL via curl */
function get_url($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    $content = curl_exec($ch);
    curl_close($ch);
    return $content;
}
?>