// Funcionalidades avançadas de zoom para o mapa das mesorregiões
class MapZoomController {
  constructor(mapElement, containerElement) {
    this.map = mapElement;
    this.container = containerElement;
    this.currentZoom = 1;
    this.currentX = 0;
    this.currentY = 0;
    this.zoomStep = 0.15;
    this.maxZoom = 4;
    this.minZoom = 0.3;
    
    this.isDragging = false;
    this.startX = 0;
    this.startY = 0;
    
    // Touch variables
    this.touchStartDistance = 0;
    this.touchStartZoom = 1;
    
    this.init();
  }
  
  init() {
    if (!this.map) return;
    
    // Mouse events
    this.map.addEventListener('wheel', this.handleWheel.bind(this));
    this.map.addEventListener('mousedown', this.handleMouseDown.bind(this));
    this.map.addEventListener('dblclick', this.handleDoubleClick.bind(this));
    
    // Touch events
    this.map.addEventListener('touchstart', this.handleTouchStart.bind(this));
    this.map.addEventListener('touchmove', this.handleTouchMove.bind(this));
    this.map.addEventListener('touchend', this.handleTouchEnd.bind(this));
    
    // Global mouse events
    document.addEventListener('mousemove', this.handleMouseMove.bind(this));
    document.addEventListener('mouseup', this.handleMouseUp.bind(this));
    
    this.updateTransform();
  }
  
  updateTransform() {
    if (this.map) {
      this.map.style.transform = `translate(${this.currentX}px, ${this.currentY}px) scale(${this.currentZoom})`;
      
      // Update cursor based on zoom
      if (this.currentZoom > 1) {
        this.map.style.cursor = this.isDragging ? 'grabbing' : 'grab';
      } else {
        this.map.style.cursor = 'zoom-in';
      }
      
      this.updateZoomIndicators();
      this.updateZoomLevel();
    }
  }
  
  updateZoomLevel() {
    const zoomIndicator = document.getElementById('zoomIndicator');
    const zoomLevel = document.getElementById('zoomLevel');
    
    if (zoomIndicator && zoomLevel) {
      const percentage = Math.round(this.currentZoom * 100);
      zoomLevel.textContent = `${percentage}%`;
      
      // Show indicator temporarily when there's a change
      zoomIndicator.classList.add('show');
      setTimeout(() => {
        zoomIndicator.classList.remove('show');
      }, 2000);
    }
  }
  
  updateZoomIndicators() {
    const zoomInBtn = document.querySelector('.zoom-btn[onclick="zoomIn()"]');
    const zoomOutBtn = document.querySelector('.zoom-btn[onclick="zoomOut()"]');
    
    if (zoomInBtn) {
      zoomInBtn.disabled = this.currentZoom >= this.maxZoom;
      zoomInBtn.style.opacity = this.currentZoom >= this.maxZoom ? '0.5' : '1';
    }
    
    if (zoomOutBtn) {
      zoomOutBtn.disabled = this.currentZoom <= this.minZoom;
      zoomOutBtn.style.opacity = this.currentZoom <= this.minZoom ? '0.5' : '1';
    }
  }
  
  animateZoom(oldZoom, newZoom) {
    const steps = 10;
    const stepTime = 20;
    const zoomDiff = newZoom - oldZoom;
    
    for (let i = 1; i <= steps; i++) {
      setTimeout(() => {
        this.currentZoom = oldZoom + (zoomDiff * i / steps);
        this.updateTransform();
      }, i * stepTime);
    }
  }
  
  animateReset(oldZoom, oldX, oldY) {
    const steps = 15;
    const stepTime = 20;
    
    for (let i = 1; i <= steps; i++) {
      setTimeout(() => {
        const progress = i / steps;
        this.currentZoom = oldZoom + (1 - oldZoom) * progress;
        this.currentX = oldX * (1 - progress);
        this.currentY = oldY * (1 - progress);
        this.updateTransform();
      }, i * stepTime);
    }
  }
  
  handleWheel(e) {
    e.preventDefault();
    
    const rect = this.map.getBoundingClientRect();
    const mouseX = e.clientX - rect.left;
    const mouseY = e.clientY - rect.top;
    
    const oldZoom = this.currentZoom;
    
    if (e.deltaY < 0) {
      this.currentZoom = Math.min(this.maxZoom, this.currentZoom + this.zoomStep);
    } else {
      this.currentZoom = Math.max(this.minZoom, this.currentZoom - this.zoomStep);
    }
    
    // Zoom centered on mouse
    if (this.currentZoom !== oldZoom) {
      const zoomRatio = this.currentZoom / oldZoom;
      this.currentX = mouseX - (mouseX - this.currentX) * zoomRatio;
      this.currentY = mouseY - (mouseY - this.currentY) * zoomRatio;
      
      this.updateTransform();
    }
  }
  
