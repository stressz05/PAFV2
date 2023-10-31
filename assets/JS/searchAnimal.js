function searchAnimal() {
    var input = document.getElementById("nome_animal");
    var table = document.querySelector(".table");
    var rows = table.getElementsByTagName("tr");
    
    //. Percorre as linhas da tabela começando no índice 1 (linha 2)
    for (var i = 1; i < rows.length; i++) {
        var idCell = rows[i].getElementsByTagName("td")[1]; //. Obtém a célula com o ID do animal em cada iteração.
        var idText = idCell.textContent || idCell.innerText; //. Guarda o texto da célula, no caso, o ID do animal.

        //. Função indexOf = devolve o índice de um determinado valor em uma string, caso não encontre devolve -1.
        if (idText.indexOf(input.value) > -1) { //. Verifica se o valor guardado no input existe no array idText.
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
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