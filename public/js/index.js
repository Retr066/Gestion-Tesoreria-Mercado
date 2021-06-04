const imagenes = [
    'img/mercado.jpeg',
    'img/mercado1.jpeg',
    'img/mercado2.jpeg',
    'img/mercado3.jpeg',
    'img/mercado4.jpeg',
];

let i = 0;

const imagen = document.getElementById("carrusel");
imagen.style.backgroundImage = `url('${imagenes[i]}')`;
function cambiarImagen(){
    imagen.style.backgroundImage = `url('${imagenes[i]}')`;
      /* document.slider.src = imagenes[i]; */
    if(i < imagenes.length - 1){
        i++
    }else{
        i=0;
    }
    setTimeout("cambiarImagen()",4000);
}
window.onload = cambiarImagen;