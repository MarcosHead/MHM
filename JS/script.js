$(function () {
	$("#Home").fadeIn(200);
});

$(function () {
	$("#cadFuncionarios").fadeIn(200);
});

$(function () {
	$("#resultadoBusca").html('<div  class="centralizar"><b class="centralizar bg-info">Por favor, realize uma busca para apresentação dos Imóveis referentes a sua necessidade.</b></div>');
});

$(function () {
	buscaBairro('C');
});

$(document).ready(function () {
		$(".fotos").each(function(i) {
			$(this).delay(200*i).fadeIn();
		});
		
		$(".fotos").hover(
			function (){
				$(this).animate({
					width: '202px',
					height: '202px'
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
					width: '300px',
					height: '300px'
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

function buscar() {
	var proposito  = document.forms['busca']['proposito'].value;
	var bairro     = document.forms['busca']['bairro'].value;
	var valorMin   = document.forms['busca']['valorMin'].value;
	var valorMax   = document.forms['busca']['valorMax'].value;
	var descricao  = document.forms['busca']['descricao'].value;

	$.ajax({
		url: 'busca.php',
		type: 'POST',
		async: true, 
		data: {'proposito':proposito, 'bairro':bairro, 'valorMin':valorMin, 'valorMax':valorMax, 'descricao':descricao},
		
		success: function(result) {
			$('#resultadoBusca').html(result);
		},
		error: function(xhr, textStatus, error) {
			$('#resultadoBusca').html(textStatus + error + xhr.responseText);
			alert(textStatus + error + xhr.responseText);
		}
	});
}

function buscaAtribui(id_imovel){
	document.forms['formInteressados']['idImovel'].value = id_imovel;
	$('#resultadoCadastro').html('');
}

function buscaBairro(status) {
	if(status != "")
	{
		$.ajax({
		url: 'buscaBairro.php',
		type: 'POST',
		async: true,
		dataType: 'json', 
		data: {'status':status},
				
		success: function(result) {
			$('select[name=bairro]').html('');
			if (result != "")
			{
				var n = result.length;   
				var opts = '';
				var bairro= '';
				for(var i = 0; i < n; i++) { 
					bairro = result[i];
					opts += '<option value="' +bairro+ '">'+bairro+'</option>';
				}

				$('select[name=bairro]').append(opts); // fazemos o append a todas as opts depois do ciclo para não ficar muito pesado
				// o produto que tem o valor val_produto vai ficar selected
				$('select[name=bairro] option[value="' +bairro+ '"]').attr('selected', 'selected');
			}
		},
		error: function(xhr, textStatus, error) {
			alert(textStatus + error + xhr.responseText);
		}
		});
	}
}

function buscaDetalhe(id) {
	var id_imovel = id;
	$.ajax({
		url: 'buscaDetalhes.php',
		type: 'POST',
		async: true, 
		data: {'id_imovel':id_imovel},
		
		success: function(result) {
			$('#infoDetalhes').html(result);
			$('#detalhe').modal("show");
		},
		error: function(xhr, textStatus, error) {
			alert(textStatus + error + xhr.responseText);
		}
	});
}

function buscaEndereco(cep, form)
  {
  if (cep.length != 8)
    return;

  $.ajax({

    url: 'buscaEndereco.php',
    type: 'POST',
    async: true,
    dataType: 'json', 
    data: {'cep':cep},         

    success: function(result) {      
      console.log(result);

      if (result != "")
      {                  
        document.forms[form]["rua_avenida"].value    = result.rua_avenida;
        document.forms[form]["bairro"].value 		= result.bairro;
        document.forms[form]["cidade"].value 		= result.cidade
      }
    },

    error: function(xhr, textStatus, error) {
      // xhr é o objecto XMLHttpRequest
      alert(textStatus + error + xhr.responseText);
    }

  });  

  }

function buscaInteressados() {
	var id_imovel         = document.forms['formInteressados']['idImovel'].value;
	var nome              = document.forms['formInteressados']['nome'].value;
	var email             = document.forms['formInteressados']['email'].value;
	var ddd               = document.forms['formInteressados']['ddd'].value;
	var telefone          = document.forms['formInteressados']['telefone'].value;
	var descricaoProposta = document.forms['formInteressados']['descricaoProposta'].value;

	$.ajax({
		url: 'cadastroInteressados.php',
		type: 'POST',
		async: true, 
		data: {'id_imovel':id_imovel, 'nome':nome, 'email':email, 'ddd':ddd, 'telefone':telefone, 'descricaoProposta':descricaoProposta},
		
		success: function(result) {
			$('#resultadoCadastro').html(result);
			document.forms['formInteressados']['idImovel'].value = "";
			document.forms['formInteressados']['nome'].value = "";
			document.forms['formInteressados']['email'].value = "";
			document.forms['formInteressados']['ddd'].value = "";
			document.forms['formInteressados']['telefone'].value = "";
			document.forms['formInteressados']['descricaoProposta'].value = "";
		},
		error: function(xhr, textStatus, error) {
			$('#resultadoCadastro').html(textStatus + error + xhr.responseText);
			alert(textStatus + error + xhr.responseText);
		}
	});
}

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

function testeTipo(){
	var valor = document.forms["form3"]["tipo"].value;
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

$("#form3").submit(function(){
	var formData = new FormData(this);

	$.ajax({
		url: 'cadastroImovel.php',
		type: 'POST',
		async: true, 
		data: formData,

		cache: false,
		contentType: false,
		processData: false,

		success: function(result) {
			alert(result);
		},
		error: function(xhr, textStatus, error) {
			alert(textStatus + error + xhr.responseText);
		}
	});
});