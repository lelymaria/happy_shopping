<h2>Data Pembeli</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        <?php $ambil = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan") ?>
        <?php while ($pecah = $ambil->fetch_assoc()) {?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $pecah['nama_pelanggan']; ?></td>
            <td><?= $pecah['tanggal_pembelian']; ?></td>
            <td><?= $pecah['total_pembelian']; ?></td>
            <td>
                <a href="" class="btn btn-info">Detail</a>
            </td>
        </tr>
        <?php $no++; ?>
        <?php } ?>
    </tbody>
</table>