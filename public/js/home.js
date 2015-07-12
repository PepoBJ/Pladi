
$('.toogle__comentario').on('click', function(){
	$(this).parent().parent().siblings('.respuestas').slideToggle(500);
});
$('#toggle-preguntar').on('click', function(){
	$('.formulario__preguntar').slideToggle(500);
});

var root = location.protocol + '//' + location.host;

$(document).ready(function(){
	$('.pregunta__denunciar').on('click', function () {
		denunciar_pregunta($(this), $(this).data('id'));
	});
	$('.respuesta__denunciar').on('click', function () {
		denunciar_respuesta($(this), $(this).data('id'));
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
});


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