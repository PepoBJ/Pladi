$(document).ready(function()
{
	menu_pegajoso(); 
	perfil_usuario();
	
	$('.logo').children().on('click', function () {
		location.href = "/";
	})
});


function menu_pegajoso()
{
	var menu = $('#menu');
	var altura = menu.offset().top;
	var back = menu.css('background-color');
	$(window).on('scroll', function()
	{
		if ( $(window).scrollTop() > altura )
		{
			menu.addClass('menu-fixed');
			menu.css({
				'background-color': 'rgba(0,0,0,.8)'
			});
		} 
		else 
		{
			menu.removeClass('menu-fixed');
			menu.css({
				'background-color': back
			});
		}
	});
}

function perfil_usuario()
{
	var usuarios = $('#usuarios img');
	usuarios.on('click', function(){
		location.href = "usuario/get/" + this.id;
	})
}