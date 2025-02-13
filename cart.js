const cart_items = document.querySelector('.cart_items');

cart_items.addEventListener('click', (e) => {
const id = e.id
})


function runQuery(email,id,quentity){
  let forData = new FormData();
  forData.append("email",email);
  forData.append("id",id);
  forData.append("quentity",quentity);
  fetch("cart.php",{
    method:"POST",
    body: forData
  }).then(res => res.json())
  .catch(error => {
    alert(error);
  })
}