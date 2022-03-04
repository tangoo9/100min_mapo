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
  const chk2 = document.querySelector('#chk2');
  // app-user-join-accept 동의버튼
  const submitBtn = document.querySelector('.btn_div2');

  submitBtn.addEventListener('click' , function(event){
    if((chk1.checked && chk2.checked) == false){
      alert('필수 약관에 동의해주세요.')
      return false;
    }else{
      location.href='app-user-join-input';
    }
  })

