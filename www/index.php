<!DOCTYPE HTML>
<html>
  <head>
    <h1 id="demo"> World Timezone Converter </h1>
  </head>

  <?php
     $ip = "http://ec2-52-200-184-187.compute-1.amazonaws.com";
     ?>


  <body>
    <p> <?php /* $tz = "?timezone=nzt";
              $time = file_get_contents($ip.$tz);?> </p>
    <p>Current New Zealand time: <?php echo "$time"; */ ?></p>

    <p id="output"></p>
    <?php
       session_start();
       if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Convert'])){
       func();
       }

       function func(){
       $ip = "http://ec2-52-200-184-187.compute-1.amazonaws.com";
       $timezone = $_POST['timezone'];
       $and = "&";
       $t = "time=";
       $a = "am/pm=";
       $time = $_POST['time'];
       $ampm = $_POST['am/pm'];
       $db_host = 'tzdatabase.cjzs748frcfu.us-east-1.rds.amazonaws.com';
       $db_name = 'tzdatabase';
       $db_user = 'admin';
       $db_passwd = 'Quack1nce4^';
       $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
       $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
       if($timezone == "EST"){
       $tze = "?timezone=est";
       $est = file_get_contents($ip.$tze.$and.$t.$time.$and.$a.$ampm);
       $_SESSION['times'] = "<p> Eastern Standard Time: $est </p>";
       $q = $pdo->query("UPDATE timezones SET defaultzone = 'EST' WHERE userID='User'");
    } else if($timezone == "JST"){
    $tzj = "?timezone=jst";
    $jst = file_get_contents($ip.$tzj.$and.$t.$time.$and.$a.$ampm);
    $_SESSION['times'] = "<p> Japan Standard Time: $jst </p>";
    $q = $pdo->query("UPDATE timezones SET defaultzone = 'JST' WHERE userID='User'");
    } else if($timezone == "MSK"){
    $tzm = "?timezone=msk";
    $msk = file_get_contents($ip.$tzm.$and.$t.$time.$and.$a.$ampm);
    $_SESSION['times'] = "<p> Moscow Time: $msk </p>";
    $q = $pdo->query("UPDATE timezones SET defaultzone = 'MSK' WHERE userID='User'");
    } else if($timezone == "SGT"){
    $tzs = "?timezone=sgt";
    $sgt = file_get_contents($ip.$tzs.$and.$t.$time.$and.$a.$ampm);
    $_SESSION['times'] = "<p> Singapore Time: $sgt </p>";
    $q = $pdo->query("UPDATE timezones SET defaultzone = 'SGT' WHERE userID='User'");
    } else if($timezone == "AEST"){
    $tza = "?timezone=aest";
    $aest = file_get_contents($ip.$tza.$and.$t.$time.$and.$a.$ampm);
    $_SESSION['times'] = "<p> Australian Eastern Standard Time: $aest </p>";
    $q = $pdo->query("UPDATE timezones SET defaultzone = 'AEST' WHERE userID='User'");
    } else if($timezone == "CLST"){
    $tzc = "?timezone=clst";
    $clst = file_get_contents($ip.$tzc.$and.$t.$time.$and.$a.$ampm);
    $_SESSION['times'] = "<p> Antarctica (Palmer Station) Time: $clst </p>";
    $q = $pdo->query("UPDATE timezones SET defaultzone = 'CLST' WHERE userID='User'");
    }

    $pdo->query("UPDATE timezones SET time = '$time' WHERE userID='User'");
    $pdo->query("UPDATE timezones SET ampm = '$ampm' WHERE userID='User'");
    
    }
    ?>

    <?php

       $db_host = 'tzdatabase.cjzs748frcfu.us-east-1.rds.amazonaws.com';
       $db_name = 'tzdatabase';
       $db_user = 'admin';
       $db_passwd = 'Quack1nce4^';
       $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
       $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
       $q = $pdo->query("SELECT * FROM timezones");
    while($row = $q->fetch()){
    $default = $row["defaultzone"];
    $timedb = $row["time"];
    $ampmdb = $row["ampm"];
    if($default == $timezone){
    header("refresh: 0;");
    }
    }
    $_SESSION['timezone'] = $default;
    $_SESSION['time'] = $timedb;
    $_SESSION['ampm'] = $ampmdb;
    ?>
    <?php
       function getSelectSession($val, $val2)
       {
       if ($_SESSION[$val] == $val2) {
       echo "selected";
       }
       }
       ?>

    <form action="index.php" method="post">

      <p> Choose a time to convert:

        <select name="time">
          <option value="1:00" <?php getSelectSession("time", "1:00"); ?>>1:00</option>
          <option value="2:00" <?php getSelectSession("time", "2:00"); ?>>2:00</option>
          <option value="3:00" <?php getSelectSession("time", "3:00"); ?>>3:00</option>
          <option value="4:00" <?php getSelectSession("time", "4:00"); ?>>4:00</option>
          <option value="5:00" <?php getSelectSession("time", "5:00"); ?>>5:00</option>
          <option value="6:00" <?php getSelectSession("time", "6:00"); ?>>6:00</option>
          <option value="7:00" <?php getSelectSession("time", "7:00"); ?>>7:00</option>
          <option value="8:00" <?php getSelectSession("time", "8:00"); ?>>8:00</option>
          <option value="9:00" <?php getSelectSession("time", "9:00"); ?>>9:00</option>
          <option value="10:00" <?php getSelectSession("time", "10:00"); ?>>10:00</option>
          <option value="11:00" <?php getSelectSession("time", "11:00"); ?>>11:00</option>
          <option value="12:00" <?php getSelectSession("time", "12:00"); ?>>12:00</option>
        </select>
        <select name="am/pm">
          <option value="am" <?php getSelectSession("ampm", "am"); ?>>AM</option>
          <option value="pm" <?php getSelectSession("ampm", "pm"); ?>>PM</option>
        </select>

      <p> Convert from NZT to:
        <select name="timezone">
          <option value="EST" <?php getSelectSession("timezone", "EST"); ?>>Eastern Standard Time</option>
          <option value="JST" <?php getSelectSession("timezone", "JST"); ?>>Japan Standard Time</option>
          <option value="MSK" <?php getSelectSession("timezone", "MSK"); ?>>Moscow Time</option>
          <option value="SGT" <?php getSelectSession("timezone", "SGT"); ?>>Singapore Time</option>
          <option value="AEST"<?php getSelectSession("timezone", "AEST"); ?>>Australian Eastern Standard Time</option>
          <option value="CLST"<?php getSelectSession("timezone", "CLST"); ?>>Antarctica (Palmer Station) Time</option>
        </select>
        </select>

        <input type="submit" name="Convert" value="Convert"></input>

    </form>

    <?php
       echo $_SESSION['times'];
       $_SESSION['times'] = "";
       ?>

  </body>
</html>
