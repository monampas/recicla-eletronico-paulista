<?php
//cadastro receptor
$rec_nome = $_POST["rec_nome"];
$rec_email = $_POST["rec_email"];
$rec_senha = sha1($_POST["rec_senha"]);
$rec_telefone = $_POST["rec_telefone"];
$rec_cpf_cnpj = $_POST["rec_cpf_cnpj"];
$rec_endereco = $_POST["rec_endereco"];

// cadastro endereço
$end_numero = $_POST["end_numero"];
$end_cep = $_POST["end_cep"];
$end_complemento = $_POST["end_complemento"];

// conexão com o banco
require_once "conexao.php";

// verificação se há um email já cadastrado
$checagem = "SELECT rec_email FROM receptor WHERE rec_email='$rec_email' ";
$exechecagem = mysqli_query($conexao, $checagem);
$contagemchec = mysqli_num_rows($exechecagem);
// num_rows faz a contagem de linhas, se maior que 1, já existe email cadastrado

if ($contagemchec > 0) {
    echo "<script>alert('Esse e-mail já está cadastrado! Por favor, tente novamente com um outro e-mail'); location.href='receptor.php'</script>";
} else {

    $rec_endereco .= $end_numero;
    $rec_endereco .= $end_complemento;

    // inserindo os dados na tabela receptor
    $query = "INSERT INTO receptor (rec_nome,rec_email,rec_senha,rec_cpf_cnpj,rec_telefone,rec_endereco) VALUES ('$rec_nome','$rec_email','$rec_senha','$rec_cpf_cnpj','$rec_telefone','$rec_endereco')";
    $inserir = mysqli_query($conexao, $query);

    // conferindo se a inserção ocorreu ou não
    if ($inserir == TRUE) {
        echo "<script>alert('Cadastro Realizado com sucesso!'); location.href='login.php'</script>";
    } else {
        echo "<script>alert('Ocorreu um erro ao realizar o cadastro. Tente Novamente!'); location.href='cadastro.php'</script>";
    }
}
?>