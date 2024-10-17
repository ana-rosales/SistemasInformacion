let burgerMenu = document.getElementById('burger');

burgerMenu.addEventListener('click',()=>{
    target = burgerMenu.dataset.target;         //qué se despliega en burger
    data = document.getElementById(target);     //donde está esa información

    burgerMenu.classList.toggle('is-active');   //cambiar icono burger
    data.classList.toggle('is-active');         //desplegar info del burger
});