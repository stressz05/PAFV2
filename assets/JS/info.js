    //. Função para se puder editar.
    function editar() {
        let age = document.getElementById('ageInput');
        let weight = document.getElementById('weightInput');
        let confirmar = document.getElementById('confirmar');
        var image = document.getElementById('edit');
        let month = document.getElementById('labelMonth');
        let year = document.getElementById('labelYear');
        let ageV = document.getElementById('ageV');
        let weightV = document.getElementById('weightV');
        let cancel = document.getElementById('cancel');

        image.hidden = true;
        cancel.hidden = false;
        month.style.fontSize = "20px";
        year.style.fontSize = "20px";
        age.hidden = false;
        weight.hidden = false;
        confirmar.hidden = false;
        month.hidden = false;
        year.hidden = false;
        ageV.hidden = true;
        weightV.hidden = true;
    }

    //. Função para cancelar a Edição
    function cancelar() {
        let age = document.getElementById('ageInput');
        let weight = document.getElementById('weightInput');
        let confirmar = document.getElementById('confirmar');
        var image = document.getElementById('edit');
        let month = document.getElementById('labelMonth');
        let year = document.getElementById('labelYear');
        let ageV = document.getElementById('ageV');
        let weightV = document.getElementById('weightV');
        let cancel = document.getElementById('cancel');

        image.hidden = false;
        cancel.hidden = true;
        month.style.fontSize = "20px";
        year.style.fontSize = "20px";
        age.hidden = true;
        weight.hidden = true;
        confirmar.hidden = true;
        month.hidden = true;
        year.hidden = true;
        ageV.hidden = false;
        weightV.hidden = false;
    }