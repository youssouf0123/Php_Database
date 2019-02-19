+!DOCTYPE html>
<html>
<head>
	<title>Database</title>
</head>
<body>
 <?php
  $datahost = 'localhost';
  $port = 5432;
  $datauser = 'postgres';
  $datapass = 'eminem';
  $dbname = "acme";
  $conn = pg_connect($datahost, $datauser, $datapass, $dbname,$port);
  /*if(!$conn){
  	die("couldnt connect".pg_error());
  }*/
 // echo "Successfully connected";
 /* $sql = "CREATE DATABASE testdatabase"
  $query = mysqli_query($sql,$conn);
  if (!$query){
  		die("Couldnt Create database".mysqli_error());
  }
  echo "Database Successfully Create";*/
  $sql = "SELECT * FROM articles";
  $query = pg_query($conn, $sql);
if ($query) {
   // echo "Table created successfully";
} else {
    echo "Error creating database: " . pg_error($conn);
}
  pg_close($conn);

?>
<?php while ($row=pg_fetch_assoc($query)) {
  echo "<li>". $row["title"]. " - ".$row["body"]."</li>";
}?>

</body>
</html>
