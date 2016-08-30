<?php
include "db.php";
$d = date('j');//day
$m = date('m');//month
$y = date('Y');//year
// SELECT 'pay', DATE_FORMAT(day,'%e') AS dayin FROM `daily` WHERE MONTH(day) = 8

$totalDays = cal_days_in_month(CAL_GREGORIAN, $m, $y);
$dailypay = $conn->prepare('SELECT SUM(pay) FROM `daily` WHERE month(day)=8');
$dailypay->execute();
$dailypay=$dailypay->fetch()[0];

$totpay = $conn->prepare('SELECT SUM(pay) FROM `pay` WHERE period ='.$m);
$totpay->execute();
$totpay = $totpay->fetch()[0];

$tips = $conn->prepare("SELECT pay, DATE_FORMAT(day,'%e') AS dayInNumber FROM daily WHERE MONTH(day) =".$m );
$tips->execute();

$totalTips = $tips->fetchAll();

 // print_r($totalTips);die();
foreach ($totalTips as $tips) {
    $totTips[$tips['dayInNumber']] = $tips['pay'];
}
// print_r($totTips);


$daysArray = [];
$nonAvaibleDay=0;

$monthArray=[0 => 'Enero',1 => 'Febrero',3 => 'Marzo',4 => 'Abril',5 => 'Mayo',6 => 'Junio',7 => 'Julio',8 => 'Agosto',9 => 'Septiembre',10 => 'Octubre',11 => 'Noviembre',12 => 'Diciembre',];

for ($i=1; $i <= $totalDays; $i++) {
    $dayName = date("D", mktime(0, 0, 0, $m, $i, $y));
    $day = date("j", mktime(0, 0, 0, $m, $i, $y));

    if ($dayName != 'Sun' && $dayName != 'Sat') {
        $daysArray[] = ['dayName'=>$dayName, 'day' => $day];
    }
    else {
        $nonAvaibleDay++;
    }
}



 ?>

<div class="col s8 ">
    <table class="bordered">
        <thead>
          <tr>
              <th class="center">Lun</th>
              <th class="center">Mar</th>
              <th class="center">Mie</th>
              <th class="center">Jue</th>
              <th class="center">Vie</th>
          </tr>
        </thead>
        <tbody>
            <tr>
            <?php
            switch ($daysArray[0]['dayName']) {
                case 'Mon':
                    break;
                case 'Tue':
                    echo "<td></td>";
                    break;
                case 'Wed':
                    echo "<td></td><td></td>";
                    break;
                case 'Thu':
                    echo "<td></td><td></td><td></td>";
                    break;
                default:
                    echo "<td></td><td></td><td></td><td></td>";

                    break;
            }
            $daycount=3;
            $restdays=0;
            foreach ($daysArray as $day ) {
                if ($day['day'] < $d) {
                    $class="grey lighten-2";
                }else{
                    $restdays++;
                    $class="";
                }
                ?>
                    <td class="<?=$class?>  ">
                        <span class="dayincal">
                            <?=$day['day'];?>
                        </span>
                        <div class="input-field">
                            <i class="small material-icons prefix">$</i>

                            <input class="payedDaily" data-day="<?=$day['day'];?>" type="text" value="<?php echo $totTips[$day['day']]; ?>">
                        </div>
                    </td>

                <?php
                    if ($day['dayName'] == 'Fri') {
                        echo '</tr><tr>';
                        $daycount = 0;
                    }//if

            $daycount++;
            }//foreach
            for ($i=2; $i < $daycount ; $i++) {
                echo "<td></td>";

            }

            $dailyTip = $totpay/ ($totalDays-$nonAvaibleDay);
            $realdailytip = ($totpay - $dailypay)/ $restdays;

             ?>
         </tr>
        </tbody>

    </table>
</div>
<div class="col s4 cardmonth">
    <div class="card-panel teal lighten-2  white-text "><?=$monthArray[date('n')] ?></div>
    <div class="section">
       <h6>Total a entregar recomendado</h6>
       <div class="divider"></div>
       <p ><?='$'.round($dailyTip).' por día'?></p>
    </div>
    <div class="section">
       <h6>Total a entregar real</h6>
       <div class="divider"></div>
       <p ><?='$'.round($realdailytip).' por día'?></p>
    </div>
</div>
