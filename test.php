<?php
$filename = 'aa.txt';
$_msg = 'aabb';
if (file_exists($filename)) {
echo 'haveeee';
} else {
  $myfile = fopen('aa.txt', "x+") or die("Unable to open file!");
  fwrite($myfile, $_msg);
  fclose($myfile);     
}
?>
