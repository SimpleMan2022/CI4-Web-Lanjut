<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .container {
      width: 50%;
      background-color: #f2f2f2;
      margin-left: auto;
      margin-right: auto;
      padding: 10px
    }
    .title {
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <h2 class="title">Biodata diri</h2>
      <div>
        <h3>Nama: <?= $nama; ?></h3>
        <p><?= $deskripsi; ?></p>
        <h3>Alamat: <?= $alamat; ?></h3>
        <h3>Hobi: <?= $hobi; ?></h3>
        <h3>Cita-Cita: <?= $cita_cita; ?></h3>
      </div>
    </div>
  </div>
</body>
</html>