<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Quem Somos - REP</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <link rel="stylesheet" href="assets/styles.css/sobre.css" />
  <link rel="stylesheet" href="assets/styles.css/header.css" />
</head>
<body>
      <?php 
        require_once 'cabecalho.php';
      ?>

  <main>
    <div class="about-wrapper">
      <!-- Hero Section -->
      <section class="hero-section">
        <div class="hero-content">
          <h1>Quem Somos</h1>
          <p class="subtitle">Conectando pessoas e empresas por um futuro mais sustentável</p>
        </div>
      </section>

      <!-- Mission Section -->
      <section class="info-section mission-section">
        <div class="section-content">
          <div class="icon-wrapper">
            <i class="fas fa-bullseye"></i>
          </div>
          <h2>Nossa Missão</h2>
          <p>Facilitar o descarte correto de resíduos eletrônicos no estado de São Paulo, 
             conectando pessoas e empresas através de uma plataforma digital inovadora e sustentável.</p>
        </div>
      </section>

      <!-- Vision Section -->
      <section class="info-section vision-section">
        <div class="section-content">
          <div class="icon-wrapper">
            <i class="fas fa-eye"></i>
          </div>
          <h2>Nossa Visão</h2>
          <p>Ser a principal referência em gestão de resíduos eletrônicos no Brasil, 
             promovendo a economia circular e contribuindo para um futuro mais sustentável.</p>
        </div>
      </section>

      <!-- Values Section -->
      <section class="values-section">
        <h2>Nossos Valores</h2>
        <div class="values-grid">
          <div class="value-card">
            <div class="icon-wrapper">
              <i class="fas fa-leaf"></i>
            </div>
            <h3>Sustentabilidade</h3>
            <p>Compromisso com o meio ambiente e as futuras gerações</p>
          </div>

          <div class="value-card">
            <div class="icon-wrapper">
              <i class="fas fa-handshake"></i>
            </div>
            <h3>Transparência</h3>
            <p>Relações claras e honestas com todos os nossos parceiros</p>
          </div>

          <div class="value-card">
            <div class="icon-wrapper">
              <i class="fas fa-lightbulb"></i>
            </div>
            <h3>Inovação</h3>
            <p>Busca constante por soluções tecnológicas e sustentáveis</p>
          </div>

          <div class="value-card">
            <div class="icon-wrapper">
              <i class="fas fa-users"></i>
            </div>
            <h3>Comunidade</h3>
            <p>Fortalecimento das relações entre descartadores e receptores</p>
          </div>
        </div>
      </section>

      <!-- Contact Section -->
      <section class="contact-section">
        <div class="contact-content">
          <h2>Entre em Contato</h2>
          <p>Tem alguma dúvida ou sugestão? Ficaremos felizes em ajudar!</p>
          <div class="contact-info">
            <div class="contact-item">
              <i class="fas fa-envelope"></i>
              <span>contato@rep.com.br</span>
            </div>
            <div class="contact-item">
              <i class="fas fa-phone"></i>
              <span>(11) 99999-9999</span>
            </div>
            <div class="contact-item">
              <i class="fas fa-map-marker-alt"></i>
              <span>São Paulo, SP</span>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>

  <footer>
    <p>&copy; 2025 Recicla Eletrônico Paulista - REP</p>
  </footer>
</body>
</html>
