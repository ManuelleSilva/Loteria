<?php

    $Escolhidos = $_POST['numeros'];
    $aposta = $_POST['valor_aposta'];

    if(count($Escolhidos) != 25){
        echo "Selecione exatamente 25 números para concluir a sua aposta!";
    }else{
        $nSorteados = array();
            for ($i = 0; $i < 25; $i++) {
                $nSorteados[] = rand(1, 50);
            }

            $nIguais = array_intersect($Escolhidos, $nSorteados);
            $Acertos = count($nIguais);

            if(($Acertos == 25) || ($Acertos == 0)){
                $premio = 50 * $aposta;
            }elseif(($Acertos >= 21) && ($Acertos < 25)){
                $premio = $Acertos  * $aposta;
            }else{
                $premio = 0;
            }

            echo "<strong>Números sorteados:</strong> " . implode(", ", $nSorteados) . "<br>";
            echo "<strong>Seus números: </strong>" . implode(", ", $Escolhidos) . "<br>";
            echo "<strong>Quantidade de acertos: </strong>" . $Acertos . "<br>";
            echo "<strong>Prêmio: </strong>R$" . number_format($premio, 2, ',', '.');

    }


?>