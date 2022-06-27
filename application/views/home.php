<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.6.0.min.js' ?>"></script>
</head>
<body>

    <div class="container">
     <h1>DATA ASISTEN</h1>
    
    <table class="table ">
        <thead>
            <tr>
                <th>NO</th> 
                <th>nama art</th>  
                <th>keterangan</th>  
                <th>kategori</th>  
                <th>harga</th>
                <th>stok</th>       
            </tr>
        </thead>
        <tbody id="target">

        </tbody>

    </table>
    </div>
    <script type="text/javascript">
    ambilData();
    
    function ambilData(){
        $.ajax({
            type:'POST',
            url: '<?php echo base_url()."index.php/admin/database/ambildata"?>',
            dataType: 'json',
            success: function(data){
                var baris='';  
                for(var i=0;i<data.length;i++){
                    baris += '<tr>'+
                                '<td>'+ data[i].id_art +'</td>'+
                                '<td>'+ data[i].nama_art +'</td>'+
                                '<td>'+ data[i].keterangan +'</td>'+
                                '<td>'+ data[i].kategori +'</td>'+
                                '<td>'+ data[i].harga +'</td>'+
                                '<td>'+ data[i].stok +'</td>'+
                            '</tr>';
            }
            $('#target').html(baris);
        }
        });
    }
</script>

    
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>