'use strict'

function cart(){
let start = document.querySelector('.start')
const cart = document.querySelectorAll('.add')
let n = document.querySelectorAll('#product_name')
let p = document.querySelectorAll('#product_price')
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
      
  };

if (start) {
  
  for (let i = 0; i < cart.length; i++) {

    cart[i].addEventListener("click",(e)=>{
        e.preventDefault()

      save(id[i].value,n[i].value,1,src[i].value,p[i].value,p[i].value)
    });
};

};

}

cart();