jQuery(function(){	
	jQuery(document).ready(function(){
		
		//animarMenuPrincipal();
		showToolTip();
		
	});
});

// Função para animar os itens do menu principal quando o cursor é passado sobre eles.
function animarMenuPrincipal()
{
	var delay = 150;
	jQuery('#main_menu ul li a').hover
	(
		function()
		{
			jQuery(this).stop().animate({marginTop:'-8px'}, delay);
		},
		function()
		{
			jQuery(this).stop().animate({marginTop:'0px'}, delay);
		}
	);
}

// Função para exibir as tooltips de cada link do menu, quando o cursor passar sobre eles
function showToolTip()
{
	var delay = 300;
	
	jQuery('#main_menu ul li a').hover
	(
		function()
		{
			jQuery(this).children('span').stop().fadeIn(delay);
		},
		function()
		{
			jQuery(this).children('span').stop().fadeOut(delay);
		}
	);
}