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
        document.getElementById(`product_${data[0].data}`).innerHTML = "<button class='button white-button'>В корзине</button>";
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

function addItem(form,id){ // Create a function for increase the number
  event.preventDefault();
  let item_counter = document.getElementById(`item__counter-${id}`).innerHTML; // get the number from inside of element
  let ajax = new XMLHttpRequest();
  let dataform = new FormData(form);

  ajax.open('POST',form.getAttribute("action"),true); //Sending request to server
  ajax.send(dataform);

  if((+item_counter) != NaN && (+item_counter) >= 0){ // increase the number and insert it
    let text = ""+item_counter++;
    document.getElementById(`item__counter-${id}`).innerHTML = `${+item_counter++}`;
  }

  return false;
}

function minusItem(form,id){ //Create a function for reduce the number
  event.preventDefault();
  let item_counter = document.getElementById(`item__counter-${id}`).innerHTML; // get the number from inside of element
  let ajax = new XMLHttpRequest();
  let dataform = new FormData(form);

  ajax.open('POST',form.getAttribute("action"),true);
  ajax.send(dataform);

  if((+item_counter) != NaN && (+item_counter) > 0){
    let text = ""+item_counter--;
    document.getElementById(`item__counter-${id}`).innerHTML = `${+item_counter--}`;
  }

  return false;
}

function deleteItem(form) {
  event.preventDefault();
  let ajax = new XMLHttpRequest();
  let dataform =  new FormData(form);

  ajax.open('POST',form.getAttribute("action"),true);
  ajax.send(dataform);

  ajax.onreadystatechange = function() {
    if(this.status == 200 && this.readyState == 4) {
      let data = JSON.parse(this.responseText);

      if(data[0].status == true) {
        document.getElementById(`product_${data[0].data.id}`).style.display = "none";
      }

    }
  };
  return false;
}

//  CONFIRM ORDER
function confirmOrder(form) {
  event.preventDefault();
  let ajax = new XMLHttpRequest();
  let dataform = new FormData(form);

  ajax.open('POST',form.getAttribute("action"),true);
  ajax.send(dataform);
  return false;
}
