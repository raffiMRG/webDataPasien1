<?php require_once 'fetch_data_pemeriksaan.php'; ?>
<?php
?>

<html>

<head>
  <title>Data Pemeriksaan</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="pemeriksaan3.css">
</head>

<body>
  <div class="header">
    <div class="title">
      <a href="main.html">
        <img alt="Logo" height="60px" src="Screenshot_2024-09-02_152828-removebg-preview.png" />
      </a>
    </div>
    <a href="main.html" style="color: #ffffff;">
      <div class="home">
        <i class="fas fa-home"></i>
        <span>Home</span>
      </div>
    </a>
  </div>
  <div class="container">
    <div class="title">Data Pemeriksaan</div>
    <div class="info-box">
      <?php if ($data) : ?>
        <table>
          <?php $row = end($data) ?>
          <tr>
            <th colspan="2">Informasi Pasien</th>
          </tr>
          <tr>
            <td>No RM</td>
            <td>: <?php echo $row['norm']; ?></td>
          </tr>
          <tr>
            <td>Nama</td>
            <td>: <?php echo $row['nama']; ?></td>
          </tr>
          <tr>
            <td>Tanggal Lahir</td>
            <td>: <?php echo $row['tanggallahir']; ?></td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>: <?php echo $row['jeniskelamin']; ?></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>: <?php echo $row['alamat']; ?></td>
          </tr>
        </table>
        <a href="riwayat.html">
          <div class="button-container">
            <button>
              <i class="fas fa-history"></i>
              Lihat Riwayat
            </button>
          </div>
        </a>
    </div>
  <?php else :  ?>
    <h1>Belum Ada Data.</h1>
  <?php endif; ?>
  <a href="pemeriksaan.php?kode=<?= $_GET['norm'] ?>">
    <button class="button-container">
      <i class="fas fa-plus"></i>
      Tambah
    </button></a>
  </div>
  <div class="table-container">
    <?php if ($data) : ?>
      <table>
        <thead>
          <tr>
            <th>Tekanan Darah</th>
            <th>Suhu Tubuh</th>
            <th>Nadi</th>
            <th>Respiratory</th>
            <th>Berat Badan</th>
            <th>Riwayat Pemeriksaan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data as $row) : ?>
            <tr>
              <td><?php echo $row['tekanan_darah']; ?></td>
              <td><?php echo $row['suhu_tubuh']; ?></td>
              <td><?php echo $row['nadi']; ?></td>
              <td><?php echo $row['respiratory']; ?></td>
              <td><?php echo $row['berat_badan']; ?></td>
              <td><?php echo $row['tanggal_pemeriksaan']; ?></td>
              <td>selesai</td>

            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>
  </div>
</body>

</html>