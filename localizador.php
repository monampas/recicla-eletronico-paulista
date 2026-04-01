<?php
require_once "conexao.php"; // Inclui a conexão com o banco de dados

// Ativa exibição de todos os erros
error_reporting(E_ALL);

// Mostra os erros na tela
ini_set('display_errors', 1);

// Recebe o ID da mesorregião selecionada via POST (ou nulo se não for enviado)
$mesorregiao_id = isset($_POST['mesorregiao']) ? $_POST['mesorregiao'] : NULL;

// Array com informações das mesorregiões
$mesorregioes_info = [
    1 => [
        'nome' => 'São José do Rio Preto',
        'cidades' => 'Jales, Fernandópolis, Votuporanga, São José do Rio Preto, Catanduva, Auriflama, Nhandeara, Novo Horizonte',
        'mapa' => 'https://www.google.com/maps/d/u/0/embed?mid=1ejhRbIjAiLzftiYjHeIcKG62-uy5EL0&ehbc=2E312F&noprof=1',
        'descricao' => 'Região conhecida pela agricultura e pecuária, com forte presença no agronegócio.'
    ],
    2 => [
        'nome' => 'Ribeirão Preto',
        'cidades' => 'Barretos, São Joaquim da Barra, Ituverava, Franca, Jaboticabal, Ribeirão Preto, Batatais',
        'mapa' => 'https://www.google.com/maps/d/u/0/embed?mid=1RYR-Pr2OZtK9AUXClFrrKBlhkIuEWZI&ehbc=2E312F&noprof=1',
        'descricao' => 'Centro importante do agronegócio e polo de desenvolvimento tecnológico.'
    ],
    3 => [
        'nome' => 'Araçatuba',
        'cidades' => 'Andradina, Araçatuba, Birigui',
        'mapa' => 'https://www.google.com/maps/d/u/0/embed?mid=1eWK79IZAb_lNg-nf8mB-v4K2dLszQyU&ehbc=2E312F&noprof=1',
        'descricao' => 'Região com forte tradição na pecuária e agricultura.'
    ],
    4 => [
        'nome' => 'Bauru',
        'cidades' => 'Lins, Bauru, Jaú, Avaré, Botucatu',
        'mapa' => 'https://www.google.com/maps/d/u/0/embed?mid=1c039T9R4XI_Lv4gcqHEAh6baCYZVFCQ&ehbc=2E312F&noprof=1',
        'descricao' => 'Polo educacional e tecnológico do interior paulista.'
    ],
    5 => [
        'nome' => 'Araraquara',
        'cidades' => 'Araraquara, São Carlos',
        'mapa' => 'https://www.google.com/maps/d/u/0/embed?mid=1Rxk1Mx45JeXoSeaBZy8EwAjV5tAZc20&ehbc=2E312F&noprof=1',
        'descricao' => 'Centro de excelência em pesquisa e desenvolvimento tecnológico.'
    ],
    6 => [
        'nome' => 'Piracicaba',
        'cidades' => 'Rio Claro, Limeira, Piracicaba',
        'mapa' => 'https://www.google.com/maps/d/u/0/embed?mid=1Do_gsNED7cdJ7dwYGLm7-SBLTW8QTbU&ehbc=2E312F&noprof=1',
        'descricao' => 'Região com forte tradição agrícola e industrial.'
    ],
    7 => [
        'nome' => 'Campinas',
        'cidades' => 'Pirassununga, São João da Boa Vista, Mogi Mirim, Campinas, Amparo',
        'mapa' => 'https://www.google.com/maps/d/u/0/embed?mid=1_a_k0mAZhAFJqqA-cDQjLWTyxAu2yqM&ehbc=2E312F&noprof=1',
        'descricao' => 'Polo tecnológico e industrial de destaque nacional.'
    ],
    8 => [
        'nome' => 'Presidente Prudente',
        'cidades' => 'Dracena, Adamantina, Presidente Prudente',
        'mapa' => 'https://www.google.com/maps/d/u/0/embed?mid=1CqMwMcWyAtgtL9EVdrBZryAjOwtNy4c&ehbc=2E312F&noprof=1',
        'descricao' => 'Região com forte presença no agronegócio e comércio.'
    ],
    9 => [
        'nome' => 'Marília',
        'cidades' => 'Tupã, Marília',
        'mapa' => 'https://www.google.com/maps/d/u/0/embed?mid=1YAZ-KT4_tQKupqHc59GLmxdEo5q9aUE&ehbc=2E312F&noprof=1',
        'descricao' => 'Centro regional importante para o oeste paulista.'
    ],
    10 => [
        'nome' => 'Assis',
        'cidades' => 'Assis, Ourinhos',
        'mapa' => 'https://www.google.com/maps/d/u/0/embed?mid=1ii9H7YIM0g2WyhZ8MY3fXRE_PFy0rug&ehbc=2E312F&noprof=1',
        'descricao' => 'Região com tradição educacional e agrícola.'
    ],
    11 => [
        'nome' => 'Itapetininga',
        'cidades' => 'Itapeva, Itapetininga, Tatuí, Capão Bonito',
        'mapa' => 'https://www.google.com/maps/d/u/0/embed?mid=1EX7rMVS7Z6Q9JEKS1jknerrGtnNf31E&ehbc=2E312F&noprof=1',
        'descricao' => 'Região com forte tradição na pecuária e agricultura.'
    ],
    12 => [
        'nome' => 'Macro Metropolitana Paulista',
        'cidades' => 'Piedade, Sorocaba, Jundiaí, Bragança Paulista',
        'mapa' => 'https://www.google.com/maps/d/u/0/embed?mid=1ITgsC15mtyCus8Mjq8yDHHoJFWya2_0&ehbc=2E312F&noprof=1',
        'descricao' => 'Região industrial e de serviços em expansão.'
    ],
    13 => [
        'nome' => 'Vale do Paraíba Paulista',
        'cidades' => 'Campos do Jordão, São José dos Campos, Guaratinguetá, Bananal, Paraibuna/São Luiz do Paraitinga, Caraguatatuba',
        'mapa' => 'https://www.google.com/maps/d/u/0/embed?mid=1rtubJcRuBE899myVd2tKolpxWATp0jg&ehbc=2E312F&noprof=1',
        'descricao' => 'Polo aeroespacial e turístico de destaque.'
    ],
    14 => [
        'nome' => 'Litoral Sul Paulista',
        'cidades' => 'Registro, Itanhaém',
        'mapa' => 'https://www.google.com/maps/d/u/0/embed?mid=1lbGQMkE0-FAfRlC2Zul0vZg8D_WntEY&ehbc=2E312F&noprof=1',
        'descricao' => 'Região litorânea com forte vocação turística e pesqueira.'
    ],
    15 => [
        'nome' => 'Metropolitana de São Paulo',
        'cidades' => 'Osasco, Franco da Rocha, Guarulhos, Itapecerica da Serra, São Paulo, Itaquaquecetuba, Suzano, Mogi das Cruzes, Santos',
        'mapa' => 'https://www.google.com/maps/d/u/0/embed?mid=1OlBy_TI0QS56bcHxnYkDungbl_bcGS4&ehbc=2E312F&noprof=1',
        'descricao' => 'Maior região metropolitana do Brasil, centro financeiro e cultural.'
    ]
];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Localizador de Pontos de Descarte - Recicla Eletrônico Paulista</title>
  <link rel="stylesheet" href="assets/styles.css/localizador.css" />
  <link rel="stylesheet" href="assets/styles.css/header.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body>
  <?php require_once 'cabecalho.php';

  if (isset($_SESSION['id'])) {

    ?>

    <main>
      <div class="container">
        <!-- Header da página -->
        <div class="page-header">
          <div class="header-content">
            <i class="fas fa-map-marker-alt header-icon"></i>
            <h1>Localizador de Pontos de Descarte</h1>
            <p class="header-subtitle">
              Encontre pontos de descarte de lixo eletrônico no estado de São Paulo.<br>
              Ajude o meio ambiente destinando corretamente seus resíduos!
            </p>
          </div>
        </div>

        <!-- Card principal -->
        <div class="main-card">
          <!-- Seletor de mesorregião -->
          <div class="selector-section">
            <div class="selector-header">
              <i class="fas fa-search"></i>
              <h3>Selecione sua Mesorregião</h3>
            </div>
            
            <form method="post" class="region-form">
              <div class="select-wrapper">
                <select name="mesorregiao" onchange="this.form.submit()" required>
                  <option value="">-- Escolha sua mesorregião --</option>
                  <?php
                  $query = "SELECT id, nome FROM mesorregioes ORDER BY id";
                  $resultado = mysqli_query($conexao, $query);

                  while ($row = mysqli_fetch_assoc($resultado)) {
                    $selecao = ($mesorregiao_id == $row['id']) ? 'selected' : '';
                    echo "<option value='{$row['id']}' $selecao>{$row['nome']}</option>";
                  }
                  ?>
                </select>
                <i class="fas fa-chevron-down select-arrow"></i>
              </div>
            </form>
          </div>

          <?php if ($mesorregiao_id && isset($mesorregioes_info[$mesorregiao_id])) { ?>
            <!-- Informações da mesorregião selecionada -->
            <div class="region-info">
              <div class="region-header">
                <div class="region-title">
                  <i class="fas fa-map"></i>
                  <h2><?php echo $mesorregioes_info[$mesorregiao_id]['nome']; ?></h2>
                </div>
                <div class="region-badge">
                  <span>Mesorregião <?php echo $mesorregiao_id; ?></span>
                </div>
              </div>

              <div class="region-details">
                <div class="detail-card">
                  <div class="detail-icon">
                    <i class="fas fa-city"></i>
                  </div>
                  <div class="detail-content">
                    <h4>Cidades Principais</h4>
                    <p><?php echo $mesorregioes_info[$mesorregiao_id]['cidades']; ?></p>
                  </div>
                </div>

                <div class="detail-card">
                  <div class="detail-icon">
                    <i class="fas fa-info-circle"></i>
                  </div>
                  <div class="detail-content">
                    <h4>Características</h4>
                    <p><?php echo $mesorregioes_info[$mesorregiao_id]['descricao']; ?></p>
                  </div>
                </div>
              </div>

              <!-- Mapa interativo -->
              <div class="map-section">
                <div class="map-header">
                  <i class="fas fa-map-marked-alt"></i>
                  <h3>Pontos de Descarte na Região</h3>
                </div>
                <div class="map-container">
                  <iframe 
                    src="<?php echo $mesorregioes_info[$mesorregiao_id]['mapa']; ?>"
                    allowfullscreen="" 
                    loading="lazy">
                  </iframe>
                </div>
                <div class="map-info">
                  <p><i class="fas fa-lightbulb"></i> <strong>Dica:</strong> Clique nos marcadores do mapa para ver informações detalhadas dos pontos de descarte.</p>
                </div>
              </div>
            </div>

          <?php } else if ($mesorregiao_id) { ?>
            <!-- Mesorregião não encontrada -->
            <div class="error-section">
              <div class="error-content">
                <i class="fas fa-exclamation-triangle"></i>
                <h3>Informações não disponíveis</h3>
                <p>As informações para esta mesorregião ainda não foram cadastradas. Tente selecionar outra região.</p>
              </div>
            </div>

          <?php } else { ?>
            <!-- Página inicial com mapas de referência -->
            <div class="reference-section">
              <div class="reference-header">
                <i class="fas fa-compass"></i>
                <h3>Como Encontrar sua Mesorregião</h3>
              </div>
              
              <div class="reference-content">
                <div class="info-box">
                  <div class="info-icon">
                    <i class="fas fa-lightbulb"></i>
                  </div>
                  <div class="info-text">
                    <h4>Dica Importante</h4>
                    <p>Caso a sua cidade não apareça na lista, localize-se através de cidades vizinhas ou mais próximas à sua localização.</p>
                  </div>
                </div>

                <div class="maps-grid">
                  <div class="map-item">
                    <h4><i class="fas fa-map"></i> Mapa das Mesorregiões de São Paulo</h4>
                    <div class="map-wrapper">
                      <div class="map-container-large">
                        <img src="assets/imagens/mesorregioes.jpeg" alt="Mapa das Mesorregiões de São Paulo" id="mesorregioesMap" />
                        <div class="map-controls">
                          <button class="zoom-btn" onclick="zoomIn()" title="Aumentar zoom (Scroll up)">
                            <i class="fas fa-plus"></i>
                          </button>
                          <button class="zoom-btn" onclick="zoomOut()" title="Diminuir zoom (Scroll down)">
                            <i class="fas fa-minus"></i>
                          </button>
                          <button class="zoom-btn" onclick="resetZoom()" title="Zoom original (Duplo clique)">
                            <i class="fas fa-undo"></i>
                          </button>
                        </div>
                        <div class="zoom-indicator" id="zoomIndicator">
                          <span id="zoomLevel">100%</span>
                        </div>
                      </div>
                      <div class="map-description">
                        <p><strong>Como usar:</strong></p>
                        <ul>
                          <li><strong>Scroll do mouse:</strong> Zoom in/out centrado na posição do cursor</li>
                          <li><strong>Arrastar:</strong> Mova o mapa quando ampliado (clique e arraste)</li>
                          <li><strong>Duplo clique:</strong> Zoom in no ponto clicado ou reset se já ampliado</li>
                          <li><strong>Botões:</strong> Controles precisos de zoom (+ / - / reset)</li>
                          <li><strong>Mobile:</strong> Pinch para zoom e arrastar para pan</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  
                  <div class="map-item">
                    <h4><i class="fas fa-globe"></i> Mapa Interativo do Estado</h4>
                    <div class="map-wrapper">
                      <iframe 
                        src="https://www.google.com/maps/d/u/0/embed?mid=1a5rgEjHOVpRAix9ieyGC4VnSDRwOm-I&ehbc=2E312F&noprof=1"
                        allowfullscreen="" 
                        loading="lazy">
                      </iframe>
                      <div class="map-description">
                        <p><strong>Mapa interativo:</strong> Explore o estado de São Paulo e localize sua região. Use os controles do mapa para navegar e encontrar sua localização.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>

        <!-- Footer informativo -->
        <div class="info-footer">
          <div class="info-cards">
            <div class="info-card">
              <i class="fas fa-recycle"></i>
              <h4>Reciclagem Responsável</h4>
              <p>Descarte seus eletrônicos de forma segura e sustentável</p>
            </div>
            <div class="info-card">
              <i class="fas fa-leaf"></i>
              <h4>Meio Ambiente</h4>
              <p>Ajude a preservar o planeta para as futuras gerações</p>
            </div>
            <div class="info-card">
              <i class="fas fa-users"></i>
              <h4>Comunidade</h4>
              <p>Faça parte de uma comunidade consciente e sustentável</p>
            </div>
          </div>
        </div>
      </div>
    </main>

  <?php } else {
    echo "<script>alert('Acesso Negado!'); location.href='login.php'</script>";
  } ?>

  <script>
    // Adiciona animação de loading ao submeter o formulário
    document.querySelector('select[name="mesorregiao"]').addEventListener('change', function() {
      if (this.value) {
        this.parentElement.classList.add('loading');
      }
    });

    // Remove a classe loading quando a página carrega
    window.addEventListener('load', function() {
      document.querySelector('.select-wrapper').classList.remove('loading');
    });

    // Funcionalidades avançadas de zoom para o mapa das mesorregiões
    let currentZoom = 1;
    let currentX = 0;
    let currentY = 0;
    const zoomStep = 0.15;
    const maxZoom = 4;
    const minZoom = 0.3;
    
    const mesorregioesMap = document.getElementById('mesorregioesMap');
    const mapContainer = document.querySelector('.map-container-large');
    
    let isDragging = false;
    let startX, startY;
    let lastX, lastY;
    
    function updateTransform() {
      if (mesorregioesMap) {
        mesorregioesMap.style.transform = `translate(${currentX}px, ${currentY}px) scale(${currentZoom})`;
        
        // Atualiza o cursor baseado no zoom
        if (currentZoom > 1) {
          mesorregioesMap.style.cursor = isDragging ? 'grabbing' : 'grab';
        } else {
          mesorregioesMap.style.cursor = 'zoom-in';
        }
        
        // Atualiza indicadores visuais
        updateZoomIndicators();
      }
    }
    
    function updateZoomIndicators() {
      const zoomInBtn = document.querySelector('.zoom-btn[onclick="zoomIn()"]');
      const zoomOutBtn = document.querySelector('.zoom-btn[onclick="zoomOut()"]');
      
      if (zoomInBtn) {
        zoomInBtn.disabled = currentZoom >= maxZoom;
        zoomInBtn.style.opacity = currentZoom >= maxZoom ? '0.5' : '1';
      }
      
      if (zoomOutBtn) {
        zoomOutBtn.disabled = currentZoom <= minZoom;
        zoomOutBtn.style.opacity = currentZoom <= minZoom ? '0.5' : '1';
      }
    }
    
    function zoomIn() {
      if (currentZoom < maxZoom) {
        const oldZoom = currentZoom;
        currentZoom = Math.min(maxZoom, currentZoom + zoomStep);
        
        // Zoom suave com animação
        animateZoom(oldZoom, currentZoom);
      }
    }
    
    function zoomOut() {
      if (currentZoom > minZoom) {
        const oldZoom = currentZoom;
        currentZoom = Math.max(minZoom, currentZoom - zoomStep);
        
        // Zoom suave com animação
        animateZoom(oldZoom, currentZoom);
      }
    }
    
    function resetZoom() {
      const oldZoom = currentZoom;
      const oldX = currentX;
      const oldY = currentY;
      
      currentZoom = 1;
      currentX = 0;
      currentY = 0;
      
      // Animação suave para reset
      animateReset(oldZoom, oldX, oldY);
    }
    
    function animateZoom(oldZoom, newZoom) {
      const steps = 10;
      const stepTime = 20;
      const zoomDiff = newZoom - oldZoom;
      
      for (let i = 1; i <= steps; i++) {
        setTimeout(() => {
          currentZoom = oldZoom + (zoomDiff * i / steps);
          updateTransform();
        }, i * stepTime);
      }
    }
    
    function animateReset(oldZoom, oldX, oldY) {
      const steps = 15;
      const stepTime = 20;
      
      for (let i = 1; i <= steps; i++) {
        setTimeout(() => {
          const progress = i / steps;
          currentZoom = oldZoom + (1 - oldZoom) * progress;
          currentX = oldX * (1 - progress);
          currentY = oldY * (1 - progress);
          updateTransform();
        }, i * stepTime);
      }
    }
    
    // Zoom com scroll do mouse (melhorado)
    if (mesorregioesMap) {
      mesorregioesMap.addEventListener('wheel', function(e) {
        e.preventDefault();
        
        const rect = mesorregioesMap.getBoundingClientRect();
        const mouseX = e.clientX - rect.left;
        const mouseY = e.clientY - rect.top;
        
        const oldZoom = currentZoom;
        
        if (e.deltaY < 0) {
          currentZoom = Math.min(maxZoom, currentZoom + zoomStep);
        } else {
          currentZoom = Math.max(minZoom, currentZoom - zoomStep);
        }
        
        // Zoom centrado no mouse
        if (currentZoom !== oldZoom) {
          const zoomRatio = currentZoom / oldZoom;
          currentX = mouseX - (mouseX - currentX) * zoomRatio;
          currentY = mouseY - (mouseY - currentY) * zoomRatio;
          
          updateTransform();
        }
      });
      
      // Pan (arrastar) quando zoomado
      mesorregioesMap.addEventListener('mousedown', function(e) {
        if (currentZoom > 1) {
          isDragging = true;
          startX = e.clientX - currentX;
          startY = e.clientY - currentY;
          lastX = e.clientX;
          lastY = e.clientY;
          
          mesorregioesMap.style.cursor = 'grabbing';
          e.preventDefault();
        }
      });
      
      document.addEventListener('mousemove', function(e) {
        if (isDragging) {
          currentX = e.clientX - startX;
          currentY = e.clientY - startY;
          
          // Limita o pan para não sair muito da área visível
          const maxPanX = (currentZoom - 1) * mesorregioesMap.offsetWidth / 2;
          const maxPanY = (currentZoom - 1) * mesorregioesMap.offsetHeight / 2;
          
          currentX = Math.max(-maxPanX, Math.min(maxPanX, currentX));
          currentY = Math.max(-maxPanY, Math.min(maxPanY, currentY));
          
          updateTransform();
        }
      });
      
      document.addEventListener('mouseup', function() {
        if (isDragging) {
          isDragging = false;
          mesorregioesMap.style.cursor = 'grab';
        }
      });
      
      // Zoom com clique duplo
      mesorregioesMap.addEventListener('dblclick', function(e) {
        e.preventDefault();
        
        if (currentZoom > 1) {
          resetZoom();
        } else {
          // Zoom in no ponto clicado
          const rect = mesorregioesMap.getBoundingClientRect();
          const mouseX = e.clientX - rect.left;
          const mouseY = e.clientY - rect.top;
          
          currentZoom = 2;
          currentX = mouseX - (mouseX - currentX) * 2;
          currentY = mouseY - (mouseY - currentY) * 2;
          
          updateTransform();
        }
      });
      
      // Touch events para dispositivos móveis
      let touchStartDistance = 0;
      let touchStartZoom = 1;
      
      mesorregioesMap.addEventListener('touchstart', function(e) {
        if (e.touches.length === 2) {
          // Pinch to zoom
          const touch1 = e.touches[0];
          const touch2 = e.touches[1];
          touchStartDistance = Math.hypot(touch2.clientX - touch1.clientX, touch2.clientY - touch1.clientY);
          touchStartZoom = currentZoom;
        } else if (e.touches.length === 1 && currentZoom > 1) {
          // Pan
          isDragging = true;
          startX = e.touches[0].clientX - currentX;
          startY = e.touches[0].clientY - currentY;
        }
      });
      
      mesorregioesMap.addEventListener('touchmove', function(e) {
        e.preventDefault();
        
        if (e.touches.length === 2) {
          // Pinch to zoom
          const touch1 = e.touches[0];
          const touch2 = e.touches[1];
          const distance = Math.hypot(touch2.clientX - touch1.clientX, touch2.clientY - touch1.clientY);
          
          if (touchStartDistance > 0) {
            const scale = distance / touchStartDistance;
            currentZoom = Math.max(minZoom, Math.min(maxZoom, touchStartZoom * scale));
            updateTransform();
          }
        } else if (e.touches.length === 1 && isDragging) {
          // Pan
          currentX = e.touches[0].clientX - startX;
          currentY = e.touches[0].clientY - startY;
          
          const maxPanX = (currentZoom - 1) * mesorregioesMap.offsetWidth / 2;
          const maxPanY = (currentZoom - 1) * mesorregioesMap.offsetHeight / 2;
          
          currentX = Math.max(-maxPanX, Math.min(maxPanX, currentX));
          currentY = Math.max(-maxPanY, Math.min(maxPanY, currentY));
          
          updateTransform();
        }
      });
      
      mesorregioesMap.addEventListener('touchend', function() {
        isDragging = false;
        touchStartDistance = 0;
      });
    }
    
    // Inicializa os indicadores
    updateZoomIndicators();
  </script>
  <script src="assets/js/localizador.js"></script>
</body>

</html>