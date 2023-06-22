<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10 - Ajax</title>
    <style>
        body {
            text-align: center;
            font-size: 18px;
        }

        button {
            background-color: #252525;
            color: white;
            cursor: pointer;
            font-size: 18px;
            padding: 5px;
            border: none;
            border-radius: 6px;
            transition: all 0.6s ease;
            margin-top: 10px;
        }

        button:hover {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
    <?php
    if (isset($_POST["encrypt"])) {
        $claveEncriptada = md5($_POST["encrypt"]);
        echo "<h2>Clave: " . $_POST["encrypt"] . "</h2>";
        echo "<h2>Clave encriptada en md5 (128 bits o 16 pares hexadecimales): <span style='color: red'>$claveEncriptada</span></h2>";

        echo "<br/>";

        $claveEncriptada = sha1($_POST["encrypt"]);
        echo "<h2>Clave: " . $_POST["encrypt"] . "</h2>";
        echo "<h2>Clave encriptada en sha1 (160 bits o 20 pares hexadecimales): <span style='color: red'>$claveEncriptada</span></h2>";
    } else {
        echo "<form action='./index.php' method='post'>";
        echo "<label>
                            Ingresé la clave a encriptar:
                            <input type='text' name='encrypt' required>
                    </label><br/>";

        echo "<button>Obtener encriptación</button>";
        echo "</form>";
    }
    ?>
</body>
</html>