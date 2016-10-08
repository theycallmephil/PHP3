<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Philip Nielsen PHP3</title>
</head>

<body>

<form method="post">
Projekt navn:
<input type="text" name="projektNavn" required>
Beskrivelse:
<input type="text" name="pDesc" required>
Start dato:
<input type="date" name="startDato" required>
Slut dato:
<input type="date" name="slutDato" required>
Projekt detaljer:
<input type="text" name="pDesc2" required>
Client ID:
<select name="cnam" required>
		
<?php
require_once 'dbcon.php';
$sql = 'SELECT c.Client_ID, c.Name
FROM client c';
$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($cid, $cnam);
while ($stmt->fetch()) {
	echo '<option value='.$cid.'">'.$cnam.'</option>'.PHP_EOL;
}
?>


	
<input type="submit" name="add" value="TilfÃ¸j projekt">
	
</form>
<?php
	
require_once 'dbcon.php';
$pnam = filter_input(INPUT_POST, 'projektNavn');
$pdesc = filter_input(INPUT_POST, 'pDesc');
$pstart = filter_input(INPUT_POST, 'startDato');
$pend = filter_input(INPUT_POST, 'slutDato');
$pdesc2 = filter_input(INPUT_POST, 'pDesc2');

	if (isset($_POST['add'])) {
		$sql = 'insert into project
		values (null, ?, ?, ?, ?, ?, ?)';
		$stmt = $link->prepare($sql);
		$stmt->bind_param('sssssi', $pnam, $pdesc, $pstart, $pend, $pdesc2, $cid);
		$stmt->execute();
      
	}
?>


</body>
</html>