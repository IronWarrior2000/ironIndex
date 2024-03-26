

class BountyImage {
    constructor(src, alt, className) {
      this.src = src;
      this.alt = alt;
      this.className = className;
    }
    
    getRender() {
      const img = document.createElement('img');
      img.src = this.src;
      img.alt = this.alt;
      img.classList.add(this.className);
      
      document.body.appendChild(img);
    }
  }

export default BountyImage;