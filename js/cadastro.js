const selecionado = document.querySelector("#checkbox");
var tipo = document.getElementById("txtSenha");

selecionado.addEventListener("change", (el) => {
    if (selecionado.checked) {
        tipo.type = "text";
    }else{
        tipo.type = "password";
    }
});

selecionado.dispatchEvent(new Event("change"));


/*
			 * Para efeito de demonstração, o JavaScript foi
			 * incorporado no arquivo HTML.
			 * O ideal é que você faça em um arquivo ".js" separado. Para mais informações
			 * visite o endereço https://developer.yahoo.com/performance/rules.html#external
			 */
			
			// Registra o evento blur do campo "cep", ou seja, a pesquisa será feita
			// quando o usuário sair do campo "cep"
			$("#txtCep").blur(function(){
				// Remove tudo o que não é número para fazer a pesquisa
				var cep = this.value.replace(/[^0-9]/, "");
				
				// Validação do CEP; caso o CEP não possua 8 números, então cancela
				// a consulta
				if(cep.length != 8){
					return false;
				}
				
				// A url de pesquisa consiste no endereço do webservice + o cep que
				// o usuário informou + o tipo de retorno desejado (entre "json",
				// "jsonp", "xml", "piped" ou "querty")
				var url = "https://viacep.com.br/ws/"+cep+"/json/";
				
				// Faz a pesquisa do CEP, tratando o retorno com try/catch para que
				// caso ocorra algum erro (o cep pode não existir, por exemplo) a
				// usabilidade não seja afetada, assim o usuário pode continuar//
				// preenchendo os campos normalmente
				$.getJSON(url, function(dadosRetorno){
					try{
						// Preenche os campos de acordo com o retorno da pesquisa
						$("#txtEndereco").val(dadosRetorno.logradouro);
						$("#txtBairro").val(dadosRetorno.bairro);
						$("#txtCidade").val(dadosRetorno.localidade);
                        $("#txtEstado").val(dadosRetorno.uf);
					}catch(ex){}
				});
			});
      

