
$('.toogle__comentario').on('click', function(){
	$(this).parent().parent().siblings('.respuestas').slideToggle(500);
});
$('#toggle-preguntar').on('click', function(){
	$('.formulario__preguntar').slideToggle(500);
});
$('.toggle-responder').on('click', function(){
	$($(this).parents('.caja').parents('.grupo')[0]).siblings('.formulario__responder').slideToggle(500);
});

var root = location.protocol + '//' + location.host;
var pregunta_real_time;
var notificacion_real_time;

$(document).ready(function(){

	pregunta_real_time = setInterval(real_time, 30000);
	notificacion_real_time = setInterval(real_time_notify, 1000);
	
	$('.pregunta__denunciar').on('click', function () {
		denunciar_pregunta($(this), $(this).data('id'));
	});

	$('.respuesta__denunciar').on('click', function () {
		denunciar_respuesta($(this), $(this).data('id'));
	});

	$('.notificacion').on('click', function(){
		location.href = root + '/pregunta/get/' + $(this).data('idpregunta');
	});

	$('.formulario__preguntar').on('submit', function(){
		var titulo = $('.formulario__pregunta__titulo').val();
		var cuerpo = $('.formulario__pregunta__cuerpo').val();

		if(titulo.length < 5 || cuerpo.length < 5 )
		{
			$('#error').text('El cuerpo y/o título tienen una longitud incorrecta [>5]');
			animate_error();
			return false;
		}

		preguntar($(this).data('id'), $('.formulario__pregunta__categoria').val(), titulo, cuerpo);
		return false;
	});
	$('.formulario__responder').on('submit', function(){

		var id_pregunta = $(this).data('id');
		var titulo = $(this).find('.formulario__respuesta__titulo').val();
		var cuerpo = $(this).find('.formulario__respuesta__cuerpo').val();

		if(titulo.length < 5 || cuerpo.length < 5 )
		{
			alert('El cuerpo y/o título tienen una longitud incorrecta [>5]');
			return false;
		}
		
		responder(id_pregunta, titulo, cuerpo, this);
		return false;
	});
});

function real_time_notify()
{	
	$.ajax({
		url : root + '/notificacion/realTime',
		type : 'POST',
		dataType : 'json',
		success : function(json)
		{
			if(json.exito)
			{
				var animacion_notifiacion = setInterval(function(){
					var color = $('.usuario__notificaciones').css('color');
										
					if(color == 'rgb(255, 255, 255)')
						$('.usuario__notificaciones').css('color', 'rgb(255, 0, 0)');
					else
						$('.usuario__notificaciones').css('color', 'rgb(255, 255, 255)');
				}, 600);
				clearInterval(notificacion_real_time);
			}
			else {
				console.log('No hay notificaciones...');
			}
		},
		error : function(jqXHR, status, error)
		{
			console.dir(error);
			console.dir(status);
			console.dir(jqXHR);
		},
		complete: function () {
			return false;
		}
	});	
}

function real_time() {
	var id = $('#preguntas').find('.pregunta').first().data('id')

	$.ajax({
		url : root + '/pregunta/realTime',
		data: { last_id : id},
		type : 'POST',
		dataType : 'json',
		success : function(json)
		{
			if(json.exito)
			{
				$('#preguntas').prepend(json.html_data);		
			}
			else {
				console.log('No se pudo cargar las preguntas en tiempo real.');
			}
		},
		error : function(jqXHR, status, error)
		{
			console.dir(error);
			console.dir(status);
			console.dir(jqXHR);
		},
		complete: function () {
			return false;
		}
	});
}

function animate_error()
{
	$('html, body').animate({
		        scrollTop: $("#error").offset().top -  $('#menu').offset().top
		    }, 1000);
}
function preguntar(id_user, id_categoria, titulo, cuerpo)
{
	$.ajax({
		url : root + '/pregunta/preguntar',
		data: { id : id_user, id_category : id_categoria, title : titulo, body : cuerpo},
		type : 'POST',
		dataType : 'json',
		success : function(json)
		{
			if(json.exito)
			{
				$('.formulario__pregunta__titulo').val('');
				$('.formulario__pregunta__cuerpo').val('');
				$('#preguntas').prepend(json.html_data);
				$('.formulario__preguntar').slideUp(500);
			}
			else {
				$('#error').text('La pregunta tiene un título existente.');
				animate_error();
			}
			return false;
		},
		error : function(jqXHR, status, error)
		{
			console.dir(error);
			console.dir(status);
			console.dir(jqXHR);
			return false;
		},
		complete: function () {
			return false;
		}
	});
	return false;
}

function responder(id_pregunta, titulo, cuerpo, formulario)
{
	$.ajax({
		url : root + '/respuesta/responder',
		data: { id : id_pregunta, title : titulo, body : cuerpo},
		type : 'POST',
		dataType : 'json',
		success : function(json)
		{
			if(json.exito)
			{
				$(formulario).find('.formulario__respuesta__titulo').val('');
				$(formulario).find('.formulario__respuesta__cuerpo').val('');
				var pregunta_div = $( "#" + $(formulario).data('id'));
				pregunta_div.find('.respuestas').prepend(json.html_data);
				var num_respuestas = pregunta_div.find('.num_respuestas');
				num_respuestas.text( parseInt(num_respuestas.text()) + 1);
				pregunta_div.find('.respuestas').slideDown(500);
				$(formulario).slideUp(500);
				
			}
			else {
				alert('No se pudo publicar tu respuesta intenta en unos minutos.');
			}
			return false;
		},
		error : function(jqXHR, status, error)
		{
			console.dir(error);
			console.dir(status);
			console.dir(jqXHR);
			return false;
		},
		complete: function () {
			return false;
		}
	});
	return false;
}

function denunciar_pregunta(objeto, id_p)
{
	$.ajax({
		url : root + '/pregunta/denunciar',
		data: { id : id_p },
		type : 'POST',
		dataType : 'json',
		success : function(json)
		{
			if(json.exito)
			{

				var obj = objeto.siblings('.pregunta__denuncias').find('span');
				obj.text(parseInt(obj.text()) + 1);
				objeto.css({color:'#ccc', cursor:'default'});
				objeto.on('click', function(){});
			}
		},
		error : function(jqXHR, status, error)
		{
			console.dir(error);
			console.dir(status);
			console.dir(jqXHR);
		},
		complete: function () {}
	});
}

function denunciar_respuesta(objeto, id_r)
{
	$.ajax({
		url : root + '/respuesta/denunciar',
		data: { id : id_r },
		type : 'POST',
		dataType : 'json',
		success : function(json)
		{
			if(json.exito)
			{
				var obj = objeto.siblings('a').find('span');
				console.dir(obj);
				obj.text(parseInt(obj.text()) + 1);
				objeto.css({color:'#ccc', cursor:'default'});
				objeto.on('click', function(){});
			}
		},
		error : function(jqXHR, status, error)
		{
			console.dir(error);
			console.dir(status);
			console.dir(jqXHR);
		},
		complete: function () {}
	});
}