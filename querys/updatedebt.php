<?php include 'db.php';
$pay = $_POST['pay'];
$id = $_POST['id'];

$sql='UPDATE diners SET pay='.$pay.' WHERE id ='.$id;
$comensales = $conn->prepare($sql);
$comensales->execute();
