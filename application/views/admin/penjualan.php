<div class="Container-fluid">
	<div class="row">
		<div class="col-md-8">

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
		                <tr>
		                    <td>1</td>
		                    <td><input type="text" class="form-control inputs" name="name_1" id="name_1" required=""></td>
		                    <td></td>
		                    <td></td>
		                    <td><input type="number" name="phone_1" class="form-control inputs lst" id="phone_1" value="1"></td>
		                    <td></td>
		                    <td><a class="btn btn-danger deleteLink" href="#">Hapus</a></td>
		                </tr>
		            </tbody>
		        </table>
			</div>
		</form>
		</div>
		<div class="col-md-4">
			<div>
				<div class="form-group" >
					<label>Total (Rp)</label>
					<input class="form-control" type="text" value="" name="" disabled="">
				</div>
				<div class="form-group" >
					<label>Bayar (Rp)</label>
					<input class="form-control" type="text" value="" name="">
				</div>
				<div class="form-group" >
					<label>Kembali (Rp)</label>
					<input class="form-control" type="text" value="" name="" disabled="">
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
	    html = '<tr>';
	    html += '<td>' + i + '</td>';
	    html += '<td><input type="text" class="form-control inputs" name="name_' + i + '" id="name_' + i + '" required="" /></td>';
	    html += '<td></td>';
	    html += '<td></td>';
	    html += '<td><input type="number" class="form-control inputs lst" name="phone_' + i + '" id="phone_' + i + '" value="1" /></td>';
	    html += '<td></td>';
	    html += '<td><a class="btn btn-danger deleteLink" href="#">Hapus</a></td>'
	    html += '</tr>';
	    $('table').append(html);
	    $(this).focus().select();
	    i++;
	  }
	});

	$(document).on('keydown', '.inputs', function(e) {
	  var code = (e.keyCode ? e.keyCode : e.which);
	  if (code == 13) {
	    var index = $('.inputs').index(this) + 1;
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