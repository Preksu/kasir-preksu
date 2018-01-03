<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <label>Statistika Penjualan PerBulan</label>
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
    </div>
    <div class="row" style="margin-top: 100px;">

        <div class="table-responsive col-md-8" >
            <form method="POST" action="<?=base_url()?>owner">
            <div class="form-inline">
                <div class="form-group">
                <select id="" class="form-control" name="bln_masuk" >
                      <option value="01">Januari</option>
                      <option value="02">Februari</option>
                      <option value="03">Maret</option>
                      <option value="04">April</option>
                      <option value="05">Mei</option>
                      <option value="06">Juni</option>
                      <option value="07">Juli</option>
                      <option value="08">Agustus</option>
                      <option value="09">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                </select>
                </div>
                <div class="form-group">
                <input type="submit" name="bulan_masuk" class="btn btn-success" value="lihat">
                </div>
            </div>
            </form>

            <h3>Pemasukan</h3>
        <table class="table table-bordered table-striped" id="post-table"  width="100%">
            <thead>
                <tr>
                    <th style="width: 5%; background: #00b268; color: #fff;">No</th>
                    <th style="width: 30%; background: #00b268; color: #fff;">No Meja</th>
                    <th style="width: 30%; background: #00b268; color: #fff;">Tanggal Pesanan</th>
                    <th style="width: 35%; background: #00b268; color: #fff;">Total</th>
                </tr>
            </thead> 
            <tbody>
                <?php $pendapatan=0; $total=0; $no=0; foreach ($pesanan as $posts) {
                ?>
                <tr>
                    <td><?php echo $no+1 ?></td>
                    <td><?php echo $posts->no_meja ?></td>
                    <td><?php echo $posts->tanggal_pesanan ?></td>
                    <td><?php echo $posts->total_pesanan ?></td>
                </tr>
                <?php $total=$total+$posts->total_pesanan; $no++; }?>
                <tr>
                    <td colspan="3">Total Pemasukan</td>
                    <td><?php $pendapatan=$pendapatan+$total;  echo $total ?></td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
    <div class="row" style="margin-top: 100px;">
        
        <div class="table-responsive col-md-8" >
            <h3>Pengeluaran</h3>
        <table class="table table-bordered table-striped" id="post-table"  width="100%">
            <thead>
                <tr>
                    <th style="width: 5%; background: #00b268; color: #fff;">No</th>
                    <th style="width: 30%; background: #00b268; color: #fff;">Tanggal Pesanan</th>
                    <th style="width: 35%; background: #00b268; color: #fff;">Total</th>
                </tr>
            </thead> 
            <tbody>
                <?php $total=0; $no=0; foreach ($inventory as $posts) {
                ?>
                <tr>
                    <td><?php echo $no+1 ?></td>
                    <td><?php echo $posts->tanggal_inventory ?></td>
                    <td><?php echo $posts->total ?></td>
                </tr>
                <?php $total=$total+$posts->total; $no++; }?>
                <tr>
                    <td colspan="2">Total Pengeluaran</td>
                    <td><?php $pendapatan=$pendapatan-$total; echo $total ?></td>
                </tr>
        </table>
        </div>
    </div>
    <div class="row" style="margin-top: 100px;">
        
        <div class="table-responsive col-md-8" >
            <h3>Pendapatan</h3>
        <table class="table table-bordered table-striped" id="post-table"  width="100%">
            <thead>
                <tr>
                    <th style="width: 5%; background: #00b268; color: #fff;">No</th>
                    <th style="width: 30%; background: #00b268; color: #fff;">pendapatan</th>
                    <th style="width: 35%; background: #00b268; color: #fff;">Total</th>
                </tr>
            </thead> 
            <tbody>
                <tr>
                    <td colspan="2">Total Pendapatan</td>
                    <td><?php echo $pendapatan ?></td>
                </tr>
        </table>
        </div>
    </div>
</div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($bulanan as $key) { echo '"' . $key->bulan . '",'; } ?>],
                    datasets: [{
                            label: '# of Votes',
                            data: [<?php foreach ($bulanan as $key) { echo '"' . $key->jumlah_bulanan . '",';}?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>