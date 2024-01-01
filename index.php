<?php
include_once("connect.php");
$buku = mysqli_query($mysqli, "SELECT buku.*, nama_pengarang, nama_penerbit, katalog.nama as nama_katalog FROM buku 
                                        LEFT JOIN  pengarang ON pengarang.id_pengarang = buku.id_pengarang
                                        LEFT JOIN  penerbit ON penerbit.id_penerbit = buku.id_penerbit
                                        LEFT JOIN  katalog ON katalog.id_katalog = buku.id_katalog
                                        ORDER BY judul ASC");
?>

<html>

<head>
    <title>Homepage</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <style>
        table,
        tr,
        th {
            text-align: center;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="penerbit.php">Penerbit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pengarang.php">Pengarang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="katalog.php">Katalog</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <a href="add_index.php">Add New Buku</a><br /><br />
            <table class="table table-bordered">
                <tr>
                    <th>ISBN</th>
                    <th>Judul</th>
                    <th>Tahun</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Katalog</th>
                    <th>Stok</th>
                    <th>Harga Pinjam</th>
                    <th>Aksi</th>
                </tr>
                <?php
                while ($buku_data = mysqli_fetch_array($buku)) {
                    echo "<tr>";
                    echo "<td>" . $buku_data['isbn'] . "</td>";
                    echo "<td>" . $buku_data['judul'] . "</td>";
                    echo "<td>" . $buku_data['tahun'] . "</td>";
                    echo "<td>" . $buku_data['nama_pengarang'] . "</td>";
                    echo "<td>" . $buku_data['nama_penerbit'] . "</td>";
                    echo "<td>" . $buku_data['nama_katalog'] . "</td>";
                    echo "<td>" . $buku_data['qty_stok'] . "</td>";
                    echo "<td>" . $buku_data['harga_pinjam'] . "</td>";
                    echo "<td><a class='btn btn-primary' href='edit.php?isbn=$buku_data[isbn]'>Edit</a> | <a class='btn btn-danger' href='delete.php?isbn=$buku_data[isbn]'>Delete</a></td></tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>