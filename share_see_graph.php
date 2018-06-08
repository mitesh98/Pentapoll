<html>
	

</html>

<?php
session_start();
include 'database.php';
//if(isset($_POST[]))

if(isset($_SESSION['share_poll_id']))
{
	$_GET['opt']=$_SESSION['share_poll_id'];
	$optionno= $_GET['opt']%10 ;
	//echo $optionno.'</br>';
	$other_poll_id=floor($_GET['opt']/10) ;
	//echo $other_poll_id;
	//---------------CHECKING POLLED OR NOT---------------------------------
	$que="SELECT * FROM `poller` WHERE emobile='{$_SESSION['emobile']}'  AND poll_id=$other_poll_id";
		$res1=mysqli_query($con,$que) OR die(mysqli_error($con));
		$polled=mysqli_num_rows($res1);
		if($polled==0)
		{
			$query="SELECT * FROM `count` WHERE poll_id=$other_poll_id";
	$result = mysqli_query($con,$query);
	$record=mysqli_fetch_array($result);
//-----------------
	$q1="Insert into `poller` (poll_id,emobile,question)values($other_poll_id,'{$_SESSION["emobile"]}','{$rec['question']}')";
	$i=mysqli_query($con,$q1) or die(mysqli_error($con));
	
//---------------------------------UPDATING COUNT----------------------------------------

	$record['totalcount']=$record['totalcount']+1;
	$update="UPDATE `count` SET totalcount={$record['totalcount']} WHERE poll_id=$other_poll_id";
	mysqli_query($con,$update);
	
	$q2="UPDATE `notification` SET totalcount={$record['totalcount']} WHERE poll_id=$other_poll_id";
	mysqli_query($con,$q2)or die(mysqli_error($con));
	
	//------------------------------Updating option count--------------------------------------------------

if(($_GET['opt']%10)==1)
{
	//echo "ka ho";
	$record['opt1count']+=1;
	$update="UPDATE count SET opt1count={$record['opt1count']} WHERE poll_id={$other_poll_id}";
	mysqli_query($con,$update);
	//echo "I m option1";
}
else if(($_GET['opt']%10)==2)
{
	$record['opt2count']+=1;
	$update="UPDATE count SET opt2count={$record['opt2count']} WHERE poll_id={$other_poll_id}";
	mysqli_query($con,$update);
	//echo "I m option2";
}
else if(($_GET['opt']%10)==3)
{
	$record['opt3count']+=1;
	$update="UPDATE count SET opt3count={$record['opt3count']} WHERE poll_id={$other_poll_id}";
	mysqli_query($con,$update);
	//echo "I m option3";
}
else if(($_GET['opt']%10)==4)
{
	$record['opt4count']+=1;
	$update="UPDATE count SET opt4count={$record['opt4count']} WHERE poll_id={$other_poll_id}";
	mysqli_query($con,$update);
	//echo "I m option4";
}
else if(($_GET['opt']%10)==5)
{
	$record['opt5count']+=1;
	$update="UPDATE count SET opt5count={$record['opt5count']} WHERE poll_id={$other_poll_id}";
	mysqli_query($con,$update);
	//echo "I m option5";
}

//echo $option1count;
?>
<?php
		}
	//-------------------
	$query="SELECT * FROM `count` WHERE poll_id=$other_poll_id";
	$result = mysqli_query($con,$query);
	$record=mysqli_fetch_array($result);
	$que="SELECT * FROM `polldetail`  WHERE poll_id=$other_poll_id";
	$res = mysqli_query($con,$que);
	$rec=mysqli_fetch_array($res);
	
	echo $rec['question'];
	
	

//----------------------GRAPH------------------------------------------->
?>
<html>
  <head>
	  
    <!--Load the AJAX API-->
	 

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	  <div id="chart_div<?= $other_poll_id?>"></div>
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
          ['<?= $rec['option1'] ?>', <?= $record['opt1count'] ?>],
          ['<?= $rec['option2'] ?>', <?= $record['opt2count'] ?>],
          ['<?= $rec['option3'] ?>', <?= $record['opt3count'] ?>],
          ['<?= $rec['option4'] ?>', <?= $record['opt4count'] ?>],
          ['<?= $rec['option5'] ?>', <?= $record['opt5count'] ?>]
        ]);

 
	//var chartwidth = $('.question-image').width();
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div<?= $other_poll_id ?>'));
        chart.draw(data, options);
        var options = {
  width: 400,
  height: 400,
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




<?php
	unset($_SESSION['share_poll_id']);
}
?>