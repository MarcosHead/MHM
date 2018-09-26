$(function () {
	$("#Home").fadeIn(200);
});

$(function () {
	$("#cadFuncionarios").fadeIn(200);
});

function mostraAba(idPagina, link)
{
	$(".aba").hide();      
	$("ul.navbar-nav, li").removeClass("active");          

	$("#" + idPagina).fadeIn(500);     
	if (link != null)
	link.parentNode.className += " active";
}

function mudarPagina(){
	window.open("funcionarios.html", '_blank');
}

$(document).ready(function () {
			
		$(".fotos").each(function(i) {
			$(this).delay(200*i).fadeIn();
		});
		
		$(".fotos").hover(
		
			function (){
				$(this).animate({
					width: '220px',
					height: '220px'
				});
			},
			
			function (){
				$(this).animate({
					width: '200px',
					height: '200px'
			});
		}			
	);
});

