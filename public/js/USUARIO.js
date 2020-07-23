function validarExt()
{
    var archivoInput = document.getElementById('user_img');
    var archivoRuta = archivoInput.value;
    var extPermitidas = /(.jpeg|.PNG|.jpg)$/i;

    if(!extPermitidas.exec(archivoRuta))
    {
        alert('Asegurate de hbaer seleccionado un archivo JPEG, JPG o PNG')
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
                '<embed src="'+e.target.result+'" style="height: auto; max-width: 100%; max-height: 100%; border-radius: 50%; border: 2px solid black;">' ;         
                
            };
            visor.readAsDataURL(archivoInput.files[0])
        }
    }

}