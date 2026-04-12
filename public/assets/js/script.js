
// Hamburger menu toggle
const hamburger = document.getElementById('hamburger-button');
const overlay = document.getElementById('overlay');
const navLinks = document.getElementById('nav-links');

function toggleMenu() {
  overlay.classList.toggle('active');
  navLinks.classList.toggle('active');
}

function closeMenu() {
  overlay.classList.remove('active');
  navLinks.classList.remove('active');
}

hamburger.addEventListener('click', toggleMenu);
overlay.addEventListener('click', closeMenu);

// Optionally close menu when a link is clicked
navLinks.querySelectorAll('a').forEach(link => {
  link.addEventListener('click', closeMenu);
});

// Hide menu on desktop
function handleResize() {
  if (window.innerWidth > 900) {
    closeMenu();
  }
}
window.addEventListener('resize', handleResize);




// 1. Optimized Loader Functions
function showLoader() {
  const loader = document.getElementById('global-loader');
  if (loader) loader.classList.add('loader-visible');
}

function hideLoader() {
  const loader = document.getElementById('global-loader');
  if (loader) loader.classList.remove('loader-visible');
}

// 2. Language Toggle - Faster & Snappier
function toggleLanguage(checkbox) {
  showLoader(); 
  
  const lang = checkbox.checked ? 'fr' : 'en';
  const selectField = document.querySelector('.goog-te-combo');
  
  if (selectField) {
    selectField.value = lang;
    selectField.dispatchEvent(new Event('change'));
    localStorage.setItem('selectedLanguage', lang);
  }
  
  // Reduced to 400ms - just enough to hide the "flicker"
  setTimeout(hideLoader, 400); 
}

// 3. Memory: Auto-apply language on load
function applyStoredLanguage() {
  const storedLang = localStorage.getItem('selectedLanguage');
  const checkbox = document.getElementById('lang-checkbox');

  const checkInterval = setInterval(() => {
    const selectField = document.querySelector('.goog-te-combo');
    if (selectField) {
      clearInterval(checkInterval);
      if (storedLang) {
        checkbox.checked = (storedLang === 'fr');
        if (selectField.value !== storedLang) {
          selectField.value = storedLang;
          selectField.dispatchEvent(new Event('change'));
        }
      }
    }
  }, 100);
  setTimeout(() => clearInterval(checkInterval), 5000);
}

window.addEventListener('load', applyStoredLanguage);

// NOTE: We removed the "document.querySelectorAll('a')" section 
// so navigation is now instant.



