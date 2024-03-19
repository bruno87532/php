,<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivinhando a senha</title>
</head>
<body>
<?php
if($_POST['senha'] != "minhasenha123"){
    if(!file_exists("senhas_enviadas.txt")){
        $senhas = fopen("senhas_enviadas.txt", "w");
    }else{
        $senhas = fopen("senhas_enviadas.txt", "a");
    }
    fwrite($senhas, $_POST['senha']."\n");
    fflush($senhas);
    fclose($senhas);

    $senhas = fopen("senhas_enviadas.txt", "r");
    while(!feof($senhas)){
        $escreve_senha = fgets($senhas);
        echo $escreve_senha."<br>".PHP_EOL;
    }
    fclose($senhas);
}else{
    echo "Parabéns, você acertou"."<br>".PHP_EOL;
}
?>
</body>
</html>
