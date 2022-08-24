<h2>Ubah Produk</h2>

<?php
    $ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
    $pecah = $ambil->fetch_assoc();
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Nama</label>
        <input type="text" class="form-control" name="nama" value="<?= $pecah['nama_produk']; ?>">
    </div>
    <div class="from-group">
        <label for="">Harga (Rp)</label>
        <input type="number" class="form-control" name="harga" value="<?= $pecah['harga_produk']; ?>">
    </div>
    <div class="form-group">
        <label for="">Berat (ml)</label>
        <input type="number" class="form-control" name="berat" value="<?= $pecah['berat']; ?>">
    </div>
    <div class="form-group">
        <label for="">Foto</label>
        <img src="../foto_produk/<?= $pecah['foto_produk']; ?>" widht="200">
    </div>
    <div class="form-group">
        <label for="">Ganti Foto</label>
        <input type="file" class="form-control" name="foto">
    </div>
    
    <div class="form-group">
        <label for="">Deskripsi</label>
        <textarea class="form-control" name="deskripsi" rows="10">
        <?= $pecah['deskripsi_produk']; ?>
        </textarea>
    </div>
    <button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
    if (isset($_POST['ubah']))
    {
        $namafoto = $_FILES['foto']['name'];
        $lokasifoto = $_FILES['foto']['tmp_name'];

        // jika foto dirubah
        if (!empty($lokasifoto)) {
            move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");

            $conn->query("UPDATE produk SET nama_produk = '$_POST[nama]',
            harga_produk = '$_POST[harga]', berat = '$_POST[berat]',
            foto_produk = '$namafoto', deskripsi_produk = '$_POST[deskripsi]'
            WHERE id_produk = '$_GET[id]'");
        } else {
            $conn->query("UPDATE produk SET nama_produk = '$_POST[nama]',
            harga_produk = '$_POST[harga]', berat = '$_POST[berat]', 
            deskripsi_produk = '$_POST[deskripsi]' WHERE id_produk = '$_GET[id]'");
        }

        echo "<script>alert('Data produk telah diubah!');</script>";
        echo "<script>location='index.php?halaman=produk';</script>";
    }
?>