<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "tutorial");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT  phoneno FROM users WHERE category='distributor'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
		$delimiter = ",";
		$filename = "data.csv";
		$f = fopen('php://memory','w');
		$field =array('phoneno');
		fputcsv($f,$field,$delimiter);
        echo "<table>";
            echo "<tr>";
                echo "<th>Phoneno</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['phoneno'] . "</td>";
               $data = array($row['phoneno']);
			   fputcsv($f,$data,$delimiter);
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
		 //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
		
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
exit;
?>