  handleMouseDown(e) {
    if (this.currentZoom > 1) {
      this.isDragging = true;
      this.startX = e.clientX - this.currentX;
      this.startY = e.clientY - this.currentY;
      
      this.map.style.cursor = 'grabbing';
      e.preventDefault();
    }
  }
  
  handleMouseMove(e) {
    if (this.isDragging) {
      this.currentX = e.clientX - this.startX;
      this.currentY = e.clientY - this.startY;
      
      // Limit pan to not go too far out of visible area
      const maxPanX = (this.currentZoom - 1) * this.map.offsetWidth / 2;
      const maxPanY = (this.currentZoom - 1) * this.map.offsetHeight / 2;
      
      this.currentX = Math.max(-maxPanX, Math.min(maxPanX, this.currentX));
      this.currentY = Math.max(-maxPanY, Math.min(maxPanY, this.currentY));
      
      this.updateTransform();
    }
  }
  
  handleMouseUp() {
    if (this.isDragging) {
      this.isDragging = false;
      this.map.style.cursor = 'grab';
    }
  }
  
  handleDoubleClick(e) {
    e.preventDefault();
    
    if (this.currentZoom > 1) {
      this.resetZoom();
    } else {
      // Zoom in at clicked point
      const rect = this.map.getBoundingClientRect();
      const mouseX = e.clientX - rect.left;
      const mouseY = e.clientY - rect.top;
      
      this.currentZoom = 2;
      this.currentX = mouseX - (mouseX - this.currentX) * 2;
      this.currentY = mouseY - (mouseY - this.currentY) * 2;
      
      this.updateTransform();
    }
  }
  
  handleTouchStart(e) {
    if (e.touches.length === 2) {
      // Pinch to zoom
      const touch1 = e.touches[0];
      const touch2 = e.touches[1];
      this.touchStartDistance = Math.hypot(touch2.clientX - touch1.clientX, touch2.clientY - touch1.clientY);
      this.touchStartZoom = this.currentZoom;
    } else if (e.touches.length === 1 && this.currentZoom > 1) {
      // Pan
      this.isDragging = true;
      this.startX = e.touches[0].clientX - this.currentX;
      this.startY = e.touches[0].clientY - this.currentY;
    }
  }
  
  handleTouchMove(e) {
    e.preventDefault();
    
    if (e.touches.length === 2) {
      // Pinch to zoom
      const touch1 = e.touches[0];
      const touch2 = e.touches[1];
      const distance = Math.hypot(touch2.clientX - touch1.clientX, touch2.clientY - touch1.clientY);
      
      if (this.touchStartDistance > 0) {
        const scale = distance / this.touchStartDistance;
        this.currentZoom = Math.max(this.minZoom, Math.min(this.maxZoom, this.touchStartZoom * scale));
        this.updateTransform();
      }
    } else if (e.touches.length === 1 && this.isDragging) {
      // Pan
      this.currentX = e.touches[0].clientX - this.startX;
      this.currentY = e.touches[0].clientY - this.startY;
      
      const maxPanX = (this.currentZoom - 1) * this.map.offsetWidth / 2;
      const maxPanY = (this.currentZoom - 1) * this.map.offsetHeight / 2;
      
      this.currentX = Math.max(-maxPanX, Math.min(maxPanX, this.currentX));
      this.currentY = Math.max(-maxPanY, Math.min(maxPanY, this.currentY));
      
      this.updateTransform();
    }
  }
  
  handleTouchEnd() {
    this.isDragging = false;
    this.touchStartDistance = 0;
  }
  
  zoomIn() {
    if (this.currentZoom < this.maxZoom) {
      const oldZoom = this.currentZoom;
      this.currentZoom = Math.min(this.maxZoom, this.currentZoom + this.zoomStep);
      this.animateZoom(oldZoom, this.currentZoom);
    }
  }
  
  zoomOut() {
    if (this.currentZoom > this.minZoom) {
      const oldZoom = this.currentZoom;
      this.currentZoom = Math.max(this.minZoom, this.currentZoom - this.zoomStep);
      this.animateZoom(oldZoom, this.currentZoom);
    }
  }
  
  resetZoom() {
    const oldZoom = this.currentZoom;
    const oldX = this.currentX;
    const oldY = this.currentY;
    
    this.currentZoom = 1;
    this.currentX = 0;
    this.currentY = 0;
    
    this.animateReset(oldZoom, oldX, oldY);
  }
}

// Initialize zoom controller when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
  const mesorregioesMap = document.getElementById('mesorregioesMap');
  const mapContainer = document.querySelector('.map-container-large');
  
  if (mesorregioesMap && mapContainer) {
    window.mapZoomController = new MapZoomController(mesorregioesMap, mapContainer);
  }
});

// Global functions for button onclick events
function zoomIn() {
  if (window.mapZoomController) {
    window.mapZoomController.zoomIn();
  }
}

function zoomOut() {
  if (window.mapZoomController) {
    window.mapZoomController.zoomOut();
  }
}

function resetZoom() {
  if (window.mapZoomController) {
    window.mapZoomController.resetZoom();
  }
} 