var root = location.protocol + '//' + location.host;

$('.eliminar_pregunta').on('click', function(){
	banear_pregunta(this, $(this).data('id'));
});

$('.eliminar_respuesta').on('click', function(){
	banear_respuesta(this, $(this).data('id'));
});


function banear_pregunta(object, id)
{
	$.ajax({
		url : root + '/pregunta/banear',
		data: {id_pregunta : id},
		type : 'POST',
		dataType : 'json',
		success : function(json)
		{
			if(json.exito)
			{
				$(object).parent().parent().parent().remove();
			}
			else {
				console.log('No se pudo eliminar la pregunta');
				alert('Hubo un inconveniente, intentelo más tarde.');
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

function banear_respuesta(object, id)
{
	$.ajax({
		url : root + '/respuesta/banear',
		data: {id_respuesta : id},
		type : 'POST',
		dataType : 'json',
		success : function(json)
		{
			if(json.exito)
			{
				$(object).parent().parent().parent().remove();
			}
			else {
				console.log('No se pudo eliminar la respuesta');
				alert('Hubo un inconveniente, intentelo más tarde.');
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