<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> EDIT DATA ASISTEN</h3>

    <?php foreach($asisten as $art) : ?>

        <form method="post" action="<?php echo base_url().'admin/data_asisten/update' ?>">
        
            <div class="form-group">
                <label>Nama Asisten</label>
                <input type="text" name="nama_art" class="form-control" 
                value="<?php echo $art->nama_art ?>">
            </div> 

            <div class="form-group">
                <label>Keterangan</label>  
                <input type="hidden" name="id_art" class="form-control" 
                value="<?php echo $art->id_art ?>">
                <input type="text" name="keterangan" class="form-control" 
                value="<?php echo $art->keterangan ?>">
            </div> 

            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" 
                value="<?php echo $art->kategori ?>">
            </div> 

            <div class="form-group">
                <label>Harga</label>
                <input type="tex  t" name="harga" class="form-control" 
                value="<?php echo $art->harga ?>">
            </div> 

            <div class="form-group">
                <label>Stok</label>
                <input type="text" name="stok" class="form-control" 
                value="<?php echo $art->stok ?>">
            </div> 

            <button type="reset" class="btn btn-danger btn-sm mt-3"> Reset </button>
            <button type="submit" class="btn btn-primary btn-sm mt-3"> Simpan </button>

        </form>

    <?php endforeach; ?>
</div>