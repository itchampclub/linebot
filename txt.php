<?php
date_default_timezone_set("America/New_York");
$myfile = fopen("esp32.txt", "w+") or die("Unable to open file!");

$txt = " . date("h:i:sa") . ";
fwrite($myfile, $txt);
newt_delay(10000)
echo fread($myfile,filesize("esp32.txt"));
fclose($myfile);
?>
