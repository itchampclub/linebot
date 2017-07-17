<?php
$checktxt = file_exists("esp32t.txt");
$_msg = 555
$_msg2 = 666
if ($checktxt = 1) {
  $myfile1 = fopen('esp32t.txt', "w+") or die("Unable to open file!");
  fwrite($myfile1, $_msg);
  fclose($myfile1);} 
else {
  $myfile2 = fopen('esp32t.txt', "x+") or die("Unable to open file!");
  fwrite($myfile2, $_msg2);
  fclose($myfile2);} 
}
?>
