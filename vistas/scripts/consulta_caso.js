var tabla;
const frmInformacionCaso = document.querySelector('.informacion-caso');
const formularioSeguimiento = document.querySelector('#seguimiento-caso');
const btnSeguimientoCaso = document.querySelector('#btn-seguimiento');

const campo_rfc = document.querySelector('#rfc-cliente');
const campo_razonSocial = document.querySelector('#nombreRS-cliente');
const campo_idCliente = document.querySelector('#id-cliente').value;
const campo_numeroCuenta = document.querySelector('#numeroCuenta-cliente').value;
const campo_situacion = document.querySelector('#situacion-cliente').value;
const campo_seguimiento = document.querySelector('#seguimiento-cliente').value;
const campo_observaciones = document.querySelector('#observaciones-cliente').value; 

function init() {

    $("#formularioSeguimiento").hide();

}

function guardarSeguimientoCaso(){

    const prueba = validarCamposFrmSeguimiento();

    if(prueba === 'false')
    {
        alert('aprobado');
    }

    if(prueba === 'true')
    {
        alert('genial');
    }


}

function validarCamposFrmSeguimiento()
{
    if(campo_rfc.value === '' || campo_razonSocial.value === '')
    {
        if (!campo_rfc.value || campo_rfc.value.length === 0)
        {
            var mensaje1 = document.getElementById('validation-message1');
            campo_rfc.classList.add('invalid');
            mensaje1.className="invalid-message";

            $('#validation-message1').hide(8000);
            

        }else{

            campo_rfc.classList.remove('invalid');
            document.getElementById('validation-message1').className="hide";

        } 
        
    }else{

        alert('llenos');
    }
}

/* function guardarSeguimiento()
{
    validarCamposFrm();

    if(campo_rfc === ''|| campo_razonSocial === '')
    {

        alert("hola");
        
    }else{
        
        $.ajax({
            url: '../ajax/registros.ajax.php?op=guardaryeditarSeguimiento',
           
            
            success: function(respuesta) {
                console.log(respuesta);
                
            },
            error: function() {
                console.log("No se ha podido obtener la información");
            }
        });
    }
}

function validarCamposFrm() {
    //alert('hola');
/*     const formularioSeguimiento = document.querySelector('.seguimiento-caso');

    const campo_rfc = document.querySelector('#rfc-cliente').value;
    const campo_razonSocial = document.querySelector('#nombreRS-cliente').value;
    const campo_idCliente = document.querySelector('#id-cliente').value;
    const campo_numeroCuenta = document.querySelector('#numeroCuenta-cliente').value;
    const campo_situacion = document.querySelector('#situacion-cliente').value;
    const campo_seguimiento = document.querySelector('#seguimiento-cliente').value;
    const campo_observaciones = document.querySelector('#observaciones-cliente').value; */

/*     valid = true;

    campo_rfc = document.getElementById('rfc-cliente');
    campo_razonSocial = document.getElementById('nombreRS-cliente');

    campo_observaciones = document.querySelector('#observaciones-cliente').value;

        if (!campo_rfc.value || campo_rfc.value.length === 0) 
        {
            campo_rfc.classList.add('invalid');
            document.getElementById('validation-message1').className="invalid-message";
        } else {
            campo_rfc.classList.remove('invalid');
            document.getElementById('validation-message1').className="hide";
        }

        if (!campo_razonSocial.value || campo_razonSocial.value.length === 0) 
        {
            campo_razonSocial.classList.add('invalid');
            document.getElementById('validation-message2').className="invalid-message";
        } else {
            campo_razonSocial.classList.remove('invalid');
            document.getElementById('validation-message2').className="hide";
        }

    }  */


function MostrarCasosRegistradosUsuario(cod) {
    $.post("../ajax/registros.ajax.php?op=mostrar", { cod: cod }, function (data, status) {
        data = JSON.parse(data);
        //mostrarform(true);

        $("#cod").val(data.tac_cod_alta);
        $("#codCaso").val(data.tac_cod_alta);
        $("#fecha-alta").val(data.tac_fecha_alta);
        $("#fecha-origen").val(data.tac_fecha_origen);
        $("#fecha-limite").val(data.tac_fecha_limite);
        $("#caso-asunto").val(data.tac_asunto);
        $("#correo-origen").val(data.tac_correo_origen);
        $("#area").val(data.tac_area);
        $("#asigno-caso").val(data.tac_asigna_caso);
        $("#descripcion-caso").val(data.tac_descripcion);

    });
}

function mostrarSeguimiento(flag) {

    if (flag) {
        detenerEvento();
        $("#formularioSeguimiento").show();
       
     
       
    }
}

$(document)
    .one('focus.autoExpand', 'textarea.autoExpand', function () {
        var savedValue = this.value;
        this.value = '';
        this.baseScrollHeight = this.scrollHeight;
        this.value = savedValue;
    })
    .on('input.autoExpand', 'textarea.autoExpand', function () {
        var minRows = this.getAttribute('data-min-rows') | 0, rows;
        this.rows = minRows;
        rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 17);
        this.rows = minRows + rows;
    });



/* frmInformacionCaso.addEventListener('submit', (e) => {
    e.preventDefault();

    //$(".seguimiento-caso").show();
    btnguardar = document.getElementById("btnGuardarCambios");
    if(btnguardar.style.visibility === 'hidden')
    {
        btnguardar.style.visibility = 'visible';
       // $(".seguimiento-caso").show();
        
    }
       
    
    // exampleModalCenter
}); */

function detenerEvento()
{
    $(".informacion-caso").submit(function(e){
        return false;
    });
}  
// Detectar click fuera del modal, esto oculta el segundo formulario encargado de dar seguimiento a caso de investigacion
$(document).ready(function(){
    
  
    $("#exampleModalCenter").on('hidden.bs.modal', function (e) {
        
        $("#formularioSeguimiento").hide();
              
       
    });

});


function limpiarHTML(){
    while(frmSeguimientoCaso.firstChild)
    {
        frmSeguimientoCaso.removeChild(frmSeguimientoCaso.firstChild);
    }
}

function mostrarSpinner()
{
    limpiarHTML();
    const spinner = document.createElement('div');
    spinner.classList.add('spinner');
    
    spinner.innerHTML = `
    
    <div class="bounce1"></div>
    <div class="bounce2"></div>
    <div class="bounce3"></div>

    `;

    frmSeguimientoCaso.appendChild(spinner);
    
}

init();
