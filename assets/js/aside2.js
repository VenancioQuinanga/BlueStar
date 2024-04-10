const nav = document.querySelector("header nav")
const ul = document.querySelector("header nav ul")
const li = document.querySelectorAll("header nav ul li")
const icon = document.querySelector("img#icon")
const aside =document.querySelector('header aside form')
const exit = document.createElement('img')
exit.src = './assets/icons/menu-hamburguer.png'
exit.id = 'exit'

const add_nav = ()=>{
    nav.replaceChild(exit,icon);
    nav.style.height = '55%';

    ul.style.display = 'block';
    ul.style.float = 'none';
    ul.style.width = '100%';
    ul.style.marginTop = '2em';

    li.forEach(li=>{
        li.style.width = '100%';
        li.style.padding = '.5em';
        li.style.marginLeft = '0';
        li.style.float = 'none';
        li.style.borderBottom = '2px solid #ccc';
    });

}

const remove_nav = ()=>{
    nav.replaceChild(icon,exit);
    nav.style.height = '12%';

    ul.style.display = 'none';
    ul.style.float = 'right';
    ul.style.width = 'none';
    ul.style.marginTop = '-1.5em';

    li.forEach(li=>{
        li.style.width = 'none';
        li.style.padding = '0';
        li.style.marginLeft = '3em';
        li.style.float = 'left';
        li.style.borderBottom = 'none';
    });
}

icon.addEventListener("click",()=>{ add_nav() })

exit.addEventListener("click",()=>{ remove_nav() })