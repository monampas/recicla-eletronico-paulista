<?php
// cadastro descartador
$dec_nome = $_POST["dec_nome"];
$dec_email = $_POST["dec_email"];
$dec_senha = sha1($_POST["dec_senha"]);
$dec_telefone = $_POST["dec_telefone"];
$dec_cpf = $_POST["dec_cpf"];

// cadastro endereço
$end_endereco = $_POST["end_endereco"];
$end_numero = $_POST["end_numero"];
$end_cep = $_POST["end_cep"];
$end_complemento = $_POST["end_complemento"];

// conexão com o banco
require_once "conexao.php";

// verificação se há um email já cadastrado
$checagem = "SELECT dec_email FROM descartador WHERE dec_email='$dec_email' ";
$exechecagem = mysqli_query($conexao, $checagem);
$contagemchec = mysqli_num_rows($exechecagem);
// num_rows faz a contagem de linhas, se maior que 1, já existe email cadastrado

if ($contagemchec > 0) {
    echo "<script>alert('Esse e-mail já está cadastrado. Por favor, tente novamente com um outro e-mail!'); location.href='descartador.php'</script>";
} else {

    // inserindo os dados na tabela descartador (1)
    $query = "INSERT INTO descartador (dec_nome,dec_email,dec_senha,dec_cpf,dec_telefone) VALUES ('$dec_nome','$dec_email','$dec_senha','$dec_cpf','$dec_telefone')";
    $inserir = mysqli_query($conexao, $query);

    // selecionando o último id cadastrado (2)
    $selecao_desc = "SELECT id_descartador FROM descartador ORDER BY id_descartador DESC";
    $ver_id = mysqli_query($conexao, $selecao_desc);

    // (3)
    $array_id_descartador = mysqli_fetch_array($ver_id);
    $id_descartador = $array_id_descartador['id_descartador'];

    // print_r($id_descartador);exit; 

    // inserindo os dados na tabela endereço, com o id do descartador (4)
    $query2 = "INSERT INTO endereco (end_nome,end_numero,end_cep,end_complemento,id_descartador_fk) VALUES ('$end_endereco','$end_numero','$end_cep','$end_complemento',$id_descartador)";
    $inserir2 = mysqli_query($conexao, $query2);

    //echo $query;exit;  TESTE

    // verificação se os dados foram inseridos ou não
    if (($inserir == TRUE) && ($inserir2 == TRUE)) {
        echo "<script>alert('Cadastro Realizado com sucesso!'); location.href='login.php'</script>";
    } else {
        echo "<script>alert('Ocorreu um erro ao realizar o cadastro. Tente Novamente!'); location.href='cadastro.php'</script>";
    }
}
?>