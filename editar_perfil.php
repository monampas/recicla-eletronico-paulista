<?php
session_start(); // Inicia a sessão no começo

// conexão com o banco
require_once "conexao.php";

if (isset($_SESSION['id']) && ($_SESSION['tipo'] == 'descartador')) {

    // recebimento das informações para realização do update no banco de dados
    // informações do descartador
    $dec_nome = $_POST['dec_nome'];
    $dec_telefone = $_POST['dec_telefone'];
    $dec_email = $_POST['dec_email'];
    $dec_cpf = $_POST['dec_cpf'];

    // informações do endereco
    $end_nome = $_POST['end_nome'];
    $end_numero = $_POST['end_numero'];
    $end_cep = $_POST['end_cep'];
    $end_complemento = $_POST['end_complemento'];

    // comando sql para realizar a atualização das informações pessoais
    $pessoal = "UPDATE descartador SET dec_nome = '$dec_nome', dec_telefone = '$dec_telefone', dec_email = '$dec_email', dec_cpf = '$dec_cpf' WHERE id_descartador = {$_SESSION['id']}";

    // comando sql para realizar a atualização dos dados do endereço
    $endereco = "UPDATE endereco SET end_nome = '$end_nome', end_numero = '$end_numero', end_cep = '$end_cep', end_complemento = '$end_complemento' WHERE id_descartador_fk = {$_SESSION['id']}";

    // execução dos comandos (comunicação com o banco)
    $edicao_pessoal = mysqli_query($conexao, $pessoal);
    $edicao_endereco = mysqli_query($conexao, $endereco);

    if (($edicao_pessoal == TRUE) && ($edicao_endereco == TRUE)) {
        echo "<script>alert('Dados atualizados com sucesso'); location.href='perfil.php'</script>";
    } else {
        echo "<script>alert('Erro ao atualizar o perfil. Tente Novamente!'); location.href='perfil.php'</script>";
    }
} else {

    // recebimento das informações para realização do update no banco de dados
    // informações do receptor
    $rec_nome = $_POST['rec_nome'];
    $rec_telefone = $_POST['rec_telefone'];
    $rec_email = $_POST['rec_email'];
    $rec_cpf_cnpj = $_POST['rec_cpf_cnpj'];
    $rec_endereco = $_POST['rec_endereco'];

    // comando sql para realizar a atualização das informações pessoais
    $pessoal = "UPDATE receptor SET rec_nome = '$rec_nome', rec_telefone = '$rec_telefone', rec_email = '$rec_email', rec_cpf_cnpj = '$rec_cpf_cnpj' WHERE id_receptor = {$_SESSION['id']}";

    // execução dos comandos (comunicação com o banco)
    $edicao_pessoal = mysqli_query($conexao, $pessoal);

    if ($edicao_pessoal == TRUE) {
        echo "<script>alert('Dados atualizados com sucesso'); location.href='perfil.php'</script>";
    } else {
        echo "<script>alert('Erro ao atualizar o perfil. Tente Novamente!'); location.href='perfil.php'</script>";
    }
}
?>