    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Petugas dan Admin.xls");
    ?>

    <center>
        <h3>DAFTAR PETUGAS DAN ADMIN <br> UKK REKAYASA PERANGKAT LUNAK</h3>
    </center>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>NO</th>
                <th>ID PETUGAS</th>
                <th>NAMA PETUGAS</th>
                <th>USERNAME</th>
                <th>TELFON</th>
                <th>JABATAN</th>
            </tr>
        </thead>
        <tbody>
            <?php

            include '../config/koneksi.php';
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM tbl_petugas ORDER BY nama_petugas asc");
            while ($data = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['id_petugas'] ?></td>
                    <td><?php echo $data['nama_petugas'] ?></td>
                    <td><?php echo $data['username'] ?></td>
                    <td><?php echo $data['telpon'] ?></td>
                    <td><?php echo $data['level'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>