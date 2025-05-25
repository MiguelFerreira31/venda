//#region swiper home
var swiper = new Swiper(".mySwiper", {
  speed: 1000,
  parallax: true,
  loop: true,
  autoplay: {
    delay: 6000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  }
});
 //#endregion


  document.getElementById('toggleSenha').addEventListener('click', function () {
    const senhaInput = document.getElementById('senha_cliente');
    const icone = document.getElementById('iconeSenha');
    
    if (senhaInput.type === 'password') {
      senhaInput.type = 'text';
      icone.classList.remove('bi-eye');
      icone.classList.add('bi-eye-slash');
    } else {
      senhaInput.type = 'password';
      icone.classList.remove('bi-eye-slash');
      icone.classList.add('bi-eye');
    }
  });




  