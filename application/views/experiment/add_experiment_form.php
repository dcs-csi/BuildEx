<h2>BuildEx: Experiment</h2>
<? //echo '<pre>'; print_r($this->session->userdata); echo '</pre>'; ?>
<script>
	$.count = 1;
	$(function() {
	    $('#object1')
	    	.click(function(eventClick, posX, posY){
		    	posX = typeof posX !== 'undefined' ? posX : null;
				posY = typeof posY !== 'undefined' ? posY : null;

				var htmlData='<div id="obj'+$.count+'" class="draggable ui-widget-content ui-draggable" style="height:100px; width:100px;';
				if (posX != null && posY != null){
					alert('x' + posX);
					alert('y' + posY);
					htmlData += ' left:'+ Math.abs(posX - 439) +'px; top:'+ Math.abs(posY - 124) +'px;"';
				}
				else{
					htmlData += '"';
				}

				htmlData += '><div id="editable'+$.count+'" class="editable" style="color:black">Object</div><div id="pos'+$.count+'X"></div><div id="pos'+$.count+'Y"></div></div>';
				
				$('.demo').append(htmlData);
		        $('.draggable').draggable({
		        	drag: function(){
			            var offset1 = $(this).offset();
			            var xPos1 = offset1.left;
			            var yPos1 = offset1.top;
			            var element = $(this).attr('id');
			            var number = element.substring(3);
			            $('#pos'+number+'X').text('x: ' + xPos1);
			            $('#pos'+number+'Y').text('y: ' + yPos1);
			        }
	        })
		    .resizable()
		    .click(function(){
		        if ( $(this).is('.ui-draggable-dragging') ) {
		            return;
		        }
		        $(this).draggable( "option", "disabled", true );
		        $(this).attr('contenteditable','true');
		    })
		    .blur(function(){
		        $(this).draggable( 'option', 'disabled', false);
		        $(this).attr('contenteditable','false');
		    });
	        $.count++;
	    });
	    $("#getObjectValues").click(function () {
			var x = new Array();
			for(i=1; i<$.count; i++){
				//if (i!=1) {msg+=","}
				var offset = $('#obj'+i).offset();
		        var xPos = offset.left;
		        var yPos = offset.top;
		   		var data = new Array();
		   		data[0] = xPos;
		   		data[1] = yPos;
		   		x.push(data);
			}
			
		   	$.ajax({
		   		url: '<?=base_url()?>builder/save',
		   		type:"POST",
		   		data:{
		   			'msg':x,
		   			'eid':'<?=$eid?>'
		   		},
		   		dataType: 'json',
		   		complete: function(data) {
		   			//alert("success");
		   			//alert(data[0][0]);
		   			alert(data.responseText);
		   			window.location.href = "<?php echo site_url($this->session->userdata('active_role').'/experiments'); ?>";
		   		},
		
		   	});
		});
	    
		


	    
	});

</script>
<div id="builder" class="row full">
	
	<!-- Toolbar -->
	<div id="pane" class="large-3 column" style="height:500px; background:gray">
		<div style="color:white">
			<p>Toolbar</p>
		</div>
		<!-- 
		<div id="draggable" class="ui-widget-content">
		  <p>Object</p>
		</div> 
		-->
		<a id="object1"class = "button small">Create Object1</a>
		<a id="getObjectValues"class = "button small">Save Environment</a>
	</div>

	<!-- Workspace -->
	<div id="workspace" class="large-9 column" style="height:500px; background:black;">
		<div style="color:white">
			<p>Workspace</p>
		</div>
		<div class='demo'></div>
		<!-- <div id="d">
			Text to edit
		</div> -->
	</div>
</div>

<? 
	if(isset($var)){
		foreach ($var as $obj){
			echo '<script>';
			echo '$(function() {';
			echo '$("#object1").trigger("click",['.$obj[0].','.$obj[1].']);';
			echo '})';
			echo '</script>';
		}
	}
?>

