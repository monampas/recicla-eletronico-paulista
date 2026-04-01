<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Eletroportáteis - REP</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <link rel="stylesheet" href="assets/styles.css/eletronicos.css" />
  <link rel="stylesheet" href="assets/styles.css/header.css" />
</head>

<body>
      <?php 
        require_once 'cabecalho.php';
      ?>

  <main>
    <!-- Hero Section -->
    <section class="hero">
      <div class="hero-content">
        <h1>Eletroportáteis</h1>
        <p>Aprenda a descartar corretamente seus eletrodomésticos portáteis e contribua para um ambiente mais limpo</p>
      </div>
    </section>

    <!-- Tipos de Eletroportáteis -->
    <section class="electronics-types">
      <div class="section-header">
        <div class="header-icon">
          <i class="fas fa-blender"></i>
        </div>
        <h2>Tipos de Eletroportáteis</h2>
        <p class="section-description">Conheça os principais tipos de eletroportáteis que podem ser descartados</p>
      </div>

      <div class="types-grid">
        <div class="type-card">
          <div class="type-icon">
            <i class="fas fa-coffee"></i>
          </div>
          <h3>Cozinha</h3>
          <ul>
            <li>Cafeteiras</li>
            <li>Liquidificadores</li>
            <li>Processadores</li>
            <li>Sanduicheiras</li>
          </ul>
        </div>

        <div class="type-card">
          <div class="type-icon">
            <i class="fas fa-wind"></i>
          </div>
          <h3>Climatização</h3>
          <ul>
            <li>Ventiladores</li>
            <li>Aquecedores</li>
            <li>Umidificadores</li>
            <li>Circuladores</li>
          </ul>
        </div>

        <div class="type-card">
          <div class="type-icon">
            <i class="fas fa-tshirt"></i>
          </div>
          <h3>Cuidados Pessoais</h3>
          <ul>
            <li>Secadores</li>
            <li>Chapinhas</li>
            <li>Barbeadores</li>
            <li>Ferros de Passar</li>
          </ul>
        </div>

        <div class="type-card">
          <div class="type-icon">
            <i class="fas fa-broom"></i>
          </div>
          <h3>Limpeza</h3>
          <ul>
            <li>Aspiradores</li>
            <li>Vaporizadores</li>
            <li>Enceradeiras</li>
            <li>Varredores</li>
          </ul>
        </div>
      </div>
    </section>

    <!-- Cuidados no Descarte -->
    <section class="disposal-care">
      <div class="section-header">
        <div class="header-icon">
          <i class="fas fa-shield-alt"></i>
        </div>
        <h2>Cuidados no Descarte</h2>
        <p class="section-description">Siga estas recomendações para um descarte seguro dos seus eletroportáteis</p>
      </div>

      <div class="care-steps">
        <div class="care-step">
          <div class="step-number">1</div>
          <div class="step-content">
            <h3>Limpeza</h3>
            <p>Limpe bem o aparelho removendo resíduos e sujeiras</p>
            <div class="step-icon">
              <i class="fas fa-spray-can"></i>
            </div>
          </div>
        </div>

        <div class="care-step">
          <div class="step-number">2</div>
          <div class="step-content">
            <h3>Verificação</h3>
            <p>Certifique-se que o aparelho não está conectado à energia</p>
            <div class="step-icon">
              <i class="fas fa-plug"></i>
            </div>
          </div>
        </div>

        <div class="care-step">
          <div class="step-number">3</div>
          <div class="step-content">
            <h3>Desmontagem</h3>
            <p>Se possível, separe as partes plásticas das metálicas</p>
            <div class="step-icon">
              <i class="fas fa-tools"></i>
            </div>
          </div>
        </div>

        <div class="care-step">
          <div class="step-number">4</div>
          <div class="step-content">
            <h3>Embalagem</h3>
            <p>Proteja as partes cortantes e pontiagudas</p>
            <div class="step-icon">
              <i class="fas fa-box"></i>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Componentes Perigosos -->
    <section class="dangerous-components">
      <div class="section-header">
        <div class="header-icon">
          <i class="fas fa-exclamation-triangle"></i>
        </div>
        <h2>Componentes Perigosos</h2>
        <p class="section-description">Conheça os materiais que requerem atenção especial no descarte</p>
      </div>

      <div class="components-grid">
        <div class="component-card">
          <div class="component-icon danger">
            <i class="fas fa-bolt"></i>
          </div>
          <h3>Motores Elétricos</h3>
          <p>Contêm metais pesados e materiais condutores perigosos</p>
        </div>

        <div class="component-card">
          <div class="component-icon warning">
            <i class="fas fa-fire"></i>
          </div>
          <h3>Resistências</h3>
          <p>Elementos de aquecimento com materiais tóxicos</p>
        </div>

        <div class="component-card">
          <div class="component-icon caution">
            <i class="fas fa-plug"></i>
          </div>
          <h3>Cabos</h3>
          <p>Revestimentos plásticos e metais condutores nocivos</p>
        </div>

        <div class="component-card">
          <div class="component-icon info">
            <i class="fas fa-microchip"></i>
          </div>
          <h3>Placas</h3>
          <p>Circuitos eletrônicos com soldas e componentes tóxicos</p>
        </div>
      </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
      <div class="cta-content">
        <h2>Faça a Diferença!</h2>
        <p>Descarte seus eletroportáteis de forma responsável e ajude a preservar o meio ambiente</p>
        <div class="cta-buttons">
          <a href="cadastro.php?tipo=descartador" class="menu-btn destaque">
            <i class="fas fa-recycle"></i>
            Descartar Agora
          </a>
          <a href="sobre.php" class="menu-btn">
            <i class="fas fa-info-circle"></i>
            Saiba Mais
          </a>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <div class="footer-content">
      <div class="footer-info">
        <img src="assets/imagens/Design sem nome (5).png" alt="REP Logo" class="footer-logo">
        <p>Recicla Eletrônico Paulista - REP</p>
        <div class="social-links">
          <a href="#" title="Facebook"><i class="fab fa-facebook"></i></a>
          <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
          <a href="#" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
        </div>
      </div>
      <p class="copyright">&copy; 2025 Recicla Eletrônico Paulista - REP. Todos os direitos reservados.</p>
    </div>
  </footer>
</body>

</html>
