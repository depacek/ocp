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
	<input type="hidden" value="1" id="hiddencount">
	<div class="sub_add cloned-row">
	<span class = "semadd">  
		<select name="semister" id="semister1" class="semister">
			<option value="">select semister</option>
			<?php  foreach ($semister as $s) {?>
				<option value="<?php  echo $s->id; ?>"><?php  echo $s->name; ?></option>				
			<?php  } ?>		
		</select>	
     </span>
     <span class = "subadd"> 
     <select name="subject" id="subject1" class="subject">
			<option value="">select subject</option>								
		</select>       		 
        <button class="add_more" id="buttonvalue">+</button>
     </span>
  </div>

 
  
		<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript">
		var count=0;
	    $(document).on("click", ".add_more", function () { 
	    	var c=$('#hiddencount').val();
	    	c= parseInt(c) +1;
	    	$('#hiddencount').val(c);
	        var $clone = $('.cloned-row:eq(0)').clone(true);
	        //alert("Clone number" + clone);
	         $clone.find('span.semadd > [id]').each(function(){this.id='semister'+c});
	         $clone.find('span.subadd > [id]').each(function(){this.id='subject'+c});
	         $clone.find('.add_more').after("<button class='remove1' id='buttonless'>-</button>")
	        $clone.attr('id', "added"+(++count));
	        $(this).parents('.sub_add').after($clone);
	    });
	    $(document).on('click', ".remove1", function (){
	        var len = $('.cloned-row').length;
	        if(len>1){
	            $(this).parents('.sub_add').remove();
	        }
	    }); 
	</script>
	<script type="text/javascript">
		// $(selector).functionname();
		$(document).ready(function () {
			// alert("bmdolm");
			
			$('.semister').bind('change',function(){
				var a=$(this).attr('id');
				var n=a.substr(8);
				 s=$('#semister'+n).val();
				$.ajax({
						url:'select_subject.php',
						data:{'semister':s},
						method:'post',
						dataType:'text',
						success:function(resp){
							var x='#subject'+n;
							$(x).html('');
							$(x).html(resp);
						}
					});
			});
				
		});
	</script>
	
</body>
</html>