//filtros
// Obtener referencias a los elementos select
var selectLocation = document.getElementById("location");
var selectStatus = document.getElementById("status");
var selectPrice = document.getElementById("price");

// Asignar eventos a los elementos select
selectLocation.addEventListener("change", redirectToLinkLocation);
selectStatus.addEventListener("change", redirectToLinkStatus);
selectPrice.addEventListener("change", redirectToLinkPrice);

// Función para redireccionar según la selección de location
function redirectToLinkLocation() {
  var selectedOption = selectLocation.options[selectLocation.selectedIndex];
  var link = selectedOption.value;
  
  if (link) {
    window.location.href = link;
  }
}

// Función para redireccionar según la selección de status
function redirectToLinkStatus() {
  var selectedOption = selectStatus.options[selectStatus.selectedIndex];
  var link = selectedOption.value;
  
  if (link) {
    window.location.href = link;
  }
}

// Función para redireccionar según la selección de price
function redirectToLinkPrice() {
  var selectedOption = selectPrice.options[selectPrice.selectedIndex];
  var link = selectedOption.value;
  
  if (link) {
    window.location.href = link;
  }
}


//Buscador

const searchInput = document.querySelector('.Search-input')
const searchButton = document.querySelector('.Search-button')
const boxSearch = document.querySelector('.boxSearch')
const boxResearch = document.querySelector('.boxResearch')
const ocultar = document.querySelector('.ocultar')

//Resultado de busqueda
const resultadoBusqueda=[
    {nombre: 'Cancun', pagina: 'Milenio21.html#Cancun'},
    {nombre: 'Akumal', pagina: 'Milenio21.html#Akumal'},
    {nombre: 'Veracruz', pagina: 'Milenio21.html#Veracruz'},
    {nombre: 'Riviera Maya', pagina: 'Milenio21.html#Maya'},
    {nombre: 'Veracruz', pagina: 'Milenio21.html#Veracruz'},
    {nombre: 'Playa del Carmen', pagina: 'Milenio21.html#PlayaCarmen'},
    {nombre: 'Chapultepec', pagina: 'Milenio21.html#Chapultepec'},
    {nombre: 'Apartment', pagina: 'Milenio21.html#Departamento'},
    {nombre: 'House', pagina: 'Milenio21.html#Casa'},
    {nombre: 'Condominium', pagina: 'Milenio21.html#Condominio'},
    {nombre: 'Studio Apartment', pagina: 'Milenio21.html#Apartaestudio'},
    {nombre: 'Duplex Apartment', pagina: 'Milenio21.html#Duplex'},
    {nombre: '1000000 - 1999999', pagina: 'Milenio21.html#1Millon'},
    {nombre: '2000000 - 2999999', pagina: 'Milenio21.html#2Millones'},
    {nombre: '3000000 - 3999999', pagina: 'Milenio21.html#3Millones'},
    {nombre: '4000000 - 4999999', pagina: 'Milenio21.html#4Millones'},
]


const formatNumber = (number) => {
  const parts = number.toString().split(".");
  parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  return parts.join(".");
};

const filter = () => {
  boxResearch.innerHTML = "";
  const buscador = searchInput.value.toUpperCase();
  for (let research of resultadoBusqueda) {
    let nombre = research.nombre;
    if (nombre.toUpperCase().startsWith(buscador)) {
      const numeroFormateado = formatNumber(nombre);
      boxResearch.innerHTML += `
        <li><a href="${research.pagina}">${numeroFormateado}</a></li>
      `;
    }
  }
  if (boxResearch.innerHTML === "") {
    boxResearch.innerHTML += `
      <li>No hay ningún resultado</li>
    `;
  }
};

searchButton.addEventListener('click', filter);
searchButton.addEventListener('keypress', function(e){
    enterFilter(e);
});
searchInput.addEventListener('keypress', function(e){
   enterFilter(e);
});
searchInput.addEventListener('keyup',filter);
function enterFilter(e) {
    let tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13) alert (searchInput.value);
}
searchInput.addEventListener('click', ()=>{
    searchInput.classList.add('unborderTop');
    boxSearch.classList.add('buttonActive');
    ocultar.classList.add('active');
})
ocultar.addEventListener('click', ()=>{
    searchInput.classList.remove('unborderTop');
    boxSearch.classList.remove('buttonActive');
    ocultar.classList.remove('active');
})
// Obtener el elemento de la cabecera
const header = document.querySelector('header');

// Obtener la posición inicial del scroll
let scrollPosition = window.scrollY;

// Función para controlar el estado de la cabecera
const toggleHeaderState = () => {
  // Obtener la posición actual del scroll
  const currentScrollPosition = window.scrollY;

  // Comprobar si el scroll ha bajado lo suficiente para activar la cabecera
  if (currentScrollPosition > scrollPosition) {
    header.classList.add('active');
  }
  // Actualizar la posición del scroll
  scrollPosition = currentScrollPosition;
};
window.addEventListener('scroll', function() {
  var header = document.querySelector('header');
  var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

  if (scrollPosition === 0) {
    header.classList.remove('active');
  } else {
    header.classList.active('active');
  }
});

// Escuchar el evento de scroll y llamar a la función toggleHeaderState
window.addEventListener('scroll', toggleHeaderState);

// Get DOM elements
const modal1 = document.getElementById("video-modal1");
const property1 = document.querySelector(".property1");
const close1 = document.querySelector(".close1");

property1.addEventListener("click", () => {
  modal1.style.display = "block";
  var video = document.querySelector("#video-modal1 iframe");
  if (video) {
    video.src = video.src; // Reiniciar el video al abrir el modal
  }
});

