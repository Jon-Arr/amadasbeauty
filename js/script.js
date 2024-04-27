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

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'timeGridWeek',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'timeGridWeek'
      },
      events: [
        {
          title: '13:00 - 14:00',
          daysOfWeek: [1, 3, 5],
          startTime: '13:00',
          endTime: '14:00',
          color: '#50C878'
        },
        {
          title: '16:00 - 17:00',
          daysOfWeek: [1, 3, 5],
          startTime: '16:00',
          endTime: '17:00',
          color: '#50C878'
        },
        {
          title: '18:00 - 19:00',
          daysOfWeek: [1, 3, 5],
          startTime: '18:00',
          endTime: '19:00',
          color: '#50C878'
        }
      ]
    });

    calendar.render();
  });