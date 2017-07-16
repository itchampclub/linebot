<?php
$myfile = fopen("esp32.txt", "w+") or die("Unable to open file!");
$txt = "555";
fwrite($myfile, $txt);
fclose($myfile);
?>
