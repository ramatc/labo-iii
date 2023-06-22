<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <title>Ejercicio 10 - Ajax</title>
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        body {
            text-align: center;
            font-size: 18px;
        }

        img {
            cursor: pointer;
            padding-top: 20px;
            opacity: 0.1;
            transition: opacity 0.5s;
        }

        img:hover {
            opacity: 1;
        }

        main {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        div {
            height: 300px;
        }

        input {
            font-size: 18px;
        }

        .div1 {
            background-color: crimson;
            width: 25%;
        }

        .div2 {
            background-color: yellow;
            width: 25%;
        }

        .div3 {
            background-color: gray;
            width: 40%;
        }

        .div4 {
            background-color: lightblue;
            width: 30%;
        }

        .div5 {
            background-color: green;
            width: 60%
        }
    </style>
</head>
<body>
    <?php
    echo "<main>";
    echo "<div class='div1'>
        <h2> Ingresé la clave a encriptar:</h2>
        <input type='text' name='clave' id='clave' required>
        </div>";
    echo "<div class='div2'>
            <h2>Encriptar</h2>
            <img src='./flecha.webp'alt='Flecha' id='flecha'/>
        </div>";
    echo "<div class='div3' id='resultado'>
            <h2>Resultado:</h2>
        </div>";
    echo "<div class='div4' id='estado'>
            <h2>Estado del requerimiento:</h2>
        </div>";
    echo "<div class='div5'>
        </div>";
    echo "</main>";
    ?>
</body>
<script>
    $("#flecha" ).click(function() {
        if($("#clave").val() !== "") {
            $("#resultado").empty(); 
            $("#resultado").html("<h2>Esperando respuesta ..</h2>");
            $("#estado").empty(); 
            $("#estado").append("<h2>Estado del requerimiento: </h2>");
            $.ajax({
                type:"post",
                url: "./respuesta.php",
                data: { clave: $("#clave").val()},
                success: function(respuestaDelServer, estado) {
                    $("#resultado").html("<h2>Resultado:</h2>" + respuestaDelServer);
                    $("#estado").append("<h3>" + estado + "</h3>");
                }
            });
        } else alert("Es obligatorio ingresar una clave");
    });
</script>
</html>