<h2>BuildEx: Experiment</h2>
<? //echo '<pre>'; print_r($this->session->userdata); echo '</pre>'; ?>
<script>
	$.count = 1;
	$.page = 1;
	$.current_page = 1;
	$(function() {
	    $('#question')
	    	.click(function(eventClick, posX, posY){
		    	posX = typeof posX !== 'undefined' ? posX : null;
				posY = typeof posY !== 'undefined' ? posY : null;

				var htmlData='<div id="qtn'+$.count+'" class="draggable ui-widget-content ui-draggable" ' + 'data-page="' + $.page + '" ';
				if (posX != null && posY != null){
					// alert('x' + posX);
					// alert('y' + posY);
					htmlData += 'style="left:'+ Math.abs(posX - 439) +'px; top:'+ Math.abs(posY - 124) +'px;""';
				}
				
				// faulty -- contentEditable=true data-ph="My Placeholder String"
				htmlData += '><a href="#" class="delete"></a><div id="editable'+$.count+'" class="editable" style="color:black">Question</div><div id="pos'+$.count+'X"></div><div id="pos'+$.count+'Y"></div></div>';
				
				$('.demo').append(htmlData);	
		        $('.draggable').draggable({
		        	containment: "#workspace",
		        	scroll: false,
		        	// drag: function(){
			        //     var offset1 = $(this).offset();
			        //     var xPos1 = offset1.left;
			        //     var yPos1 = offset1.top;
			        //     var element = $(this).attr('id');
			        //     //substring depends on the length of id string
			        //     var number = element.substring(3);
			        //     $('#pos'+number+'X').text('x: ' + xPos1);
			        //     $('#pos'+number+'Y').text('y: ' + yPos1);
			        // }
		        })
			    .resizable({
			    	containment: "#workspace"
			    })
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
			    $('a.delete').on('click',function(e){
			        e.preventDefault();
			        qtnID = $(this).closest('.draggable')[0].id;
			        //alert('Now deleting "'+qtnID+'"');
			        $('#'+qtnID+'').remove();
			    });
	        $.count++;
	    });

		$('#textinput')
	    	.click(function(eventClick, posX, posY){
		    	posX = typeof posX !== 'undefined' ? posX : null;
				posY = typeof posY !== 'undefined' ? posY : null;

				var htmlData='<div id="inp'+$.count+'" class="draggable ui-widget-content ui-draggable" ' + 'data-page="' + $.page + '" ';
				if (posX != null && posY != null){
					alert('x' + posX);
					alert('y' + posY);
					htmlData += 'style="left:'+ Math.abs(posX - 439) +'px; top:'+ Math.abs(posY - 124) +'px;""';
				}
				
				// faulty -- contentEditable=true data-ph="My Placeholder String"
				htmlData += '><a href="#" class="delete"></a><div id="editable'+$.count+'" class="editable" style="color:black">Text Input</div><div id="pos'+$.count+'X"></div><div id="pos'+$.count+'Y"></div></div>';
				
				$('.demo').append(htmlData);	
		        $('.draggable').draggable({
		        	containment: "#workspace",
		        	scroll: false,
		        	// drag: function(){
			        //     var offset1 = $(this).offset();
			        //     var xPos1 = offset1.left;
			        //     var yPos1 = offset1.top;
			        //     var element = $(this).attr('id');
			        //     //substring depends on the length of id string
			        //     var number = element.substring(3);
			        //     $('#pos'+number+'X').text('x: ' + xPos1);
			        //     $('#pos'+number+'Y').text('y: ' + yPos1);
			        // }
	        })
		    .resizable({
		    	containment: "#workspace"
		    })
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
		    $('a.delete').on('click',function(e){
		        e.preventDefault();
		        inpID = $(this).closest('.draggable')[0].id;
		        //alert('Now deleting "'+objID+'"');
		        $('#'+inpID+'').remove();
		    });
	        $.count++;
	    });

		$('#button')
	    	.click(function(eventClick, posX, posY){
		    	posX = typeof posX !== 'undefined' ? posX : null;
				posY = typeof posY !== 'undefined' ? posY : null;

				var htmlData='<div id="btn'+$.count+'" class="draggable ui-widget-content ui-draggable" ' + 'data-page="' + $.page + '" ';
				if (posX != null && posY != null){
					alert('x' + posX);
					alert('y' + posY);
					htmlData += 'style="left:'+ Math.abs(posX - 439) +'px; top:'+ Math.abs(posY - 124) +'px;""';
				}
				
				// faulty -- contentEditable=true data-ph="My Placeholder String"
				htmlData += '><button id="editable'+$.count+'" style="width:100%; height:100%">Button</button><a href="#" class="delete"></a></div>';
				
				$('.demo').append(htmlData);	
		        $('.draggable').draggable({
		        	containment: "#workspace",
		        	scroll: false,
		        	cancel: false,
		        	// drag: function(){
			        //     var offset1 = $(this).offset();
			        //     var xPos1 = offset1.left;
			        //     var yPos1 = offset1.top;
			        //     var element = $(this).attr('id');
			        //     //substring depends on the length of id string
			        //     var number = element.substring(3);
			        //     $('#pos'+number+'X').text('x: ' + xPos1);
			        //     $('#pos'+number+'Y').text('y: ' + yPos1);
			        // }
		        })
			    .resizable({
			    	containment: "#workspace"
			    })
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
			    $('a.delete').on('click',function(e){
			        e.preventDefault();
			        btnID = $(this).closest('.draggable')[0].id;
			        //alert('Now deleting "'+objID+'"');
			        $('#'+btnID+'').remove();
			    });
			    
		        $.count++;
	    });
	
		$('#radiobutton')
	    	.click(function(eventClick, posX, posY){
		    	posX = typeof posX !== 'undefined' ? posX : null;
				posY = typeof posY !== 'undefined' ? posY : null;

				var htmlData='<div id="radbtn'+$.count+'" class="radiosnap draggable ui-draggable" ' + 'data-page="' + $.page + '" ';
				if (posX != null && posY != null){
					alert('x' + posX);
					alert('y' + posY);
					htmlData += 'style="left:'+ Math.abs(posX - 439) +'px; top:'+ Math.abs(posY - 124) +'px;"';
				}
				
				// faulty -- contentEditable=true data-ph="My Placeholder String"
				htmlData += 'style="height:25px; width:120px;"><input type="radio" id="radeditable'+$.count+'" name='+$.page+'value="radiobutton">Radio Button<a href="#" class="delete"></a></div>';
				
				$('.demo').append(htmlData);	
		        $('.draggable').draggable({
		        	containment: "#workspace",
		        	scroll: false,
		        	cancel: false,
		        	snap: '.radiosnap'
		        	// drag: function(){
			        //     var offset1 = $(this).offset();
			        //     var xPos1 = offset1.left;
			        //     var yPos1 = offset1.top;
			        //     var element = $(this).attr('id');
			        //     //substring depends on the length of id string
			        //     var number = element.substring(3);
			        //     $('#pos'+number+'X').text('x: ' + xPos1);
			        //     $('#pos'+number+'Y').text('y: ' + yPos1);
			        // }
		        })
			    //.resizable({
			    	// containment: "#workspace"
			    //})
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
			    $('a.delete').on('click',function(e){
			        e.preventDefault();
			        btnID = $(this).closest('.draggable')[0].id;
			        //alert('Now deleting "'+objID+'"');
			        $('#'+btnID+'').remove();
			    });
			    
		        $.count++;
	    });

		$('#checkbox')
	    	.click(function(eventClick, posX, posY){
		    	posX = typeof posX !== 'undefined' ? posX : null;
				posY = typeof posY !== 'undefined' ? posY : null;

				var htmlData='<div id="chkbox'+$.count+'" class="checksnap draggable ui-draggable" ' + 'data-page="' + $.page + '" ';
				if (posX != null && posY != null){
					alert('x' + posX);
					alert('y' + posY);
					htmlData += 'style="left:'+ Math.abs(posX - 439) +'px; top:'+ Math.abs(posY - 124) +'px;"';
				}
				
				// faulty -- contentEditable=true data-ph="My Placeholder String"
				htmlData += 'style="height:25px; width:120px;"><input type="checkbox" id="chkeditable'+$.count+'" name='+$.page+'value="checkbox">Check Box<a href="#" class="delete"></a></div>';
				
				$('.demo').append(htmlData);	
		        $('.draggable').draggable({
		        	containment: "#workspace",
		        	scroll: false,
		        	cancel: false,
		        	snap: '.checksnap'
		        	// drag: function(){
			        //     var offset1 = $(this).offset();
			        //     var xPos1 = offset1.left;
			        //     var yPos1 = offset1.top;
			        //     var element = $(this).attr('id');
			        //     //substring depends on the length of id string
			        //     var number = element.substring(3);
			        //     $('#pos'+number+'X').text('x: ' + xPos1);
			        //     $('#pos'+number+'Y').text('y: ' + yPos1);
			        // }
		        })
			    //.resizable({
			    	// containment: "#workspace"
			    //})
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
			    $('a.delete').on('click',function(e){
			        e.preventDefault();
			        btnID = $(this).closest('.draggable')[0].id;
			        //alert('Now deleting "'+objID+'"');
			        $('#'+btnID+'').remove();
			    });
			    
		        $.count++;
	    });

		$('#dropdown')
	    	.click(function(eventClick, posX, posY){
		    	posX = typeof posX !== 'undefined' ? posX : null;
				posY = typeof posY !== 'undefined' ? posY : null;

				var htmlData='<div id="dropdown'+$.count+'" class="draggable ui-draggable" ' + 'data-page="' + $.page + '" ';
				if (posX != null && posY != null){
					alert('x' + posX);
					alert('y' + posY);
					htmlData += 'style="left:'+ Math.abs(posX - 439) +'px; top:'+ Math.abs(posY - 124) +'px;"';
				}
				
				// faulty -- contentEditable=true data-ph="My Placeholder String"
				htmlData += 'style="height:40px; width:140px;"> <select id="drpeditable'+$.count+'" style="position:absolute; width:160px; height:23px;"> <option value="add">Add</option> <option value="sample" selected="selected">dropdown</option> </select> <input id="drpinput'+$.count+'" type="text" name="" value="" style="position:absolute; width:140px; height:23px;"><a href="#" class="delete"></a></div>';
				

				$('.demo').append(htmlData);	
		        $('.draggable').draggable({
		        	containment: "#workspace",
		        	scroll: false,
		        	cancel: false,
		        	handle: "input",
		        	// drag: function(){
			        //     var offset1 = $(this).offset();
			        //     var xPos1 = offset1.left;
			        //     var yPos1 = offset1.top;
			        //     var element = $(this).attr('id');
			        //     //substring depends on the length of id string
			        //     var number = element.substring(3);
			        //     $('#pos'+number+'X').text('x: ' + xPos1);
			        //     $('#pos'+number+'Y').text('y: ' + yPos1);
			        // }
		        })
			    //.resizable({
			    	// containment: "#workspace"
			    //})
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
			    $('a.delete').on('click',function(e){
			        e.preventDefault();
			        btnID = $(this).closest('.draggable')[0].id;
			        //alert('Now deleting "'+objID+'"');
			        $('#'+btnID+'').remove();
			    });

			    var temp = $.count;
			    $('#drpinput'+temp).val($('#drpeditable'+temp+' option:selected').text());

				$('#drpeditable'+temp).on('change', function(){
				    $('#drpinput'+temp).val($('#drpeditable'+temp+' option:selected').text());
				});

				function edit(){
				    $('#drpeditable'+temp+' option:selected').text($('#drpinput'+temp).val());
				    $('#drpeditable'+temp+' option:selected').val($('#drpinput'+temp).val());
				}

				$('#drpinput'+temp).on('keyup', function(e){
				    if($('#drpeditable'+temp+' option:selected').val() != 'add'){
				        edit();
				    } else {
				        var code = e.keyCode || e.which;
				        if (code == 13){
				            var str = ' <option value="'+$('#drpinput'+temp).val() + '">'+ $('#drpinput'+temp).val() +'</option>';
				            $('#drpeditable'+temp).append(str);
				            $('#drpeditable'+temp+' :last').attr("selected", "selected");
				        }
				    };
				});

				$('#drpinput'+temp).on('focus', function(e){
				    if($('#drpeditable'+temp+' option:selected').val() == 'add'){
				         $('#drpinput'+temp).val('');
				        var code = e.keyCode || e.which;
				        if (code == 13){
				            var str = ' <option value="'+$('#drpinput'+temp).val() + '">'+ $('#drpinput'+temp).val() +'</option>';
				            $('#drpeditable'+temp).append(str);
				            $('#drpeditable'+temp+' :last').attr("selected", "selected");
				        }
				    };
				});
		        $.count++;
	    });

		// $('#button')
	 //    	.click(function(eventClick, posX, posY){
		//     	posX = typeof posX !== 'undefined' ? posX : null;
		// 		posY = typeof posY !== 'undefined' ? posY : null;

		// 		var htmlData='<div id="btn'+$.count+'"';

		// 		htmlData += '><button id="editable'+$.count+'" style="width:50px; height:200px margin-bottom:0px">move me, resize me</button></div>';
				
		// 		$('.demo').append(htmlData);
		// 		$('#btn2').resizable({grid: 10})
		// 		.draggable({cancel:false, grid: [ 10,10 ] });
		// 		$('#editable2').click(function(){
		// 		    if ( $(this).is('.ui-draggable-dragging') ) {
		// 		    return;
		// 		    }
		// 		    $(this).draggable( "option", "disabled", true);
		// 		    $(this).attr('contentEditable',true);
		// 	    })
		// 	    .blur(function(){
		// 		    $(this).draggable( 'option', 'disabled', false);
		// 		    $(this).attr('contentEditable',false);
		// 		})
	 //    });

	    $("#getObjectValues").click(function () {
	    	//collect all question object
			var x = new Array();
			for(i=1; i<$.count; i++){
				if ($('#qtn'+i).offset() !== undefined){
	    			//alert($('#qtn'+i).offset().left);
					var offset = $('#qtn'+i).offset();
			        var xPos = offset.left;
			        var yPos = offset.top;
			   		var data = new Array();
			   		data[0] = xPos;
			   		data[1] = yPos;
			   		x.push(data);
			   	}
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
		   			// alert("Saved Successfully!");
		   			//alert(data[0][0]);
		   			//alert(data.responseText);
		   			window.location.href = "<?php echo site_url($this->session->userdata('active_role').'/experiments'); ?>";
		   		},
		
		   	});
		});
		
		$('body').on('paste', '.ui-widget-content', function (e) {
		    setTimeout(function() {
		        console.log($(e.target).html($(e.target).text()));
		    }, 0);
		});

		$("#newPage").click(function(){
			$.page++;
			$.current_page++;
			for(i=1; i<$.count; i++){
				if(document.getElementById('qtn'+i)){
					document.getElementById('qtn'+i).style.visibility = 'hidden';
				}

				if(document.getElementById('inp'+i)){
					document.getElementById('inp'+i).style.visibility = 'hidden';
				}

				if(document.getElementById('btn'+i)){
					document.getElementById('btn'+i).style.visibility = 'hidden';
				}
			}
		});

		$("#prevPage").click(function(){
			if($.current_page > 1){
				$.current_page--;
			}

			//hide all objects first
			for(i=1; i<$.count; i++){
				if(document.getElementById('qtn'+i)){
					document.getElementById('qtn'+i).style.visibility = 'hidden';
				}

				if(document.getElementById('inp'+i)){
					document.getElementById('inp'+i).style.visibility = 'hidden';
				}

				if(document.getElementById('btn'+i)){
					document.getElementById('btn'+i).style.visibility = 'hidden';
				}
			}

			//get objects for current page
			for(i=1; i<$.count; i++){
				if(document.getElementById('qtn'+i) && $("#qtn"+i).data('page') == $.current_page){
					document.getElementById('qtn'+i).style.visibility = 'visible';
				}

				if(document.getElementById('inp'+i) && $("#inp"+i).data('page') == $.current_page){
					document.getElementById('inp'+i).style.visibility = 'visible';
				}

				if(document.getElementById('btn'+i) && $("#btn"+i).data('page') == $.current_page){
					document.getElementById('btn'+i).style.visibility = 'visible';
				}
			}
		});

		$("#nextPage").click(function(){
			if($.current_page < $.page){
				$.current_page++;
			}

			//hide all objects first
			for(i=1; i<$.count; i++){
				if(document.getElementById('qtn'+i)){
					document.getElementById('qtn'+i).style.visibility = 'hidden';
				}

				if(document.getElementById('inp'+i)){
					document.getElementById('inp'+i).style.visibility = 'hidden';
				}

				if(document.getElementById('btn'+i)){
					document.getElementById('btn'+i).style.visibility = 'hidden';
				}
			}

			//get objects for current page
			for(i=1; i<$.count; i++){
				if(document.getElementById('qtn'+i) && $("#qtn"+i).data('page') == $.current_page){
					document.getElementById('qtn'+i).style.visibility = 'visible';
				}

				if(document.getElementById('inp'+i) && $("#inp"+i).data('page') == $.current_page){
					document.getElementById('inp'+i).style.visibility = 'visible';
				}

				if(document.getElementById('btn'+i) && $("#btn"+i).data('page') == $.current_page){
					document.getElementById('btn'+i).style.visibility = 'visible';
				}
			}
		});


		
	});    
	// $(function() {

	//     $('#bt1').on('click', function() {
	//         $(this).attr('contentEditable', true); 
	//     });
	//     $('#bt1').on('blur', function() {
	//         $(this).attr('contentEditable', false); 
	//     });
	//     $('#bt1').draggable({
	//     	cancel:false,
	//     	delay:300
	//     });
	// });
	
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
		<a id="question"class = "button small">Create Question</a>
		<a id="textinput"class = "button small">Create Text Input</a>
		<a id="button"class = "button small">Create Button</a>
		<a id="radiobutton"class = "button small">Create Radio Button</a>
		<a id="checkbox"class = "button small">Create Check Box</a>
		<a id="dropdown"class = "button small">Create Dropdown</a>
		<a id="getObjectValues"class = "button small">Save Environment</a>
		<a id="prevPage"class = "button small">Previous Page</a>
		<a id="nextPage"class = "button small">Next Page</a>
		<a id="newPage"class = "button small">New Page</a>
	</div>

	<!-- Workspace -->
	<div class="large-9 column" style="height:500px; background:#f7f7f7;">
		<div>
			<p>Workspace</p>
		</div>
		<div id="workspace" class="demo panel callout" style="width:100%;height:432px;margin-right:0px">
		<!--div class='demo'></div-->
    	</div>
    	<!-- <select id="s1" style="position:absolute; width:160px; height:23px;left:0; top:0; border:0;">
            <option value="0">Addnew</option>
            <option value="100" selected="selected" >100</option>
            <option value="200">200</option>
            <option value="300">300</option>
            <option value="400">400</option>
        </select>
        <input id="drp" type="text" name="" value="" style="position:absolute; width:140px; height:23px; left:0; top:0;">

        <select id="s" style="position:absolute; width:160px; height:23px;left:100; top:100; border:0;">
            <option value="00">Addnew</option>
            <option value="1000" selected="selected" >1000</option>
            <option value="2000">2000</option>
            <option value="3000">3000</option>
            <option value="4000">4000</option>
        </select>
        <input id="drp1" type="text" name="" value="" style="position:absolute; width:140px; height:23px; left:100; top:100;"> -->
	</div>	
	
</div>

<? 
	if(isset($var)){
		foreach ($var as $obj){
			echo '<script>';
			echo '$(function() {';
			echo '$("#question").trigger("click",['.$obj[0].','.$obj[1].']);';
			echo '})';
			echo '</script>';
		}
	}
?>

