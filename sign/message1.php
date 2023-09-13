<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "transactions");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT  username,crop_name,crop_type,img1,img2,img3 FROM trans ";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
				echo "<th>username</th>";
                echo "<th>crop_name</th>";
				echo "<th>crop_type</th>";
				echo "<th>img1</th>";
				echo "<th>img2</th>";
				echo "<th>img3</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
			echo " <td>".$row['username']."</td>";
                echo "<td>" . $row['crop_name'] . "</td>";
				echo "<td>" . $row['crop_type'] . "</td>";
				echo '
						<td>
						<a href="data:image/jpeg;base64,'.base64_encode($row['img1']).' " download>
						<img src="data:image/jpeg;base64,'.base64_encode($row['img1']).' " />
						</a>
						</td>
				';
				
				echo ' <td>
						<img src="data:image/jpeg;base64,'.base64_encode($row['img2']).'" />
						</td>
						';
				echo'
						<td>
						<img src="data:image/jpeg;base64,'.base64_encode($row['img3']).'" />
						</td>
				';
				
			   
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>