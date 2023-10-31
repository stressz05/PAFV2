var linksMapa = {
    associacao1: "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3112.0307667004345!2d-9.1280019!3d38.74005619999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd1933bbf9746c81%3A0xd956f08c3b83914b!2sSociedade%20Protectora%20dos%20Animais%20-%20Centro%20Veterin%C3%A1rio%20Areeiro!5e0!3m2!1spt-PT!2spt!4v1694268326856!5m2!1spt-PT!2spt",
    associacao2: "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3112.022260442806!2d-9.1708676!3d38.7402514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd19333ce84f9fa9%3A0x4899d670984bf28d!2zVW5pw6NvIFpvw7NmaWxh!5e0!3m2!1spt-PT!2spt!4v1694268358594!5m2!1spt-PT!2spt",
    associacao3: "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3112.295423124701!2d-9.142582400000002!3d38.733982499999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd1933a1d5c7125f%3A0xa82278ec0db6c538!2sAnimalife%20-%20Associa%C3%A7%C3%A3o%20de%20Sensibiliza%C3%A7%C3%A3o%20e%20Apoio%20Social%20e%20Ambiental!5e0!3m2!1spt-PT!2spt!4v1694268419296!5m2!1spt-PT!2spt",
    associacao4: "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3003.843305101862!2d-8.586948!3d41.1597704!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd246488301b0f49%3A0xa0bb8ba737675e13!2sSociedade%20Protectora%20dos%20Animais%20do%20Porto!5e0!3m2!1spt-PT!2spt!4v1694268456775!5m2!1spt-PT!2spt",
    associacao5: "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6002.539196587798!2d-8.658118!3d41.215895!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd246620f1e6b03d%3A0xff23a5559aa0f735!2zQXNzb2NpYcOnw6NvIE1pZGFz!5e0!3m2!1spt-PT!2spt!4v1694268491385!5m2!1spt-PT!2spt",
    associacao6: "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3002.3567610493333!2d-8.5586668!3d41.192195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd24639031572181%3A0x377891f4fde3ad52!2sVivanimal!5e0!3m2!1spt-PT!2spt!4v1694268521257!5m2!1spt-PT!2spt"
};

function atualizarMapa(IDLink) {
    var iframe = document.getElementById('mapa');
    iframe.src = linksMapa[IDLink];

    //. Scroll automático para a Iframe ao selecionar um link.
    var elementoIframe = document.getElementById("mapa");
    var scroll = elementoIframe.getBoundingClientRect().top + window.scrollY; //!Obtem a distancia da iframe até ao topo da janela
    window.scrollTo({ 
        top: scroll, 
        behavior: "smooth" 
    });
};

document.getElementById('associacao1').addEventListener('click', function (e) {
    e.preventDefault();
    atualizarMapa('associacao1');
});

document.getElementById('associacao2').addEventListener('click', function (e) {
    e.preventDefault();
    atualizarMapa('associacao2');
});

document.getElementById('associacao3').addEventListener('click', function (e) {
    e.preventDefault();
    atualizarMapa('associacao3');
});

document.getElementById('associacao4').addEventListener('click', function (e) {
    e.preventDefault();
    atualizarMapa('associacao4');
});

document.getElementById('associacao5').addEventListener('click', function (e) {
    e.preventDefault();
    atualizarMapa('associacao5');
});

document.getElementById('associacao6').addEventListener('click', function (e) {
    e.preventDefault();
    atualizarMapa('associacao6');
});