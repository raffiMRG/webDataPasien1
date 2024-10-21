<?php
require_once 'koneksi.php';
function getData($conn)
{
  if (isset($_GET['kode'])) {
    $no_rm = $_GET['kode'];
    $sql = "SELECT * FROM pemeriksaan 
          INNER JOIN datapasien ON pemeriksaan.norm = datapasien.norm 
          WHERE pemeriksaan.norm = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $no_rm);
    $stmt->execute();
    $result = $stmt->get_result();
    return $row = $result->fetch_assoc();
  } else {
    return false;
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $no_rm = $_POST["norm"];
  $suhu_tubuh = $_POST["suhu_tubuh"];
  $berat_badan = $_POST["berat_badan"];
  $denyut_nadi = $_POST["denyut_nadi"];
  $respiratory = $_POST["respiratory"];
  $tekanan_darah = $_POST["tekanan_darah"];
  $tanggal_pemeriksaan = $_POST["tanggal_pemeriksaan"];

  // if (getData($conn)) {
  //   $sql = "UPDATE pemeriksaan SET suhu_tubuh = ?, berat_badan = ?, nadi = ?, respiratory = ?, tekanan_darah = ?, tanggal_pemeriksaan = ? WHERE norm = ?";
  // } else {
  //   $sql = "INSERT INTO pemeriksaan (norm, nama, tanggal_pemeriksaan, tanggallahir)
  //   SELECT p.norm, p.nama, ?, p.tanggallahir
  //   FROM datapasien p
  //   WHERE p.norm = ?";
  // }

  $sql =
    "INSERT INTO pemeriksaan (
      norm,
      nama,
      tanggal_pemeriksaan, 
      tanggallahir,
      suhu_tubuh,
      berat_badan,
      nadi,
      respiratory,
      tekanan_darah)
    SELECT 
      p.norm, p.nama, ?, p.tanggallahir, ?, ?, ?, ?, ?
    FROM 
      datapasien p
    WHERE 
      p.norm = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssssssi", $tanggal_pemeriksaan, $suhu_tubuh, $berat_badan, $denyut_nadi, $respiratory, $tekanan_darah, $no_rm);
  $stmt->execute();
  // $stmt = $conn->prepare($sql);
  if (!$stmt) {
    echo "Error preparing statement: " . $conn->error;
    exit;
  }
  // $stmt->bind_param("s", $no_rm);
  // $stmt->execute();

  if ($stmt->affected_rows > 0) {
    echo "Record updated successfully";
    header("location:pemeriksaan3.php?norm=$no_rm");
    exit;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    die;
  }
}
?>

<html>

<head>
  <title>
    Data Pemeriksaan
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>
<link rel="stylesheet" href="pasien.css">

<body>
  <div class="header">
    <div class="title">
      <a href="main.html">
        <img alt="Logo" height="60px" src="Screenshot_2024-09-02_152828-removebg-preview.png" width="20" />
      </a>
    </div>
    <a href="main.html"></a>
    <div class="home">
      <a href="main.html"><i class="fas fa-home"></i>Home
    </div></a>
  </div>
  <div class="container">
    <h1>
      Data Pemeriksaan
    </h1>
    <form method="post">
      <div class="form-group">
        <label for="norm">No RM</label>
        <input id="norm" name="norm" type="text" readonly="true" value="<?= $_GET['kode'] ?>" />
      </div>
      <div class="form-group">
        <label for="berat_badan">BERAT BADAN</label>
        <input id="berat_badan" name="berat_badan" type="text" />
      </div>
      <div class="form-group">
        <label for="suhu_tubuh">SUHU TUBUH</label>
        <input id="suhu_tubuh" name="suhu_tubuh" type="text" />
      </div>
      <div class="form-group">
        <label for="denyut_nadi">DENYUT NADI</label>
        <input id="denyut_nadi" name="denyut_nadi" type="text" />
      </div>
      <div class="form-group">
        <label for="respiratory">RESPIRATORY</label>
        <input id="respiratory" name="respiratory" type="text" />
      </div>
      <div class="form-group">
        <label for="tekanan_darah">TEKANAN DARAH</label>
        <input id="tekanan_darah" name="tekanan_darah" type="text" />
      </div>
      <div class="form-group">
        <label for="tanggal_pemeriksaan">TANGGAL PEMERIKSAAN</label>
        <!-- <input id="tanggal_pemeriksaan" name="tanggal_pemeriksaan" type="date" value="<?php echo $row['tanggal_pemeriksaan']; ?>" /> -->
        <input id="tanggal_pemeriksaan" name="tanggal_pemeriksaan" type="date" value="<?= ($row) ? $row['tanggal_pemeriksaan'] : '' ?>" />
      </div>
      <div class="form-actions">
        <button type="submit">Simpan</button>
      </div>
  </div>
  </form>
  </div>
</body>

</html>