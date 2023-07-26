// Au tab ça vise un élément soit lien ou zone formulaire
const PremierOngletTab = (e) => {
  if(e.key === 'Tab') {
    document.body.classList.add('utilisateur_a_tab')

    window.removeEventListener('keydown', PremierOngletTab)
    window.addEventListener('mousedown', SourisEnfoncée)
  }

}



const SourisEnfoncée = () => {
  document.body.classList.remove('utilisateur_a_tab')

  window.removeEventListener('mousedown', SourisEnfoncée)
  window.addEventListener('keydown', PremierOngletTab)
}





window.addEventListener('keydown', PremierOngletTab)





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
