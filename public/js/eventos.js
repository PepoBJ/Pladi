var root = location.protocol + '//' + location.host;

$(document).ready(function()
{
	menu_pegajoso(); 
	perfil_usuario();
	eventos_click();
	
});

function eventos_click()
{
	$('.logo').children().on('click', function () {
		location.href = root + "/";
	});
	$('.login__boton').on('click', function() {
		location.href = root + "/index/login";
	});
	$('.logout__boton').on('click', function() {
		location.href = root + "/index/logout";
	});	
	$('.banner__boton > button').on('click', function() {
		location.href = root + "/index/registro";
	});
	$('.logo__home').children().on('click', function () {
		location.href = root + "/index/home";
	});
}

function menu_pegajoso()
{
	var menu   = $('#menu');
	var altura = menu.offset().top;
	var back   = menu.css('background-color');
	$(window).on('scroll', function()
	{
		if ( $(window).scrollTop() > altura )
		{
			menu.addClass('menu-fixed');
			menu.css({
				'background-color': 'rgba(0,0,0,.9)'
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
		location.href = root + "/usuario/get/" + this.id;
	})
}