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
</head>
<body>
	<form action="" method="post">
		<select name="semister" id="semister">
			<option value="">select semister</option>
			<?php  foreach ($semister as $s) {?>
				<option value="<?php  echo $s->id; ?>">
					<?php  echo $s->name; ?>	
					</option>				
			<?php  } ?>		
		</select>		
		<select name="subject" id="subject">
			<option value="">select subject</option>
			
		</select>		
	</form>


		<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		// $(selector).functionname();
		$(document).ready(function () {
			// alert("bmdolm");
			
			$('#semister').change(function(){
				var s=$('#semister').val();
				// console.log(s);
				$.ajax({
						url:'select_subject.php',
						data:{'semister':s},
						method:'post',
						dataType:'text',
						success:function(resp){
						 // console.log(resp);
							$('#subject').html('');
							$('#subject').html(resp);
						}
					});
			});
				
		});
	</script>
</body>
</html>