<!DOCTYPE html>
<html lang="en">
<?php
require_once('../includes/connect.php');
$query = 'SELECT * FROM projects WHERE projects.id = :projectId';
$stmt = $connect->prepare($query);
$projectId = $_GET['id'];
$stmt->bindParam(':projectId', $projectId, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Page</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">

</head>
<body>

 
<form action="edit_project.php" method="POST">
    <input name="pk" type="hidden" value="<?php echo $row['id']; ?>">
    <label for="title">project title: </label>
    <input name="title" type="text" value="<?php echo $row['title']; ?>" required><br><br>
    <label for="copy1">copy 1: </label>
    <textarea name="copy1" required><?php echo $row['copy1']; ?></textarea><br><br>
    <label for="copy2">copy 2: </label>
    <textarea name="copy2" required><?php echo $row['copy2']; ?></textarea><br><br>
    <label for="copy3">copy 3: </label>
    <textarea name="copy3" required><?php echo $row['copy3']; ?></textarea><br><br>
    <label for="copy4">copy 4: </label>
    <textarea name="copy4" required><?php echo $row['copy4']; ?></textarea><br><br>
    <label for="copy5">copy 5: </label>
    <textarea name="copy5" required><?php echo $row['copy5']; ?></textarea><br><br>
    <label for="copy6">copy 6: </label>
    <textarea name="copy6" required><?php echo $row['copy6']; ?></textarea><br><br>
    <label for="thumb">project thumbnail: </label>
    <input name="thumb" type="text" required value="<?php echo $row['image_url']; ?>"><br><br>
    <input name="submit" type="submit" value="Edit">
</form>
<?php
$stmt = null;
?>
</body>
</html>
