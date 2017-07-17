<?php
$checktxt = file_exists("esp32t.txt");
$_msg = 555
$_msg2 = 666
if ($checktxt = false) {
  $myfile = fopen('esp32t.txt', "x+") or die("Unable to open file!");
  fwrite($myfile, $_msg);
  fclose($myfile);} 
else {
  $myfile = fopen('esp32t.txt', "w+") or die("Unable to open file!");
  fwrite($myfile, $_msg2);
  fclose($myfile);} 
}
echo file_exists("esp32t.txt");
?>
