<?php
$myfile = fopen("esp32.txt", "w+") or die("Unable to open file!");
$txt = "closed";
fwrite($myfile, $txt);
newt_delay(10000)
echo fread($myfile,filesize("esp32.txt"));
fclose($myfile);
?>
