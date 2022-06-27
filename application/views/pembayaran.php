<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-success">
                <?php 
                $grand_total = 0;
                if ($keranjang = $this->cart->contents())
                 {
                     foreach($keranjang as $item)
                     {
                         $grand_total = $grand_total + $item['subtotal'];
                     }

                     echo "<h4> Total Belanja Anda : Rp. ".number_format($grand_total, 0,',','.');
                 
                 ?>
            </div><br><br>

            <h3>Input Alamat Pengiriman dan Pembayaran</h3>

            <form method ="post" action="<?php echo base_url() ?>dashboard/proses_pesanan">

                 <div class="form-group">
                     <label>Nama Lengkap</label>
                     <input type="text" name="nama" placeholder="Nama Lengkap Anda"
                     class="form-control">
                 </div>

                 <div class="form-group">
                     <label>Alamat Lengkap</label>
                     <input type="text" name="alamat" placeholder="Alamat Lengkap Anda"
                     class="form-control">
                 </div>

                 <div class="form-group">
                     <label>No. Handphone</label>
                     <input type="text" name="no_hp" placeholder="Nomor Handphone Anda"
                     class="form-control">
                 </div>

                 <div class="form-group">
                     <label>Pilih Bank</label>
                     <select class="form-control">
                         <option> BCA       - XXXXXXXXXX </option>
                         <option> BNI       - XXXXXXXXXX </option>
                         <option> MANDIRI   - XXXXXXXXXXXXX </option>
                         <option> BRI       - XXXXXXXXXXXXXXX </option>
                     </select>
                 </div>

                 <button type="submit" class="btn btn-sm btn-primary mb-3">Pesan Asisten</button>
        
            </form> 

            <?php  
            }else
            {
                echo "<h4> Keranjang Asisten Anda Masih Kosong";
            }
            ?>
        </div>

        
        <div class="col-md-2"></div>
    </div>
</div>