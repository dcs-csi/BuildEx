$(function() {
	$.count = 1;
	$.page = 1;
	$.current_page = 1;

    $('#question')
    	.click(function(eventClick, posX, posY){
	    	posX = typeof posX !== 'undefined' ? posX : null;
			posY = typeof posY !== 'undefined' ? posY : null;
			
			var htmlData='<div id="qtn'+$.count+'" class="draggable ui-widget-content" ' + 'data-page="' + $.page + '"';

			if (posX != null && posY != null){
				// alert('x' + posX);
				// alert('y' + posY);
				htmlData += 'style="left:'+ Math.abs(posX - 439) +'px; top:'+ Math.abs(posY - 124) +'px;""';
			}

			htmlData += '><a href="#" class="delete"></a><div id="qtneditable'+$.count+'" class="editable" data-placeholder="Enter Question" ></div></div>';

			var temp = $.count;

			$('.demo').append(htmlData);	
	        $('.draggable').draggable({
	        	containment: "#workspace",
	        	scroll: false,
	        	snap: false,
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
		    });
		    $('#qtneditable'+temp).click(function(){
		        if ( $(this).is('.ui-draggable-dragging') ) {
		            return;
		        }
		        $('.draggable').draggable( "option", "disabled", true );
		        $(this).attr('contenteditable','true');
		    })
		    .blur(function(){
		        $('.draggable').draggable( 'option', 'disabled', false);
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
			
			var htmlData='<div id="inp'+$.count+'" class="draggable ui-widget-content" ' + 'data-page="' + $.page + '"';

			if (posX != null && posY != null){
				// alert('x' + posX);
				// alert('y' + posY);
				htmlData += 'style="left:'+ Math.abs(posX - 439) +'px; top:'+ Math.abs(posY - 124) +'px;""';
			}
			
			htmlData += '><a href="#" class="delete"></a><div id="inpeditable'+$.count+'" class="editable" data-placeholder="Enter Input" ></div></div>';

			var temp = $.count;

			$('.demo').append(htmlData);	
	        $('.draggable').draggable({
	        	containment: "#workspace",
	        	scroll: false,
	        	snap: false,
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
		    });
		    $('#inpeditable'+temp).click(function(){
		        if ( $(this).is('.ui-draggable-dragging') ) {
		            return;
		        }
		        $('.draggable').draggable( "option", "disabled", true );
		        $(this).attr('contenteditable','true');
		    })
		    .blur(function(){
		        $('.draggable').draggable( 'option', 'disabled', false);
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

	$('#button')
    	.click(function(eventClick, posX, posY){
	    	posX = typeof posX !== 'undefined' ? posX : null;
			posY = typeof posY !== 'undefined' ? posY : null;

			var htmlData='<div id="btn'+$.count+'" class="draggable" ' + 'data-page="' + $.page + '" ';
			if (posX != null && posY != null){
				alert('x' + posX);
				alert('y' + posY);
				htmlData += 'style="left:'+ Math.abs(posX - 439) +'px; top:'+ Math.abs(posY - 124) +'px;""';
			}
			
			// faulty -- contentEditable=true data-ph="My Placeholder String"
			htmlData += 'style="width:150px; height:60"><button id="editable'+$.count+'" style="width:100%; height:100%; margin-bottom:0px; padding:0px">Button</button><a href="#" class="delete"></a></div>';
			
			var temp = $.count;

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
		    });
		    $('#editable'+temp).click(function(){
		        if ( $(this).is('.ui-draggable-dragging') ) {
		            return;
		        }
		        $('#btn'+temp).draggable( "option", "disabled", true );
		        $(this).attr('contenteditable','true');
		    })
		    $(document).click(function(e){
		    	if(e.target.id != ('editable'+temp)){
			        $('#btn'+temp).draggable( 'option', 'disabled', false);
			        $('#editable'+temp).attr('contenteditable','false');
			    }
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
			htmlData += 'style="height:25px; width:120px;"><input type="radio" id="radeditable'+$.count+'" name='+$.page+'" value="radiobutton">Radio Button<a href="#" class="delete"></a></div>';
			
			$('.demo').append(htmlData);	
	        $('.radiosnap.draggable').draggable({
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
	        $('.checksnap.draggable').draggable({
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
			htmlData += 'style="height:25px; width:140px;"> <select id="drpeditable'+$.count+'" style="position:absolute; width:160px; height:23px;"> <option value="addoption">Add Option</option> <option value="sample" selected="selected">dropdown</option> </select> <input id="drpinput'+$.count+'" type="text" name="" value="" placeholder="Add Option" style="position:absolute; width:140px; height:23px;"><a href="#" class="delete"></a></div>';
			

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
		    .click(function(){
		        $(this).draggable( "option", "disabled", true );
		        $(this).attr('contenteditable','true');
		    });
		    
		    $('a.delete').on('click',function(e){
		        e.preventDefault();
		        btnID = $(this).closest('.draggable')[0].id;
		        //alert('Now deleting "'+objID+'"');
		        $('#'+btnID+'').remove();
		    });

		    var temp = $.count;
		    $('#drpinput'+temp).val($('#drpeditable'+temp+' option:selected').text());

		    $('#drpinput'+temp).blur(function(){
		    	//alert('1');
		        $('.draggable').draggable( 'option', 'disabled', false);
		        $('.draggable').attr('contenteditable','false');
		    });

			$('#drpeditable'+temp).on('change', function(){
				if($('#drpeditable'+temp+' option:selected').val() == 'addoption'){
					$('#drpinput'+temp).val('');
				}else{
					$('#drpinput'+temp).val($('#drpeditable'+temp+' option:selected').text());
				}
			});

			function edit(){
			    $('#drpeditable'+temp+' option:selected').text($('#drpinput'+temp).val());
			    $('#drpeditable'+temp+' option:selected').val($('#drpinput'+temp).val());
			}

			$('#drpinput'+temp).on('keyup', function(e){
			    if($('#drpeditable'+temp+' option:selected').val() != 'addoption' && $('#drpinput'+temp).val() != ""){
			        edit();
			    }
			});


			$('#drpinput'+temp).blur(function(){
				if($('#drpeditable'+temp+' option:selected').val() == 'addoption' && $('#drpinput'+temp).val() != ""){
					var str = ' <option value="'+$('#drpinput'+temp).val() + '">'+ $('#drpinput'+temp).val() +'</option>';
		            $('#drpeditable'+temp).append(str);
		            $('#drpeditable'+temp+' :last').attr("selected", "selected");
				}
				else if($('#drpeditable'+temp+' option:selected').val() != 'addoption' && $('#drpinput'+temp).val() == ""){
			    	$('#drpeditable'+temp+' option:selected').remove();
			    }
			});
	        $.count++;
    });

/*	$('#button')
    	.click(function(eventClick, posX, posY){
	    	posX = typeof posX !== 'undefined' ? posX : null;
			posY = typeof posY !== 'undefined' ? posY : null;

			var htmlData='<div id="btn'+$.count+'"';

			htmlData += '><button id="editable'+$.count+'" style="width:50px; height:200px margin-bottom:0px">move me, resize me</button></div>';
			
			$('.demo').append(htmlData);
			$('#btn2').resizable({grid: 10})
			.draggable({cancel:false, grid: [ 10,10 ] });
			$('#editable2').click(function(){
			    if ( $(this).is('.ui-draggable-dragging') ) {
			    return;
			    }
			    $(this).draggable( "option", "disabled", true);
			    $(this).attr('contentEditable',true);
		    })
		    .blur(function(){
			    $(this).draggable( 'option', 'disabled', false);
			    $(this).attr('contentEditable',false);
			})
    });*/

	    $("#getObjectValues").click(function () {
	    	//collect all question object
			var x = new Array();
			for(i=1; i<$.count; i++){
				if ($('#qtn'+i).offset() !== undefined){
					var offset = $('#qtn'+i).offset();
			        var xPos = offset.left;
			        var yPos = offset.top;
			   		var data = new Array();
			   		data[0] = xPos;
			   		data[1] = yPos;
			   		data[2] = "question";
			   		x.push(data);
			   	}

				if ($('#inp'+i).offset() !== undefined){
					var offset = $('#inp'+i).offset();
			        var xPos = offset.left;
			        var yPos = offset.top;
			   		var data = new Array();
			   		data[0] = xPos;
			   		data[1] = yPos;
			   		data[2] = "label";
			   		x.push(data);
			   	}

				if ($('#btn'+i).offset() !== undefined){
					var offset = $('#btn'+i).offset();
			        var xPos = offset.left;
			        var yPos = offset.top;
			   		var data = new Array();
			   		data[0] = xPos;
			   		data[1] = yPos;
			   		data[2] = "button";
			   		x.push(data);
			   	}

				if ($('#radbtn'+i).offset() !== undefined){
					var offset = $('#radbtn'+i).offset();
			        var xPos = offset.left;
			        var yPos = offset.top;
			   		var data = new Array();
			   		data[0] = xPos;
			   		data[1] = yPos;
			   		data[2] = "radio";
			   		x.push(data);
			   	}

				if ($('#chkbox'+i).offset() !== undefined){
					var offset = $('#chkbox'+i).offset();
			        var xPos = offset.left;
			        var yPos = offset.top;
			   		var data = new Array();
			   		data[0] = xPos;
			   		data[1] = yPos;
			   		data[2] = "checkbox";
			   		x.push(data);
			   	}

				if ($('#dropdown'+i).offset() !== undefined){
					var offset = $('#dropdown'+i).offset();
			        var xPos = offset.left;
			        var yPos = offset.top;
			   		var data = new Array();
			   		data[0] = xPos;
			   		data[1] = yPos;
			   		data[2] = "dropdown";
			   		x.push(data);
			   	}

				if ($('#sldr'+i).offset() !== undefined){
					var offset = $('#sldr'+i).offset();
			        var xPos = offset.left;
			        var yPos = offset.top;
			   		var data = new Array();
			   		data[0] = xPos;
			   		data[1] = yPos;
			   		data[2] = "slider";
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
/*$(function() {

    $('#bt1').on('click', function() {
        $(this).attr('contentEditable', true); 
    });
    $('#bt1').on('blur', function() {
        $(this).attr('contentEditable', false); 
    });
    $('#bt1').draggable({
    	cancel:false,
    	delay:300
    });
});*/