close1.addEventListener("click", () => {
  modal1.style.display = "none";
  var video = document.querySelector("#video-modal1 iframe");
  if (video) {
    video.src = ""; // Detener el video al cerrar el modal
  }
});

window.addEventListener("click", (event) => {
  if (event.target == modal1) {
    modal1.style.display = "none";
    var video = document.querySelector("#video-modal1 iframe");
    if (video) {
      video.src = ""; // Detener el video al cerrar el modal
    }
  }
});

const modal3 = document.getElementById("video-modal3");
const property3 = document.querySelector(".property3");
const close3 = document.querySelector(".close3");

property3.addEventListener("click", () => {
  modal3.style.display = "block";
  var video = document.querySelector("#video-modal3 iframe");
  if (video) {
    video.src = video.src; // Reiniciar el video al abrir el modal
  }
});

close3.addEventListener("click", () => {
  modal3.style.display = "none";
  var video = document.querySelector("#video-modal3 iframe");
  if (video) {
    video.src = ""; // Detener el video al cerrar el modal
  }
});

window.addEventListener("click", (event) => {
  if (event.target == modal3) {
    modal3.style.display = "none";
  }
  var video = document.querySelector("#video-modal3 iframe");
    if (video) {
      video.src = ""; // Detener el video al cerrar el modal
    }
});
const modal4 = document.getElementById("video-modal4");
const property4 = document.querySelector(".property4");
const close4 = document.querySelector(".close4");

property4.addEventListener("click", () => {
  modal4.style.display = "block";
  var video = document.querySelector("#video-modal4 iframe");
  if (video) {
    video.src = ""; // Detener el video al cerrar el modal
  }
});

close4.addEventListener("click", () => {
  modal4.style.display = "none";
  var video = document.querySelector("#video-modal4 iframe");
  if (video) {
    video.src = ""; // Detener el video al cerrar el modal
  }
});

window.addEventListener("click", (event) => {
  if (event.target == modal4) {
    modal4.style.display = "none";
    var video = document.querySelector("#video-modal4 iframe");
    if (video) {
      video.src = ""; // Detener el video al cerrar el modal
    }
  }
});
const modal5 = document.getElementById("video-modal5");
const property5 = document.querySelector(".property5");
const close5 = document.querySelector(".close5");

property5.addEventListener("click", () => {
  modal5.style.display = "block";
  var video = document.querySelector("#video-modal5 iframe");
  if (video) {
    video.src = ""; // Detener el video al cerrar el modal
  }
});

close5.addEventListener("click", () => {
  modal5.style.display = "none";
  var video = document.querySelector("#video-modal5 iframe");
  if (video) {
    video.src = ""; // Detener el video al cerrar el modal
  }
});

window.addEventListener("click", (event) => {
  if (event.target == modal5) {
    modal5.style.display = "none";
    var video = document.querySelector("#video-modal5 iframe");
    if (video) {
      video.src = ""; // Detener el video al cerrar el modal
    }
  }
});
const modal6 = document.getElementById("video-modal6");
const property6 = document.querySelector(".property6");
const close6 = document.querySelector(".close6");

property6.addEventListener("click", () => {
  modal6.style.display = "block";
  var video = document.querySelector("#video-modal6 iframe");
  if (video) {
    video.src = ""; // Detener el video al cerrar el modal
  }
});

close6.addEventListener("click", () => {
  modal6.style.display = "none";
  var video = document.querySelector("#video-modal6 iframe");
  if (video) {
    video.src = ""; // Detener el video al cerrar el modal
  }
});

window.addEventListener("click", (event) => {
  if (event.target == modal6) {
    modal6.style.display = "none";
    var video = document.querySelector("#video-modal6 iframe");
    if (video) {
      video.src = ""; // Detener el video al cerrar el modal
    }
  }
});
const modal7 = document.getElementById("video-modal7");
const property7 = document.querySelector(".property7");
const close7 = document.querySelector(".close7");

property7.addEventListener("click", () => {
  modal7.style.display = "block";
  var video = document.querySelector("#video-modal7 iframe");
  if (video) {
    video.src = ""; // Detener el video al cerrar el modal
  }
});

close7.addEventListener("click", () => {
  modal7.style.display = "none";
  var video = document.querySelector("#video-modal7 iframe");
  if (video) {
    video.src = ""; // Detener el video al cerrar el modal
  }
});

window.addEventListener("click", (event) => {
  if (event.target == modal7) {
    modal7.style.display = "none";
    var video = document.querySelector("#video-modal7 iframe");
    if (video) {
      video.src = ""; // Detener el video al cerrar el modal
    }
  }
});
const modal2 = document.getElementById("video-modal2");
const property2 = document.querySelector(".property2");
const close2 = document.querySelector(".close2");

property2.addEventListener("click", () => {
  modal2.style.display = "block";
  var video = document.querySelector("#video-modal2 iframe");
  if (video) {
    video.src = ""; // Detener el video al cerrar el modal
  }
});

close2.addEventListener("click", () => {
  modal2.style.display = "none";
  var video = document.querySelector("#video-modal2 iframe");
  if (video) {
    video.src = ""; // Detener el video al cerrar el modal
  }
});

window.addEventListener("click", (event) => {
  if (event.target == modal2) {
    modal2.style.display = "none";
    var video = document.querySelector("#video-modal2 iframe");
    if (video) {
      video.src = ""; // Detener el video al cerrar el modal
    }
  }
});
  
  
  
  
  
  


