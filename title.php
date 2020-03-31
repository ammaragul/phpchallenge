<?php
$sitename = 'challenge.php';
$pagetitle;
if(isset($pagetitle)){
 echo "<title>$pagetitle.$sitename</title>";
} 
  else {
echo "<title>$sitename</title>";
}
?>

