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

//Maps
function initMap() {
  // Crea el mapa
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 13,
    center: {lat: 21.158639, lng: -86.809048} // San Francisco por defecto
  });

  // Agrega el marcador cuando se hace clic en el mapa
  var marker = new google.maps.Marker({
    map: map
  });
  map.addListener('click', function(event) {
    marker.setPosition(event.latLng);
    document.getElementById('latitud').value = event.latLng.lat();
    document.getElementById('longitud').value = event.latLng.lng();
  });
}
