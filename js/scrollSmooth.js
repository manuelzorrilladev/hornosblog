

function toggleMenu(){
  let toggle = document.querySelector('.toggle');
  let navigation = document.querySelector('.nav');
  let rx = document.querySelector('.rx');
  let rr = document.querySelector('.rr');
  rr.classList.toggle('down')
  toggle.classList.toggle('active');
  navigation.classList.toggle('activate');
  rx.classList.toggle('activate');
}




ScrollReveal().reveal('header');
ScrollReveal().reveal('.banner', {delay: 200 });
ScrollReveal().reveal('.contenedor', {delay: 500 });
ScrollReveal().reveal('.post', {delay: 500 });
ScrollReveal().reveal('.paginacion', {delay: 700 });
ScrollReveal().reveal('.footer', {delay: 1000 });







 $(document).ready(function() {
    $('a[href^="#"]').click(function() {
      var destino = $(this.hash);
      if (destino.length == 0) {
        destino = $('a[name="' + this.hash.substr(1) + '"]');
      }
      if (destino.length == 0) {
        destino = $('html');
      }
      $('html, body').animate({ scrollTop: destino.offset().top }, 700);
      return false;
    });
  });



