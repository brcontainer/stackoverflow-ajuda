<?php
//Define o lugar que ser� salvo o arquivo com um nome aleat�rio
$arquivo = 'csv/' . uniqid(rand(), true) . '.csv';

if (empty($_FILES['file'])) {
    echo 'A requisi��o parece n�o ter vindo por POST';
    echo 'Depurando:<br><pre>';
    print_r($_SERVER);
    print_r($_POST);
    echo '</pre>';
    exit;
} elseif ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
    echo 'Erro ao fazer o upload', $_FILES['file']['error'];
    exit;
} elseif (!move_uploaded_file($_FILES['file']['tmp_name'], $arquivo)) {
     echo 'Erro ao mover para a pasta';
     exit;
}

$handle = fopen($arquivo, 'rb');

//Verifica se o arquivo pode ser lido
if (!$handle) {
    echo 'Falha ao ler o arquivo';
    exit;
}

// L� o conte�do do arquivo
while(!feof($handle)){
    // Pega os dados da linha
    $linha = fgets($handle, 1024);

    // Divide as Informa��es das celular para poder salvar
    $dados = explode(';', $linha);



     echo $dados[0]."<br>";


    // Verifica se o Dados N�o � o cabe�alho ou n�o esta em branco
    if($dados[0] != 'Date' && !empty($linha)){


        //mysql_query('INSERT INTO emails (nome, email) VALUES ("'.$dados[0].'", "'.$dados[1].'")');
    }
}

// Fecha arquivo aberto
fclose($handle);

//Deleta o arquivo ap�s us�-lo
unlink($arquivo);
