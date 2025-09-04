
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
