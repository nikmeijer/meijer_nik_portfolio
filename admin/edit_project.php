<?php
require_once('../includes/connect.php');
$query = "UPDATE projects SET title = ?,image_url = ?,copy1 = ?,copy2 = ?,copy3 = ?,copy4 = ?,copy5 = ?,copy6 = ? WHERE id = ?";

$stmt = $connect->prepare($query);

$stmt->bindParam(1, $_POST['title'], PDO::PARAM_STR);
$stmt->bindParam(2, $_POST['thumb'], PDO::PARAM_STR);
$stmt->bindParam(3, $_POST['copy1'], PDO::PARAM_STR);
$stmt->bindParam(4, $_POST['copy2'], PDO::PARAM_STR);
$stmt->bindParam(5, $_POST['copy3'], PDO::PARAM_STR);
$stmt->bindParam(6, $_POST['copy4'], PDO::PARAM_STR);
$stmt->bindParam(7, $_POST['copy5'], PDO::PARAM_STR);
$stmt->bindParam(8, $_POST['copy6'], PDO::PARAM_STR);
$stmt->bindParam(9, $_POST['pk'], PDO::PARAM_INT);

$stmt->execute();
$stmt = null;
header('Location: project_list.php');
?>
