<?php
session_start();
include 'database.php';
$poll_id= $_POST['opt'];
$q="SELECT * FROM `comment` WHERE `poll_id`='$poll_id'";
$res=mysqli_query($con,$q) or die(mysqli_error($con));
while($row=mysqli_fetch_assoc($res)){
	$que="SELECT * FROM `signup` WHERE emobile='{$row['emobile']}'";
	$result=mysqli_query($con,$que);
	$row_user=mysqli_fetch_assoc($result);
	
	echo '<br>'.'</div>'.'   <title>comment</title>
</head>
<body>
<section  class= "container-fluid">
<div class="posted-comment-section">
        <div class="pro-pic">
		<button class="photo" style="float: left; border-radius: 100%;width: 30px;height: 30px;margin-bottom:-0.9em ;margin-right:.8em"></button><!--profile pic-->
    <P style="margin-top: 1em">'.$row_user['username'].'</P>

        </div>

        <div style="border:1px solid teal; padding: .5em">
        <p>'
			.$row['comment'].
           
       ' </p>

        </div>

       
    </div>


</section>
<style>

   section{

        padding:em;
        width: 50vh;
    }

    .pro-pic{

        margin-bottom: 1.5em;
    }
	.photo{
	background-image:url("'.$row_user['pic'].'");
	background-size:cover;
	background-repeat:no-repeat;
	}
</style>
</body>';
}
?>
<html>
<script type="text/javascript" src="jquery.js"></script>
<div>


<textarea class="col-lg-9" name="message" placeholder="Write your comment" rows="2" cols="75" id="comment_box<?=$poll_id?>" style="resize:none;width:100%;"></textarea>

            <button type="button" class="" style="height:100%;" id="comment_submit<?=$poll_id?>">
                <i class="glyphicon glyphicon-send"></i>
            </button>
</div>
<div id="comment<?=$poll_id?>"></div>
		
</html>
<script>
	
var poll_id=<?= $poll_id ?>;
$("<?='#comment_box'.$poll_id?>").keypress(function(e){
	if(e.which == 13){
	var comment=$("<?='#comment_box'.$poll_id?>").val();
	
	$.post("comment_insert.php",{comment:comment,poll_id:poll_id},function(data){
	$("<?='#comment'.$poll_id?>").html(data);
	 });
	
}
});
	$("<?='#comment_submit'.$poll_id?>").click(function(){
	var comment=$("<?='#comment_box'.$poll_id?>").val();
	
	$.post("comment_insert.php",{comment:comment,poll_id:poll_id},function(data){
	$("<?='#comment'.$poll_id?>").html(data);
	 });
	
});

</script>

 