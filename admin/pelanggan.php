<h2>Data Pelanggan!</h2>

<table class="table table-bordered">
    <thead>
        <tr></tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        <?php $ambil = $conn->query("SELECT * FROM pelanggan"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) {?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $pecah['nama_pelanggan']; ?></td>
            <td><?= $pecah['email_pelanggan']; ?></td>
            <td><?= $pecah['telepon_pelanggan']; ?></td>
            <td>
                <a href="" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php $no++; ?>
        <?php } ?>
    </tbody>
</table>