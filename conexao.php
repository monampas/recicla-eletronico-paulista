<?php
    //$conexao=mysqli_connect('localhost','root','usbw','rep') or die ('Erro de conexao'); //conexão através do USBWEBSERVER
    //$conexao = new mysqli("localhost:3306", "root", "", "rep"); //conexão através do XAMPP
?>


<?php
$host = "localhost";
$user = "root";
$pass = "usbw";
$banco = "rep";

$conexao = mysqli_connect($host, $user, $pass, $banco);

// Verifica se houve erro na conexão
if (mysqli_connect_errno()) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}
?>
