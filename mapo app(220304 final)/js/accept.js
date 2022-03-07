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
  function checkbox(){
      const chk1 = document.querySelector('#chk1');

      if(chk1.checked == false){
          alert('필수 약관에 동의해주세요.')
          return false;
      }
  }
function checkagree(){
    const chk1 = document.querySelector('#chk1');
    const chk2 = document.querySelector('#chk2');
    if(chk1.checked == false || chk2.checked == false){
        alert('필수 약관에 동의해주세요.')
        return false;
    }
}