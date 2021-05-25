// adiciona ou remove a classe do body, esconde ou mostra o menu
// função autoinvocada
(function(){
    const menuToggle = document.querySelector('.menu-toggle')
    menuToggle.onclick = function (e){
       const body = document.querySelector('body')
       body.classList.toggle('hide-sidebar')
    }
})()