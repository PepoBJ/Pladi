
$('.toogle__comentario').on('click', function(){
	$(this).parent().parent().siblings('.respuestas').slideToggle(500);
});

var root = location.protocol + '//' + location.host;

$(document).ready(function(){
	$('.pregunta__denunciar').on('click', function () {
		denunciar_pregunta($(this), $(this).data('id'));
	});
	$('.respuesta__denunciar').on('click', function () {
		denunciar_respuesta($(this), $(this).data('id'));
	});
});

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