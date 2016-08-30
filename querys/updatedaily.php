<?php include 'db.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
$pay = $_POST['pay'];
$day = date('Y-m').'-'.$_POST['day'];
if (strlen( $_POST['day'])==1) {
    $day = date('Y-m').'-'.'0'.$_POST['day'];
}
// .'-'.date('Y-m')
 // echo $day; die();
// $sql='UPDATE daily SET pay='.$pay.' WHERE id ='.$id;

$sqlCheck = "select * from daily where day='".$day."'";
$checkIfExists = $conn->query($sqlCheck,PDO::FETCH_ASSOC);

$where="";
$sentence = "INSERT INTO";

if(!empty($checkIfExists->fetchAll())){
    $sentence = "UPDATE";
    $where = " where day='".$day."'";
}
$sql = $sentence. " daily set pay = '".$pay."', day ='".$day."' " .$where;

// print_r($sql);die();
$comensales = $conn->prepare($sql);
$comensales->execute();
