//Buscador

const searchInput = document.querySelector('.Search-input')
const searchButton = document.querySelector('.Search-button')
const boxSearch = document.querySelector('.boxSearch')
const boxResearch = document.querySelector('.boxResearch')
const ocultar = document.querySelector('.ocultar')

//Resultado de busqueda
const resultadoBusqueda=[
    {nombre: 'Propiedades', pagina: 'Milenio21.html#propiedades'},
    {nombre: 'Propiedad en Akumal', pagina: 'Milenio21.html#1Akumal'},
    {nombre: 'Casa nueva en Cancún', pagina: 'Milenio21.html#2Cancun'},
    {nombre: 'Casa seminueva en Cancun', pagina: 'Milenio21.html#3Cancun'},
    {nombre: 'Amplio condominio Playa del Carmen', pagina: 'Milenio21.html#4PlayaCarmen'},
    {nombre: 'Apartaestudio Playa del Carmen', pagina: 'Milenio21.html#5PlayaCarmen'},
    {nombre: 'Departamento nuevo Playa Carmen', pagina: 'Milenio21.html#6PLayaCarmen'},
    {nombre: 'Condominio Puerto Morelos', pagina: 'Milenio21.html#7PlayaCarmen'},
    {nombre: 'Duplex en Tulum', pagina: 'Milenio21.html#8Tulum'},
    {nombre: 'Cancun', pagina: 'Milenio21.html#Cancun'},
    {nombre: 'Akumal', pagina: 'Milenio21.html#Akumal'},
    {nombre: 'Veracruz', pagina: 'Milenio21.html#Veracruz'},
    {nombre: 'Riviera Maya', pagina: 'Milenio21.html#Maya'},
    {nombre: 'Veracruz', pagina: 'Milenio21.html#Veracruz'},
    {nombre: 'Playa del Carmen', pagina: 'Milenio21.html#PlayaCarmen'},
    {nombre: 'Chapultepec', pagina: 'Milenio21.html#Chapultepec'}
]


const filter = ()=>{
    boxResearch.innerHTML='';
    const buscador = searchInput.value.toUpperCase();
    for (let research of resultadoBusqueda){
        let nombre = research.nombre.toUpperCase();
        if(nombre.includes(buscador) !==-1){
            boxResearch.innerHTML+=`
                <li><a href="${research.pagina}">${research.nombre}</a></li>
            `
        }
    }
    if(boxResearch.innerHTML === ''){
        boxResearch.innerHTML+=`
                <li>No hay ningún resultado</li>
            `
    }
}
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
  
  
  
  
  
  


