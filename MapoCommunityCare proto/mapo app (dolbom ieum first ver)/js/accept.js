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
