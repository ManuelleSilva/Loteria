<!DOCTYPE html>
<html>
<head>
    <title>LOTO GRU</title>
    <style>
        body {
            text-align: center;
            margin-top: 50px;
        }

        .checkbox-container {
            display: inline-block;
            margin: 10px;
            cursor: pointer;
            padding: 17px 17px;
            font-size: 15px;
            border: 1px solid #ccc;
            background-color: #fff;
            border-radius: 2px;
            position: relative; 
            user-select: none;
        }

        .checkbox-container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            top: 0;
            left: 0;
            margin: 0;
            padding: 0;
            z-index: 1; 
        }

        .checkmark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); 
            background-color: #eee;
            border-radius: 3px;
            width: 20px;
            height: 20px;
            line-height: 20px;
            text-align: center;
            z-index: 0;
        }

        .checkbox-container:hover .checkmark {
            background-color: #ccc;
        }

        .checkbox-container input:checked + .checkmark {
            background-color: #2196F3;
        }

        .checkmark:after {
            content: attr(data-number);
            z-index: 1;
        }
    </style>
</head>
<body>
    <form method="post" action="procLoteria.php">

        <label for="valor_aposta">Valor da Aposta:</label>
        <input type="number" id="valor_aposta" name="valor_aposta" required><br>

        <label for="numeros">Escolha 25 números entre 1 e 50:</label><br>
        <?php
        for ($i = 1; $i <= 50; $i++) {
            echo "<label class='checkbox-container'><input type='checkbox' name='numeros[]' value='$i'><span class='checkmark' data-number='$i'></span></label>";
        }
        ?>

        <br><strong><span id="numSelecionados">0</span> números selecionados<br></strong>

        <script>
            document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => { 
                checkbox.addEventListener('change', () => {
                    const checkboxesSelecionados = document.querySelectorAll('input[type="checkbox"]:checked');
                    document.getElementById('numSelecionados').textContent = checkboxesSelecionados.length;
                });
            });
        </script>

        <br>
        <input type="submit" value="Apostar">

    </form>
</body>
</html>
