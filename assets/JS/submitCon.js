function submitConsulta(){
    let action = document.getElementById('action').value
    let date = document.getElementById('date').value
    let weight = document.getElementById('weight').value
    let obs = document.getElementById('obs').value

    if(action.length !== 0 && date.length !== 0 && weight.length !== 0 && obs.length !== 0){
        document.getElementById('consulta').submit()
    } else {
        alert("Por favor preencha os campos.")
    }
    
}