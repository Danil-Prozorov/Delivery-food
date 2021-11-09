// Sending request for add item in cart
function AddToCart(itemId,price)
{
  let XHR = new XMLHttpRequest();
  let params = {
    'product_id'    : itemId,
    'product_price' :
  }

  XHR.open("POST","/api/pub/carts");
  XHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  XHR.send();
}
