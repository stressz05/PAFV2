function searchAnimal() {
    var input = document.getElementById("nome_animal");
    var filter = input.value.toUpperCase();
    var table = document.getElementById("table");
    var rows = table.getElementsByTagName("tr");
    
    //. Percorre as linhas da tabela ignorando o cabeçalho.
    for(var i = 1; i < rows.length; i++){
        td = rows[i].getElementsByTagName("td")[1]; //. Guarda a célula da coluna "Nome" em cada iteração.
        txtValue = td.innerText; //. Guarda o valor que é mostrado da célula em cada iteração
        //. Função indexOf = devolve o índice de um determinado valor em uma string, caso não encontre devolve -1.
        if(txtValue.toUpperCase().indexOf(filter) > -1){ //? Verifica se o que está guardado na var txtValue existe.
            rows[i].style.display = ""; //. Mostra a célula caso o valor exista.
        } else {
            rows[i].style.display = "none"; //. Esconde a célula caso o valor seja diferente
        }
    }
}

//. Adicionado um evento que se irá ativar quando a página carregar Completamente
document.addEventListener('DOMContentLoaded', function() {
    const clique = document.getElementsByClassName('click'); //! Variável que guarda os elementos com a classe "click"

    for (let i = 0; i < clique.length; i++) {
        clique[i].addEventListener('click', event => {
            if (event.target.tagName === 'TD') {
                //. Aqui recolhe o link que está guardado na primeira coluna da tabela e divide-o pelo igual, ficando só com o ID
                const idAnimal = event.currentTarget.querySelector('.aTable').getAttribute('href').split('=')[1];
                window.location.href = 'assets/files/escolhaAnimal.php?id_animal=' + idAnimal; //. Criado o link para ser usado na linha toda da tabela, passando por parametro o ID
            }
        });
    }
});