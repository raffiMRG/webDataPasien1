<?php
require_once 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $no_rm = $_POST["norm"];
  $nama_pasien = $_POST["nama"];
  $tanggal_pemeriksaan = $_POST["tanggal"];
  $tanggal_lahir = $_POST["tanggallahir"];
  $jenis_kelamin = $_POST["jeniskelamin"];
  $alamat = $_POST["alamat"];

  // $sql = "INSERT INTO pemeriksaan (norm, nama, tanggal_pemeriksaan, tanggallahir, jeniskelamin, alamat) VALUES (?, ?, ?, ?, ?, ?)";
  // CHEK DATA APAKAH NO RM ADA DI TABEL datapasien. KALO ADA MASUKIN DATA NAMA, TANGGAL PEMERIKSAAN, TANGGAL LAHIR YANG SESUAI SAMA NO RM DARI TEABEL datapasien.
  // chek juda apakah norm ada yang sama ga di tabel pemeriksaan 
  // $sql = "INSERT INTO pemeriksaan (norm, nama, tanggal_pemeriksaan, tanggallahir)
  //   SELECT p.norm, p.nama, ?, p.tanggallahir
  //   FROM datapasien p
  //   WHERE p.norm = ?
  //   AND NOT EXISTS (
  //       SELECT 1 
  //       FROM pemeriksaan pr
  //       WHERE pr.norm = p.norm
  // )";

  $sql = "INSERT INTO pemeriksaan (norm, nama, tanggal_pemeriksaan, tanggallahir)
    SELECT p.norm, p.nama, ?, p.tanggallahir
    FROM datapasien p
    WHERE p.norm = ?";
  $stmt = $conn->prepare($sql);
  // $stmt->bind_param("ssssss", $no_rm, $nama_pasien, $tanggal_pemeriksaan, $tanggal_lahir, $jenis_kelamin, $alamat);
  $stmt->bind_param("si", $tanggal_pemeriksaan, $no_rm);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    echo "New record created successfully";
    header('location:pemeriksaan2.php');
    exit;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!-- HTML code starts here -->
<html>

<head>
  <title>Data Pasien Baru</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>
<link rel="stylesheet" href="pmbaru.css">

<body>
  <div class="header">
    <div class="title">
      <img alt="Logo" height="60px" src="Screenshot_2024-09-02_152828-removebg-preview.png" width="20" />
    </div>
    <a href="main.html"></a>
    <div class="home">
      <a href="main.html"><i class="fas fa-home"></i>Home
    </div></a>
  </div>
  <div class="container">
    <h1>Data Pasien Baru</h1>
    <form method="post">
      <div class="form-group">
        <label for="norm">No RM</label>
        <input id="norm" name="norm" type="text" />
      </div>
      <div class="form-group">
        <label for="nama">Nama Pasien</label>
        <input id="nama" name="nama" type="text" />
      </div>
      <div class="form-group">
        <label for="tanggal">Tanggal Pemeriksaan</label>
        <input id="tanggal" name="tanggal" type="date" />
      </div>
      <div class="form-group">
        <label for="tanggallahir">Tanggal Lahir</label>
        <input id="tanggallahir" name="tanggallahir" type="date" />
      </div>
      <div class="form-group">
        <label for="jeniskelamin">Jenis Kelamin</label>
        <select id="jeniskelamin" name="jeniskelamin">
          <option value="P">Perempuan</option>
          <option value="L">Laki-laki</option>
        </select>
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input id="alamat" name="alamat" type="text" />
      </div>
      <div class="form-actions">
        <button type="submit">Simpan</button>
      </div>
    </form>
  </div>
</body>

</html>