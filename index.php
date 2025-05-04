<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prikaz podatkov</title>
</head>
<body>
	<ul>
	<li><a href="index.html">Glavna stran - Index</a></li>
	<li><a href="hobiji.html">Podstran - Moji hobiji</a></li>
	<li><a href="almamater.html">Podstran - Almamater</a></li>
	</ul>
    <h1>Nino Manzoni</h1>
    <?php
        // DB config.
        // Deploy deluje.

	require_once('db_config.php');

        $conn = new mysqli($host, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Povezava ni uspela: " . $conn->connect_error);
        }

        $sql = "SELECT stevilka, datum_zig, stevilo, kraj FROM prehod_avtomobilov;";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo
			"| stevilka |" 	. 	$row["stevilka"] 	.  
			"| datum |" 	. 	$row["datum_zig"] 	. 
			"| stevilo |" 	. 	$row["stevilo"]		. 
			"| kraj |" 		. 	$row["kraj"] 		. 
			"<br>";
        }

        $conn->close();
    ?>

<!-- 	Poveži se preko ApacheWebSrv: 
		mariadb -h 10.0.0.50 -u nino -p 
-->
<!-- 	Vstavi testne podatke (v pravo bazo):
		INSERT INTO prehod_avtomobilov(stevilo,kraj) VALUES (10,'Naprej');
-->
</body>
</html>
