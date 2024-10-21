<?php require_once 'fetch_data_obat.php'; ?>
<html>
 <head>
  <title>
   Data Jadwal Obat
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="obat.css">
 </head>
 <body>
    <div class="header">
        <div class="logo">
            <img alt="Logo" height="40" src="Screenshot_2024-09-02_152828-removebg-preview.png"/>
        </div>
            <a class="home" href="main.html"><i class="fas fa-home"></i>Home</a>
    </div>
  <div class="container">
    <div class="title"> Data Jadwal Obat </div>
        <div class="patient-info">
        <table>
        <?php foreach ($data as $row) { ?>
            <tr>
                <td>Informasi Pasien</td>
            </tr>
            <tr>
                <td>No RM</td>
                <td>:<?php echo $row['norm']; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:<?php echo $row['nama']; ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:<?php echo $row['tanggallahir']; ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:<?php echo $row['jeniskelamin']; ?></td>
            </tr>
            <tr>
                <td>alamat</td>
                <td>:<?php echo $row['alamat']; ?></td>
            </tr>
            <?php } ?>
    </table>
        <button class="search-button">
        <i class="fas fa-search"></i>Search</button>
   </div>
    <a href="tambahobat.html"><div class="actions">
        <button class="add"><i class="fas fa-plus"></i>Tambah</button>
   </div></a>
   <table>
    <thead>
        <tr>
            <th>Nama Obat</th>
            <th>Dosis</th>
            <th>Frekuensi</th>
            <th>Waktu</th>
            <th>Tanggal di mulai</th>
            <th>Tanggal selesai</th>
            <th>Ketersediaan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
                <td><?php echo $row['obat']; ?></td>
                <td><?php echo $row['dosis']; ?></td>
                <td><?php echo $row['frekuensi']; ?></td>
                <td><?php echo $row['waktu']; ?></td>
                <td><?php echo $row['tanggal_mulai']; ?></td>
                <td><?php echo $row['tanggal_selesai']; ?></td>
                <td><?php echo $row['ketersediaan']; ?></td>
                <td class="action-icons">
                <i class="fas fa-edit"></i><i class="fas fa-trash"></i></td>
    </tbody>
   </table>
  </div>
 </body>
</html>