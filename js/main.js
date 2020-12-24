function exportar(){
    
    let desde = document.getElementById("desde").value;
    let hasta = document.getElementById("hasta").value;
    let suc = document.getElementById("suc").value;

    
    if(desde && hasta){
        // console.log(desde+" "+hasta+" "+suc);
        location.href='Controller/ventas.php?desde='+desde+'&hasta='+hasta+'&suc='+suc

    }
    

}
