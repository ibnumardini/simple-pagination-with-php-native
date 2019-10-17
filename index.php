<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paging</title>
</head>

<body>
    <?php
    include 'config.php';
    ?>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
        </tr>
        <?php
        $halaman = 1;
        $page = isset($_GET["halaman"]) ? (int) $_GET["halaman"] : 1;
        $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
        $result = mysqli_query($sql, "SELECT * FROM santri");
        $total = mysqli_num_rows($result);
        $pages = ceil($total / $halaman);
        $query = mysqli_query($sql, "SELECT * FROM santri LIMIT $mulai, $halaman");
        $no = $mulai + 1;


        while ($data = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama']; ?></td>

            </tr>

        <?php
        }
        ?>


    </table>

    <div class="">
        <?php for ($i = 1; $i <= $pages; $i++) { ?>
            <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>

        <?php } ?>

    </div>
</body>

</html>