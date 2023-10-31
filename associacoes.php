<?php
    require "assets/files/verificacao.php";
?>

<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <title>BV / Associações</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body class="body">
    <?php include "assets/files/navbar.php"; ?>

    <div class="centered">
        <p class="p-associacoes"><strong>Associações 1-3:</strong> Lisboa || <strong>Associações 4-6:</strong> Porto</p>
    </div>

    <div class="centered">
        <div class="block">
            <!--* 1º Associação-->
            <div class="b-row">
                <p class="tituloAssociacao"><strong>Sociedade Protetora dos Animais</strong></p>
                <p class="pBlocks"><strong>Telefone:</strong> 213 423 851</p>
                <p class="pBlocks"><strong>Email:</strong> info@spanimais.org</p>
                <p class="pBlocks">
                    <a href="https://www.spanimais.org" target="_blank">
                        <img class="imgBlocks" title="Site da associação" src="assets\imagens\SPAlogo.png">
                    </a>
                </p>
                <p class="numAssociacao">1</p>
                <p class="pBlocks">
                    <a href="#" class="a-mapa-associacoes" id="associacao1" target="_blank">Ver no mapa</a>
                </p>
            </div>

            <!--* 2ª Associação-->
            <div class="b-row">
                <p class="tituloAssociacao"><strong>União Zoófila</strong></p>
                <p class="pBlocks"><strong>Telefone:</strong> 760 501 015 <span style="font-size: smaller;">(0.60€ + IVA)</span></p>
                <p class="pBlocks"><strong>Email:</strong> uniaozoofila@gmail.com</p>
                <p class="pBlocks">
                    <a href="https://www.uniaozoofila.org/" target="_blank">
                        <img class="imgBlocks" title="Site da associação" src="assets\imagens\UZ.png">
                    </a>
                </p>
                <p class="numAssociacao">2</p>
                <p class="pBlocks">
                    <a href="#" class="a-mapa-associacoes" id="associacao2" target="_blank">Ver no mapa</a>
                </p>
            </div>

            <!--* 3ª Associação-->
            <div class="b-row">
                <p class="tituloAssociacao"><strong>Animalife</strong></p>
                <p class="pBlocks"><strong>Telefone:</strong> 707 309 233</p>
                <p class="pBlocks"><strong>Email:</strong> geral@animalife.pt</p>
                <p class="pBlocks">
                    <a href="https://www.animalife.pt/pt/home" target="_blank">
                        <img class="imgBlocks" title="Site da associação" src="assets\imagens\AL.png">
                    </a>
                </p>
                <p class="numAssociacao">3</p>
                <p class="pBlocks">
                    <a href="#" class="a-mapa-associacoes" id="associacao3" target="_blank">Ver no mapa</a>
                </p>
            </div>

            <!--* 4ª Associação-->
            <div class="b-row">
                <p class="tituloAssociacao"><strong>Sociedade Protetora Animais Porto</strong></p>
                <p class="pBlocks"><strong>Telefone 1:</strong> 225898090</p>
                <p class="pBlocks"><strong>Telefone 2:</strong> 924454710</p>
                <p class="pBlocks">
                    <a href="https://spaporto.weebly.com/" target="_blank">
                        <img class="imgBlocks" title="Site da associação" src="assets\imagens\SPAP.jpeg">
                    </a>
                </p>
                <p class="numAssociacao">4</p>
                <p class="pBlocks">
                    <a href="#" class="a-mapa-associacoes" id="associacao4" target="_blank">Ver no mapa</a>
                </p>
            </div>

            <!--* 5ª Associação-->
            <div class="b-row">
                <p class="tituloAssociacao"><strong>Associação Midas</strong></p>
                <p class="pBlocks"><strong>Telefone:</strong> 760 501 670 <span style="font-size: smaller;">(0.60€ + IVA)</span></p>
                <p class="pBlocks"><strong>Email:</strong> midas@associacaomidas.org</p>
                <p class="pBlocks">
                    <a href="https://www.associacaomidas.org/" target="_blank">
                        <img class="imgBlocks" title="Site da associação" src="assets\imagens\Midas.png">
                    </a>
                </p>
                <p class="numAssociacao">5</p>
                <p class="pBlocks">
                    <a href="#" class="a-mapa-associacoes" id="associacao5" target="_blank">Ver no mapa</a>
                </p>
            </div>

            <!--* 6ª Associação-->
            <div class="b-row">
                <p class="tituloAssociacao"><strong>Vivanimal</strong></p>
                <p class="pBlocks"><strong>Telefone:</strong> 910 022 248</p>
                <p class="pBlocks"><strong>Email:</strong> vivanimal@gmail.com</p>
                <p class="pBlocks">
                    <a href="https://associacaovivanimal.pt/" target="_blank">
                        <img class="imgBlocks" title="Site da associação" src="assets\imagens\VA.png">
                    </a>
                </p>
                <p class="numAssociacao">6</p>
                <p class="pBlocks">
                    <a href="#" class="a-mapa-associacoes" id="associacao6" target="_blank">Ver no mapa</a>
                </p>
            </div>
            <div class="centered">
                <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d41867.268387138305!2d-9.138494748969878!3d38.74527484320237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-PT!2spt!4v1695288822170!5m2!1spt-PT!2spt"
                id="mapa" class="mapa" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</body>

<script src="assets/JS/map.js"></script>

<?php include "assets/files/footer.php";?>

</html>