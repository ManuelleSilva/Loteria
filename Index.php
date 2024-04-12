<!DOCTYPE html>
<html>
<head>
    <title>LOTO GRU</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post" action="procLoteria.php">
        <div>
        <label for="valor_aposta" class="lb_valor_aposta">Valor da Aposta:</label>
        <input type="number" id="valor_aposta" class="valor_aposta" name="valor_aposta" required><br>
</div><div>
        <label for="numeros">Escolha 25 números entre 1 e 50:</label><br>
        <?php
        for ($i = 1; $i <= 50; $i++) {
            echo "<label class='checkbox-container'><input type='checkbox' name='numeros[]' value='$i'><span class='checkmark' data-number='$i'></span></label>";
        }
        ?>
</div><div>
        <br><strong><span id="numSelecionados">0</span> números selecionados<br></strong>

        <script>
            document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => { 
                checkbox.addEventListener('change', () => {
                    const checkboxesSelecionados = document.querySelectorAll('input[type="checkbox"]:checked');
                    document.getElementById('numSelecionados').textContent = checkboxesSelecionados.length;
                });
            });
        </script>
</div><div>
        <br>
        <input type="submit" value="Apostar">
        </div>
    </form>
</body>
</html>
