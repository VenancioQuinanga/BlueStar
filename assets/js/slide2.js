"use strict"

    let i = 0
    const max = document.querySelectorAll('div.start img').length - 1
    console.log(max)
    action()

    function action() {
        const img = document.querySelectorAll('div.start img')

            setInterval(()=>{
            img[i].style.display = 'none'
            i++

            if (i > max) {
                i = 0
            }

            img[i].style.display = 'block'

        },3000)
    }

