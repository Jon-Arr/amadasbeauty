/*********************************Menu */
function openMenu() {
    // document.getElementById("menu").style.display = "flex"
    document.getElementById("ico-menu-on").style.display = "none"
    document.getElementById("ico-menu-off").style.display = "inline"
    document.getElementById("menu").style.transition = "all 1s"
    document.getElementById("menu").style.opacity = "1.0"
    // document.getElementById("menu").style.visibility = "visible"
    // document.getElementById("menu").style.height = "auto"
    // document.getElementById("menu").style.transform = "auto"
}
function closeMenu() {
    // document.getElementById("menu").style.display = "none"
    document.getElementById("ico-menu-on").style.display = "inline"
    document.getElementById("ico-menu-off").style.display = "none"
    document.getElementById("menu").style.transition = "all 1s"
    document.getElementById("menu").style.opacity = "0.0"
    // document.getElementById("menu").style.visibility = "hidden"
    // document.getElementById("menu").style.height = "0"
    // document.getElementById("menu").style.transform = "0"
}

// var menu = document.getElementById("menu1")
// var modal = document.getElementById("myModal")
// var span = document.getElementsByClassName("close")[0]

// menu.onclick = function (event) {
//     modal.style.display = "flex";
// }

// span.onclick = function (event) {
//         modal.style.display = "none";
//     }

// window.onclick = function (event) {
//     if (event.target == modal) {
//         modal.style.display = "none"
//     }
// }

/*********************************************MODAL */

function openModal(item) {
    const modal = document.getElementById("myModal")
    modal.style.display = "block"
    const modalImg = document.getElementById("modalImg")
    const modalVideo = document.getElementById("modalVideo")
    const modalImagen = document.getElementById("modalImagen")
    modalImg.style.display = "none";
    modalVideo.style.display = "none";
    if (item === 'quees' || item === 'estudio' || item === 'valores' || item === 'ustedes' || item === 'cuidados' || item === 'info' || item === 'promos' || item === 'concursos') {
        modalImg.style.display = "block"
        modalImg.src = `./media/ico-menu/${item}.webp`
        modalVideo.style.display = "block"
        modalVideo.src = `./media/sofi/${item}1.mp4`
        modalImagen.style.display = "block"
        modalImagen.src = `./media/sofi/${item}1.webp`
    } else {
    }
}

function closeModal() {
    const modal = document.getElementById("myModal");
    modal.style.display = "none";
    const modalImg = document.getElementById("modalImg");
    const modalVideo = document.getElementById("modalVideo");
    modalImg.src = "";
    modalVideo.src = "";
}

/*********************************************AGENDA */

function showSelectedText() {
    const selectElement1 = document.getElementById('horas-disp');
    const textInput1 = document.getElementById('hora');
    const selectElement2 = document.getElementById('serv-disp');
    const textInput2 = document.getElementById('servicio');
    const selectElement3 = document.getElementById('esp-disp');
    const textInput3 = document.getElementById('especialista');

    const selectedText1 = selectElement1.value;
    textInput1.value = selectedText1;
    const selectedText2 = selectElement2.value;
    textInput2.value = selectedText2;
    const selectedText3 = selectElement3.value;
    textInput3.value = selectedText3;
}

// const form = document.querySelector('form');
//     const comprobante = document.getElementById('comprobante');
//     const horaSeleccionada = document.getElementById('horaSeleccionada');
//     const servicioSeleccionado = document.getElementById('servicioSeleccionado');
//     const especialistaSeleccionado = document.getElementById('especialistaSeleccionado');
//     const pagoBancario = document.getElementById('pagoBancario');

//     form.addEventListener('submit', function(event) {
//         event.preventDefault();
//         const hora = document.getElementById('hora').value;
//         const servicio = document.getElementById('servicio').value;
//         const especialista = document.getElementById('especialista').value;

//         horaSeleccionada.textContent = hora;
//         servicioSeleccionado.textContent = servicio;
//         especialistaSeleccionado.textContent = especialista;

//         comprobante.style.display = 'block';
//         pagoBancario.href = `../php/pago.php?hora=${hora}&servicio=${servicio}&especialista=${especialista}`;
//     });
function alerta() {
    const hora = document.getElementById('hora').value;
    const servicio = document.getElementById('servicio').value;
    const especialista = document.getElementById('especialista').value;

    if(hora == "" || servicio == "" || especialista == ""){
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Porfavor complete todos los campos",
          });
    }else{
        Swal.fire({
            title: "Hora Agendada!",
            text: "Tu hora del día "+hora+" para el servicio de "+servicio+" fue agendada con la especialista "+especialista,
            footer: "No olvides abonar para mantener tu hora",
            icon: "success"
        }).then(function() {
            window.location = "../index.html";
        });
    }
}