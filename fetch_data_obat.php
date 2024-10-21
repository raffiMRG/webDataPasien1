<?php
// fetch_data.php

// Include the connection script
require_once 'koneksi.php';

// SQL query to retrieve data
$sql = "SELECT * FROM pemeriksaan, obat 
        WHERE pemeriksaan.norm = obat.norm 
        AND pemeriksaan.nama = '".$_GET['nama']."'";

$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Output data in an array
    $data = array();
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "No data found";
}
?>