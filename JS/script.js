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

function sairPagina(){
	if(confirm('Deseja sair da pagina?'))
		window.close();
}

function mostrarDescricao(){
	$(".descricao").fadeIn();
}

$(document).ready(function () {
		$(".fotos").each(function(i) {
			$(this).delay(200*i).fadeIn();
		});
		
		$(".fotos").hover(
			function (){
				$(this).animate({
					width: '215px',
					height: '215px'
				});
			},
			
			function (){
				$(this).animate({
					width: '200px',
					height: '200px'
				});
			}			
		);

		$(".fotos2").each(function(i) {
			$(this).delay(200*i).fadeIn();
		});
		
		$(".fotos2").hover(
			function (){
				$(this).animate({
					width: '400px',
					height: '400px'
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


function testeTipo(){
	var valor = document.forms["cadImoveis"]["tipo"].value;
	if(valor=="C")
	 	$("#Apartamento").fadeOut();
	else
		$("#Apartamento").fadeIn();
}

function testeTipoTabela(obj){
	var v = obj.value;
	if(v=="C"){
		$("#tabelaCasa").fadeIn(0);
	 	$("#tabelaApartamento").fadeOut(0);
	}
	else{
		$("#tabelaCasa").fadeOut(0);
		$("#tabelaApartamento").fadeIn(0);
	}
}
