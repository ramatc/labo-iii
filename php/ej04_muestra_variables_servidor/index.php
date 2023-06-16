<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 - Muestra variables servidor</title>
    <style>
        * {
            box-sizing: border-box;
        }

        p {
            padding: 0;
            margin: 0;
        }

        table {
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        td {
            background-color: #FFFFE0;
        }
    </style>
</head>
<body>
    <?php
    echo "<h1>Variables de servidor</h1>";
    echo "<table>
        <tr>
            <td>SERVER_ADDR</td>
            <td>" . $_SERVER['SERVER_ADDR'] . "</td>
        </tr>
        <tr>
            <td>SERVER_PORT</td>
            <td>" . $_SERVER['SERVER_PORT'] . "</td>
        </tr>
        <tr>
            <td>SERVER_NAME</td>
            <td>" . $_SERVER['SERVER_NAME'] . "</td>
        </tr>
        <tr>
            <td>DOCUMENT_ROOT</td>
            <td>" . $_SERVER['DOCUMENT_ROOT'] . "</td>
        </tr>
    </table>";

    echo "<h1>Variables de cliente</h1>";
    echo "<table>
        <tr>
            <td>REMOTE_ADDR</td>
            <td>" . $_SERVER['REMOTE_ADDR'] . "</td>
        </tr>
        <tr>
            <td>REMOTE_PORT</td>
            <td>" . $_SERVER['REMOTE_PORT'] . "</td>
        </tr>
    </table>";

    echo "<h1>Variables de requerimiento</h1>";
    echo "<table>
            <tr>
                <td>SCRIPT_NAME</td>
                <td>" . $_SERVER['SCRIPT_NAME'] . "</td>
            </tr>
            <tr>
                <td>REQUEST_METHOD</td>
                <td>" . $_SERVER['REQUEST_METHOD'] . "</td>
            </tr>
    </table>";

    echo "<h1>TODAS</h1>";
    foreach ($_SERVER as $key_name => $key_value) {
        echo "<p>$key_name=$key_value</p>";
    }
    ?>
</body>
</html>