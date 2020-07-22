function validarExt()
{
    var archivoInput = document.getElementById('banner_img');
    var archivoRuta = archivoInput.value;
    var extPermitidas = /(.jpeg|.PNG|.jpg)$/i;

    if(!extPermitidas.exec(archivoRuta))
    {
        alert('Asegurate de hbaer seleccionado un PNG o JPG')
        archivoInput.value='';
        return false;
    }
    
    else
    {
        if(archivoInput.files && archivoInput.files[0])
        {
            var visor = new FileReader();
            visor.onload=function(e)
            {
                document.getElementById('visorArchivo').innerHTML=
                '<h3>Preview Image</h3><embed src="'+e.target.result+'" width="100%"  >';
            };
            visor.readAsDataURL(archivoInput.files[0])
        }
    }

}