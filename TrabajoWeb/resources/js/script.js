// ======================================
// LOGIN
// ======================================

function iniciarSesion(){

    let correo = document.getElementById("correo").value;
    let password = document.getElementById("password").value;

    if(correo === "" || password === ""){

        alert("Complete todos los campos");

        return;

    }

    alert("Inicio de sesión exitoso");

    window.location.href = "dashboard.blade.php";

}



// ======================================
// VARIABLES GLOBALES
// ======================================

let contadorBeneficiarios = 3;
let contadorProductos = 3;



// ======================================
// REGISTRAR BENEFICIARIO
// ======================================

function registrarBeneficiario(){

    let nombres = document.getElementById("nombres").value;
    let apellidos = document.getElementById("apellidos").value;
    let dni = document.getElementById("dni").value;
    let telefono = document.getElementById("telefono").value;
    let direccion = document.getElementById("direccion").value;

    if(
        nombres === "" ||
        apellidos === "" ||
        dni === ""
    ){

        alert("Complete los campos obligatorios");

        return;

    }

    let tabla = document.getElementById("tablaBeneficiarios");

    let fila = document.createElement("tr");

    fila.innerHTML = `

        <td>${contadorBeneficiarios}</td>
        <td>${nombres} ${apellidos}</td>
        <td>${dni}</td>
        <td>${telefono}</td>
        <td>${direccion}</td>

        <td>

            <button 
                class="btn btn-warning btn-sm"
                onclick="editarRegistro(this)"
            >
                Editar
            </button>

            <button 
                class="btn btn-danger btn-sm"
                onclick="eliminarRegistro(this)"
            >
                Eliminar
            </button>

        </td>

    `;
    let beneficiarios = JSON.parse(localStorage.getItem("beneficiarios")) || [];

    beneficiarios.push({
        nombres,
        apellidos,
        dni,
        telefono,
        direccion
    });

    localStorage.setItem(
        "beneficiarios",
        JSON.stringify(beneficiarios)
    );

    tabla.appendChild(fila);

    contadorBeneficiarios++;

    limpiarFormularioBeneficiario();

    alert("Beneficiario registrado correctamente");

}



// ======================================
// REGISTRAR PRODUCTO
// ======================================

function registrarProducto(){

    let producto = document.getElementById("producto").value;
    let categoria = document.getElementById("categoria").value;
    let stock = document.getElementById("stock").value;
    let fecha = document.getElementById("fecha").value;
    let estado = document.getElementById("estado").value;

    if(
        producto === "" ||
        categoria === "" ||
        stock === ""
    ){

        alert("Complete todos los campos obligatorios");

        return;

    }

    let tabla = document.getElementById("tablaInventario");

    let colorEstado = "success";

    if(estado === "Stock Bajo"){

        colorEstado = "warning text-dark";

    }

    if(estado === "Agotado"){

        colorEstado = "danger";

    }

    let fila = document.createElement("tr");

    fila.innerHTML = `

        <td>${contadorProductos}</td>
        <td>${producto}</td>
        <td>${categoria}</td>
        <td>${stock}</td>
        <td>${fecha}</td>

        <td>
            <span class="badge bg-${colorEstado}">
                ${estado}
            </span>
        </td>

        <td>

            <button 
                class="btn btn-warning btn-sm"
                onclick="editarRegistro(this)"
            >
                Editar
            </button>

            <button 
                class="btn btn-danger btn-sm"
                onclick="eliminarRegistro(this)"
            >
                Eliminar
            </button>

        </td>

    `;
    let productos = JSON.parse(localStorage.getItem("productos")) || [];

    productos.push({
        producto,
        categoria,
        stock,
        fecha,
        estado
    });

    localStorage.setItem(
        "productos",
        JSON.stringify(productos)
    );

    tabla.appendChild(fila);

    contadorProductos++;

    limpiarFormularioProducto();

    alert("Producto registrado correctamente");

}



// ======================================
// ELIMINAR REGISTRO
// ======================================

function eliminarRegistro(boton){

    let confirmar = confirm("¿Desea eliminar este registro?");

    if(confirmar){

        let fila = boton.parentNode.parentNode;

        fila.remove();

        alert("Registro eliminado correctamente");

    }

}



// ======================================
// EDITAR REGISTRO
// ======================================

function editarRegistro(boton){

    let fila = boton.parentNode.parentNode;

    for(let i = 1; i < fila.cells.length - 1; i++){

        let valorActual = fila.cells[i].innerText;

        let nuevoValor = prompt("Editar información:", valorActual);

        if(nuevoValor !== null){

            fila.cells[i].innerText = nuevoValor;

        }

    }

    alert("Registro actualizado correctamente");

}



// ======================================
// LIMPIAR FORMULARIO BENEFICIARIO
// ======================================

function limpiarFormularioBeneficiario(){

    document.getElementById("nombres").value = "";
    document.getElementById("apellidos").value = "";
    document.getElementById("dni").value = "";
    document.getElementById("telefono").value = "";
    document.getElementById("edad").value = "";
    document.getElementById("direccion").value = "";

}



// ======================================
// LIMPIAR FORMULARIO PRODUCTO
// ======================================

function limpiarFormularioProducto(){

    document.getElementById("producto").value = "";
    document.getElementById("categoria").value = "";
    document.getElementById("stock").value = "";
    document.getElementById("fecha").value = "";

}