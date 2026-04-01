<?php
session_start(); //utilizado para verificar se um usuário esta logado

// utilizado para capturar o nome do arquivo atual
$pagina_atual = basename($_SERVER['PHP_SELF']);

$paginas = [
    'index.php' => ['nome' => 'Início', 'ativo' => true], // visível para o menu
    'cadastro.php' => ['nome' => 'Cadastro', 'ativo' => true], // visível para o menu
    'login.php' => ['nome' => 'Login', 'ativo' => true], // visível para o menu
    'sobre.php' => ['nome' => 'Sobre', 'ativo' => true], // visível para o menu
];

if (isset($_SESSION["nome"])) {
    $paginas = [
        'index.php' => ['nome' => 'Início', 'ativo' => true], // visível para o menu
        'cadastro.php' => ['nome' => 'Cadastro', 'ativo' => false], // invisível para o menu
        'login.php' => ['nome' => 'Login', 'ativo' => false], // invisível para o menu
        'perfil.php' => ['nome' => 'Perfil', 'ativo' => true], // visível para o menu
        'localizador.php' => ['nome' => 'Mapa', 'ativo' => true], // visível para o menu        
        'sobre.php' => ['nome' => 'Sobre', 'ativo' => true], // visível para o menu
        'logout.php' => ['nome' => 'Logout', 'ativo' => true], // visível para o menu
    ];
}
?>

<header>
  <div class="logo">
    <a href="index.php" aria-label="Página inicial">
      <img src="assets/imagens/logo.png" alt="Logo REP" class="home-icon-img" />
    </a>
    <span>REP</span>
  </div>

  <nav>
    <ul class="menu-list">
      <?php
      foreach ($paginas as $arquivo => $info) {
          // Oculta a página atual ou se ela estiver desativada
          if ($arquivo !== $pagina_atual && $info['ativo']) {
              echo "<li><a href='$arquivo' class='menu-btn'>{$info['nome']}</a></li>";
          }
      }

      // Aba extra só na página de login
      if ($pagina_atual === 'login.php') {
          echo "<li><a href='esqueceu.php' class='menu-btn'>Esqueceu a senha?</a></li>";
      }
      ?>
    </ul>
  </nav>
</header>

