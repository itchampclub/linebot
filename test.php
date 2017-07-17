<?php
$filename = 'esp32t.txt';
$_msg = 555
$_msg2 = 666
$myfile1 = fopen('esp32t.txt', "w+") or die("Unable to open file!");
$myfile2 = fopen('esp32t.txt', "x+") or die("Unable to open file!");
if (file_exists($filename)) {
  fwrite($myfile1, $_msg);
  fclose($myfile1);} 
} else {
  fwrite($myfile2, $_msg2);
  fclose($myfile2);} 
}
?>
