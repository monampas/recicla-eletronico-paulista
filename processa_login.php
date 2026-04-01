<?php
session_start(); // Inicia a sessão no começo

require_once "conexao.php";

$email = $_POST['email'];
$senha = sha1($_POST['senha']); // Criptografa a senha para comparar no banco
$tipo  = $_POST['tipo'];

if ($tipo == 'rec') {
    // Consulta para receptor — verifica email e senha juntos
    $query = "SELECT id_receptor AS id, rec_nome AS nome FROM receptor WHERE rec_email = '$email' AND rec_senha = '$senha'";
    $user_type = 'receptor';
} else {
    // Consulta para descartador — verifica email e senha juntos
    $query = "SELECT id_descartador AS id, dec_nome AS nome FROM descartador WHERE dec_email = '$email' AND dec_senha = '$senha'";
    $user_type = 'descartador';
}

$resultado = mysqli_query($conexao, $query);

if (!$resultado) {
    // Caso haja erro na consulta SQL, mostra erro (opcional)
    die('Erro na consulta: ' . mysqli_error($conexao));
}

$usuario = mysqli_fetch_assoc($resultado);

if (!$usuario) {
    // Usuário não encontrado ou senha incorreta — redireciona para login com erro
    echo "<script>alert('Email e/ou senha incorretos.'); location.href='login.php'</script>";
    exit();
}

// Se usuário encontrado, cria as variáveis de sessão
$_SESSION['id'] = $usuario['id'];
$_SESSION['nome'] = $usuario['nome'];
$_SESSION['tipo'] = $user_type;

// Redireciona para a página de perfil
header('Location: perfil.php');
exit();
?>
