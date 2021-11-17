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
