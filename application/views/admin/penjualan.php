<div class="Container-fluid">
	<div class="row">
		<div class="col-md-8">
		<div class="form-group">
		 <div class="form-inline">
			<input id="pilih_menu" list="list_menu" type="text" class="form-control inputs" autocomplete="off" placeholder="input menu">
        	<datalist id="list_menu">
        		<?php foreach ($menu as $m) { ?>
              		<option value="<?= $m->id_menu ?>"><?= $m->nama_menu ?></option>
              	<?php } ?>
             </datalist>
             <input id="quantity" type="number" class="form-control inputs lst" value="1">
         </div>
		</div>

		<form>
			<div class="form-group">
				<table class="table table-bordered table-striped" id="favoriteFoodTable"  width="100%">
		            <thead>
		                <tr>
		                	<th style="width: 5%; background: #e54747; color: #fff;">No</th>
		                    <th style="width: 15%; background: #e54747; color: #fff;">Id Menu</th>
		                    <th style="width: 25%; background: #e54747; color: #fff;">Nama Menu</th>
		                    <th style="width: 15%; background: #e54747; color: #fff;">Harga</th>
		                    <th style="width: 15%; background: #e54747; color: #fff;">QTY</th>
		                    <th style="width: 20%; background: #e54747; color: #fff;">Jumlah</th>
		                    <th style="width: 5%; background: #e54747; color: #fff;">Aksi</th>
		                </tr>
		            </thead> 
		            <tbody>
		               
		            </tbody>
		        </table>
			</div>
		</form>
		</div>
		<div class="col-md-4">
			<div>
				<div class="form-group" >
					<label>Total (Rp)</label>
					<input id="total_bayar" class="form-control" type="text" value="" name="" disabled="">
				</div>
				<div class="form-group" >
					<label>Bayar (Rp)</label>
					<input class="form-control bayar" type="text" value="" name="">
				</div>
				<div class="form-group" >
					<label>Kembali (Rp)</label>
					<input class="form-control kembalian" type="text" value="" name="" disabled="">
				</div>
				<div class="form-group" >
					<input class="btn btn-success" type="submit" name="" value="Kirim">
				</div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	var i = $('table tr').length;
	

	$(document).on('keydown', '.lst', function(e) {
	  var code = (e.keyCode ? e.keyCode : e.which);
	  if (code == 13) {
	  	var quantity = $('#quantity').val();
	  	var id =  $('#pilih_menu').val();
	  	$.post("<?=base_url()?>Admin/get_rincian_menu",{id:id}, function(data){
			var duce = jQuery.parseJSON(data);
			var nama_menu = duce.nama_menu;
			var harga = duce.harga;
			var jumlah = harga * quantity;
			html = '<tr>';
		    html += '<td>' + i + '</td>';
		    html += '<td>'+id+'</td>';
		    html += '<td class="menu_nama" >'+ nama_menu +'</td>';
		    html += '<td class="menu_harga">'+harga+'</td>';
		    html += '<td class="menu_qty">'+ quantity +'</td>';
		    html += '<td class="jml menu_jml">'+jumlah+'</td>';
		    html += '<td><a class="btn btn-danger deleteLink" href="#">Hapus</a></td>'
		    html += '</tr>';
		    $('table').append(html);
		    $(this).focus().select();
		    i++;
		   	$('#pilih_menu').val('');
		   	$('#quantity').val(1);

		   	var a= $('table tr').length -1;
		   	var total=0;
		   	console.log('jumlah baris '+a);
		   	for(var q=0;q<a;q++){
		   		total=total+Number($('.jml').eq(q).text());
		   		
		   	}
		   	$('#total_bayar').val(total);
		   	
		});
	  }
	});
	$(document).on('keydown', '.bayar', function(e) {
	  var code = (e.keyCode ? e.keyCode : e.which);
	  if (code == 13) {
	  	var bayar = $('.bayar').val();
	  	var total = $('#total_bayar').val();
	  	var kembalian = bayar-total;
	  	$('.kembalian').val(kembalian);
	  	var nama_menu = [];
	  	var harga = [];
	  	var quantity = [];
	  	var jumlah = [];
	  	var a= $('table tr').length -1;
	  	for (var q = 0; q<a; q++) {
	  	 	nama_menu[q]= $('.menu_nama').eq(q).text()
	  	 	harga[q]= $('.menu_harga').eq(q).text()
	  	 	quantity[q]= $('.menu_qty').eq(q).text()
	  	 	jumlah[q]= $('.menu_jml').eq(q).text()
	  	}
	  }
	});

	$(document).on('keydown', '.inputs', function(e) {
	  var code = (e.keyCode ? e.keyCode : e.which);
	  if (code == 13) {
	  	if ($('.inputs').index(this)==0) {
	    	var index = $('.inputs').index(this) + 1;
	    }
	    else{
	    	var index = $('.inputs').index(this) - 1;	
	    }
	    $('.inputs').eq(index).focus();
	  }
	});
	
	$(document).ready(function() {
		
	    $("#favoriteFoodTable .deleteLink").on("click",function() {
	        var tr = $(this).closest('tr');
	        tr.css("background-color","#FF3700");

	        tr.fadeOut(400, function(){
	            tr.remove();
	        });
	      return false;
	    });
	});

</script>