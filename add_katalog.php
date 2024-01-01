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
    <title>Add Katalog</title>
</head>

<?php
include_once("connect.php");

$katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>

<body>
    <div class="row mt-5">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <a href="katalog.php">Go to Katalog</a>
                    <br /><br />

                    <form action="add_katalog.php" method="post" name="form1">
                        <table class="table table-borderless">
                            <tr>
                                <td>ID katalog</td>
                                <td><input type="text" name="id_katalog"></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td><input type="text" name="nama"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input class="btn btn-primary" type="submit" name="submit" value="Add"></td>
                            </tr>
                        </table>
                    </form>

                    <?php

                    // Check If form submitted, insert form data into users table.
                    if (isset($_POST['submit'])) {
                        $id_katalog = $_POST['id_katalog'];
                        $nama = $_POST['nama'];

                        include_once("connect.php");

                        $result = mysqli_query($mysqli, "INSERT INTO `katalog` (`id_katalog`, `nama`) VALUES ('$id_katalog', '$nama');");

                        header("Location:katalog.php");
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>