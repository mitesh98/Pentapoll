<script type="text/javascript" src="jquery.js"></script>
<?php
include 'database.php';
echo $_POST['poll_id'];

		$q="SELECT * FROM `polldetail` WHERE poll_id='{$_POST['poll_id']}'";
		$b=mysqli_query($con,$q) OR die(mysqli_error($con));
		$rowpolldetail=mysqli_fetch_assoc($b) OR die(mysqli_error($con)) ;
echo $rowpolldetail['question'];
		//$question=$row['question'];
		$q="SELECT * FROM `count` WHERE poll_id={$_POST['poll_id']}";
		$a=mysqli_query($con,$q) OR die(mysqli_error($con));
		$row=mysqli_fetch_assoc($a) OR die(mysqli_error($con)) ;
echo $row['opt1count'];
		//-====================================
		?>


        
        <!---=========================================-->
	
		
		<html>
  <head>
	  <div id="chart_div<?= $_POST['poll_id'] ?>"></div>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

     // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['<?= $rowpolldetail['option1'] ?>', <?= $row['opt1count'] ?>],
          ['<?= $rowpolldetail['option2']  ?>', <?= $row['opt2count'] ?>],
          ['<?= $rowpolldetail['option3']  ?>', <?= $row['opt3count'] ?>],
          ['<?= $rowpolldetail['option4']  ?>', <?= $row['opt4count'] ?>],
          ['<?= $rowpolldetail['option5']  ?>', <?= $row['opt5count'] ?>]
        ]);

        // Set chart options
var chartwidth = $('.each-part').width();

        // Instantiate and draw our chart, passing in some options.
		  //var chart_width=$('.each-part').width();
        var chart = new google.visualization.PieChart(document.getElementById('chart_div<?= $_POST['poll_id'] ?>'));
        chart.draw(data, options);
        var options = {
  width: chartwidth,
  height: 200,
  title: 'Result',
  colors: ['#008083', '#006766', '#004B4E', '#86B6B6', '#66B1B4']
};

chart.draw(data, options);


      }
    </script>

  </head>

  <body>
	  
    <!--Div that will hold the pie chart-->
    
  </body>
</html>
		

	
<p><?=$rowpolldetail['question'] ?></p>	
		<?php


?>
<html>
	<a id="whole_poll_view">See whole polled...</a>
</html>
<script>
$("#whole_poll_view").click(function(){
	$("#polled_view").hide();
	$("#pollview-middle").show();
		
});

</script>