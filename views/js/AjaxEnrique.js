
var xhr;
function crear(){
    if(window.ActiveXObject){
        xhr = new ActiveXObject("Microsoft.XMLHttp");
    }else if((window.XMLHttpRequest) || (typeof XMLHttpRequest) != undifined){
        xhr = new XMLHttpRequest();
    }else{
        alert = ("TU NAVEGADOR NO SOPORTA AJAX");
        return;
    }
}

function eliminaP(per) {
    
    var mensaje = confirm("¿Seguro de elimiar a ésta persona?");
    
    if (mensaje) {

        crear();
        var no=per;
        location.replace("index.php?action=elimina&persona="+no);

    } else {

        alert("¡Se canceló la eliminación!");

    }
}

function validaForm(){
    
}

function test() {
    // Get the element.
    var element = document.getElementById('repor');

    // Generate the PDF.
    html2pdf().from(element).set({
      margin: 1,
      filename: 'Reporte.pdf',
      html2canvas: { scale: 3 },
      jsPDF: {orientation: 'landscape', unit: 'in', format: 'letter', compressPDF: true}
    }).save();
  }