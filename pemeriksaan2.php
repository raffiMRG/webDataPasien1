<?php require_once 'fetch_data_coba.php'; ?>
<html>

<head>
  <title>Data Pemeriksaan</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="pemeriksaan2.css">
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
    <h1>DATA PEMERIKSAAN</h1>
    <div class="search-container">
      <input type="text" placeholder="Cari">
      <button><i class="fas fa-search"></i></button>
      <!-- <a href="pmbaru.php"><button class="add-button"><i class="fas fa-plus"></i> Tambah</button></a> -->
    </div>
    <table>
      <thead>
        <tr>

          <th>NO RM</th>
          <th>Nama Pasien</th>
          <th>Tanggal Pemeriksaan</th>
          <th>Tanggal Lahir</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $row) { ?>
          <tr>
            <td><?php echo $row['norm']; ?></td>
            <td><a href="pemeriksaan3.php?norm=<?php echo $row['norm']; ?>"><?php echo $row['nama']; ?></a></td>
            <td><?php echo $row['tanggal_pemeriksaan']; ?></td>
            <td><?php echo $row['tanggallahir']; ?></td>
            <td><?php echo $row['jeniskelamin']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><a href="pemeriksaan.php?kode=<?php echo $row['norm']; ?>"><i class="fas fa-edit"></i></a></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>

</html>