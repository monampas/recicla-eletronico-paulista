<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - REP</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <link rel="stylesheet" href="assets/styles.css/login.css" />
  <link rel="stylesheet" href="assets/styles.css/header.css" />
</head>

<body>
    <?php
    require_once 'cabecalho.php';
    ?>

<main>
    <div class="login-wrapper">
      <div class="login-container">
        <div class="form-header">
          <h1>Bem-vindo de volta!</h1>
          <p>Entre com sua conta para continuar</p>
        </div>

        <form action="processa_login.php" method="post" id="loginForm">
          <div class="user-type">
            <div class="radio-option">
              <input type="radio" name="tipo" value="rec" id="receptor" />
              <label for="receptor">
                <i class="fas fa-recycle"></i>
                <span>Receptor</span>
              </label>
            </div>
            <div class="radio-option">
              <input type="radio" name="tipo" value="desc" id="descartador" />
              <label for="descartador">
                <i class="fas fa-trash-alt"></i>
                <span>Descartador</span>
              </label>
            </div>
          </div>
          <div class="error-message" id="erroTipo">Por favor, selecione se você é Receptor ou Descartador.</div>
          <div class="input-group">
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Seu email" name="email" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Sua senha" name="senha" required />
              <button type="button" class="toggle-password">
                <i class="fas fa-eye"></i>
              </button>
            </div>
          </div>
          <button type="submit" class="cta-btn">
            <span>Entrar</span>
            <i class="fas fa-arrow-right"></i>
          </button>

          <div class="form-footer">
            <a href="esqueceu.php" class="link">Esqueceu a senha?</a>
            <div class="register-link">
              Não possui conta? <a href="cadastro.php">Cadastre-se</a>
            </div>
          </div>
        </form>

      </div>
    </div>
  </main>

  <footer>
    <p>&copy; 2025 Recicla Eletrônico Paulista - REP</p>
  </footer>

  <script>
    // Validação do radio antes de enviar
    document.getElementById("loginForm").addEventListener("submit", function (e) {
      const tipoSelecionado = document.querySelector('input[name="tipo"]:checked');
      if (!tipoSelecionado) {
        e.preventDefault();
        document.getElementById("erroTipo").style.display = "block";
      } else {
        document.getElementById("erroTipo").style.display = "none";
      }
    });

    // Toggle password visibility
    document.querySelector('.toggle-password').addEventListener('click', function () {
      const passwordInput = this.parentElement.querySelector('input');
      const icon = this.querySelector('i');

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    });
  </script>
</body>

</html>