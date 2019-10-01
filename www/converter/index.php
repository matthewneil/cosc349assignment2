<html>
<body>

<?php

if(strcmp($_GET['timezone'], "nzt") == 0){
  $datetime = new DateTime();
  $nz_time = new DateTimeZone('Pacific/Auckland');
  $datetime->setTimezone($nz_time);
  echo $datetime->format('H:i:s'); 
}
if(strcmp($_GET['timezone'], "est") == 0){
$datetime = new DateTime();
$est_time = new DateTimeZone('America/New_York');
$datetime->setTimezone($est_time);
echo $datetime->format('H:i:s'); 
}
if(strcmp($_GET['timezone'], "jst") == 0){
$datetime = new DateTime();
$jst_time = new DateTimeZone('Asia/Tokyo');
$datetime->setTimezone($jst_time);
echo $datetime->format('H:i:s');
}
if(strcmp($_GET['timezone'], "msk") == 0){
$datetime = new DateTime();
$msk_time = new DateTimeZone('Europe/Moscow');
$datetime->setTimezone($msk_time);
echo $datetime->format('H:i:s');
}
if(strcmp($_GET['timezone'], "sgt") == 0){
$datetime = new DateTime();
$sgt_time = new DateTimeZone('Asia/Singapore');
$datetime->setTimezone($sgt_time);
echo $datetime->format('H:i:s');
}
if(strcmp($_GET['timezone'], "aest") == 0){
$datetime = new DateTime();
$aest_time = new DateTimeZone('Australia/Brisbane');
$datetime->setTimezone($aest_time);
echo $datetime->format('H:i:s');
}
if(strcmp($_GET['timezone'], "clst") == 0){
$datetime = new DateTime();
$clst_time = new DateTimeZone('Antarctica/Palmer');
$datetime->setTimezone($clst_time);
echo $datetime->format('H:i:s');
}
?>

</body>
</html>

