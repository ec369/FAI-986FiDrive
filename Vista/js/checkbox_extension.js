function capturar()
    {
      
        var nombre = document.querySelector("#miArchivo").value.split(/[\\$]/).pop();
       

        var letrachica= nombre.toLowerCase();
        var terminacion = letrachica.split(".");
        var tipoArchivo = terminacion[1];
        if (tipoArchivo=="gif" ||tipoArchivo=="jpg" || tipoArchivo=="jpeg"|| tipoArchivo=="png"||tipoArchivo=="svg"){
          document.getElementById('imagen').checked = true;
          document.querySelector("#acnombre").value=nombre;
        }
      if (tipoArchivo=="zip"){
        document.getElementById('zip').checked = true;
        document.querySelector("#acnombre").value=nombre;
      }
      if (tipoArchivo=="pdf"){
        document.querySelector("#pdf").checked = true;
        document.querySelector("#acnombre").value=nombre;

      }

      if (tipoArchivo == "doc"|| tipoArchivo == "docx"){
        document.getElementById('doc').checked = true;
        document.querySelector("#acnombre").value=nombre;

      }
      if (tipoArchivo=="xls"|| tipoArchivo == "xlsx"){
        document.getElementById('xls').checked = true;
        document.querySelector("#acnombre").value=nombre;
    }

}


function capturar_radio()
    {
      
      var nombre = document.querySelector("#form > table > tbody > tr:nth-child(1) > td:nth-child(1)").value;
      
      document.querySelector("#ruta").value=nombre;

    //     var letrachica= nombre.toLowerCase();
    //     var terminacion = letrachica.split(".");
    //     var tipoArchivo = terminacion[1];
    //     if (tipoArchivo=="gif" ||tipoArchivo=="jpg" || tipoArchivo=="jpeg"|| tipoArchivo=="png"||tipoArchivo=="svg"){
    //       document.getElementById('imagen').checked = true;
    //       document.querySelector("#acnombre").value=nombre;
    //     }
    //   if (tipoArchivo=="zip"){
    //     document.getElementById('zip').checked = true;
    //     document.querySelector("#acnombre").value=nombre;
    //   }
    //   if (tipoArchivo=="pdf"){
    //     document.querySelector("#pdf").checked = true;
    //     document.querySelector("#acnombre").value=nombre;

    //   }

    //   if (tipoArchivo == "doc"|| tipoArchivo == "docx"){
    //     document.getElementById('doc').checked = true;
    //     document.querySelector("#acnombre").value=nombre;

    //   }
    //   if (tipoArchivo=="xls"|| tipoArchivo == "xlsx"){
    //     document.getElementById('xls').checked = true;
    //     document.querySelector("#acnombre").value=nombre;
    // }

}
