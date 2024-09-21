// Itens que vamos usar
hellga = document.getElementById("hellga");
back = document.getElementById("back");
journal = document.getElementById("journal");

// Configura as funções
document.addEventListener("mousemove", parallax);

// Funções
function parallax(event) {
    hellga.style.transform = `translateX(${(window.innerWidth - event.pageX) / 360}px) translateY(0px)`
    back.style.transform = `translateX(${(window.innerWidth - event.pageX) / 360}px) translateY(0px)`
    journal.style.transform = `translateX(${(window.innerWidth - event.pageX) / 1000}px) translateY(0px)`
}
