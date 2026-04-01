<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro - Receptor</title>
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
          <h1>Cadastro de Receptor</h1>
          <p>Preencha seus dados para começar a receber</p>
        </div>

        <form action="cadastro_receptor.php" method="POST" id="formReceptor">
          <div class="form-sections">
            <!-- Seção de Dados Pessoais -->
            <div class="form-section">
              <h2><i class="fas fa-building"></i> Dados da Empresa</h2>
              <div class="input-group">
                <div class="input-field">
                  <input type="text" id="rec_nome" name="rec_nome" required>
                  <label for="rec_nome">Razão Social</label>
                </div>

                <div class="input-row">
                  <div class="input-field">
                    <input type="text" id="rec_cpf_cnpj" name="rec_cpf_cnpj" required>
                    <label for="rec_cpf_cnpj">CNPJ/CPF</label>
                  </div>
                  <div class="input-field">
                    <input type="tel" id="rec_telefone" name="rec_telefone" required>
                    <label for="rec_telefone">Telefone Comercial</label>
                  </div>
                </div>

                <div class="input-row">
                  <div class="input-field">
                    <input type="email" id="rec_email" name="rec_email" required>
                    <label for="rec_email">E-mail Comercial</label>
                  </div>
                  <div class="input-field">
                    <input type="password" id="rec_senha" name="rec_senha" required>
                    <label for="rec_senha">Senha</label>
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
                  <input type="text" id="rec_endereco" name="rec_endereco" required>
                  <label for="rec_endereco">Endereço</label>
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
      const passwordInput = document.getElementById('rec_senha');
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

          document.getElementById('rec_endereco').value = `${data.logradouro}, ${data.bairro}, ${data.localidade} - ${data.uf}`;
        })
        .catch(error => {
          console.error('Erro:', error);
          alert('Erro ao buscar CEP');
        });
    });

    // Máscara para CNPJ
    document.getElementById('rec_cpf_cnpj').addEventListener('input', function (e) {
      let value = e.target.value.replace(/\D/g, '');

      if (value.length <= 11) {
        // Máscara CPF
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
      } else {
        // Máscara CNPJ
        value = value.slice(0, 14);
        value = value.replace(/^(\d{2})(\d)/, '$1.$2');
        value = value.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
        value = value.replace(/\.(\d{3})(\d)/, '.$1/$2');
        value = value.replace(/(\d{4})(\d)/, '$1-$2');
      }

      e.target.value = value;
    });

    // Validação ao enviar
    document.getElementById('formReceptor').addEventListener('submit', function (e) {
      let valor = document.getElementById('rec_cpf_cnpj').value.replace(/\D/g, '');

      function validaCPF(cpf) {
        if (cpf.length !== 11 || /^(\d)\1{10}$/.test(cpf)) return false;
        let soma = 0, resto;
        for (let i = 1; i <= 9; i++) soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
        resto = (soma * 10) % 11;
        if (resto === 10 || resto === 11) resto = 0;
        if (resto !== parseInt(cpf.substring(9, 10))) return false;
        soma = 0;
        for (let i = 1; i <= 10; i++) soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
        resto = (soma * 10) % 11;
        if (resto === 10 || resto === 11) resto = 0;
        if (resto !== parseInt(cpf.substring(10, 11))) return false;
        return true;
      }

      function validaCNPJ(cnpj) {
        if (cnpj.length !== 14 || /^(\d)\1{13}$/.test(cnpj)) return false;
        let tamanho = cnpj.length - 2;
        let numeros = cnpj.substring(0, tamanho);
        let digitos = cnpj.substring(tamanho);
        let soma = 0;
        let pos = tamanho - 7;

        for (let i = tamanho; i >= 1; i--) {
          soma += parseInt(numeros.charAt(tamanho - i)) * pos--;
          if (pos < 2) pos = 9;
        }

        let resultado = soma % 11 < 2 ? 0 : 11 - (soma % 11);
        if (resultado !== parseInt(digitos.charAt(0))) return false;

        tamanho++;
        numeros = cnpj.substring(0, tamanho);
        soma = 0;
        pos = tamanho - 7;

        for (let i = tamanho; i >= 1; i--) {
          soma += parseInt(numeros.charAt(tamanho - i)) * pos--;
          if (pos < 2) pos = 9;
        }

        resultado = soma % 11 < 2 ? 0 : 11 - (soma % 11);
        if (resultado !== parseInt(digitos.charAt(1))) return false;

        return true;
      }

      // Aqui entra a condição de validação
      if (valor.length === 11) {
        if (!validaCPF(valor)) {
          e.preventDefault();
          alert("CPF inválido.");
        }
      } else if (valor.length === 14) {
        if (!validaCNPJ(valor)) {
          e.preventDefault();
          alert("CNPJ inválido.");
        }
      } else {
        e.preventDefault();
        alert("CPF ou CNPJ inválido. Verifique os dados.");
      }
    });

    // Máscara para telefone
    document.getElementById('rec_telefone').addEventListener('input', function (e) {
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