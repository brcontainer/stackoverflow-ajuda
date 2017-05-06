<?php
//Define o lugar que será salvo o arquivo com um nome aleatório
$arquivo = 'csv/' . uniqid(rand(), true) . '.csv';

if (empty($_FILES['file'])) {
    echo 'A requisição parece não ter vindo por POST';
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

// Lê o conteúdo do arquivo
while(!feof($handle)){
    // Pega os dados da linha
    $linha = fgets($handle, 1024);

    // Divide as Informações das celular para poder salvar
    $dados = explode(';', $linha);



     echo $dados[0]."<br>";


    // Verifica se o Dados Não é o cabeçalho ou não esta em branco
    if($dados[0] != 'Date' && !empty($linha)){


        //mysql_query('INSERT INTO emails (nome, email) VALUES ("'.$dados[0].'", "'.$dados[1].'")');
    }
}

// Fecha arquivo aberto
fclose($handle);

//Deleta o arquivo após usá-lo
unlink($arquivo);
