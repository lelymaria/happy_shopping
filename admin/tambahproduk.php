<h2>Tambah Produk</h2>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Nama</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="from-group">
        <label for="">Harga (Rp)</label>
        <input type="number" class="form-control" name="harga">
    </div>
    <div class="form-group">
        <label for="">Berat (ml)</label>
        <input type="number" class="form-control" name="berat">
    </div>
    <div class="form-group">
        <label for="">Deskripsi</label>
        <textarea class="form-control" name="deskripsi" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label for="">Foto</label>
        <input type="file" class="form-control" name="foto">
    </div>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php
    if (isset($_POST['save'])) {
        $nama = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];
        move_uploaded_file($lokasi, "../foto_produk/".$nama);
        $conn->query("INSERT INTO produk
            (nama_produk, harga_produk, berat, foto_produk, deskripsi_produk)
            VALUES('$_POST[nama]', '$_POST[harga]', '$_POST[berat]', '$nama', '$_POST[deskripsi]')
        ");

        echo "<div class='alert alert-info'>Data Tersimpan</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
    }
?>

