<?php include "db.php";
$m = date('m');//month
$y = date('Y');//Year

if (isset($_GET['period'])) {
    $m = $_GET['period'];
}



$diners = $conn->prepare('SELECT * FROM  diners  WHERE 1 ');
$diners->execute();

$totalDiners = $diners->fetchAll();


// print_r($totalDiners);
?>
<div class="col s9">

<a class="btn-floating btn-large waves-effect waves-light teal lighten-2 modal-trigger" href="#modal"><i class="material-icons">add</i></a>
    <div class="vh80">
        <table class="dinersSetup">
               <tbody>
               <?php foreach ($totalDiners as $diners): ?>
                   <tr>
                       <td><?=$diners['name']?></td>
                       <?php if ($diners['was']==1){$was='Si'; $class = 'red-text';}else{$was='No';$class ="";} ?>
                       <td class="<?=$class?>">
<!--
                          <select class"select" data-id="<?=$diners['id']?>" >
                            <option value="2">No fue PM</option>
                            <option value="1" <?php if ($diners['was']==1){echo "selected";} ?>>Fue PM</option>
                          </select> -->
                          <div class="switch">
                            <label>
                              No fue PM
                              <input data-id ="<?=$diners['id']?>" <?php if ($diners['was']==1){echo "checked";} ?> type="checkbox">
                              <span class="lever"></span>
                              Fue PM
                            </label>
                          </div>

                       </td>
                       <td></td>
                   </tr>
               <?php endforeach; ?>
               <tr>
               </tr>
           </tbody>
       </table>
    </div>
</div>
<div class="col s3">

</div>

<!-- modal -->

<div id="modal" class="modal">
    <div class="modal-content">
        <h4>Nuevo comensal</h4>
          <div class="input-field col s6">
              <input id="first_name" type="text" class="validate">
              <label for="first_name">Nombre</label>
          </div>
    </div>
    <div class="modal-footer">
        <a  class=" modal-action modal-close waves-effect waves-light orange light btn-flat  ">Cancelar</a>
        <a  id="subUser" class=" modal-action modal-close waves-effect waves-green btn-flat">Agregar</a>
    </div>
  </div>
