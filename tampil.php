<?php include('koneksi.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    input{
            border-radius: 10px;
            background-color: red;
            border: none;
            color: white;
            padding: 10px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
    }
    .red {
            background: red;
            color: white;
    }
    .container {
        border-radius: 10px;
        border: 1px solid black;
        background-color: white;
        width: 50%;
        padding-top: 1px;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
        padding-bottom: 15px;
    }
</style>

<body>
    <header align="center">
        <h2>Data Barang</h2>
    </header>
    <br>
    <div class="container">
        <table class="table" id="out" align="center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Satuan</th>
                    <th>Kategori Produk</th>
                    <th>Gambar</th>
                    <th>Stok</th>
                    <th>Modify</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query('SELECT * FROM `tb_input`');

                if (isset($_GET['info'])) {
                    $info=$_GET['info'];
                    if ($info=='hapus') {
                        echo "data berhasil dihapus";
                    }
                }

                $i=1;
                foreach($result as $d):
                    $img = $d['url'];
                    echo "<tr>";
                    
                    echo "<td>".$i."</td>";
                    echo "<td>"."MD-".$d['kode']."</td>";
                    echo "<td>".$d['nama']."</td>";
                    echo "<td>".$d['harga']."</td>";
                    echo "<td>".$d['satuan']."</td>";
                    echo "<td>".$d['kategori']."</td>";
                    echo "<td>"."<img src='$img' width='150' height='150'>"."</td>";

                    if ($d['stok']<5) {
                        echo "<td class='red'>".$d['stok']."</td>";
                    }else {
                        echo "<td>".$d['stok']."</td>";
                    }
                    
        
                    echo "<td>";
                    echo "<a href='hapus.php?kode=".$d['kode']."'>Hapus</a>";
                    echo "</td>";
        
                    echo "</tr>";
                    $i++;
                endforeach;
                ?>
            </tbody>
        </table>
        <br>
        <center>
            <input type="button" value="Kembali" onclick="window.location.href = 'input.php';">
        </center>
    </div>
</body>

</html>