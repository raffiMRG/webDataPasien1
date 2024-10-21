<?php
require_once 'koneksi.php';

if (isset($_GET['kode'])) {
  $no_rm = $_GET['kode'];
  $sql = "SELECT * FROM datapasien WHERE norm = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $no_rm);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $no_rm = $_POST["norm"];
  $nik = $_POST["nik"];
  $nama_pasien = $_POST["nama"];
  $tanggal_lahir = $_POST["tanggallahir"];
  $jenis_kelamin = $_POST["jeniskelamin"];
  $alamat = $_POST["alamat"];

  $sql = "UPDATE datapasien SET nik = ?, nama = ?, tanggallahir = ?, jeniskelamin = ?, alamat = ? WHERE norm = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssssss", $nik, $nama_pasien, $tanggal_lahir, $jenis_kelamin, $alamat, $no_rm);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    echo "Record updated successfully";
    header('location:datapasien.php');
    exit;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>
<!-- HTML code starts here -->
<html>

<head>
  <title>Edit Data Pasien</title>
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
    <h1>Edit Data Pasien</h1>
    <form method="post">
      <div class="form-group">
        <label for="norm">No RM</label>
        <input id="norm" name="norm" type="text" value="<?php echo $row['norm']; ?>" />
      </div>
      <div class="form-group">
        <label for="nik">NIK</label>
        <input id="nik" name="nik" type="text" value="<?php echo $row['nik']; ?>" />
      </div>
      <div class="form-group">
        <label for="nama">Nama Pasien</label>
        <input id="nama" name="nama" type="text" value="<?php echo $row['nama']; ?>" />
      </div>
      <div class="form-group">
        <label for="tanggallahir">Tanggal Lahir</label>
        <input id="tanggallahir" name="tanggallahir" type="text" value="<?php echo $row['tanggallahir']; ?>" />
      </div>
      <div class="form-group">
        <label for="jeniskelamin">Jenis Kelamin</label>
        <select id="jeniskelamin" name="jeniskelamin">
          <option value="Laki-laki" <?php if ($row['jeniskelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
          <option value="Perempuan" <?php if ($row['jeniskelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
        </select>
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input id="alamat" name="alamat" type="text" value="<?php echo $row['alamat']; ?>" />
      </div>
      <div class="form-actions">
        <button type="submit">Update</button>
      </div>
    </form>
  </div>
</body>

</html>