"use strict"

const nav = document.querySelector("header nav")
const ul = document.querySelector("header nav ul")
const li = document.querySelectorAll("header nav ul li")
const ct = document.querySelector("header nav ul li.litle_cart")
const spn = document.querySelector("header nav ul li.litle_cart span")
const icon = document.querySelector("img#icon")
const exit = document.createElement('img')
exit.src = './assets/icons/menu-hamburguer.png'
exit.id = 'exit'

const add_nav = ()=>{

    nav.replaceChild(exit,icon);
    nav.style.height = '50%';

    ul.style.display = 'block';
    ul.style.float = 'none';
    ul.style.width = '100%';
    ul.style.marginTop = '5em';

    spn.style.height = '7%';

    li.forEach(li=>{
        li.style.width = '100%';
        li.style.padding = '.5em';
        li.style.marginLeft = '0';
        li.style.display = 'block'
        li.style.float = 'none';
        li.style.borderBottom = '2px solid #ccc';
    });
}

const remove_nav = ()=>{

    nav.replaceChild(icon,exit);
    nav.style.height = '12%';

    ul.style.display = 'none !important';
    ul.style.float = 'right';
    ul.style.width = 'none';
    ul.style.marginTop = '-1.5em';

    li.forEach(li=>{
        li.style.width = 'none';
        li.style.display = 'none'
        li.style.padding = '0';
        li.style.marginLeft = '3em';
        li.style.float = 'left';
        li.style.borderBottom = 'none';
    });
}

icon.addEventListener("click",()=>{ add_nav() })

exit.addEventListener("click",()=>{ remove_nav() })
