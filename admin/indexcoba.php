<!DOCTYPE HTML>
<html>
<head>
	<script type="text/javascript">
	window.onload = function () {
    var num = <?php echo $num ?>;
		var chart = new CanvasJS.Chart("chartContainer", {
			title: {
				text: "Understanding Labels"
			},
			axisY: {
				labelFontSize: 20,
				labelFontColor: "dimGrey"
			},
			axisX: {
				labelAngle: -30
			},
			data: [
			{
				type: "column",
				dataPoints: [
				{ y: 10, label: "SD" },
				{ y: 15, label: "SMP" },
				{ y: 25, label: "SMA" },
				{ y: 30, label: "D3" },
        { y: 28, label: "<18tahun" },
        { y: 40, label: "<18-25tahun"}
				]
			}
			]
		});

	chart.render();
	}
	</script>
	<script type="text/javascript" src="../assets/js/coba.js"></script>
</head>
<body>
	<div id="chartContainer" style="height: 300px; width: 100%;">
	</div>
</body>
</html>