<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro - Descartador</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <link rel="stylesheet" href="assets/styles.css/descartador.css" />
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
          <h1>Cadastro de Descartador</h1>
          <p>Preencha seus dados para começar a descartar</p>
        </div>

        <!-- INÍCIO DO FORM -->
        <form action="cadastro_descartador.php" method="POST" id="formDescartador">
          <div class="form-sections">
            <!-- Seção de Dados Pessoais -->
            <div class="form-section">
              <h2><i class="fas fa-user"></i> Dados Pessoais</h2>
              <div class="input-group">
                <div class="input-field">
                  <input type="text" id="dec_nome" name="dec_nome" required>
                  <label for="dec_nome">Nome Completo</label>
                </div>

                <div class="input-row">
                  <div class="input-field">
                    <input type="text" id="dec_cpf" name="dec_cpf" required>
                    <label for="dec_cpf">CPF</label>
                  </div>
                  <div class="input-field">
                    <input type="text" id="dec_telefone" name="dec_telefone" required>
                    <label for="dec_telefone">Telefone</label>
                  </div>
                </div>

                <div class="input-row">
                  <div class="input-field">
                    <input type="email" id="dec_email" name="dec_email" required>
                    <label for="dec_email">E-mail</label>
                  </div>
                  <div class="input-field">
                    <input type="password" id="dec_senha" name="dec_senha" required>
                    <label for="dec_senha">Senha</label>
                    <button type="button" class="toggle-password">
                      <i class="fas fa-eye"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Seção de Endereço -->
            <div class="form-section">
              <h2><i class="fas fa-map-marker-alt"></i> Endereço</h2>
              <div class="input-group">
                <div class="input-row">
                  <div class="input-field">
                    <input type="text" id="end_cep" name="end_cep" required>
                    <label for="end_cep">CEP</label>
                    <button type="button" class="search-cep">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>

                <div class="input-field">
                  <input type="text" id="end_endereco" name="end_endereco" required>
                  <label for="end_endereco">Endereço</label>
                </div>

                <div class="input-row">
                  <div class="input-field">
                    <input type="number" id="end_numero" name="end_numero" required>
                    <label for="end_numero">Número</label>
                  </div>
                  <div class="input-field">
                    <input type="text" id="end_complemento" name="end_complemento">
                    <label for="end_complemento">Complemento</label>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="form-footer">
            <button type="submit" class="cta-btn">
              <span>Criar Conta</span>
              <i class="fas fa-arrow-right"></i>
            </button>
            <p class="login-link">
              Já possui uma conta? <a href="login.php">Faça login</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </main>

  <footer>
    <p>&copy; 2025 Recicla Eletrônico Paulista - REP</p>
  </footer>

  <script>
    // Toggle password visibility
    document.querySelector('.toggle-password').addEventListener('click', function () {
      const passwordInput = document.getElementById('dec_senha');
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

    // Busca CEP
    document.querySelector('.search-cep').addEventListener('click', function () {
      const cep = document.getElementById('end_cep').value.replace(/\D/g, '');

      if (cep.length !== 8) {
        alert('CEP inválido');
        return;
      }

      fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then(response => response.json())
        .then(data => {
          if (data.erro) {
            alert('CEP não encontrado');
            return;
          }

          document.getElementById('end_endereco').value = `${data.logradouro}, ${data.bairro}, ${data.localidade} - ${data.uf}`;
        })
        .catch(error => {
          console.error('Erro:', error);
          alert('Erro ao buscar CEP');
        });
    });

    // Máscara para CPF
    document.getElementById('dec_cpf').addEventListener('input', function (e) {
      let value = e.target.value.replace(/\D/g, '');
      if (value.length > 11) value = value.slice(0, 11);
      value = value.replace(/(\d{3})(\d)/, '$1.$2');
      value = value.replace(/(\d{3})(\d)/, '$1.$2');
      value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
      e.target.value = value;
    });

    // cálculo do CPF
    document.getElementById('formDescartador').addEventListener('submit', function (e) {
      let dec_cpf = document.getElementById('dec_cpf').value.replace(/[^\d]/g, ''); // remove pontos e traços

      function TestaCPF(strCPF) {
        var Soma = 0;
        var Resto;

        if (strCPF.length !== 11 || /^(\d)\1{10}$/.test(strCPF)) return false;

        for (let i = 1; i <= 9; i++) {
          Soma += parseInt(strCPF.substring(i - 1, i)) * (11 - i);
        }

        Resto = (Soma * 10) % 11;
        if (Resto === 10 || Resto === 11) Resto = 0;
        if (Resto !== parseInt(strCPF.substring(9, 10))) return false;

        Soma = 0;
        for (let i = 1; i <= 10; i++) {
          Soma += parseInt(strCPF.substring(i - 1, i)) * (12 - i);
        }

        Resto = (Soma * 10) % 11;
        if (Resto === 10 || Resto === 11) Resto = 0;
        if (Resto !== parseInt(strCPF.substring(10, 11))) return false;

        return true;
      }

      if (!TestaCPF(dec_cpf)) {
        e.preventDefault(); // impede envio ao PHP
        alert("CPF inválido. Verifique e tente novamente.");
      }
    });

    // Máscara para telefone
    document.getElementById('dec_telefone').addEventListener('input', function (e) {
      let value = e.target.value.replace(/\D/g, '');
      if (value.length > 11) value = value.slice(0, 11);
      value = value.replace(/(\d{2})(\d)/, '($1) $2');
      value = value.replace(/(\d{4,5})(\d{4})$/, '$1-$2');
      e.target.value = value;
    });

    // Máscara para CEP
    document.getElementById('end_cep').addEventListener('input', function (e) {
      let value = e.target.value.replace(/\D/g, '');
      if (value.length > 8) value = value.slice(0, 8);
      value = value.replace(/(\d{5})(\d)/, '$1-$2');
      e.target.value = value;
    });
  </script>
</body>

</html>