<?php
// fetch_data_pemeriksaan.php

// Include the connection script
require_once 'koneksi.php';

// SQL query to retrieve data from pemeriksaan table
$sql = "SELECT * FROM pemeriksaan, datapasien 
        WHERE pemeriksaan.norm = datapasien.norm 
        AND pemeriksaan.norm = '" . $_GET['norm'] . "'";

$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
  // Output data in an array
  $data = array();
  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
} else {
  $data = false;
}
