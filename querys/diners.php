<?php include "db.php";

$diners = $conn->prepare('SELECT * FROM diners');
$diners->execute();

$totalDiners = $diners->fetchAll();

// print_r(json_encode($totalDiners));

?>
    <?php $share=50; ?>
    <div class="col s6 share" data-share=<?=$share;?>>
    <div class="vh">

        <table>
           <thead >
             <tr>
                 <th data-field="id">Nombre</th>
                 <th data-field="name">Pagó</th>
                 <th data-field="price">Debe</th>
             </tr>
           </thead>

           <tbody>
            <?php foreach ($totalDiners as $diner): ?>
                <?php $totalPayed+=$diner['pay'];
                     $debtDinner = $diner['pay']-$share;
                ?>
                <tr>
                  <td><?=$diner['name']?></td>
                  <td>
                     <div class="input-field">
                        <i class="small material-icons prefix">$</i>
                        <input type="number" class="payed" id="pay<?=$diner['id']?>" data-id="<?=$diner['id']?>" value="<?=$diner['pay']?>">
                    </div>
                  </td>
                  <td>
                      <div class="input-field">
                        <i class="small material-icons prefix">$</i>
                        <input type="text" name="disabled" readonly  value="<?=$debtDinner?>">
                      </div>

                  </td>
                </tr>

            <?php endforeach;
            $debt=count($totalDiners)*$share;
            $totalDebted=$debt-$totalPayed;
            ?>

           </tbody>
        </table>
    </div>
</div>
<div class="col s6 budget">
    <div class="section">
       <h5>Total a recaudar</h5>
       <div class="divider"></div>
       <p id="totalMonth"><?='$'.number_format($debt,2,'.',',')?></p>
    </div>
    <div class="section">
       <h5>Total recaudado</h5>
       <div class="divider"></div>
       <p id="totalPayed"><?='$'.number_format($totalPayed,2,'.',',')?></p>
    </div>
    <div class="section">
       <h5>Total adeudado</h5>
       <div class="divider"></div>
       <p id="totalDebted"><?='$'.number_format($totalDebted,2,'.',',')?></p>
    </div>
</div>
