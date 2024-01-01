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
    <title>Edit Ktalog</title>
</head>

<?php
include_once("connect.php");

$id_katalog = $_GET['id_katalog'];

$katalog = mysqli_query($mysqli, "SELECT * FROM katalog WHERE id_katalog='$id_katalog'");


while ($katalog_data = mysqli_fetch_array($katalog)) {
    $id_katalog = $katalog_data['id_katalog'];
    $nama = $katalog_data['nama'];
}
?>

<body>
    <div class="row mt-5">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <a href="katalog.php">Go to katalog</a>
                    <br /><br />

                    <form action="edit_katalog.php?id_katalog=<?php echo $id_katalog; ?>" method="post">
                        <table class="table table-borderless">
                            <tr>
                                <td>ID Katalog</td>
                                <td style="font-size: 11pt;"><?php echo $id_katalog; ?> </td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input class="btn btn-primary" type="submit" name="update" value="Update"></td>
                            </tr>
                        </table>
                    </form>

                    <?php

                    // Check If form submitted, insert form data into users table.
                    if (isset($_POST['update'])) {

                        $id_katalog = $_GET['id_katalog'];
                        $nama = $_POST['nama'];

                        include_once("connect.php");

                        $result = mysqli_query($mysqli, "UPDATE katalog SET 
                                    nama = '$nama'
                                    WHERE id_katalog = '$id_katalog';");

                        header("Location:katalog.php");
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>