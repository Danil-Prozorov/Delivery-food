{
  let status = 'off';
  function dropDownItem(){
    let stateOff = document.getElementById('dd-off');
    let stateOn  = document.getElementById('dd-on');

    if(status == 'off'){
      document.getElementById('dropItem').style.display = 'block';
      status = 'on';
    }else if(status == 'on'){
      document.getElementById('dropItem').style.display = 'none';
      status = 'off';
    }

  }
}

{
  function writeAddressIntoForm(address){
    let addressLine = address.value;
    let emptyLine = document.getElementById('address');

    if(emptyLine != false){
      emptyLine.value = addressLine;
    }

  }
}

{
    function showDetails(id, mod){
        if(mod == 'on'){
            let details = document.getElementById(`order_details_${id}`);
            let order   = document.getElementById(`order_${id}`);
            details.style.display = 'block';
            order.removeAttribute('onclick');
            order.setAttribute('onclick', `return showDetails(${id},'off')`)
        }else if(mod == 'off'){
            let details = document.getElementById(`order_details_${id}`);
            let order   = document.getElementById(`order_${id}`);
            details.style.display = 'none';
            order.removeAttribute('onclick');
            order.setAttribute('onclick', `return showDetails(${id},'on')`);
        }
    }
}
