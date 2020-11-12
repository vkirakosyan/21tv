$(document).ready(function(){
var isMouseDown = false;
	var down_event;
	var _self;
	var Y;
	var X;
	var resize_change_block_width = null;
	var	resize_change_block_height = null; 

	function selectExample(shape, type, id) {
		var naturalWidth = document.getElementById(type+'_image_'+id).naturalWidth;
		var naturalHeight = document.getElementById(type+'_image_'+id).naturalHeight;

		var width = Number(document.getElementById(type+'_image_'+id).width);
		var index = naturalWidth/width;
		var indexHeight = naturalHeight/ Number(document.getElementById(type+'_image_'+id).height);
		$('#'+type+'_index_'+id).val(index ? index : 1);
		$('#'+type+'_indexHeight_'+id).val(indexHeight ? indexHeight : 1);
		var height = naturalHeight/indexHeight;
		document.getElementById(type+'_image_'+id).height = height;
		$('.'+type+'_naturalWidth_size_'+id).val(naturalWidth)
		$('.'+type+'_naturalHeight_size_'+id).val(naturalHeight) 
		$('#x_'+type+'_'+id).val(2);
		$('#y_'+type+'_'+id).val(2);
		console.log(index ? index : 1)
		switch (shape) {
			case 'ver':
				$('.resize-block-'+type+''+id).css({'width':width/index +'px', 'height' : height+'px'})
				$('.resize-change-block-'+type+'-'+id).css({'left' : width/index+10 +'px', 'top' : height - 5 +'px'})
				$('.'+type+'_width_size_'+id).val(naturalWidth/index)
				$('.'+type+'_height_size_'+id).val(naturalHeight)
			break;
			case 'hor':
				$('.resize-block-'+type+''+id).css({'width':width+'px', 'height' : height/indexHeight+'px'})
				$('.resize-change-block-'+type+'-'+id).css({'left' : width+10 +'px', 'top' : height/indexHeight - 5 +'px'})
				$('.'+type+'_width_size_'+id).val(naturalWidth)
				$('.'+type+'_height_size_'+id).val(naturalHeight/indexHeight)
				console.log('height',naturalHeight/indexHeight)
			break;
			case 'squ':
				var squ = width < height? width : height
				$('.resize-block-'+type+''+id).css({'width':squ+'px', 'height' : squ+'px'})
				$('.resize-change-block-'+type+'-'+id).css({'left' : squ + 10 +'px', 'top' : squ - 5 +'px'})
				var natural_squ = Math.floor(naturalWidth) < Math.floor(naturalHeight)? Math.floor(naturalWidth) : Math.floor(naturalHeight)
				$('.'+type+'_width_size_'+id).val(natural_squ)
				$('.'+type+'_height_size_'+id).val(natural_squ)
			break;
			case 'all':
				$('.resize-block-'+type+''+id).css({'width':width+'px', 'height' : height+'px'})
				$('.resize-change-block-'+type+'-'+id).css({'left' : width + 10 +'px', 'top' : height - 5 +'px'})
				$('.'+type+'_width_size_'+id).val(naturalWidth)
				$('.'+type+'_height_size_'+id).val(naturalHeight)
			break;
		}
	}

	$('#photo').change(function() {
		var input = $(this)[0];
		$('#img-preview').html('');
		for (i = 0; i < Object.keys(input.files).length; i++){
			if (input.files && input.files[i]) {
				var file_type=input.files[i].type;
				if (file_type.match('image.jpeg') || file_type.match('image.png')) {
					var reader = new FileReader();
					reader.c=i;
					reader.onload = function(e) {
						var c = this.c;
						$('#img-preview').append('<div class="row" ><div class="col-lg-6 col-md-6 col-sm-12 image_block" data-type="photo" data-id="'+c+'"><div class="resize-block resize-block-photo'+c+' "> </div><div class="resize-change-block-photo resize-change-block-photo-'+c+'" ></div><img style="height: 100%;" id="photo_image_'+c+'" src='+e.target.result+' ><input id="x_photo_'+c+'" type=hidden value="0" name="file_'+c+'_x"><input id="y_photo_'+c+'" type=hidden value="0" name="file_'+c+'_y"><input id="width_'+c+'" type=hidden class="photo_width_size_'+c+'" value="0" name="width_'+c+'"><input id="naturalWidth_'+c+'" type=hidden class="photo_naturalWidth_size_'+c+'" value="0" name="naturalWidth_'+c+'"><input id="naturalHeight_'+c+'" type=hidden class="photo_naturalHeight_size_'+c+'" value="0" name="naturalHeight_'+c+'"><input id="height_'+c+'" type=hidden class="photo_height_size_'+c+'" value="0" name="height_'+c+'"><input id="photo_index_'+c+'" type=hidden class="index" value="0" name="photo_index_'+c+'"><input id="photo_indexHeight_'+c+'" type=hidden class="index" value="0" name="photo_indexHeight_'+c+'"></div><div class="col-lg-6 col-md-6 col-sm-12 examples row"><div class="col-md-4 col-lg-4"><div class="vertically" data-type="photo" data-id='+c+' ></div></div><div class="col-md-4 col-lg-4"><div data-type="photo" data-id='+c+' class="horizontal"></div></div><div class="col-md-4 col-lg-4"><div data-type="photo" data-id='+c+' class="square"></div></div></div></div>');
						setTimeout(function (){
							selectExample('all', 'photo', c)
						},300)
						
					} 
					reader.readAsDataURL(input.files[i]);
				} else {
					console.error('no image');
				}
			} else {
				console.error('error');
			}
		}
	});

	$('#mainpic').change(function() {
		var input = $(this)[0];
		$('#mainpic-preview').html('');
		for (i = 0; i < Object.keys(input.files).length; i++){
			console.log(input.files[i].type)
			if (input.files && input.files[i]) {
				var file_type=input.files[i].type;
				if (file_type.match('image.jpeg') || file_type.match('image.png')) {
					var reader = new FileReader();
					reader.c=i;
					reader.onload = function(e) {
						console.log(reader)
						var c = this.c;
						$('#mainpic-preview').append('<div class="row" ><div class="col-lg-6 col-md-6 col-sm-12 image_block" data-type="mainpic" data-id="'+c+'"><div class="resize-block resize-block-mainpic'+c+'"></div><div class="resize-change-block-mainpic resize-change-block-mainpic-'+c+'" ></div><img <img style="height: 100%;" id="mainpic_image_'+c+'" src='+e.target.result+'><input id="x_mainpic_'+c+'" type=hidden value="0" name="mainpic_file_'+c+'_x"><input id="y_mainpic_'+c+'" type=hidden value="0" name="mainpic_file_'+c+'_y"><input id="mainpic_width_size_'+c+'" type=hidden class="mainpic_width_size_'+c+'" value="0" name="mainpic_width_size_'+c+'"><input id="naturalWidth_'+c+'" type=hidden class="mainpic_naturalWidth_size_'+c+'" value="0" name="mainpic_naturalWidth_'+c+'"><input id="mainpic_naturalHeight_'+c+'" type=hidden class="mainpic_naturalHeight_size_'+c+'" value="0" name="mainpic_naturalHeight_'+c+'"><input id="mainpic_height_'+c+'" type=hidden class="mainpic_height_size_'+c+'" value="0" name="mainpic_height_size_'+c+'"><input id="mainpic_index_'+c+'" type=hidden class="index" value="0" name="mainpic_index_'+c+'"><input id="mainpic_indexHeight_'+c+'" type=hidden class="index" value="0" name="mainpic_indexHeight_'+c+'"></div><div class="col-lg-6 col-md-6 col-sm-12 examples row"><div class="col-md-4 col-lg-4"><div data-type="mainpic" data-id='+c+' class="vertically"></div></div><div class="col-md-4 col-lg-4"><div data-type="mainpic" data-id='+c+' class="horizontal"></div></div><div class="col-md-4 col-lg-4"><div data-type="mainpic" data-id='+c+'  class="square"></div></div></div></div>');
						setTimeout(function (){
							selectExample('all', 'mainpic', c)
						},300)

					} 
					reader.readAsDataURL(input.files[i]);
				} else {
					console.error('no image');
				}
			} else {
				console.error('error');
			}
		}
	});

	$(document).on('click','.examples .vertically', function(){
		selectExample('ver', $(this).attr('data-type'), $(this).attr('data-id'))
	})
	$(document).on('click', '.examples .horizontal', function(){
		selectExample('hor', $(this).attr('data-type'), $(this).attr('data-id'))
	})
	$(document).on('click', '.examples .square', function(){
		selectExample('squ', $(this).attr('data-type'), $(this).attr('data-id'))
	})
	var change_size = false;

	$(document).on('mousedown','.resize-change-block-photo', function(down_e){
		change_size = true;
		down_event = down_e;
		_self = $(this).closest('.image_block').find('.resize-block');
		resize_change_block_width = _self.width();
		resize_change_block_height = _self.height();
	})

	$(document).on('mousedown','.resize-change-block-mainpic', function(down_e){
		change_size = true;
		down_event = down_e;
		_self = $(this).closest('.image_block').find('.resize-block');
		resize_change_block_width = _self.width();
		resize_change_block_height = _self.height();
		
	})

	
	$(document).on('mousedown','.resize-block', function(down_e){
		isMouseDown = true;
		down_event = down_e
		_self = $(this);
	})
	$(document).on('mouseup','.image_block', function(up_e){
		var id = $(this).attr('data-id');
		var type = $(this).attr('data-type');
		if( isMouseDown ) {
			isMouseDown = false;
			change_size = false;
			$('#x_'+type+'_'+id).val(Number($('#x_'+type+'_'+id).val()) + X);
			$('#y_'+type+'_'+id).val(Number($('#y_'+type+'_'+id).val()) + Y);
			$('#y_'+type+'_'+id).val(Number($('#y_'+type+'_'+id).val()) < 0 ? 0 : $('#y_'+type+'_'+id).val() );
			$('#x_'+type+'_'+id).val(Number($('#x_'+type+'_'+id).val()) < 0 ? 0 : $('#x_'+type+'_'+id).val() );
			_self.css({'top' : $('#y_'+type+'_'+id).val()+'px', 'left' : $('#x_'+type+'_'+id).val()+'px'});
			$('.resize-change-block-'+type+'-'+id).css({'left' : _self.width() + Number($('#x_'+type+'_'+id).val()) +'px', 'top' : _self.height() + Number($('#y_'+type+'_'+id).val()) +'px'})

		} else if (change_size) {
			isMouseDown = false;
			change_size = false;
			$('.'+type+'_width_size_'+id).val(_self.width());
			$('.'+type+'_height_size_'+id).val(_self.height());
		}
	})

	$(document).on('mousemove', '.image_block', function(move_e){
		var id = $(this).attr('data-id');
		var type = $(this).attr('data-type');

		if(isMouseDown ){ //&& !change_size
			Y = move_e.pageY-down_event.pageY;
			X = move_e.pageX-down_event.pageX;
			$('.resize-change-block-'+type+'-'+id).css({'left' : _self.width() + Number($('#x_'+type+'_'+id).val()) + X +'px', 'top' : _self.height() + Number($('#y_'+type+'_'+id).val()) + Y +'px'})
			_self.css({'top' : Number($('#y_'+type+'_'+id).val())+Y+'px', 'left' : Number($('#x_'+type+'_'+id).val())+X+'px'});
		} else if(change_size) {
			Y = move_e.pageY-down_event.pageY;
			X = move_e.pageX-down_event.pageX;
			$('.resize-change-block-'+type+'-'+id).css({'left' : resize_change_block_width + Number($('#x_'+type+'_'+id).val())+X +'px', 'top' : resize_change_block_height + (Number($('#y_'+type+'_'+id).val())+Y) +'px'})
			_self.css({'height' : Number(resize_change_block_height +Y)+'px', 'width' : Number(resize_change_block_width +X)+'px'});
		}
		
	})

 });