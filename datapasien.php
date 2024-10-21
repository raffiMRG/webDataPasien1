<?php
require_once 'fetch_data.php';

if (isset($_GET['search'])) {
  require_once 'koneksi.php';
  $keyword = $_GET['search'];

  // SQL query to retrieve data from pemeriksaan table
  $sql = "SELECT * FROM datapasien 
        WHERE nama like '%$keyword%'
        OR nik like '%$keyword%'
        OR norm like '%$keyword%'";

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
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=s, initial-scale=1.0">
  <title>hyperattention</title>
  <link rel="stylesheet" href="datapasien.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
  <div class="header">
    <div class="title">
      <a href="main.html">
        <img alt="Logo" height="60px" src="Screenshot_2024-09-02_152828-removebg-preview.png" />
      </a>
    </div>
    <a href="main.html">
      <div class="home">
        <i class="fas fa-home"></i>
        <span>Home</span>
      </div>
    </a>
  </div>
  <div class="container">
    <h2>DATA PASIEN</h2>
    <div class="search-bar">
      <form method="GET">
        <input type="text" placeholder="Cari" name="search" class="search-input">
        <button class="search-btn" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </form>
    </div>
    <a href="pasien.php"><button class="add-btn">
        <i class="fas fa-plus"></i>
        Tambah
      </button></a>
    <table class="data-table">
      <thead>
        <tr>
          <th>NO RM</th>
          <th>Nama Pasien</th>
          <th>NIK</th>
          <th>Tanggal Lahir</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($data) : ?>
          <?php foreach ($data as $row) : ?>
            <tr>
              <td><?php echo $row['norm']; ?></td>
              <td><?php echo $row['nama']; ?></td>
              <td><?php echo $row['nik']; ?></td>
              <td><?php echo $row['tanggallahir']; ?></td>
              <td><?php echo $row['jeniskelamin']; ?></td>
              <td><?php echo $row['alamat']; ?></td>
              <td><a href="editpasien.php?kode=<?php echo $row['norm']; ?>"><i class="fas fa-edit"></i></a></td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <h3 style="color: red;">DATA TIDAK DITEMULAN.</h3>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>

</html>