//#region ACCESIBILITE
const PremierOngletTab = (e) => {
  if (e.key === 'Tab') {
    document.body.classList.add('utilisateur_a_tab')

    window.removeEventListener('keydown', PremierOngletTab)
    window.addEventListener('mousedown', SourisEnfoncée)
  }
}
window.addEventListener('keydown', PremierOngletTab)
//#endregion ACCESIBILITE


//#region SOURIS  
const SourisEnfoncée = () => {
  document.body.classList.remove('utilisateur_a_tab')

  window.removeEventListener('mousedown', SourisEnfoncée)
  window.addEventListener('keydown', PremierOngletTab)
}
//#endregion SOURIS


//#region ROND VERT 
if (window.location.pathname.includes("index.php")) {
  const backToTopButton = document.querySelector(".deretourenhaut");
  let isBackToTopRendered = false;
  let alterStyles = (isBackToTopRendered) => {
    backToTopButton.style.visibility = isBackToTopRendered ? "visible" : "hidden";
    backToTopButton.style.opacity = isBackToTopRendered ? 1 : 0;
    backToTopButton.style.transform = isBackToTopRendered
      ? "scale(1)"
      : "scale(0)";
  };


  window.addEventListener("scroll", () => {
    if (window.scrollY > 700) {
      isBackToTopRendered = true;
      alterStyles(isBackToTopRendered);
    } else {
      isBackToTopRendered = false;
      alterStyles(isBackToTopRendered);
    }
  });
}


if (window.location.pathname.includes("projet.php")) {
  const returnButton = document.querySelector(".retourmenuPop");
  let isReturn = false;
  let returnHome = (isReturn) => {
    returnButton.style.visibility = isReturn ? "visible" : "hidden";
    returnButton.style.opacity = isReturn ? 1 : 0;
    returnButton.style.transform = isReturn
      ? "scale(1)"
      : "scale(0)";
  };

  window.addEventListener("scroll", () => {
    if (window.scrollY > 700) {
      isReturn = true;
      returnHome(isReturn);
    } else {
      isReturn = false;
      returnHome(isReturn);
    }
  });

}
//#endregion ROND VERT 


//#region CENTRAGE DES TITRES
if (window.location.pathname.includes("projet.php")) {
  let titreProjet = document.getElementsByClassName("TextsHeader");
  if (screen.width <= 500) {
    titreProjet[0].style.left = (screen.width / 2) - (235 / 2);
  } else {
    titreProjet[0].style.left = (screen.width / 2) - (385 / 2);
  }
}

if (window.location.pathname.includes("index.php")) {
  let titreHome = document.getElementsByClassName("TextsHeader");
  if (screen.width <= 500) {
    titreHome[0].style.left = (screen.width / 2) - (340 / 2);
  }
}
// if (screen.width <= 900) {
//   let pCredit = document.querySelector("row p");
//   pCredit[0].style.position = "relative";
//   pCredit[0].style.right = screen.width / 100 * 18;
// }
//#endregion CENTRAGE DES TITRES