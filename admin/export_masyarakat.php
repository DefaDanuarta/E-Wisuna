    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Masyarakat.xls");
    ?>

    <center>
        <h3>DATA MASYARAKAT <br> UKK REKAYASA PERANGKAT LUNAK</h3>
    </center>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>NO</th>
                <th>NIK</th>
                <th>NAMA</th>
                <th>USERNAME</th>
                <th>TELP</th>
            </tr>
        </thead>
        <tbody>
            <?php

            include '../config/koneksi.php';
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM tbl_masyarakat ORDER BY nama asc");
            while ($data = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['nik'] ?></td>
                    <td><?php echo $data['nama'] ?></td>
                    <td><?php echo $data['username'] ?></td>
                    <td><?php echo $data['telp'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>