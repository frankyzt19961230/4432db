<?php
    $continent = $_GET["continent"];
    $conn = mysqli_connect("localhost", "root", "","world");
    if ($conn->connect_error)  {
		echo "Unable to connect to database";
		exit;
    }
    
    print("<h2>List of countries in ". $continent ."</h2>");

    $query1="select Name from country where Continent= '". $continent ."' order by Name";
    $result1=$conn->query($query1);
    if (!$result1) die("No information");
    $result1->data_seek(0);
	while ($row=$result1->fetch_assoc())  {
		print("<li>" . $row["Name"] . "</li>");
	}

?>