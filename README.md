# _Português_
## Projeto de Aptidão Final _(PAF)_

Este repositório contém os ficheiros do meu Projeto de Aptidão Final (PAF). 
O objetivo deste projeto é criar um website chamado "Boletim de Vacinas", o site servirá para o utilzador poder acessar aos dados do seu animal em qualquer lugar, de forma fácil e rápida.

### Conteúdo do Repositório

- `aceitar.php` e `recusar.php`: Código que é executado após a escolha do administrador em `aprovar.php`.
- `acessonegado.php`: Página que irá aparecer ao utilizador ao tentar aceder a uma página de veterinário caso o mesmo seja um dono.
- `animais.php`: Página de veterinário que mostra os animais pelos quais é responsável.
- `apagar.php`: Página onde aparecem os donos e os seus animais para serem apagados, caso seja necessário.
- `apagarDono.php` e `deleteVet.php`: Código que é executado após a escolha do administrador em `apagar.php` ou `apagarVet.php`.
- `apagarVet.php`: Página onde aparecem veterinários com acesso aprovado, para serem apagados, caso seja necessário.
- `aprovar.php`: Página de administrador para ver que veterinários estão em lista de espera.
- `associacoes.php`: Página onde o utilizador encontra informações sobre algumas associações para animais.
- `consulta.php`: Código PHP que envia os dados da página `painelCon.php` para a base de dados.
- `consultasAnteriores.php`: Página que mostra as últimas consultas que o animal fez.
- `editar.php`: Código PHP para atualizar informações necessárias do animal.
- `escolhaAnimal.php`: Código PHP que envia os dados da página `escolheranimal.php` para a base de dados.
- `escolheranimal.php`: Página de veterinário onde escolhe os animais dos quais quer ser responsável.
- `footer.php`: Guarda o footer do site para facilitar a manutenção do mesmo.
- `informacoesanimal.php`: Página principal do site, aqui o utilizador vê as informações do animal, do peso às vacinas.
- `index.html`: Página inicial do projeto.
- `login.php`: Código que efetua o login do utilizador.
- `logout.php`: Código PHP que efetua o logout do utilizador e redireciona para o Login caso o utilizador queira.
- `navbar.php`: Guarda a barra de navegação do site para facilitar a manutenção da mesma.
- `painelAdmin.php`: Página que irá aparecer ao utilizador caso o mesmo seja um administrador do site.
- `painelCon.php`: Página de veterinário onde o mesmo coloca os dados da consulta.
- `porAprovar.php`: Página que irá aparecer caso o veterinário ainda não tenha sido aprovado.
- `registar.php`: Código PHP que envia os dados do registo do dono e do veterinário para a base de dados.
- `registaranimal.php`: Código que envia os dados do registo do animal para a base de dados.
- `registaranimalform.php`: Formulário de registo do animal.
- `registarform.php`: Formulário de registo do dono e veterinário.
- `removerAnimal.php`: Código PHP que retira o NIF do veterinário da tabela do animal.
- `stylesheet.css`: Ficheiro CSS para embelezar o site.
  
### Como Utilizar

1. Faça o **download** dos ficheiros deste repositório.
2. Coloque os ficheiros na pasta "htdocs" do XAMPP.
3. Abra o XAMPP.
4. Corra o Apache e MySQL.
5. Aproveite! 😉

### Tecnologias Utilizadas

- HTML
- CSS
- JavaScript
- PHP
- XAMPP (para a base de dados e webserver)

### IDE

O projeto foi desenvolvido utilizando o Visual Studio Code como IDE.

### Notas

Este repositório **_não inclui_** todos os arquivos necessários para o funcionamento do site.
Os arquivos em falta são:
- `verificacao.php`
- `conexao.php`

Decidi não colocá-los principalmente por razões de segurança.
Caso queira os ficheiros, peço que entre em contacto comigo.

### Contribuições

Contribuições são bem-vindas! Se tiver sugestões ou melhorias para o projeto, por favor, crie um pull request.

### Contacto

Para qualquer dúvida ou informação adicional, por favor, contacte-me através do _e-mail_ a.sil.almeida@gmail.com ou pelo _discord_ `imstressz`.

---

# English
## Final Project _(PAF)_

This repository contains the files for my Final Project (PAF).
The goal of this project is to create a website called "Vaccine Bulletin", which will allow users to access their animal's data anywhere, easily and quickly.

### Repository Contents

- `aceitar.php` and `recusar.php`: Code that is executed after the administrator’s choice in `aprovar.php`.
- `acessonegado.php`: Page that will appear to the user when trying to access a veterinarian page if they are an owner.
- `animais.php`: Veterinarian page that shows the animals for which they are responsible.
- `apagar.php`: Page where owners and their animals appear to be deleted, if necessary.
- `apagarDono.php` and `deleteVet.php`: Code that is executed after the administrator’s choice in `apagar.php` or `apagarVet.php`.
- `apagarVet.php`: Page where approved veterinarians appear to be deleted, if necessary.
- `aprovar.php`: Administrator page to see which veterinarians are on the waiting list.
- `associacoes.php`: Page where the user finds information about some animal associations.
- `consulta.php`: PHP code that sends the data from the `painelCon.php` page to the database.
- `consultasAnteriores.php`: Page that shows the last consultations the animal had.
- `editar.php`: PHP code to update necessary animal information.
- `escolhaAnimal.php`: PHP code that sends the data from the `escolheranimal.php` page to the database.
- `escolheranimal.php`: Veterinarian page where they choose the animals they want to be responsible for.
- `footer.php`: Saves the site footer for easier maintenance.
- `informacoesanimal.php`: Main site page, here the user sees animal information, from weight to vaccines.
- `index.html`: Project home page.
- `login.php`: Code that performs user login.
- `logout.php`: PHP code that logs out the user and redirects to Login if the user wants.
- `navbar.php`: Saves the site navigation bar for easier maintenance.
- `painelAdmin.php`: Page that will appear to the user if they are a site administrator.
- `painelCon.php`: Veterinarian page where they enter consultation data.
- `porAprovar.php`: Page that will appear if the veterinarian has not yet been approved.
- `registar.php`: PHP code that sends owner and veterinarian registration data to the database.
- `registaranimal.php`: Code that sends animal registration data to the database.
- `registaranimalform.php`: Animal registration form.
- `registarform.php`: Owner and veterinarian registration form.
- `removerAnimal.php`: PHP code that removes the NIF of the veterinarian from the animal table.
- `stylesheet.css`: CSS file to style the project.
- 
### How to Use

1. **Download** the files in the repository.
2. Place the files in the "htdocs" folder of XAMPP.
3. Open XAMPP.
4. Start Apache and MySQL.
5. Enjoy! 😉

### Technologies Used

- HTML
- CSS
- JavaScript
- PHP
- XAMPP (for the database and web server)

### IDE

The project was developed using Visual Studio Code as the IDE.

### Notes

This repository **_does not include_** all the files necessary for the site to function.
The missing files are:
- `verificacao.php`
- `conexao.php`

It was decided by me not to place them mainly for safety reasons.
If you want the files, please contact me.

### Contributions

Contributions are welcome! If you have any suggestions or improvements for the project, please create a pull request.

### Contact

For any questions or additional information, please contact me via _email_ at a.sil.almeida@gmail.com or on _discord_ `imstressz`.
