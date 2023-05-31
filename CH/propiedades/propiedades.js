//menu lateral
const sideNav = document.getElementById('side-nav');
const sideNavContent = document.querySelector('.sidenav-content');
const sideNavClose = document.getElementById('side-nav-close');
const networks = document.querySelector('.networks');

function openSideNav() {
  sideNav.classList.add('active');
  sideNavContent.classList.add('activo');
}

function closeSideNav() {
  sideNav.classList.remove('active');
  sideNavContent.classList.remove('activo');
}

networks.addEventListener('click', openSideNav);
sideNavClose.addEventListener('click', closeSideNav);
sideNav.addEventListener('click', (event) => {
  if (event.target === sideNav) {
    closeSideNav();
  }
});
//menu
const menu = document.querySelector('.menu');
const menuItems = document.querySelector('.menu-items');

menu.addEventListener('click', function() {
  menu.classList.toggle('open');
  menuItems.classList.toggle('show');
});

document.addEventListener('click', function(event) {
  if (!menu.contains(event.target) && !menuItems.contains(event.target)) {
    menu.classList.remove('open');
    menuItems.classList.remove('show');
  }
});

//Filtros de busqueda
const filterButton = document.querySelector('#filter-button');

filterButton.addEventListener('click', () => {
  const rooms = document.querySelector('#rooms').value;
  const bathrooms = document.querySelector('#bathrooms').value;
  const location = document.querySelector('#location').value;
  const status = document.querySelector('#status').value;
  const price = document.querySelector('#price').value;

  // Aquí puedes hacer algo con los valores de los filtros, como enviarlos a un servidor para obtener los resultados de la búsqueda.
});
//Paginacion

  
  
  