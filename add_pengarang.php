<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <style>
        input {
            border-radius: 10px;
            border-color: silver;
        }
    </style>
    <title>Add Pengarang</title>
</head>

<?php
include_once("connect.php");

$pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
?>

<body>
    <div class="row mt-5">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <a href="index.php">Go to Home</a>
                    <br /><br />

                    <form action="add_pengarang.php" method="post" name="form1">
                        <table class="table table-borderless">
                            <tr>
                                <td>ID Pengarang</td>
                                <td><input type="text" name="id_pengarang"></td>
                            </tr>
                            <tr>
                                <td>Nama Pengarang</td>
                                <td><input type="text" name="nama_pengarang"></td>
                            </tr>
                            <tr>
                                <td>email</td>
                                <td><input type="text" name="email"></td>
                            </tr>
                            <tr>
                                <td>Telp</td>
                                <td><input type="text" name="telp"></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><input type="text" name="alamat"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input class="btn btn-primary" type="submit" name="Submit" value="Add"></td>
                            </tr>
                        </table>
                    </form>

                    <?php

                    // Check If form submitted, insert form data into users table.
                    if (isset($_POST['Submit'])) {
                        $id_pengarang = $_POST['id_pengarang'];
                        $nama_pengarang = $_POST['nama_pengarang'];
                        $email = $_POST['email'];
                        $telp = $_POST['telp'];
                        $alamat = $_POST['alamat'];

                        include_once("connect.php");

                        $result = mysqli_query($mysqli, "INSERT INTO `pengarang` (`id_pengarang`, `nama_pengarang`, `email`, `telp`, `alamat`) VALUES ('$id_pengarang', '$nama_pengarang', '$email', '$telp', '$alamat');");

                        header("Location:pengarang.php");
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>