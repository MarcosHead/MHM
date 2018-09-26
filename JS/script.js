$(function () {
	$("#Home").fadeIn(200);
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
