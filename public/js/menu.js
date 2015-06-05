$(document).ready(function()
{
	menu_pegajoso(); 
});


function menu_pegajoso()
{
	var menu = $('#menu');
	var altura = menu.offset().top;
	
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
				'background-color': 'transparent'
			});
		}
	});
}