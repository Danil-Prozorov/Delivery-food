// Function for sending request for add item in cart
function AddToCart(form)
{
  event.preventDefault();
  // Create Ajax request object
  let ajax     = new XMLHttpRequest();
  let formData = new FormData(form); // Create formData object

  // Open the request
  ajax.open("POST",form.getAttribute("action"), true);
  ajax.send(formData); // Sending request

  // listen response from server side
  ajax.onreadystatechange = function(){
    // When request is successful
    if(this.readyState == 4 && this.status == 200) {
      // Convert JSON response into JS object
      let data = JSON.parse(this.responseText);

      if(data[0].status == true){ // When status TRUE return button
        let button = "<button class='btn added-button'>В корзине</button>";

        document.getElementById(`product_${data[0].data}`).innerHTML = button;
      }else if(data[0].status == false && data[0].errors.error == 'Item already added'){
        return false;
      }else if(data[0].status == false && data[0].errors.error == 'User not authorized'){
        window.location.href = '/login';
      }
    }

    // When request is failed
    if(this.status == 500) {
      alert(this.responseText);
    }
  };
  return false;
}
