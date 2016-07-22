<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Part 1 Results</title>
        <link rel="stylesheet" type="text/css" href="pr1.css"/>
    </head>
<body>
  <?php date_default_timezone_set('America/New_York');?>
  <div class="header">
    <label>Metabolic Equivalents Energy Expended </label>
  </div>
  <div class="body">
    <?php
        $weight = $_POST['weight'];

        $runningduration = $_POST['runningduration'];
        $basketballduration = $_POST['basketballduration'];
        $sleepduration = $_POST['sleepduration'];


        define("RUNNINGMETS",10);
        define("BASKETBALLMETS",8);
        define("SLEEPINGMETS",1);


function calculate($w,$met,$r){
  $result = 0.0175 * $met * $w / 2.2 * $r;
  return (int)$result;
}

function calculatehr($w,$met,$r){
  $result = 60 * $r * 0.0175 * $met * $w / 2.2;
  return (int)$result;
}

  $runcalc  = calculate($weight,RUNNINGMETS,$runningduration);
  $baskcalc  = calculate($weight,BASKETBALLMETS,$basketballduration);
  $sleepcalc  = calculatehr($weight,SLEEPINGMETS,$sleepduration);
    ?>
For a <?php echo $weight;?> pound person, it is estimated that:<br /><br />
<p>
<?php echo $runcalc;?> calories were burned running<br />
<?php echo $baskcalc;?> calories were burned playing basketball<br />
<?php echo $sleepcalc;?> calories were burned sleeping
</p>
  </div>
      <div class='footer'>
          Total calories expended: <?php echo $runcalc+$baskcalc+$sleepcalc;?>
      </div>
  </form>
  <div class="f">
  <?php echo "Last Modified: " . date("H:i M j, Y T | ", getlastmod()) . "<a href=\"part1.html\"> Return to form page</a>" ;?>
  </div>

</body>
</html>
