<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Início - REP</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <link rel="stylesheet" href="assets/styles.css/index.css" />
  <link rel="stylesheet" href="assets/styles.css/header.css" />
  <link rel="website icon" type="png" href="assets/imagens/logo.png" />
</head>

<body>
    <?php  require_once 'cabecalho.php'; ?>

  <main>
    <section class="home-text">
      <div class="content-wrapper">
        <div class="hero-badge">
          <i class="fas fa-recycle"></i>
          <span>Recicle com Consciência</span>
        </div>
        <h1>Dê o destino certo ao seu<br>lixo Eletrônico</h1>
        <div class="subtexto">
          <h3>O Recicla Eletrônico Paulista facilita o descarte correto de eletrônicos no estado de São Paulo, 
            conectando pessoas que desejam descartar a pontos de coleta de forma simples e sustentável!</h3>
        

        <div class="hero-features">
          <div class="feature">
            <i class="fas fa-map-marker-alt"></i>
            <span>Pontos de Coleta em Todo Estado</span>
          </div>
          <div class="feature">
            <i class="fas fa-shield-alt"></i>
            <span>Descarte Seguro e Certificado</span>
          </div>
          <div class="feature">
            <i class="fas fa-leaf"></i>
            <span>100% Sustentável</span>
          </div>
        </div>
      </div>
    </section>

    <section class="tipos-lixo">
      <h2>Quais os tipos de Lixo Eletrônico?</h2>
      <div class="swiper fullscreen-swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="slide-content">
              <div class="slide-image">
                <img src="assets/imagens/eletro.png" alt="Eletroportáteis" />
              </div>
              <div class="slide-info">
                <h3>Eletroportáteis</h3>
                <p>Aparelhos pequenos como secadores, liquidificadores e ferros de passar.</p>
                <a href="eletroportateis.php" class="menu-btn">Saiba Mais</a>
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="slide-content">
              <div class="slide-image">
                <img src="assets/imagens/computador.png" alt="Informática" />
              </div>
              <div class="slide-info">
                <h3>Informática</h3>
                <p>Computadores, notebooks, teclados, mouses e acessórios de informática.</p>
                <a href="informatica.php" class="menu-btn">Saiba Mais</a>
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="slide-content">
              <div class="slide-image">
                <img src="assets/imagens/demais.png" alt="Eletrônicos em Geral" />
              </div>
              <div class="slide-info">
                <h3>Eletrônicos em Geral</h3>
                <p>Celulares, carregadores, controles remotos e outros dispositivos eletrônicos.</p>
                <a href="eletronicos.php" class="menu-btn">Saiba Mais</a>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </section>

    <!-- Nova seção de processo -->
    <section class="process-section">
      <h2>Como Funciona</h2>
      <div class="process-steps">
        <div class="process-step">
          <div class="step-icon">
            <i class="fas fa-user-plus"></i>
          </div>
          <h3>1. Cadastre-se</h3>
          <p>Crie sua conta como descartador ou receptor em poucos minutos</p>
        </div>
        <div class="process-step">
          <div class="step-icon">
            <i class="fas fa-search-location"></i>
          </div>
          <h3>2. Localize</h3>
          <p>Encontre pontos de coleta próximos ou registre seu ponto de recebimento</p>
        </div>
        <div class="process-step">
          <div class="step-icon">
            <i class="fas fa-handshake"></i>
          </div>
          <h3>3. Conecte-se</h3>
          <p>Entre em contato e agende o melhor horário para o descarte</p>
        </div>
        <div class="process-step">
          <div class="step-icon">
            <i class="fas fa-check-circle"></i>
          </div>
          <h3>4. Conclua</h3>
          <p>Realize o descarte e receba seu certificado de destinação correta</p>
        </div>
      </div>
    </section>

    <!-- Seção de impactos com novo design -->
    <section class="environmental-impact">
      <div class="section-header">
        <div class="header-icon">
          <i class="fas fa-exclamation-triangle"></i>
        </div>
        <h2>Impactos do Descarte Incorreto</h2>
        <p class="section-description">Conheça os riscos do descarte inadequado de eletrônicos</p>
      </div>
      <div class="impact-grid">
        <div class="impact-card">
          <div class="impact-icon">
            <i class="fas fa-water"></i>
          </div>
          <h3>Contaminação da Água</h3>
          <p>Metais pesados e substâncias tóxicas podem contaminar lençóis freáticos e águas superficiais, afetando a vida aquática e o abastecimento de água.</p>
        </div>
        <div class="impact-card">
          <div class="impact-icon">
            <i class="fas fa-lungs"></i>
          </div>
          <h3>Poluição do Ar</h3>
          <p>A queima inadequada de resíduos eletrônicos libera substâncias tóxicas que poluem o ar e podem causar problemas respiratórios.</p>
        </div>
        <div class="impact-card">
          <div class="impact-icon">
            <i class="fas fa-seedling"></i>
          </div>
          <h3>Danos ao Solo</h3>
          <p>Componentes tóxicos contaminam o solo, afetando a agricultura e os ecossistemas locais por décadas.</p>
        </div>
        <div class="impact-card">
          <div class="impact-icon">
            <i class="fas fa-heartbeat"></i>
          </div>
          <h3>Riscos à Saúde</h3>
          <p>Exposição a materiais tóxicos pode causar problemas de saúde graves, incluindo doenças respiratórias e neurológicas.</p>
        </div>
      </div>
    </section>

    <!-- Nova seção de benefícios -->
    <section class="benefits-section">
      <div class="section-header">
        <div class="header-icon">
          <i class="fas fa-star"></i>
        </div>
        <h2>Benefícios do Descarte Correto</h2>
        <p class="section-description">Descubra as vantagens de reciclar seus eletrônicos conosco</p>
      </div>
      <div class="benefits-grid">
        <div class="benefit-card">
          <i class="fas fa-globe-americas"></i>
          <h3>Preservação Ambiental</h3>
          <p>Contribua para a redução da poluição e preservação dos recursos naturais</p>
        </div>
        <div class="benefit-card">
          <i class="fas fa-certificate"></i>
          <h3>Certificação</h3>
          <p>Receba um certificado de descarte correto para sua empresa ou residência</p>
        </div>
        <div class="benefit-card">
          <i class="fas fa-recycle"></i>
          <h3>Economia Circular</h3>
          <p>Fomente a reciclagem e o reaproveitamento de materiais valiosos</p>
        </div>
        <div class="benefit-card">
          <i class="fas fa-hand-holding-heart"></i>
          <h3>Responsabilidade Social</h3>
          <p>Apoie projetos sociais e gere empregos na área de reciclagem</p>
        </div>
      </div>
    </section>

    <!-- Seção de dicas atualizada -->
    <section class="disposal-tips">
      <div class="section-header">
        <div class="header-icon">
          <i class="fas fa-lightbulb"></i>
        </div>
        <h2>Dicas para Descarte Consciente</h2>
        <p class="section-description">Siga estas recomendações para um descarte seguro e eficiente</p>
      </div>
      <div class="tips-container">
        <div class="tip-card">
          <div class="tip-number">1</div>
          <h3>Verifique a Funcionalidade</h3>
          <p>Antes de descartar, verifique se o equipamento ainda pode ser consertado ou doado.</p>
        </div>
        <div class="tip-card">
          <div class="tip-number">2</div>
          <h3>Backup dos Dados</h3>
          <p>Faça backup e apague todos os dados pessoais dos dispositivos antes do descarte.</p>
        </div>
        <div class="tip-card">
          <div class="tip-number">3</div>
          <h3>Separe os Componentes</h3>
          <p>Separe baterias, telas e outros componentes que exigem tratamento especial.</p>
        </div>
        <div class="tip-card">
          <div class="tip-number">4</div>
          <h3>Procure Pontos Oficiais</h3>
          <p>Utilize apenas pontos de coleta autorizados para garantir o descarte adequado.</p>
        </div>
      </div>
    </section>

    <!-- Seção de estatísticas atualizada -->
    <section class="statistics">
      <div class="section-header">
        <div class="header-icon">
          <i class="fas fa-chart-bar"></i>
        </div>
        <h2>O Impacto do Seu Descarte Consciente</h2>
        <p class="section-description">Números que mostram a importância da reciclagem eletrônica</p>
      </div>
      <div class="stats-container">
        <div class="stat-card">
          <div class="stat-number" data-value="50">0</div>
          <div class="stat-label">Milhões de Toneladas</div>
          <div class="stat-description">de lixo eletrônico são gerados globalmente por ano</div>
        </div>
        <div class="stat-card">
          <div class="stat-number" data-value="17">0</div>
          <div class="stat-label">Porcento</div>
          <div class="stat-description">apenas são reciclados adequadamente</div>
        </div>
        <div class="stat-card">
          <div class="stat-number" data-value="80">0</div>
          <div class="stat-label">Porcento</div>
          <div class="stat-description">dos materiais podem ser reaproveitados</div>
        </div>
      </div>
    </section>

    <!-- seção de chamada para ação -->
    <section class="cta-section">
      <div class="cta-content">
        <h2>Comece Agora Mesmo!</h2>
        <p>Faça parte da mudança e contribua para um futuro mais sustentável</p>
                  <div class="cta-buttons">
            <a href="cadastro.php?tipo=descartador" class="menu-btn destaque">
              <i class="fas fa-hand-holding-heart"></i>
              Quero Descartar
            </a>
            <a href="cadastro.php?tipo=receptor" class="menu-btn destaque">
              <i class="fas fa-box-open"></i>
              Quero Receber
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
        
      </div>
      <p class="copyright">&copy; 2025 Recicla Eletrônico Paulista - REP.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    const swiper = new Swiper('.fullscreen-swiper', {
      direction: 'horizontal',
      loop: true,
      speed: 800,
      grabCursor: true,
      effect: 'creative',
      creativeEffect: {
        prev: {
          translate: ['-100%', 0, -1],
        },
        next: {
          translate: ['100%', 0, 0],
        },
      },
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

    // Animação dos números nas estatísticas
    function animateNumbers() {
      const statNumbers = document.querySelectorAll('.stat-number');
      
      statNumbers.forEach(number => {
        const targetValue = parseInt(number.getAttribute('data-value'));
        const duration = 2000; // 2 segundos
        const steps = 50;
        const increment = targetValue / steps;
        let currentValue = 0;
        
        const timer = setInterval(() => {
          currentValue += increment;
          if (currentValue >= targetValue) {
            currentValue = targetValue;
            clearInterval(timer);
          }
          number.textContent = Math.round(currentValue);
        }, duration / steps);
      });
    }

    // Observador de interseção para iniciar a animação quando a seção estiver visível
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          animateNumbers();
          observer.unobserve(entry.target);
        }
      });
    });

    const statsSection = document.querySelector('.statistics');
    if (statsSection) {
      observer.observe(statsSection);
    }
  </script>
</body>

</html>