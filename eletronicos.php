<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Eletrônicos em Geral - REP</title>
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
        <h1>Eletrônicos em Geral</h1>
        <p>Descubra como descartar corretamente seus dispositivos eletrônicos e contribua para um futuro mais sustentável</p>
      </div>
    </section>

    <!-- Tipos de Eletrônicos -->
    <section class="electronics-types">
      <div class="section-header">
        <div class="header-icon">
          <i class="fas fa-mobile-alt"></i>
        </div>
        <h2>Tipos de Eletrônicos</h2>
        <p class="section-description">Conheça os principais tipos de eletrônicos que podem ser descartados</p>
      </div>

      <div class="types-grid">
        <div class="type-card">
          <div class="type-icon">
            <i class="fas fa-mobile-alt"></i>
          </div>
          <h3>Smartphones</h3>
          <ul>
            <li>Celulares antigos</li>
            <li>Smartphones quebrados</li>
            <li>Baterias de celular</li>
            <li>Carregadores</li>
          </ul>
        </div>

        <div class="type-card">
          <div class="type-icon">
            <i class="fas fa-tablet-alt"></i>
          </div>
          <h3>Tablets</h3>
          <ul>
            <li>Tablets danificados</li>
            <li>E-readers</li>
            <li>Acessórios</li>
            <li>Capas e suportes</li>
          </ul>
        </div>

        <div class="type-card">
          <div class="type-icon">
            <i class="fas fa-headphones"></i>
          </div>
          <h3>Acessórios</h3>
          <ul>
            <li>Fones de ouvido</li>
            <li>Cabos USB</li>
            <li>Carregadores</li>
            <li>Adaptadores</li>
          </ul>
        </div>

        <div class="type-card">
          <div class="type-icon">
            <i class="fas fa-gamepad"></i>
          </div>
          <h3>Games</h3>
          <ul>
            <li>Controles</li>
            <li>Consoles antigos</li>
            <li>Acessórios de jogos</li>
            <li>Cartuchos</li>
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
        <p class="section-description">Siga estas recomendações para um descarte seguro dos seus eletrônicos</p>
      </div>

      <div class="care-steps">
        <div class="care-step">
          <div class="step-number">1</div>
          <div class="step-content">
            <h3>Backup de Dados</h3>
            <p>Faça backup de todos os seus dados pessoais antes do descarte</p>
            <div class="step-icon">
              <i class="fas fa-database"></i>
            </div>
          </div>
        </div>

        <div class="care-step">
          <div class="step-number">2</div>
          <div class="step-content">
            <h3>Restauração de Fábrica</h3>
            <p>Restaure o dispositivo para as configurações de fábrica</p>
            <div class="step-icon">
              <i class="fas fa-sync"></i>
            </div>
          </div>
        </div>

        <div class="care-step">
          <div class="step-number">3</div>
          <div class="step-content">
            <h3>Remoção de Bateria</h3>
            <p>Se possível, remova a bateria para descarte separado</p>
            <div class="step-icon">
              <i class="fas fa-battery-full"></i>
            </div>
          </div>
        </div>

        <div class="care-step">
          <div class="step-number">4</div>
          <div class="step-content">
            <h3>Embalagem Segura</h3>
            <p>Embale adequadamente para evitar danos no transporte</p>
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
        <p class="section-description">Conheça os materiais prejudiciais presentes nos eletrônicos</p>
      </div>

      <div class="components-grid">
        <div class="component-card">
          <div class="component-icon danger">
            <i class="fas fa-radiation"></i>
          </div>
          <h3>Metais Pesados</h3>
          <p>Mercúrio, chumbo e cádmio podem contaminar solo e água</p>
        </div>

        <div class="component-card">
          <div class="component-icon warning">
            <i class="fas fa-flask"></i>
          </div>
          <h3>Químicos Tóxicos</h3>
          <p>Retardantes de chama e PCBs são prejudiciais ao meio ambiente</p>
        </div>

        <div class="component-card">
          <div class="component-icon caution">
            <i class="fas fa-battery-quarter"></i>
          </div>
          <h3>Baterias</h3>
          <p>Contêm materiais corrosivos e altamente poluentes</p>
        </div>

        <div class="component-card">
          <div class="component-icon info">
            <i class="fas fa-microchip"></i>
          </div>
          <h3>Circuitos</h3>
          <p>Placas eletrônicas contêm diversos materiais tóxicos</p>
        </div>
      </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
      <div class="cta-content">
        <h2>Faça a Diferença!</h2>
        <p>Descarte seus eletrônicos de forma responsável e ajude a preservar o meio ambiente</p>
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
