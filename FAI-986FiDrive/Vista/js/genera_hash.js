function hash(){ 

    var cantDias = document.getElementById("comparte").value; 
var cantDescargas = document.getElementById("descarga").value; 
var nombre = document.getElementById("acnombre").value; 
var nombreArchivo= nombre+cantDias+cantDescargas; 


document.querySelector("#compartir").innerHTML=nombre;  
} 

