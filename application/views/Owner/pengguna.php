<div class="Container-fluid">
	<div class="row">
		<div class="col-md-8">
		<Button data-toggle="modal" data-target="#modal_tambah" class="btn btn-success">Tambah Menu</Button>
		<div class="table-responsive" >
        <table class="table table-bordered table-striped" id="post-table"  width="100%">
            <thead>
                <tr>
                    <th style="width: 5%; background: #00b268; color: #fff;">No</th>
                    <th style="width: 25%; background: #00b268; color: #fff;">Nama Lengkap</th>
                    <th style="width: 25%; background: #00b268; color: #fff;">Nama Pengguna</th>
                    <th style="width: 30%; background: #00b268; color: #fff;">Alamat</th>
                    <th style="width: 15%; background: #00b268; color: #fff;">Action</th>
                </tr>
            </thead> 
            <tbody>
                <?php $no=0; foreach ($pengguna as $posts) {
                ?>
                <tr>
                	<td><?php echo $no+1 ?></td>
                    <td><?php echo $posts->nama_lengkap ?></td>
                    <td><?php echo $posts->nama_pengguna ?></td>
                    <td><?php echo $posts->alamat ?></td>
                    <td> 
                        <form id="myform<?php echo $no; ?>" style="margin-bottom: 10px;" method="POST" action="<?= base_url();?>Owner/edit_menu">
                            <input type="hidden" name="img" value="">
                            <input type="hidden" name="id" value="">
                        </form>
                        <button <?php if($posts->id_user==1){echo 'disabled=""';} ?> class="btn btn-warning" type="submit" name="edit" value="edit"><i class="glyphicon glyphicon-edit"></i></button>
                        <button <?php if($posts->id_user==1){echo 'disabled=""';} ?> data-toggle="modal" data-target="#modal_hapus<?php echo $no; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
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
            <form>
            	<label>Nama Menu</label>
            	<input class="form-control" type="" name="">
            	<label>Harga Menu</label>
            	<input class="form-control" type="" name="">
            	<label>Bahan</label>
            	<input class="form-control" type="" name="">
            </form>    
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" name="hapus" value="hapus" form="myform" class="btn btn-success" >Tambah</button>
        </div>
      </div>
      
    </div>
  </div>
</div>