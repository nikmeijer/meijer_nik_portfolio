<!DOCTYPE html>
<html lang="en">

<?php

require_once('../includes/connect.php');
$stmt = $connect->prepare('SELECT id,title FROM projects ORDER BY title ASC');
$stmt->execute();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Main Page</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">

</head>
<body>

<?php

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

  echo  '<p class="project-list">'.
  $row['title'].
  '<a href="edit_project_form.php?id='.$row['id'].'">edit</a>'.

  '<a href="delete_project.php?id='.$row['id'].'">delete</a></p>';
}

$stmt = null;

?>
<br><br><br>
<h3>Add a New Project</h3>
<form action="add_project.php" method="post" enctype="multipart/form-data">
    <label for="title">project title: </label>
    <input name="title" type="text" required><br><br>
    <label for="img">project image: </label>
    <input name="img" type="file" required><br><br>
    <label for="copy1">copy 1: </label>
    <textarea name="copy1" required></textarea><br><br>
    <label for="copy2">copy 2: </label>
    <textarea name="copy2" required></textarea><br><br>
    <label for="copy3">copy 3: </label>
    <textarea name="copy3" required></textarea><br><br>
    <label for="copy4">copy 4: </label>
    <textarea name="copy4" required></textarea><br><br>
    <label for="copy5">copy 5: </label>
    <textarea name="copy5" required></textarea><br><br>
    <label for="copy6">copy 6: </label>
    <textarea name="copy6" required></textarea><br><br>
    <input name="submit" type="submit" value="Add">
</form>
<br><br><br>
<a href="logout.php">log out</a>
</body>
</html>
