<?php
	require_once "connect.php";
	$sql="select * from semister order by id 	 ";
	$result=$conn->query($sql);
	$semister=[];
	while ($row=$result->fetch_object()) {
		array_push($semister, $row);
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
	<form>
	<div id="sub_add">
  <div class="input-group" id="selection">
      <select name="semister" id="semister" class="semister">
			<option value="">select semister</option>
			<?php  foreach ($semister as $s) {?>
				<option value="<?php  echo $s->id; ?>">
					<?php  echo $s->name; ?>	
					</option>				
			<?php  } ?>		
		</select>		
		<select name="subject" id="subject" class="subject">
			<option value="">select subject</option>
		</select>
<button class="btn btn-primary" id="add_more" type="button">+</button>

  </div>
</div>

</form>
		<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	

		<script type="text/javascript">
			$(function() {
	  //on click
	  $("form").on("click", "#add_more", function() {
	  	  $clone.find('.add_more').after("<button class='remove1' id='buttonless'><i class='fa fa-minus'></i></button>")
	    $("#selection").clone().appendTo("#sub_add");
	  });
	});
			
		</script>
	<script type="text/javascript">
		// $(selector).functionname();
		$(document).ready(function () {
			// alert("bmdolm");
			
			$('.semister').change(function(){
				var s=$('.semister').val();
				// console.log(s);
				$.ajax({
						url:'select_subject.php',
						data:{'semister':s},
						method:'post',
						dataType:'text',
						success:function(resp){
						 console.log(resp);
							$('.subject').html('');
							$('.subject').html(resp);
						}
					});
			});
				
		});
	</script>
	
	
</body>
</html>