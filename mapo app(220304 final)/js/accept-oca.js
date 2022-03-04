function selectAll(selectAll)  {
    const checkboxes = document.getElementsByName('agree');
    
    checkboxes.forEach((checkbox) => {
      checkbox.checked = selectAll.checked;

      
    })
  }

    function scrollMove(){
    let temp = document.querySelector('.selectBox');
    temp.scrollIntoView({
        behavior: 'smooth', block: 'start'
    });
  }

  
  const chk1 = document.querySelector('#chk1');
  // app-user-order-child-accept 동의버튼
  const submitBtn = document.querySelector('.oca_submit');
  submitBtn.addEventListener('click' , function(event){
    if(chk1.checked == false){
      alert('필수 약관에 동의해주세요.')
      return false;
    }else{
      location.href='app-user-order-child-order-complete';
    }
  })
  
