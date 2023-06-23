<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 11 - Form to json</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        html,
        body {
            width: 100%;
            height: 100%;
        }

        .header, .footer {
            background-color: darkcyan;
            height: 10%;
        }

        .main {
            height: 80%;
            background-color: blanchedalmond
        }

        .btn {
            background-color: #252525;
            color: white;
            cursor: pointer;
            font-size: 18px;
            padding: 12px;
            border: none;
            transition: all 0.6s ease;
        }

        .btn:hover {
            background-color: red;
            color: white;
        }

        #contenedor {
            height: 100%;
        }
 
        .mainModal {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
        }

        .form {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            overflow: auto;
            background-color: #e16e75;
        }

        label {
            display: block;
        }

        .input {
            width: 100%;
            font-size: 18px;
        }

        .btnModal {
            margin: 10px;
            background-color: crimson;
            color: white;
            cursor: pointer;
            font-size: 18px;
            padding: 8px;
            border: none;
            border-radius: 6px;
            transition: all 0.6s ease;
        }

        .btnModal:hover {
            background-color: rgba(220, 20, 60, 0.636);
            color: white;
        }

        .ventanaModalApagado {
            visibility: hidden;
        }

        .ventanaModalPrendido {
            visibility: visible;
        }

        .contenedorActivo {
            opacity: 1;
            pointer-events: auto;
        }

        .contenedorInactivo {
            opacity: 0.3;
            pointer-events: none;
        }

        .btnForm {
            width: 30%;
            padding: 20px;
            background-color: #e16e75;
            color: #fafafa;
            cursor: pointer;
            border: 1px solid #252525;
            border-radius: 7px;
            font-size: 18px;
        }

        .entrada {
            height: auto;
            float: left;
            padding: 25px;
            background-color: #e16e75;
        }

        .barraControl {
            width: 100%;
            display: flex;
            justify-content: space-around;
            margin: 10px 0px;
        }

        #ventanaModal {
            height: 300px;
            position: fixed;
            top: 20%;
            left: 30%;
            padding: 20px;
            z-index: 10;
            width: 40%;
        }

        .encabezado {
            background-color: crimson;
            text-align: right;
            padding: 20px;
            font-weight: bold;
        }

        .encabezado button{ 
            color: white;
            border: none;
            background-color: crimson;
            font-size: 18px;
            cursor: pointer;
        }

        #resultado {
            width: 100%;
        }

        @media (max-width: 900px) {
            #ventanaModal {
                left: 0;
                width: auto;
            }
        }
    </style>
</head>
<body>
    <?php
    echo '<div id="contenedor">';
    echo '<header class="header"></header>';
    echo '<main class="main">
        <button id="abrirModal" class="btn">Ventana modal</button>
    </main>';
    echo '<footer class="footer"></footer>';
    echo '</div>';
    echo '<div id="ventanaModal">';
    echo '<div class="encabezado">';
    echo '<button id="cerrarModal">X</button>';
    echo '</div>';
    echo '<main class="mainModal">';
    echo '<div class="form">';
    echo '<div class="entrada">';
    echo '<label for="id">ID Usuario:</label>';
    echo '<input name="id" id="id" class="input" required />';
    echo '</div>';
    echo '<div class="entrada">';
    echo '<label for="login">Login:</label>';
    echo '<input name="login" id="login" class="input" required />';
    echo '</div>';
    echo '<div class="entrada">';
    echo '<label for="ape">Apellido:</label>';
    echo '<input name="ape" id="ape" class="input" required />';
    echo '</div>';
    echo '<div class="entrada">';
    echo '<label for="nombre">Nombres:</label>';
    echo '<input id="nombre" name="nombre" class="input" required />';
    echo '</div>';
    echo '<div class="entrada">';
    echo '<label for="fecha">Fecha de nacimiento:</label>';
    echo '<input type="date" id="nacim" name="nacim" required />';
    echo '</div>';
    echo '<div id="resultado">
    </div>';
    echo '<div class="barraControl">';
    echo '<button id="enviar" class="btnForm">Enviar</button>';
    echo '<button type="reset" class="btnForm">Reset</button>';
    echo '</div>';
    echo '</div></main></div>';
    ?>
</body>
<script>
        $(document).ready(function () {
            document.getElementById('contenedor').className = "contenedorActivo";
            document.getElementById('ventanaModal').className = "ventanaModalApagado";
        });

        $("#enviar" ).click(function() {
            $("#resultado").empty(); 
            $("#resultado").html("<h2>Esperando respuesta ..</h2>");
            $.ajax({
                type:"post",
                url: "./respuesta.php",
                data: { idUsuario: $("#id").val(), login: $("#login").val(), ape: $("#ape").val(), nombre: $("#nombre").val(), nacim: $("#nacim").val()},
                success: function(respuestaDelServer) {
                    $("#resultado").html("<h3>Resultado de la transformación a json en el servidor:</h3>" + respuestaDelServer);
                }
            });
        });

        $("#abrirModal").click(function() {
            document.getElementById('ventanaModal').className = "ventanaModalPrendido";
            document.getElementById('contenedor').className = "contenedorInactivo";
        })

        $("#cerrarModal").click(function() {
            document.getElementById('contenedor').className = "contenedorActivo";
            document.getElementById('ventanaModal').className = "ventanaModalApagado";
        })
    </script>
</html>