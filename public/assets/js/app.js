
(function(){
    const menuToggle = document.querySelector('.menu-toggle')
    menuToggle.onclick = function (e){
       const body = document.querySelector('body')
       body.classList.toggle('hide-sidebar')
    }
})()

function confirmacaoDesligamento(){
    const ok = confirm("Tem certeza que deseja desligar este funcionário?")
    if(ok){
        alert("Funcionário Desligado")
    }
}
//icofont-eye-blocked
// 
(function (){
    const botao = documento.querySelector('#remove_disable')
    botao.onclick = function(e){
        console.log('funcionando')
        const input = document.querySelector('input.senha_funcionario')
        input.removeAttribute('disabled')
    }
})
