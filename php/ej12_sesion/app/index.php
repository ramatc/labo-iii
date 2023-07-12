<?php
include('./manejoSesion.inc');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12 - Sesión</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <link rel="stylesheet" href="../../ej11_bd_abm/style.css">
</head>

<body>
    <header id="header">
        <h3 style="color: white;">Orden:</h3>
        <input type="text" id="orden" value="codArt" readonly />
        <button id="cargarDatos">Cargar datos</button>
        <button id="vaciarDatos">Vaciar datos</button>
        <button id="limpiarFiltros">Limpiar filtros</button>
        <button id="altaRegistro">Alta registro</button>
        <button id="cerrarSesion">Cerrar sesión</button>
    </header>

    <main id="contenedor">
        <table>
            <thead>
                <tr class="head-tr">
                    <th campo-dato="codArt" id="codArt">Cod. Art.</th>
                    <th campo-dato="marca" id="marca">Marca</th>
                    <th campo-dato="descripcion" id="descripcion">Desc.</th>
                    <th campo-dato="color" id="color">Color</th>
                    <th campo-dato="fecha" id="fecha">Año</th>
                    <th campo-dato="precio" id="precio">Precio</th>
                    <th campo-dato="pdf" id="pdf">PDF</th>
                    <th campo-dato="modi" id="modi">Modi</th>
                    <th campo-dato="baja" id="baja">Baja</th>
                </tr>

                <tr>
                    <th campo-dato="codArt"><input id="filterCodArt" class="filter" /></th>
                    <th campo-dato="marca">
                        <select name="select" id="filterMarca" class="filter">
                            <option value=""></option>
                        </select>
                    </th>
                    <th campo-dato="descripcion"><input id="filterDesc" class="filter" /></th>
                    <th campo-dato="color"><input id="filterColor" class="filter" /></th>
                    <th campo-dato="fecha"><input id="filterFecha" class="filter" /></th>
                    <th campo-dato="precio"><input id="filterPrecio" class="filter" /></th>
                    <th campo-dato="pdf" id="pdf"></th>
                    <th campo-dato="modi" id="modi"></th>
                    <th campo-dato="baja" id="baja"></th>
                </tr>
            </thead>

            <tbody id="tabla"></tbody>

            <tfoot>
                <tr>
                    <th campo-dato="codArt">Cod. Art.</th>
                    <th campo-dato="marca">Marca</th>
                    <th campo-dato="descripcion">Desc.</th>
                    <th campo-dato="color">Color</th>
                    <th campo-dato="fecha">Año</th>
                    <th campo-dato="precio">Precio</th>
                    <th campo-dato="pdf" id="pdf">PDF</th>
                    <th campo-dato="modi" id="modi">Modi</th>
                    <th campo-dato="baja" id="baja">Baja</th>
                </tr>
            </tfoot>
        </table>
    </main>

    <div id="modalAlta">
        <div class="encabezado">
            <p>Formulario de alta</p>
            <button id="cerrarModalAlta">X</button>
        </div>

        <main>
            <form id="formAlta" method="post" enctype="multipart/form-data">
                <div class="entrada">
                    <label for="codArtAlta">Código de artículo:</label>
                    <input name="codArtAlta" id="codArtAlta" class="input" required />
                </div>

                <div class="entrada">
                    <label for="marcaAlta">Marca:</label>
                    <select name="marcaAlta" id="marcaAlta">
                    </select>
                </div>

                <div class="entrada">
                    <label for="descripcionAlta">Descripción:</label>
                    <input id="descripcionAlta" name="descripcionAlta" class="input" required />
                </div>

                <div class="entrada">
                    <label for="colorAlta">Color:</label>
                    <input name="colorAlta" id="colorAlta" class="input" required />
                </div>

                <div class="entrada">
                    <label for="fechaAlta">Año:</label>
                    <input name="fechaAlta" id="fechaAlta" class="input" required />
                </div>

                <div class="entrada">
                    <label for="precioAlta">Precio:</label>
                    <input id="precioAlta" name="precioAlta" required />
                </div>

                <div class="entrada">
                    <label for="pdfAlta">PDF:</label>
                    <input type="file" id="pdfAlta" name="pdfAlta" />
                </div>

                <div class="barraControl">
                    <button type="button" id="envioAlta" class="btnForm">Enviar</button>
                </div>
            </form>
        </main>
    </div>

    <div id="modalModi">
        <div class="encabezado">
            <p>Formulario de modificación</p>
            <button id="cerrarModalModi">X</button>
        </div>

        <main>
            <form id="formModi" method="post" enctype="multipart/form-data">
                <div class="entrada">
                    <label for="codArtModi">Código de artículo:</label>
                    <input name="codArtModi" id="codArtModi" class="input" required />
                </div>

                <div class="entrada">
                    <label for="marcaModi">Marca:</label>
                    <select name="marcaModi" id="marcaModi">
                    </select>
                </div>

                <div class="entrada">
                    <label for="descripcionModi">Descripción:</label>
                    <input id="descripcionModi" name="descripcionModi" class="input" required />
                </div>

                <div class="entrada">
                    <label for="colorModi">Color:</label>
                    <input name="colorModi" id="colorModi" class="input" required />
                </div>

                <div class="entrada">
                    <label for="fechaModi">Año:</label>
                    <input name="fechaModi" id="fechaModi" class="input" required />
                </div>

                <div class="entrada">
                    <label for="precioModi">Precio:</label>
                    <input id="precioModi" name="precioModi" required />
                </div>

                <div class="entrada">
                    <label for="pdfModi">PDF:</label>
                    <input type="file" id="pdfModi" name="pdfModi" />
                </div>

                <div class="barraControl">
                    <button type="button" id="envioModi" class="btnForm">Enviar</button>
                </div>
            </form>
        </main>
    </div>

    <div id="modalRes">
        <div class="encabezado">
            <p>Respuesta del servidor</p>
            <button id="cerrarModalRes">X</button>
        </div>

        <main id="respuestaServer">
            Respuesta del servidor
        </main>
    </div>

    <footer id="footer">
        <h2>Footer</h2>
        <h3 id="cantidad"></h3>
    </footer>

    <script>
        $(document).ready(function () {
            $.ajax({
                type: "get",
                url: "./jsonMarcas.php",
                success: function (respuestaDelServer, estado) {
                    var objJson = JSON.parse(respuestaDelServer);
                    alert(respuestaDelServer);

                    objJson.marcas.forEach(marca => {
                        var objOpcion = document.createElement("option");
                        objOpcion.setAttribute("value", marca.cod);
                        objOpcion.innerHTML = marca.nombre;
                        document.getElementById("filterMarca").appendChild(objOpcion);

                        var objOpcion1 = document.createElement("option");
                        objOpcion1.setAttribute("value", marca.cod);
                        objOpcion1.innerHTML = marca.nombre;
                        document.getElementById("marcaAlta").appendChild(objOpcion1);

                        var objOpcion2 = document.createElement("option");
                        objOpcion2.setAttribute("value", marca.cod);
                        objOpcion2.innerHTML = marca.nombre;
                        document.getElementById("marcaModi").appendChild(objOpcion2);
                    });
                }
            })

            document.getElementById('contenedor').className = "contenedorActivo";
            document.getElementById('modalModi').className = "ventanaModalApagado";
            document.getElementById('modalAlta').className = "ventanaModalApagado";
            document.getElementById('modalRes').className = "ventanaModalApagado";

            $("#cerrarSesion").click(function () {
                location.href = "../destruirSesion.php";
            });
        });

        $("#formAlta").keyup(function () {
            habilitarAlta();
        });

        $("#formModi").keyup(function () {
            habilitarModif();
        });

        $("#codArt").click(function () {
            $("#orden").val("codArt");
        });

        $("#marca").click(function () {
            $("#orden").val("marca");
        });

        $("#descripcion").click(function () {
            $("#orden").val("descripcion");
        });

        $("#color").click(function () {
            $("#orden").val("color");
        });

        $("#fecha").click(function () {
            $("#orden").val("fecha");
        });

        $("#precio").click(function () {
            $("#orden").val("precio");
        });

        $("#cargarDatos").click(function () {
            $("#tabla").empty();
            $("#tabla").html("<h2>Esperando respuesta...</h2>");
            $("#cantidad").empty();

            $.ajax({
                type: "get",
                url: "./conexionBd.php",
                data: {
                    orden: $("#orden").val(),
                    codArt: $("#filterCodArt").val(),
                    marca: $("#filterMarca").val(),
                    desc: $("#filterDesc").val(),
                    color: $("#filterColor").val(),
                    fecha: $("#filterFecha").val(),
                    precio: $("#filterPrecio").val()
                },
                success: function (respuestaDelServer, estado) {
                    $("#tabla").empty();

                    var objJson = JSON.parse(respuestaDelServer);
                    alert(respuestaDelServer);

                    $("#cantidad").append("Cantidad de zapatillas:" + objJson.cantidad);

                    objJson.zapatillas.forEach(function (zapatilla, i) {
                        var objTr = document.createElement("tr");
                        var codArt = document.createElement("td");
                        var marca = document.createElement("td");
                        var descripcion = document.createElement("td");
                        var color = document.createElement("td");
                        var fecha = document.createElement("td");
                        var precio = document.createElement("td");
                        var btnPdf = document.createElement("td");
                        var btnModi = document.createElement("td");
                        var btnBaja = document.createElement("td");

                        codArt.setAttribute("campo-dato", "codArt");
                        codArt.innerHTML = zapatilla.codArt;
                        objTr.appendChild(codArt);

                        marca.setAttribute("campo-dato", "marca");
                        marca.innerHTML = zapatilla.marca;
                        objTr.appendChild(marca);

                        descripcion.setAttribute("campo-dato", "descripcion");
                        descripcion.innerHTML = zapatilla.descripcion;
                        objTr.appendChild(descripcion);

                        color.setAttribute("campo-dato", "color");
                        color.innerHTML = zapatilla.color;
                        objTr.appendChild(color);

                        fecha.setAttribute("campo-dato", "fecha");
                        fecha.innerHTML = zapatilla.fecha;
                        objTr.appendChild(fecha);

                        precio.setAttribute("campo-dato", "precio");
                        precio.innerHTML = "$" + zapatilla.precio;
                        objTr.appendChild(precio);

                        btnPdf.setAttribute("campo-dato", "pdf");
                        btnPdf.innerHTML = `<button onClick=abrirPdf("${zapatilla.codArt}")>PDF</button>`;
                        objTr.appendChild(btnPdf);

                        btnModi.setAttribute("campo-dato", "modi");
                        btnModi.innerHTML = `<button onClick=abrirModal("${zapatilla.codArt}")>Modif</button>`;
                        objTr.appendChild(btnModi);

                        btnBaja.setAttribute("campo-dato", "baja");
                        btnBaja.innerHTML = `<button onClick=bajaArt("${zapatilla.codArt}")>Borrar</button>`;
                        objTr.appendChild(btnBaja);

                        $("#tabla").append(objTr);
                    });
                }
            })
        });

        function contenedorActivo() {
            document.getElementById('contenedor').className = "contenedorActivo";
            document.getElementById('header').className = "contenedorActivo";
            document.getElementById('footer').className = "contenedorActivo";
        }

        function contenedorInactivo() {
            document.getElementById('contenedor').className = "contenedorInactivo";
            document.getElementById('header').className = "contenedorInactivo";
            document.getElementById('footer').className = "contenedorInactivo";
        }

        function cerrarModalAlta() {
            document.getElementById('modalAlta').className = "ventanaModalApagado";
            contenedorActivo();

            $("#codArtAlta").val("");
            $("#marcaAlta").val("");
            $("#descripcionAlta").val("");
            $("#colorAlta").val("");
            $("#fechaAlta").val("");
            $("#precioAlta").val("");
            $("#pdfAlta").val("");
        }

        function cerrarModalModi() {
            document.getElementById('modalModi').className = "ventanaModalApagado";
            contenedorActivo();

            $("#codArtModi").val("");
            $("#marcaModi").val("");
            $("#descripcionModi").val("");
            $("#colorModi").val("");
            $("#fechaModi").val("");
            $("#precioModi").val("");
        }

        function abrirPdf(codArt) {
            $.ajax({
                type: "get",
                url: "./traeDoc.php",
                data: { codArt: codArt },
                success: function (respuestaDelServer) {
                    var objetoDato = JSON.parse(respuestaDelServer);
                    document.getElementById('modalRes').className = "ventanaModalPrendido";
                    $("#respuestaServer").empty();
                    $("#respuestaServer").html("<iframe width='100%' height='600px' src='data:application/pdf;base64," + objetoDato.documentoPDF + "'></iframe>");
                }
            })
        }

        function abrirModal(codArt) {
            document.getElementById('modalModi').className = "ventanaModalPrendido";
            contenedorInactivo();

            $.ajax({
                type: "get",
                url: "./salidaJsonArticulo.php",
                data: { codArt: codArt },
                success: function (respuestaDelServer, estado) {
                    objetoDato = JSON.parse(respuestaDelServer);
                    $("#codArtModi").val(objetoDato.codArt);
                    $("#marcaModi").val(objetoDato.marca);
                    $("#descripcionModi").val(objetoDato.descripcion);
                    $("#colorModi").val(objetoDato.color);
                    $("#fechaModi").val(objetoDato.fecha);
                    $("#precioModi").val(objetoDato.precio);
                }
            });
        }

        function bajaArt(codArt) {
            if (confirm("¿Está seguro de borrar este registro?")) {
                $.ajax({
                    type: "post",
                    url: "./baja.php",
                    data: { codArt: codArt },
                    success: function (respuestaDelServer) {
                        document.getElementById('modalRes').className = "ventanaModalPrendido";
                        document.getElementById("respuestaServer").innerText = respuestaDelServer;
                    }
                });
            }
        }

        function habilitarAlta() {
            if (document.getElementById("formAlta").checkValidity() == true) {
                $("#envioAlta").attr("disabled", false).removeClass("disabled");
            }
            else {
                $("#envioAlta").attr("disabled", true).addClass("disabled");
            }
        }

        function habilitarModif() {
            if (document.getElementById("formModi").checkValidity() == true) {
                $("#envioModi").attr("disabled", false).removeClass("disabled");
            }
            else {
                $("#envioModi").attr("disabled", true).addClass("disabled");
            }
        }

        $("#envioAlta").click(function () {
            if (confirm("¿Está seguro de insertar este registro?")) {
                var data = new FormData($("#formAlta")[0]);

                $.ajax({
                    type: "post",
                    method: "post",
                    enctype: "multipart/form-data",
                    url: "./alta.php",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: data,
                    success: function (respuestaDelServer) {
                        document.getElementById('modalRes').className = "ventanaModalPrendido";
                        document.getElementById("respuestaServer").innerText = respuestaDelServer;
                    }
                })
            }
        })

        $("#envioModi").click(function () {
            if (confirm("¿Está seguro de modificar este registro?")) {
                var data = new FormData($("#formModi")[0]);

                $.ajax({
                    type: "post",
                    method: "post",
                    enctype: "multipart/form-data",
                    url: "./modi.php",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: data,
                    success: function (respuestaDelServer) {
                        document.getElementById('modalRes').className = "ventanaModalPrendido";
                        document.getElementById("respuestaServer").innerText = respuestaDelServer;
                    }
                })
            }
        })

        $("#vaciarDatos").click(function () {
            $("#tabla").empty();
            $("#cantidad").empty();
        });

        $("#limpiarFiltros").click(function () {
            $("#orden").val("codArt");
            $("#filterCodArt").val("");
            $("#filterMarca").val("");
            $("#filterDesc").val("");
            $("#filterColor").val("");
            $("#filterFecha").val("");
            $("#filterPrecio").val("");
        });

        $("#altaRegistro").click(function () {
            document.getElementById('modalAlta').className = "ventanaModalPrendido";
            contenedorInactivo();
            
            if ($("#codArtAlta").val() == "" || $("#descripcionAlta").val() == "" || $("#colorAlta").val() == "" || $("#fechaAlta").val() || $("#precioAlta").val()) {
                $("#envioAlta").attr("disabled", true).addClass('disabled');
            }
        });

        $("#cerrarModalAlta").click(function () {
            cerrarModalAlta();
        });

        $("#cerrarModalModi").click(function () {
            cerrarModalModi();
        });

        $("#cerrarModalRes").click(function () {
            document.getElementById('modalRes').className = "ventanaModalApagado";
            cerrarModalModi();
            cerrarModalAlta();
            contenedorActivo();
        });
    </script>
</body>

</html>