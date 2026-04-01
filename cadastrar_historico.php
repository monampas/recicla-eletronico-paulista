<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['id']) || $_SESSION['tipo'] !== 'receptor') {
    echo "<script>alert('Acesso negado.'); location.href='login.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_receptor = $_SESSION['id'];
    $id_descartador = intval($_POST['id_descartador']);
    $residuos = $_POST['residuos'] ?? [];

    if (!$id_descartador || empty($residuos)) {
        echo "<script>alert('Preencha todos os campos.'); history.back();</script>";
        exit;
    }

    // Inserir na tabela historico
    $data = date('Y-m-d H:i:s');
    $queryHistorico = "INSERT INTO historico (data_HIST, id_descartador_fk, id_receptor_fk) 
                       VALUES ('$data', $id_descartador, $id_receptor)";
    $resultado = mysqli_query($conexao, $queryHistorico);

    if (!$resultado) {
        echo "<script>alert('Erro ao cadastrar histórico.'); history.back();</script>";
        exit;
    }

    $id_historico = mysqli_insert_id($conexao);

    // Inserir resíduos
    foreach ($residuos as $id_residuo) {
        $id_residuo = intval($id_residuo);
        mysqli_query($conexao, "INSERT INTO historico_residuo (id_historico_fk, id_residuo_fk) 
                                VALUES ($id_historico, $id_residuo)");
    }

    echo "<script>alert('Histórico cadastrado com sucesso!'); location.href='perfil.php';</script>";
    exit;
} else {
    echo "<script>alert('Método inválido.'); location.href='perfil.php';</script>";
}
?>
