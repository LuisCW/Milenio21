function filtrarPropiedades() {
  var ubicacion = document.getElementById("location").value;
  var tipoPropiedad = document.getElementById("status").value;
  var habitaciones = document.getElementById("bedrooms").value;
  var banos = document.getElementById("bathrooms").value;
  var precio = document.getElementById("price").value;

  var propiedades = document.getElementsByClassName("propertys");

  for (var i = 0; i < propiedades.length; i++) {
    var mostrarPropiedad = true;

    if (ubicacion !== "" && !propiedades[i].querySelector("a[name='" + ubicacion + "']")) {
      mostrarPropiedad = false;
    }
    if (tipoPropiedad !== "" && !propiedades[i].querySelector("a[name='" + tipoPropiedad + "']")) {
      mostrarPropiedad = false;
    }
    if (habitaciones !== "" && !propiedades[i].querySelector("a[name='" + habitaciones + "']")) {
      mostrarPropiedad = false;
    }
    if (banos !== "" && !propiedades[i].querySelector("a[name='" + banos + "']")) {
      mostrarPropiedad = false;
    }
    if (precio !== "" && !propiedades[i].querySelector("a[name='" + precio + "']")) {
      mostrarPropiedad = false;
    }

    if (mostrarPropiedad) {
      propiedades[i].style.display = "block";
    } else {
      propiedades[i].style.display = "none";
    }
  }
}

function redirectToLink() {
  filtrarPropiedades();
  var propiedadesSection = document.querySelector("a[name='propiedades']");
  if (propiedadesSection) {
    propiedadesSection.scrollIntoView({ behavior: "smooth" });
  }
}


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