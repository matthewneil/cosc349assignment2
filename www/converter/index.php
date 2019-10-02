<html>
  <body>

    <?php

       $time = $_GET['time'];
       
       if(strcmp($_GET['am/pm'], "am") == 0){
       	if(strcmp($_GET['time'], "12:00") == 0){
       	  $time = "0:00";
        }
       }
       if(strcmp ($_GET['am/pm'], "pm") == 0){
       	if(strcmp($_GET['time'], "1:00") == 0){
       	  $time = "13:00";
        }
        if(strcmp($_GET['time'], "2:00") == 0){
          $time = "14:00";
        }
        if(strcmp($_GET['time'], "3:00") == 0){
          $time = "15:00";
        }
        if(strcmp($_GET['time'], "4:00") == 0){
          $time = "16:00";
        }
        if(strcmp($_GET['time'], "5:00") == 0){
         $time = "17:00";
        }
        if(strcmp($_GET['time'], "6:00") == 0){
         $time = "18:00";
        }
        if(strcmp($_GET['time'], "7:00") == 0){
         $time = "19:00";
        }
        if(strcmp($_GET['time'], "8:00") == 0){
         $time = "20:00";
        }
        if(strcmp($_GET['time'], "9:00") == 0){
         $time = "21:00";
        }
        if(strcmp($_GET['time'], "10:00") == 0){
         $time = "22:00";
        }
        if(strcmp($_GET['time'], "11:00") == 0){
         $time = "23:00";
        }
       
       }

       date_default_timezone_set('Pacific/Auckland');
       $datetime = new DateTime($time);
       
       if(strcmp($_GET['timezone'], "nzt") == 0){
        $nz_time = new DateTimeZone('Pacific/Auckland');
        $datetime->setTimezone($nz_time);
        echo $datetime->format('H:i:s'); 
       }
       if(strcmp($_GET['timezone'], "est") == 0){
        $est_time = new DateTimeZone('America/New_York');
        $datetime->setTimezone($est_time);
        echo $datetime->format('H:i:s'); 
       }
       if(strcmp($_GET['timezone'], "jst") == 0){
        $jst_time = new DateTimeZone('Asia/Tokyo');
        $datetime->setTimezone($jst_time);
        echo $datetime->format('H:i:s');
       }
       if(strcmp($_GET['timezone'], "msk") == 0){
        $msk_time = new DateTimeZone('Europe/Moscow');
        $datetime->setTimezone($msk_time);
        echo $datetime->format('H:i:s');
       }
       if(strcmp($_GET['timezone'], "sgt") == 0){
        $sgt_time = new DateTimeZone('Asia/Singapore');
        $datetime->setTimezone($sgt_time);
        echo $datetime->format('H:i:s');
       }
       if(strcmp($_GET['timezone'], "aest") == 0){
        $aest_time = new DateTimeZone('Australia/Brisbane');
        $datetime->setTimezone($aest_time);
        echo $datetime->format('H:i:s');
       }
       if(strcmp($_GET['timezone'], "clst") == 0){
        $clst_time = new DateTimeZone('Antarctica/Palmer');
        $datetime->setTimezone($clst_time);
        echo $datetime->format('H:i:s');
       }
      ?>

  </body>
</html>

