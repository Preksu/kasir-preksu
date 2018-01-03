<div class="Container-fluid">
	<div class="row">
		<div class="col-md-8">
		<div class="form-group">
		 <div class="form-inline">
			<input id="inventory" type="text" class="form-control inputs" autocomplete="off" placeholder="input menu">
             <input placeholder="input kuantitas" id="quantity" type="text" class="form-control inputs" value="">
             <input id="harga" placeholder="input harga" type="text" name="" class="form-control inputs lst">
         </div>
		</div>

			<div class="form-group">
				<table class="table table-bordered table-striped" id="favoriteFoodTable"  width="100%">
		            <thead>
		                <tr>
		                	<th style="width: 5%; background: #e54747; color: #fff;">No</th>
		                    <th style="width: 25%; background: #e54747; color: #fff;">nama inventory</th>
		                    <th style="width: 15%; background: #e54747; color: #fff;">QTY</th>
		                    <th style="width: 20%; background: #e54747; color: #fff;">Harga</th>
		                    <th style="width: 5%; background: #e54747; color: #fff;">Aksi</th>
		                </tr>
		            </thead> 
		            <tbody>
		               
		            </tbody>
		        </table>
			</div>
		</div>
		<div class="col-md-4">
			<div>
				<div class="form-group" >
					<label>Total (Rp)</label>
					<input id="total_bayar" class="form-control" type="text" value="" name="" disabled="">
				</div>
				<div class="form-group" >
					<Button class="btn btn-success simpan_inventory"  name="">Simpan Inventory</Button>
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
	  	var inventory =  $('#inventory').val();
	  	var harga =  $('#harga').val();
		html = '<tr class="row_tabel">';
		html += '<td>' + i + '</td>';
		html += '<td class="inventory">'+inventory+'</td>';
		html += '<td class="quantity" >'+ quantity  +'</td>';
		html += '<td class="harga">'+harga+'</td>';
		html += '<td><button class="btn btn-danger delete_pesanan" >Hapus</button></td>';
		html += '</tr>';
		$('table').append(html);
		$(this).focus().select();
		i++;
		$('#inventory').val('');
		$('#quantity').val('');
		$('#harga').val('');

		var a= $('table tr').length -1;
		var total=0;
		console.log('jumlah baris '+a);
		for(var q=0;q<a;q++){
		   	total=total+Number($('.harga').eq(q).text());
		   		
		}
		$('#total_bayar').val(total);
		   	
	  }
	});
	$(document).on('click', '.simpan_inventory', function(e){
	  	var total = $('#total_bayar').val();
	  	var inventory = [];
	  	var harga = [];
	  	var quantity = [];
	  	var total = $('#total_bayar').val();
	  	var a= $('table tr').length -1;
	  	for (var q = 0; q<a; q++) {
	  	 	inventory[q]= $('.inventory').eq(q).text()
	  	 	harga[q]= $('.harga').eq(q).text()
	  	 	quantity[q]= $('.quantity').eq(q).text()
	  	}
	  	$.ajax({
		   type: "POST",
		   data: {inventory:inventory,harga:harga,quantity:quantity, total:total},
		   url: "<?=base_url()?>Owner/input_inventory",
		   success: function(data){
		     alert('berhasil memasukkan inventory !');
		     window.location.href = "<?=base_url()?>owner/pesanan_bahan";
		   }
		});
	});

	$(document).on('keydown', '.inputs', function(e) {
	  var code = (e.keyCode ? e.keyCode : e.which);
	  if (code == 13) {
	  	if ($('.inputs').index(this)==0) {
	    	var index = $('.inputs').index(this) + 1;
	    }
	    else if($('.inputs').index(this)==1){
	    	var index = $('.inputs').index(this) + 1;	
	    }
	    else {
	    	var index = $('.inputs').index(this) - 2;	
	    }
	    $('.inputs').eq(index).focus();
	  }
	});
	$(document).on('click', '.delete_pesanan', function(e){
		var index = $('.delete_pesanan').index(this);
		$('.row_tabel').eq(index).remove();
		var a= $('table tr').length -1;
	   	var total=0;
	   	console.log('jumlah baris '+a);
	   	for(var q=0;q<a;q++){
	   		total=total+Number($('.jml').eq(q).text());
	   		
	   	}
	   	$('#total_bayar').val(total);
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