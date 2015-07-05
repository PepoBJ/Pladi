$(document).ready(function(){
	$('.formulario__campo input').on('focusin', function(){
		$(this).parent().parent().css({
			"background" : "rgba(0, 0, 0, .1)"
		});
		$(this).parent().siblings('.caja').find('.formulario__subtitulo').slideDown();
	});
	$('.formulario__campo input').on('focusout', function(){
		$(this).parent().parent().css({
			"background" : "transparent"
		});
		$(this).parent().siblings('.caja').find('.formulario__subtitulo').slideUp();
	});
});