<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Philip Nielsen PHP3</title>
</head>

<body>

<h1>Projekter</h1>

<ul>

<?php
require_once 'dbcon.php';

$sql = 'SELECT p.project_id, p.name FROM project p';
$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($pid, $pnam);

while($stmt->fetch()) {
	echo '<li><a href="project.php?pid='.$pid.'">'.$pnam.'</a></li>'.PHP_EOL;
}

?>
<br>
<form action="add_project.php">
<input type="submit" name="opret" value="Opret nyt projekt">
</form>


<br>

  
<form method="post">  
<input type="text" name="pnam" placeholder="Projekt navn">
<input  type="submit" name="slet" value="Slet Projekt">
<?php /* ?><?php
if (isset($_POST['slet'])) {
	echo '<input type="submit" name="slett" value="Er du sikker? tryk igen">';
}
?><?php */ ?>
<?php
if (isset($_POST['slet'])) {
$pnam = filter_input(INPUT_POST, 'pnam');
$sql = 'DELETE FROM project
WHERE name = ?';
$stmt = $link->prepare($sql);
$stmt->bind_param('s', $pnam);
$stmt->execute();

}


?>
</select>
</form>

</ul>

</body>
</html>