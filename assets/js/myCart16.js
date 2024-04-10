'use strict'

const container = document.querySelector('#container form')
const cont = document.querySelector('#container')
const buy_success = document.querySelector('input.buy_success')

const save = (id,name,amount,src,price,cost) => {
  if (container) {
        
  let element = document.createElement('div')
  element.classList = 'element'
  
  let prod = document.createElement('div')
  prod.classList = 'prod'

  let img = document.createElement('img')
  img.setAttribute('width','300')
  img.setAttribute('heigth','200')
  img.src = `./assets/img/products/${src}`
  prod.appendChild(img)

  let aside = document.createElement('aside')
  aside.classList = 'relatory'

  let productName = document.createElement('div')
  productName.innerHTML = name
  productName.classList = 'product_name'

  let product_price = document.createElement('div')
  product_price.innerHTML = `$${price}`
  product_price.classList = 'product_price'

  let productId = document.createElement('input')
  productId.setAttribute('type','hidden')
  productId.setAttribute('name','product_id[]')
  productId.setAttribute('id','prod_id')
  productId.setAttribute('value',id)
  
  let productNumber = document.createElement('input')
  productNumber.setAttribute('type','number')
  productNumber.setAttribute('class','number')
  productNumber.setAttribute('name','product_number[]')
  productNumber.setAttribute('value',amount)

  let pp = document.createElement('input')
  pp.setAttribute('type','hidden')
  pp.setAttribute('class','product_price')
  pp.setAttribute('name','product_price[]')
  pp.setAttribute('value',price)

  let pc = document.createElement('input')
  pc.setAttribute('type','hidden')
  pc.setAttribute('name','product_cost[]')
  pc.id = 'cost'
  pc.value = cost

  let removeBtn = "<button type='button' style='cursor:pointer;padding:.5em;background-color:red;color:#fff;border:1px solid red;margin-left:1em;'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='remove' viewBox='0 0 16 16'> <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/> <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/> </svg> </button>"

  let d = document.createElement('div')
  d.classList = 'd'

  aside.appendChild(productName)
  aside.appendChild(product_price)
  d.appendChild(productId)
  d.appendChild(productNumber)
  d.appendChild(pp)
  d.appendChild(pc)
  d.innerHTML += removeBtn;
  aside.appendChild(d)
  element.appendChild(prod)
  element.appendChild(aside)

  container.appendChild(element)

  }
};

function loader() {
  const products = getProducts();
  let ss = 0;

  products.forEach((product) => {
    ss = new Number(parseInt(ss) + parseInt(product.amount))
  });

  return ss;
}  

const show = (a)=>{
  let tot = document.createElement('div')
  tot.classList = "tot"

  let totName = document.createElement('div')
  totName.classList = 'tot_name'
  totName.innerHTML = 'Total'

  let totValue = document.createElement('div')
  totValue.classList = 'tot_value'
  totValue.innerHTML = `${a} $`

  let t = document.createElement('input')
  t.type = 'hidden'
  t.name = 'tot'
  t.value = a

  let btn = document.createElement('input')
  btn.type = 'submit'
  btn.classList = 'btn_buy'
  btn.name = 'buy'
  btn.value = 'Comprar agora'

  tot.appendChild(totName)
  tot.appendChild(totValue)
  tot.appendChild(t)
  tot.appendChild(btn)
  container.appendChild(tot)
}

const dontBuy = ()=>{
  if (cont) {
    let e = document.createElement('div')
    e.classList = 'empty'
    e.innerHTML = 'Seu carrinho de compras está vazio'
    cont.insertBefore(e,container)
    }
}

const buy = (T)=>{
let sp = loader()

  if (container) {
    if (sp) {
      show(T)
    } else {
      dontBuy()
    }

  }
}

const getProducts = () => {
    const products = JSON.parse(localStorage.getItem("products")) || [];
  
    return products;
  };

const loadCart = () => {
  const products = getProducts();
  let t = 0;

  products.forEach((product) => {
    save(product.id,product.name,product.amount,product.src,product.price,product.cost);
    t = new Number(parseInt(t) + parseInt(product.cost))
  });

  buy(t)

};

const removeProduct = (id) => {
    const products = getProducts();
  
    const p = products.filter((product) => product.id != id);
  
    localStorage.setItem("products", JSON.stringify(p));
    location = 'cart.php'
  };

  loadCart();

const change = (a)=>{
  let tot = document.querySelector('.tot_value')

  tot.innerHTML = `$${a}`
}

let pc = document.querySelectorAll('input#cost')

function count(){
  let t = 0;
  for (let i = 0; i< pc.length; i++ ){
  t = parseInt(parseInt(t) + parseInt(pc[i].value))
  
  }
  
  change(t)
}

if (container && buy_success) {
  localStorage.clear()
  container.innerHTML = ''
}

document.addEventListener("input", (e) => {
  const targetEl = e.target;
  const parentEl = targetEl.closest("div");
  let pi = parentEl.querySelector('aside input#prod_id').value || 0
  let productNumber = parentEl.querySelector('aside input.number') || 0
  let productCost = parentEl.querySelector('aside input#cost') || 0
  let productPrice;
    
  if (parentEl.querySelector("aside input.product_price")) {
    productPrice = parentEl.querySelector("aside input.product_price").value || 0;
  }

  let products = getProducts();

  productCost.value = parseInt(productPrice * productNumber.value)

  count()
  
  products.forEach((product)=>{ 
    if (product.id == pi ) {
      product.cost = productCost.value
      product.amount = productNumber.value
    } else {
      product.cost = product.cost
      product.amount = product.amount 
    }
  })

    localStorage.setItem("products", JSON.stringify(products));
    
});

document.addEventListener("click", (e) => {
  const targetEl = e.target;
  const parentEl = targetEl.closest("div");
  let productTitle;

  if (parentEl && parentEl.querySelector("aside input#prod_id")) {
    productTitle = parentEl.querySelector("aside input#prod_id").value || "";
  }

  if (targetEl.classList.contains("remove")) {
    parentEl.remove();

    // Utilizando dados da localStorage
    removeProduct(productTitle);
    
  }

});

