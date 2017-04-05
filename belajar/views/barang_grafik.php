<div class="row">
	<div class="col-lg-12">
		<h1>Barang <small>Grafik Barang</small></h1>
		<ol class="breadcrumb">
			<li><a href=""><i class="fa fa-dashboard"></i></a></li>
			<li><a href="">Barang</a></li>
			<li class="active">Grafik barang</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div id="data_barang"></div>
	</div>
</div>

<?php 
include 'models/m_barang.php';
$brg = new Barang($connection);
$tampil = $brg->tampil();

$nama_brg = array();
$stok_brg = array();

while($data = $tampil->fetch_object()){
	$nama_brg[] = $data->nama_brg;
	$stok_brg[] = intval($data->stok_brg);
}
// print_r(json_encode($nama_brg));
?>

<script type="text/javascript" src="assets/js/highcharts.js"></script>
<script type="text/javascript" src="assets/js/exporting.js"></script>

<script type="text/javascript">
Highcharts.chart('data_barang', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Data Nama dan Jumlah Stok Barang'
    },
    subtitle: {
        text: 'Source: @riyanriyans'
    },
    xAxis: {
        categories: <?=json_encode($nama_brg);?>,
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Jumlah Satuan'
        },
        labels: {
            formatter: function () {
                return this.value;
            }
        }
    },
    tooltip: {
        split: true,
        valueSuffix: ''
    },
    plotOptions: {
        area: {
            stacking: 'normal',
            lineColor: '#666666',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#666666'
            }
        }
    },
    series: [{
        name: 'Jumlah Stok',
        data: <?=json_encode($stok_brg); ?>
    }]
});	

</script>