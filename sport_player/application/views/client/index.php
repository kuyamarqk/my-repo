<?php
$data = array();
    foreach($all as $row => $value){
        $dateObj = DATETIME::createFromFormat('!m', $value->month);
        $month = $dateObj->format('F');
        $client = array("label" => $month, "y"=> $value->total_cost);
        array_push($data,$client);
    }
    
?>
<!DOCTYPE HTML>
<html>
<head>
<link href="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">

window.onload = function () {
    var dpStart=$("#startDatepicker").datepicker( {
    format: "mm-yyyy",
    startView: "months", 
    minViewMode: "months"
    
});
var dpEnd=$("#endDatepicker").datepicker( {
    format: "mm-yyyy",
    startView: "months", 
    minViewMode: "months"
});
	var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
	    exportEnabled: true,
	    theme: "light1", // "light1", "light2", "dark1", "dark2"
		title:{
			text: "Client Billing - 2011"              
		},
        axisY:{
		includeZero: true
	},
		data: [              
		{
			// Change type to "doughnut", "line", "splineArea", etc.
			type: "column",
            indexLabelFontColor: "#5A5757",
            indexLabelPlacement: "outside",  
			dataPoints: <?= json_encode($data, JSON_NUMERIC_CHECK); ?>
		} 
		]
	});
	chart.render();
}
</script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Client Billing</h3>
                </div>
            </div>
            <div class="panel panel-default text-end">
                <form action="<?= base_url('/filter')?>" method="post">
                    <div class="form-group">
                        <label for="start" class="label">Start</label>
                        <input type="date" class="form-control" name="startDatepicker" id="startDatepicker" />
                    </div>
                    <div class="form-group">
                        <label for="start" class="label">End</label>
                        <input type="date" class="form-control mb-3" name="endDatepicker" id="endDatepicker" />
                    </div>
                    <button type="submit" class="btn btn-outline-success">Filter</button>
                </form>
                
                
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">List of total charges per month</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Total Cost</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($all as $key => $value){ 
                      $dateObj = DATETIME::createFromFormat('!m', $value->month);
                      $month = $dateObj->format('F');
                        ?>
                    <tr>
                        <td> <?= $month ?> </td>
                        <td><?= $value->year ?></td>
                        <td><?= $value->total_cost?></td>
                    </tr>
                   <?php } ?>
                    
                </tbody>
            </table>
        </div>
    </div>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>