<?php
require_once 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $no_rm = $_POST["norm"];
  $nik = $_POST["nik"];
  $nama_pasien = $_POST["nama"];
  $tanggal_lahir = $_POST["tanggallahir"];
  $jenis_kelamin = $_POST["jeniskelamin"];
  $alamat = $_POST["alamat"];
  $email = $_POST["email"];

  $sql = "INSERT INTO datapasien (norm, nik, nama, tanggallahir, jeniskelamin, alamat, email) VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("issssss", $no_rm, $nik, $nama_pasien, $tanggal_lahir, $jenis_kelamin, $alamat, $email);

  try {
    if ($stmt->execute()) {
      header("location:pemeriksaan2.php");
      echo '<script> alert("Data Berhasil Ditambahkan");</script>';
    }
  } catch (Exception $e) {
    // var_dump($e);
    echo '<script> alert("DATA GAGAL DITAMBAHKAN, NO RM ATAU NIK SUDAH TERDAFTAR!!!")</script>';
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
<link rel="stylesheet" href="pasien.css">

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
        <label for="nik">NIK</label>
        <input id="nik" name="nik" type="text" />
      </div>
      <div class="form-group">
        <label for="nama">Nama Pasien</label>
        <input id="nama" name="nama" type="text" />
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
      <div class="form-group">
        <label for="email">E-mail</label>
        <input id="email" name="email" type="text" />
      </div>
      <div class="form-actions">
        <button type="submit">Simpan</button>
      </div>
    </form>
  </div>
</body>

</html>