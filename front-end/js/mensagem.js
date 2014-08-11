
$(document).ready(function () {
 	$("#btCarregar").click(function(){
		carregarListaDB();
	});
	$("#salvar").click(function(){
		var id = $("#idmensagem").val();
		if(id){
			atualizarRegistro(id);
		}else{
			criarRegistro();
		}
	});
	$("#novo").click(function(){
		limpar();
	});

	// Carregar usuarios
	$.ajax({
		url: "http://localhost/yii-horus/app/index.php/api/usuario",
		dataType: "json"
	}).done(function(data){
		if(data.success == true){
			$.each(data.data.usuario, function(i, item){
				$('#idusuario').append( new Option(item.nome, item.idusuario) );
			});
		}else{
			alert("No foi possível acessar");
		}
	});
});


function limpar() {
	$('#idmensagem').val("");
	$('#mensagem').val("");
	$('#datahora').val("");
	$('#idusuario').val("").focus();
}

function carregarListaDB(){
		$("#listagemMensagens tbody").html("");
		$.ajax({
			url: "http://localhost/yii-horus/app/index.php/api/mensagem",
			dataType: "json"
		}).done(function(data){
			if(data.success == true){
				$.each(data.data.mensagem, function(i, item){
					criarLista(item);
				});
			}else{
				alert("No foi possível acessar");
			}
		});
}

function criarLista(item) {
	var col1 = $('<td>'+item.idmensagem+'</td>');
	var col2 = $('<td>'+item.mensagem+'</td>');
	var col3 = $('<td>'+ (item.datahora ? item.datahora : '') +'</td>');
	var col4 = $('<td>'+ item.usuarioIdusuario.nome +'</td>');
	var col5 = $('<td></td>');

	var bt1 = $('<button type="button" id="ed" class="btn btn-default">Ed</button>');
	bt1.click(function(){
		carregarRegistro(item.idmensagem);
	});

	var bt2 = $('<button type="button" id="ex" class="btn btn-default">Ex</button>');
	bt2.click(function(){
		apagarRegistro(item.idmensagem);
	});

	bt1.appendTo(col5);
	bt2.appendTo(col5);

	var linha = $('<tr></tr>');
	col1.appendTo(linha);
	col2.appendTo(linha);
	col3.appendTo(linha);
	col4.appendTo(linha);
	col5.appendTo(linha);
	linha.appendTo($("#listagemMensagens tbody"));
}

function criarRegistro() {
	$.ajax({
		url:'http://localhost/yii-horus/app/index.php/api/mensagem',
		data:JSON.stringify({
			'mensagem': $('#mensagem').val(),
			'datahora': $('#datahora').val(),
			'usuario_idusuario': $('#idusuario').val()
		}),
		type:"POST",
		success:function(data) {
			carregarListaDB();
			limpar();
		},
		error:function (xhr, ajaxOptions, thrownError){
			alert("Erro ao Limpar");
		}
	});
}

function apagarRegistro(idMensagem) {
	$.ajax({
		url:'http://localhost/yii-horus/app/index.php/api/mensagem/'+idMensagem,
		type:"DELETE",
		success:function(data) {
			carregarListaDB();
			limpar();
		},
		error:function (xhr, ajaxOptions, thrownError){
			alert("Erro ao Apagar");
		}
	});
}

function carregarRegistro(idMensagem) {
	$.ajax({
		url:'http://localhost/yii-horus/app/index.php/api/mensagem/'+idMensagem,
		type:"GET",
		success:function(data) {
			$('#idmensagem').val(data.data.mensagem.idmensagem);
			$('#mensagem').val(data.data.mensagem.mensagem);
			$('#datahora').val(data.data.mensagem.datahora);
			$('#idusuario').val(data.data.mensagem.usuarioIdusuario.idusuario).focus();
		},
		error:function (xhr, ajaxOptions, thrownError){
			alert("Erro ao Editar");
		}
	});
}

function atualizarRegistro(idMensagem) {
	$.ajax({
		url:'http://localhost/yii-horus/app/index.php/api/mensagem/'+idMensagem,
		data:JSON.stringify({
			'mensagem': $('#mensagem').val(),
			'datahora': $('#datahora').val(),
			'usuario_idusuario': $('#idusuario').val()
		}),
		type:"PUT",
		success:function(data) {
			carregarListaDB();
			limpar();
		},
		error:function (xhr, ajaxOptions, thrownError){
			alert("Erro ao Atualizar");
		}
	});
}



