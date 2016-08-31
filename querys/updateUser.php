<?php include 'db.php';
if (isset($_POST['name'])) {
    $name=$_POST['name'];
}
$was = $_POST['was'];
$id = $_POST['id'];
if ($_GET['op']==1) {
    $sql='UPDATE diners SET was='.$was.' WHERE id ='.$id;
}else {
    $sql ="INSERT INTO diners (name, was) VALUES('$name',0)";
    // print_r($sql);die();
}

$diners = $conn->prepare($sql);
$diners->execute();
