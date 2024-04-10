'use strict'

const span = document.querySelector('.litle_cart span')

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
      load()
    }
  
  });

function load() {
  const products = getProducts();
  let s = 0;
  let l = 0;

  products.forEach((product) => {
    if (product.amount) {
      s = new Number(parseInt(s) + parseInt(product.amount))
    }else{
      s = l
    }
    l = s
  });

  span.innerHTML = s
  return {s,l}
}  

  load()

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
      
      if (productNumber.value > 0) {
        load()
        console.log(productNumber.value)
      }else{
        let last = load()
        span.innerHTML = last.l
      }
  });

  function cart(){

    const cart = document.querySelectorAll('.add')
    let n = document.querySelectorAll('#product_name')
    let p = document.querySelectorAll('#product_price')
    let prodId = document.querySelectorAll('#prod_id')
    let src = document.querySelectorAll('#product_src')
    let id = document.querySelectorAll('#product_id')
    
    const save = (id,name,amount,src,price,cost,save = 1) => { saveProduct({ id,name,amount,src,price,cost}); };
    
    const getProducts = () => {
        const products = JSON.parse(localStorage.getItem("products")) || [];
      
        return products;
      };
      
      const saveProduct = (newProduct) => {
        const products = getProducts();
      
          let t = true;
          
          for (let l = 0; l < products.length; l++){
            if (products[l].id == newProduct.id) {
              t = false
            }
    
             }
    
            if (t == true) {
              products.push(newProduct);
              localStorage.setItem("products", JSON.stringify(products));
            }
          
            load()
      };
    
    for (let i = 0; i < cart.length; i++) {
        cart[i].addEventListener("click",(e)=>{
            e.preventDefault()
            save(id[i].value,n[i].value,1,src[i].value,p[i].value,p[i].value)
        });
    };
    
    };
    
    cart();