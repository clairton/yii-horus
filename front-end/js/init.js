
$(document).ready(function () {
 	$("#btCarregar").click(function(){
		carregarListaDB();
	});
	$("#salvar").click(function(){
		var id = $("#idusuario").val();
		if(id){
			atualizarRegistro(id);
		}else{
			criarRegistro();
		}
	});
	$("#novo").click(function(){
		limpar();
	});
});

function limpar() {
		$('#idusuario').val("");
		$('#ultimaconexao').val("");
		$('#nome').val("").focus();
}

function carregarListaDB(){
		$("#listagemContatos tbody").html("");
		$.ajax({
			url: "http://localhost/yii-horus/app/index.php/api/usuario",
			dataType: "json"
		}).done(function(data){
			if(data.success == true){
				$.each(data.data.usuario, function(i, item){
					criarLista(item);
				});
			}else{
				alert("No foi possível Carregar");
			}
		});
}

function criarLista(item) {
	var col1 = $('<td>'+item.idusuario+'</td>');
	var col2 = $('<td>'+item.nome+'</td>');
	var col3 = $('<td>'+item.ultimaconexao+'</td>');
	var col4 = $('<td></td>');

	var bt1 = $('<button type="button" id="ed" class="btn btn-default">Ed</button>');
	bt1.click(function(){
		carregarRegistro(item.idusuario);
	});

	var bt2 = $('<button type="button" id="ex" class="btn btn-default">Ex</button>');
	bt2.click(function(){
		apagarRegistro(item.idusuario);
	});

	bt1.appendTo(col4);
	bt2.appendTo(col4);

	var linha = $('<tr></tr>');
	col1.appendTo(linha);
	col2.appendTo(linha);
	col3.appendTo(linha);
	col4.appendTo(linha);
	linha.appendTo($("#listagemContatos tbody"));
}

function criarRegistro() {
	$.ajax({
		url:'http://localhost/yii-horus/app/index.php/api/usuario',
		data:JSON.stringify({
			'nome': $('#nome').val(),'ultimaconexao': $('#ultimaconexao').val()
		}),
		type:"POST",
		success:function(data) {
			carregarListaDB();
			limpar();
		},
		error:function (xhr, ajaxOptions, thrownError){
			alert("Erro ao Criar");
		}
	});
}

function apagarRegistro(idUsuario) {
	$.ajax({
		url:'http://localhost/yii-horus/app/index.php/api/usuario/'+idUsuario,
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

function carregarRegistro(idUsuario) {
	$.ajax({
		url:'http://localhost/yii-horus/app/index.php/api/usuario/'+idUsuario,
		type:"GET",
		success:function(data) {
			$('#idusuario').val(data.data.usuario.idusuario);
			$('#ultimaconexao').val(data.data.usuario.ultimaconexao);
			$('#nome').val(data.data.usuario.nome).select();
		},
		error:function (xhr, ajaxOptions, thrownError){
			alert("Erro ao Carregar");
		}
	});
}

function atualizarRegistro(idUsuario) {
	$.ajax({
		url:'http://localhost/yii-horus/app/index.php/api/usuario/'+idUsuario,
		data:JSON.stringify({
			'nome': $('#nome').val(),'ultimaconexao': $('#ultimaconexao').val()
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

