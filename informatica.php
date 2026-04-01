<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Informática - REP</title>
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
        <h1>Equipamentos de Informática</h1>
        <p>Saiba como descartar corretamente seus equipamentos de informática e contribua para um ciclo sustentável de reciclagem</p>
      </div>
    </section>

    <!-- Tipos de Equipamentos -->
    <section class="electronics-types">
      <div class="section-header">
        <div class="header-icon">
          <i class="fas fa-laptop"></i>
        </div>
        <h2>Tipos de Equipamentos</h2>
        <p class="section-description">Conheça os principais equipamentos de informática que podem ser descartados</p>
      </div>

      <div class="types-grid">
        <div class="type-card">
          <div class="type-icon">
            <i class="fas fa-desktop"></i>
          </div>
          <h3>Computadores</h3>
          <ul>
            <li>Desktops completos</li>
            <li>Monitores LCD/LED</li>
            <li>Gabinetes</li>
            <li>All-in-ones</li>
          </ul>
        </div>

        <div class="type-card">
          <div class="type-icon">
            <i class="fas fa-laptop"></i>
          </div>
          <h3>Notebooks</h3>
          <ul>
            <li>Laptops</li>
            <li>Netbooks</li>
            <li>Ultrabooks</li>
            <li>Chromebooks</li>
          </ul>
        </div>

        <div class="type-card">
          <div class="type-icon">
            <i class="fas fa-keyboard"></i>
          </div>
          <h3>Periféricos</h3>
          <ul>
            <li>Teclados</li>
            <li>Mouses</li>
            <li>Webcams</li>
            <li>Impressoras</li>
          </ul>
        </div>

        <div class="type-card">
          <div class="type-icon">
            <i class="fas fa-hdd"></i>
          </div>
          <h3>Componentes</h3>
          <ul>
            <li>HDs e SSDs</li>
            <li>Placas-mãe</li>
            <li>Memória RAM</li>
            <li>Processadores</li>
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
        <p class="section-description">Siga estas recomendações para um descarte seguro dos seus equipamentos</p>
      </div>

      <div class="care-steps">
        <div class="care-step">
          <div class="step-number">1</div>
          <div class="step-content">
            <h3>Backup Completo</h3>
            <p>Faça backup de todos os arquivos importantes antes do descarte</p>
            <div class="step-icon">
              <i class="fas fa-database"></i>
            </div>
          </div>
        </div>

        <div class="care-step">
          <div class="step-number">2</div>
          <div class="step-content">
            <h3>Formatação Segura</h3>
            <p>Formate completamente os dispositivos de armazenamento</p>
            <div class="step-icon">
              <i class="fas fa-eraser"></i>
            </div>
          </div>
        </div>

        <div class="care-step">
          <div class="step-number">3</div>
          <div class="step-content">
            <h3>Separação de Componentes</h3>
            <p>Separe os diferentes tipos de componentes para reciclagem específica</p>
            <div class="step-icon">
              <i class="fas fa-layer-group"></i>
            </div>
          </div>
        </div>

        <div class="care-step">
          <div class="step-number">4</div>
          <div class="step-content">
            <h3>Embalagem Adequada</h3>
            <p>Proteja os equipamentos contra impactos durante o transporte</p>
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
        <h2>Componentes Sensíveis</h2>
        <p class="section-description">Conheça os componentes que requerem cuidados especiais no descarte</p>
      </div>

      <div class="components-grid">
        <div class="component-card">
          <div class="component-icon danger">
            <i class="fas fa-battery-full"></i>
          </div>
          <h3>Baterias</h3>
          <p>Baterias de notebooks contêm materiais tóxicos e inflamáveis</p>
        </div>

        <div class="component-card">
          <div class="component-icon warning">
            <i class="fas fa-tv"></i>
          </div>
          <h3>Telas LCD</h3>
          <p>Monitores contêm mercúrio e outros elementos nocivos</p>
        </div>

        <div class="component-card">
          <div class="component-icon caution">
            <i class="fas fa-microchip"></i>
          </div>
          <h3>Placas Eletrônicas</h3>
          <p>Circuitos contêm metais pesados e soldas tóxicas</p>
        </div>

        <div class="component-card">
          <div class="component-icon info">
            <i class="fas fa-tint"></i>
          </div>
          <h3>Cartuchos</h3>
          <p>Toners e cartuchos contêm resíduos químicos perigosos</p>
        </div>
      </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
      <div class="cta-content">
        <h2>Faça a Diferença!</h2>
        <p>Descarte seus equipamentos de informática de forma responsável</p>
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
