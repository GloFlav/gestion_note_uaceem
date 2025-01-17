const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("show");
      } else {
        entry.target.classList.remove("show");
      }
    });
  });
  
  const hiddenElements = document.querySelectorAll(".hidden");
  hiddenElements.forEach((el) => observer.observe(el));
  
  //animated background
  const heroImage = document.getElementById("hero-image");
  const cards1 = document.querySelectorAll(".card-person");
  const heroSection = document.getElementById("hero");
  
  let hasAnimated = false;
  
  window.addEventListener("scroll", () => {
    // const heroPosition = heroSection.getBoundingClientRect();
    const scrollPosition = window.scrollY;
  
    // Vérifie si la section hero est visible dans la fenêtre
    if (
      // heroPosition.top <= window.innerHeight &&
      // heroPosition.bottom >= 0 &&
      !hasAnimated
    ) {
      hasAnimated = true; // Empêche l'animation de se reproduire
      heroImage.style.transform = `translate(-50%, -50%) scale(1.2)`; // Ajustez le scale pour l'effet désiré
  
      // Affichage des cartes
      cards1.forEach((card, index) => {
        setTimeout(() => {
          card.classList.remove("hidden");
          card.classList.add("visible");
        }, index * 300); // Retard de 300 ms entre l'apparition des cartes
      });
    }
  });
  
  /* mission */
  
  let cards = document.querySelectorAll(".card");
  let stackArea = document.querySelector(".stack-area");
  
  function rotateCards() {
    let angle = 0;
    cards.forEach((card) => {
      if (card.classList.contains("active")) {
        card.style.transform = `translate(-50%, -120vh) rotate(-48deg)`;
      } else {
        card.style.transform = `translate(-50%, -50%) rotate(${angle}deg)`;
        angle = angle - 10;
      }
    });
  }
  
  rotateCards();
  
  window.addEventListener("scroll", () => {
    let proportion = stackArea.getBoundingClientRect().top / window.innerHeight;
    if (proportion <= 0) {
      let n = cards.length;
      let index = Math.ceil((proportion * n) / 2);
      index = Math.abs(index) - 1;
      for (let i = 0; i < n; i++) {
        if (i <= index) {
          cards[i].classList.add("active");
        } else {
          cards[i].classList.remove("active");
        }
      }
      rotateCards();
    }
  });
  
  //Code for responsiveness
  
  function adjust() {
    let windowWidth = window.innerWidth;
    let left = document.querySelector(".left");
    left.remove();
    if (windowWidth < 800) {
      stackArea.insertAdjacentElement("beforebegin", left);
    } else {
      stackArea.insertAdjacentElement("afterbegin", left);
    }
  }
  adjust();
  
  //detect Resize
  
  window.addEventListener("resize", adjust);