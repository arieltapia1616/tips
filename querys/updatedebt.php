<?php include 'db.php';
$pay = $_POST['pay'];
$id = $_POST['id'];

$sql='UPDATE pay SET pay='.$pay.' WHERE diner_id ='.$id;
$comensales = $conn->prepare($sql);
$comensales->execute();
