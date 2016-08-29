<?php include 'db.php';
$share=$_GET['share'];

$sql='UPDATE diners SET pay=0 ,debt='.$share.' WHERE 1';
$diners = $conn->prepare($sql);
$diners->execute();

header("Location:../index.php");
exit();
?>
