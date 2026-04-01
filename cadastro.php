<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Escolher Tipo de Cadastro - REP</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <link rel="stylesheet" href="assets/styles.css/cadastro.css" />
  <link rel="stylesheet" href="assets/styles.css/header.css" />

</head>

<body>
  <?php
  require_once 'cabecalho.php';
  ?>

  <main>
    <div class="register-wrapper">
      <div class="register-container">
        <div class="form-header">
          <h1>Bem-vindo ao REP!</h1>
          <p>Escolha como você quer participar</p>
        </div>

        <div class="choice-container">
          <a href="descartador.php" class="choice-card">
            <div class="card-icon">
              <i class="fas fa-trash-alt"></i>
            </div>
            <div class="card-content">
              <h2>Sou Descartador</h2>
              <p>Quero descartar meus resíduos eletrônicos de forma responsável</p>
              <span class="card-arrow">
                <i class="fas fa-arrow-right"></i>
              </span>
            </div>
          </a>

          <div class="divider">
            <span>ou</span>
          </div>

          <a href="receptor.php" class="choice-card">
            <div class="card-icon">
              <i class="fas fa-recycle"></i>
            </div>
            <div class="card-content">
              <h2>Sou Receptor</h2>
              <p>Quero receber resíduos eletrônicos para reciclagem</p>
              <span class="card-arrow">
                <i class="fas fa-arrow-right"></i>
              </span>
            </div>
          </a>
        </div>

        <div class="form-footer">
          <p>Já possui uma conta? <a href="login.php" class="link">Faça login</a></p>
        </div>
      </div>
    </div>
  </main>

  <footer>
    <p>&copy; 2025 Recicla Eletrônico Paulista - REP</p>
  </footer>
</body>

</html>