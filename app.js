let contenedor_modal = document.getElementById("modal_back");
let ventana_modal = document.getElementById("modal");
let agendar = document.getElementById('agendar');
let cerrar_modal = document.getElementById('close__modal');
document.getElementById("nuevo").addEventListener('click', e => {
    contenedor_modal.style.display = 'flex';
})
contenedor_modal.addEventListener('click', e => contenedor_modal.style.display = 'none')
agendar.addEventListener('click', e => contenedor_modal.style.display = 'none')
cerrar_modal.addEventListener('click', e => contenedor_modal.style.display = 'none')
ventana_modal.addEventListener('click', e => {
    e.stopPropagation();
})