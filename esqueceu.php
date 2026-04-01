<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Esqueci a Senha - REP</title>
  <link rel="stylesheet" href="assets/styles.css/esqueceu.css">
  <link rel="stylesheet" href="assets/styles.css/header.css" />
</head>
<body>
      <?php 
        require_once 'cabecalho.php';
      ?>
  <main>
    <section class="login-container">
      <h1>Esqueci a Senha</h1>
      <p>Digite seu e-mail para receber o link de redefinição de senha.</p>
      <form>
        <input type="email" placeholder="Seu e-mail" required>
        <button type="submit" class="cta-btn">Enviar link</button>
      </form>
      <a href="login.php" class="link">Lembrou a senha? Faça login</a>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Recicla Eletrônico Paulista - REP</p>
  </footer>
</body>
</html>
