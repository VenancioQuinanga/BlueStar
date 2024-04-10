const contain = document.querySelector('div.container')
const se = document.createElement('div')
const s = document.querySelector('div.search')

if (s.innerHTML != '') {
    se.innerHTML = s.innerHTML
    contain.innerHTML = ''
    contain.innerHTML = se.innerHTML
}