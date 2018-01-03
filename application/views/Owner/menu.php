<div class="Container-fluid">
	<div class="row">
		<div class="col-md-8">
		<Button id="tambah_menu" data-toggle="modal" data-target="#modal_tambah" class="btn btn-success">Tambah Menu</Button>
		<div class="table-responsive" >
        <table class="table table-bordered table-striped" id="post-table"  width="100%">
            <thead>
                <tr>
                    <th style="width: 5%; background: #00b268; color: #fff;">No</th>
                    <th style="width: 50%; background: #00b268; color: #fff;">Nama Menu</th>
                     <th style="width: 15%; background: #00b268; color: #fff;">Harga</th>
                    <th style="width: 30%; background: #00b268; color: #fff;">Action</th>
                </tr>
            </thead> 
            <tbody>
                <?php $no=0; foreach ($menu as $posts) {
                ?>
                <tr>
                	<td><?php echo $no+1 ?></td>
                    <td><?php echo $posts->nama_menu ?></td>
                    <td><?php echo $posts->harga ?></td>
                    <td> 
                        <form id="myform<?php echo $no; ?>" style="margin-bottom: 10px;" method="POST" action="<?= base_url();?>Owner/edit_menu">
                            <input type="hidden" name="img" value="">
                            <input type="hidden" name="id" value="<?php echo $posts->id_menu ?>">
                        </form>
                        <button data-toggle="modal" data-target="#modal_tambah" class="btn btn-warning" type="submit" name="edit" value="edit" id="edit<?php echo $no; ?>"><i class="glyphicon glyphicon-edit"></i></button>
                        <a href="hapus_menu/<?php echo $posts->id_menu;?>"><button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button></a>
                    </td>
                </tr>
                <?php $no++; }?>
        </table>
    </div>
	</div>
	</div>
</div>

<div>
    <div class="modal fade" id="modal_tambah" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Menu</h4>
        </div>
        <div class="modal-body">
            <form id="myform" action="<?= base_url();?>Owner/operasi_menu" method="POST" >
            	<label>Nama Menu</label>
            	<input id="nama" class="form-control" type="text" name="nama_menu">
            	<label>Harga Menu</label>
            	<input id="harga" class="form-control" type="text" name="harga">
            	<label>Bahan</label>
            	<input id="bahan" class="form-control" type="text" name="bahan">
                <input id="id" class="form-control" type="hidden" name="id">
            </form>    
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button id="tambah" type="submit" name="tambah" value="tambah" form="myform" class="btn btn-success" >Tambah</button>
          <button id="simpan" type="submit" name="simpan" value="simpan" form="myform" class="btn btn-success" >Simpan</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $no=0; foreach ($menu as $posts) {
                ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#edit<?php echo $no;?>').click(function(){
          $('#simpan').show();
          $('#tambah').hide();
          var id = '<?php echo $posts->id_menu ?>'
          var nama =  '<?php echo $posts->nama_menu ?>';
          var bahan =  '<?php echo $posts->bahan ?>';
          var harga = '<?php echo $posts->harga ?>';
          $('#id').val(id);
          $('#nama').val(nama);
          $('#bahan').val(bahan);
          $('#harga').val(harga);

        });
    });
</script>

<?php $no++; }?>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tambah_menu').click(function(){
          $('#simpan').hide();
          $('#tambah').show();
          $('#nama').val('');
          $('#bahan').val('');
          $('#harga').val('');

        });
    });
</script>