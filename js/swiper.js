// CODE CARDS
var mySwiper = new Swiper('.mySwiper', {
  slidesPerView: 3, // nombre de cartes à afficher
  spaceBetween: 7, // espacement entre les cartes
  loop: true, // loop slider, retourne au début après la dernière carte
  
});

// boutons suivant/précédent
var nextBtn = document.querySelector('.next');
var prevBtn = document.querySelector('.prev');
currentPos=0;
firstpos=0;
lastpos=mySwiper.slides.length; //5


// ajouter un écouteur d'événement pour le bouton suivant
nextBtn.onclick= function() {
      currentPos++;

  if (currentPos== 3) {
    mySwiper.slideTo(0); // revient à la première diapositive
    currentPos=0;
  } else {
    mySwiper.slideTo(currentPos); // passe à la diapositive suivante
  }
}



// ajouter un écouteur d'événement pour le bouton précédent
prevBtn.addEventListener('click', function() {
  
  if (currentPos==firstpos) {
    return; // ne rien faire si la première diapositive est déjà affichée
  }
  else{
    currentPos--;
  }
  mySwiper.slideTo(currentPos);
 // passe à la diapositive précédente
});
// END OF CODE CARDS


var mySwiper = new Swiper('.mySwiper', {
  slidesPerView: 3, // nombre de cartes à afficher
  spaceBetween: 7, // espacement entre les cartes
  loop: true, // loop slider, retourne au début après la dernière carte
});

// MEDIA OF SWIPER

// Ajouter l'événement de redimensionnement

window.addEventListener('resize', function() {
  // Vérifier la largeur de la fenêtre
  if (window.innerWidth < 1024 && window.innerWidth > 600) {
    // Mise à jour des options de Swiper
    mySwiper.params.slidesPerView = 2;
    mySwiper.params.spaceBetween = 3;
    // Mise à jour de la présentation de Swiper
    mySwiper.update();
    nextBtn.onclick= function() {
      currentPos++;

      if (currentPos== 4) {
     mySwiper.slideTo(0); // revient à la première diapositive
      currentPos=0;
    } else {
    mySwiper.slideTo(currentPos); // passe à la diapositive suivante
   }
}
  }
  if (window.innerWidth < 1024 && window.innerWidth < 800) {
    // Mise à jour des options de Swiper
    mySwiper.params.slidesPerView = 1;
    mySwiper.params.spaceBetween = 2;

    // Mise à jour de la présentation de Swiper
    mySwiper.update();
    nextBtn.onclick= function() {
      currentPos++;

    if (currentPos== 5) {
      mySwiper.slideTo(0); // revient à la première diapositive
      currentPos=0;
    } else {
    mySwiper.slideTo(currentPos); // passe à la diapositive suivante
  }
  }
  } 
  if (window.innerWidth > 1024) {
    // Mise à jour des options de Swiper
    mySwiper.params.slidesPerView = 3;
    mySwiper.params.spaceBetween = 7;
    // Mise à jour de la présentation de Swiper
    mySwiper.update();
    nextBtn.onclick= function() {
      currentPos++;

    if (currentPos== 3) {
      mySwiper.slideTo(0); // revient à la première diapositive
      currentPos=0;
    } else {
    mySwiper.slideTo(currentPos); // passe à la diapositive suivante
    }
  }
}
});

if (window.innerWidth < 1024 && window.innerWidth > 600) {
  // Mise à jour des options de Swiper
  mySwiper.params.slidesPerView = 2;
  mySwiper.params.spaceBetween = 3;
  // Mise à jour de la présentation de Swiper
  mySwiper.update();
  nextBtn.onclick= function() {
    currentPos++;

    if (currentPos== 4) {
   mySwiper.slideTo(0); // revient à la première diapositive
    currentPos=0;
  } else {
  mySwiper.slideTo(currentPos); // passe à la diapositive suivante
 }
}
}
if (window.innerWidth < 1024 && window.innerWidth < 800) {
  // Mise à jour des options de Swiper
  mySwiper.params.slidesPerView = 1;
  mySwiper.params.spaceBetween = 2;

  // Mise à jour de la présentation de Swiper
  mySwiper.update();
  nextBtn.onclick= function() {
    currentPos++;

  if (currentPos== 5) {
    mySwiper.slideTo(0); // revient à la première diapositive
    currentPos=0;
  } else {
  mySwiper.slideTo(currentPos); // passe à la diapositive suivante
}
}
} 

if (window.innerWidth > 1024) {
  // Mise à jour des options de Swiper
  mySwiper.params.slidesPerView = 3;
  mySwiper.params.spaceBetween = 7;
  // Mise à jour de la présentation de Swiper
  mySwiper.update();
  nextBtn.onclick= function() {
    currentPos++;

  if (currentPos== 3) {
    mySwiper.slideTo(0); // revient à la première diapositive
    currentPos=0;
  } else {
  mySwiper.slideTo(currentPos); // passe à la diapositive suivante
  }
}
}
