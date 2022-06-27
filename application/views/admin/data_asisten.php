<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_asisten "><i class="fas fa-plus fa-sm"> </i> Tambah Asisten
</button>

  <a class="btn btn-sm btn-danger mb-3" href=" <?php echo base_url('admin/data_asisten/print')?>">
    <i class="fa fa-print"></i> Print </a>

    <div class="dropdown d-inline-block">
  <button class="btn btn-warning btn-sm dropdown-toggle mb-3" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <i class = "fa fa-download"></i> Export
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="<?php echo base_url('admin/data_asisten/pdf')?>">PDF</a>
    <a class="dropdown-item" href="<?php echo base_url('admin/data_asisten/excel')?>">EXCEL</a>
  </div>
</div>

<table class="table table-bordered">
    <tr>
        <th>NO</th>
        <th>NAMA ASISTEN</th>
        <th>KETERANGAN</th>
        <th>KATEGORI</th>
        <th>HARGA</th>
        <th>STOK</th>
        <th colspan="3">AKSI</th>
    </tr>

    <?php 
    $no=1;
    foreach($asisten as $art) : ?>
    <tr>
        <td><?php echo $no++  ?></td> 
        <td><?php echo $art->nama_art ?></td>
        <td><?php echo $art->keterangan ?></td>
        <td><?php echo $art->kategori ?></td>
        <td><?php echo $art->harga ?></td>
        <td><?php echo $art->stok ?></td>
        <td><div class="btn btn-success btn-sm"><i class="fas fa-search-plus "></i></div></td>
        <td><?php echo anchor('admin/data_asisten/edit/' .$art->id_art,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit "></i></div>') ?></td>
        <td><?php echo anchor('admin/data_asisten/hapus/' .$art->id_art, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash "></i></div>')?></td> 
    </tr>

    <?php endforeach; ?>

</table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_asisten" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT ASISTEN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_asisten/tambah_aksi'?>" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label>Nama Asisten</label>
            <input type="text" name="nama_art" class="form-control">
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control">
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select class="form-control" name="kategori">
              <option>Pembantu</option>
              <option>Baby Sitter</option>
              <option>Satpam</option>
              <option>Tukang Kebun</option>
            </select>
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control">
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="text" name="stok" class="form-control">
        </div>

        <div class="form-group">
            <label>Gambar Asisten</label><br>
            <input type="file" name="gambar" class="form-control">
        </div>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>

      </form>

    </div>
  </div>
</div>
