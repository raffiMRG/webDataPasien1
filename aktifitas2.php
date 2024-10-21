<?php require_once 'fetch_data_aktifitas.php'; ?>
<html>
 <head>
  <title>
   Data Aktifitas
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="aktifitas.css">
 </head>
 <body>
    <div class="header">
        <div class="logo">
            <img alt="Logo" height="40" src="Screenshot_2024-09-02_152828-removebg-preview.png"/>
        </div>
            <a class="home" href="main.html"><i class="fas fa-home"></i>Home</a>
    </div>
  <div class="container">
    <div class="title"> Data Aktifitas Olahraga </div>
        <div class="patient-info">
        <table>
        <?php foreach ($data as $row) { ?>
            <tr>
                <td colspan="3">Informasi Pasien</td>
            </tr>
            <tr>
                <td>No RM</td>
                <td>:<?php echo $row['norm']; ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:<?php echo $row['nama']; ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:<?php echo $row['tanggallahir']; ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:<?php echo $row['jeniskelamin']; ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:<?php echo $row['alamat']; ?></td>
                <td></td>
            </tr>
            <?php } ?>
    </table>
   </div>
    <a href="tambahaktifitas.html"><div class="actions">
        <button class="add"><i class="fas fa-plus"></i>Tambah</button>
   </div></a>
   <table>
        <thead>
            <tr>
                <th>Jenis Aktifitas</th>
                <th>Waktu</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $row['jenis_aktifitas']; ?></td>
                <td><?php echo $row['waktu']; ?></td>
                <td><?php echo $row['tanggal_mulai']; ?></td>
                <td><?php echo $row['tanggal_selesai']; ?></td>
                <td class="action-icons">
                <i class="fas fa-edit"></i><i class="fas fa-trash"></i></td>
            </tr>
        </tbody>
   </table>
  </div>
 </body>
</html>