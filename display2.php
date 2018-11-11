<?php
    $continent = $_GET["continent"];
    $conn = mysqli_connect("localhost", "root", "","world");
    if ($conn->connect_error)  {
		echo "Unable to connect to database";
		exit;
    }
    
    print("<h2>List of countries in ". $continent ."</h2>");

    $query1="select Name,Code from country where Continent= '". $continent ."' order by Name";
    $result1=$conn->query($query1);
    if (!$result1) die("No information");
    $result1->data_seek(0);
	while ($row=$result1->fetch_assoc())  {
        print("<li>" . $row["Name"] ." ".$row["Code"]. "</li>");
        print("<ul>");
        $query2="select Language,IsOfficial from countrylanguage where CountryCode= '". $row["Code"] ."' order by IsOfficial";
        $result2=$conn->query($query2);
        if (!$result2) die("No information");
        $result2->data_seek(0);
        while($subrow=$result2->fetch_assoc()){
            if($subrow["IsOfficial"]=="T"){
                $colorstr="color:green";
            }else{
                $colorstr="";
            };
            print("<li style='".$colorstr."'>".$subrow["Language"].", ".$subrow["IsOfficial"]."</li>");

        }
        print("</ul>");
    }
    

?>