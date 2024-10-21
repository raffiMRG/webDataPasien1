<?php
// fetch_data.php

// Include the connection script
require_once 'koneksi.php';

// SQL query to retrieve data
// $sql = "SELECT * FROM pemeriksaan, datapasien WHERE pemeriksaan.norm = datapasien.norm ORDER BY pemeriksaan.id_user DESC";
// $sql =
//   "SELECT 
//     dp.*, 
//     p.tanggal_pemeriksaan
//   FROM 
//     datapasien dp
//   LEFT JOIN 
//     pemeriksaan p ON dp.norm = p.norm
//   ORDER BY 
//     dp.id_user 
//   DESC";


$sql =
  "SELECT 
    dp.*, 
    p.tanggal_pemeriksaan
FROM 
    datapasien dp
LEFT JOIN 
    (SELECT norm, MAX(tanggal_pemeriksaan) AS tanggal_pemeriksaan
    FROM pemeriksaan
    GROUP BY norm) p 
ON dp.norm = p.norm
ORDER BY 
    dp.id_user DESC";

$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
  // Output data in an array
  $data = array();
  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
} else {
  echo "No data found";
}
