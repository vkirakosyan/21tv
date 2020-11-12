$(document).ready(function(){

	var count = $('.carousel-item').length
	$('.slide-count-next').html(1+'/'+count)
	$('.slide-count-prev').html(1+'/'+count)
	$('#carouselControls').on('slid.bs.carousel', function (a) {
		var selected_image = $('.carousel-item.active').attr('data-type');
			$('.slide-count-next').html((Number(selected_image)+1)+'/'+count)
			$('.slide-count-prev').html((Number(selected_image)+1)+'/'+count)
		})
	$('.close-button').click(function(){
		$('.slider').css({'display' : 'none'});
	})
	$('.all_photos').click(function (){
		console.log('click')
		var id = $(this).closest('.all_photos').attr('data-type');
		$('#carouselControls').carousel(Number(id))
			$('.slider').css({'display' : 'flex'});
	})
})
	