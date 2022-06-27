<!DOCTYPE html>
<html><head>
    <title></title>
</head><body>

    <table>
        <tr>
            <th>NO</th> 
            <th>nama art</th>  
            <th>keterangan</th>  
            <th>kategori</th>  
            <th>harga</th>
            <th>stok</th>
        </tr>

        <?php 
        $no=1;
        foreach($asisten as $art): ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $art->nama_art ?></td>
            <td><?php echo $art->keterangan ?></td>
            <td><?php echo $art->kategori ?></td>
            <td><?php echo $art->harga ?></td>
            <td><?php echo $art->stok ?></td>

        </tr>
     <?php endforeach; ?>
        </table>
        
</body></html>