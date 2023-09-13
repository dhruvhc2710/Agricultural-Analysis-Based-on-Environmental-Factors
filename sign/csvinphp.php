<?php
//include database configuration file
session_start();
$db = mysqli_connect("localhost","root","","transactions");
//get records from database
$last_id = $_SESSION['last_id'];
$query = $db->query("SELECT * FROM tran where id =(SELECT MAX(id) FROM tran)");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "info_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('username', 'crop_name', 'crop_type', 'quintal', 'duration', 'phoneno');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        
        $lineData = array($row['username'], $row['crop_name'], $row['crop_type'], $row['quintal'], $row['duration'], $row['phoneno']);
        fputcsv($f, $lineData, $delimiter);
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;

?>