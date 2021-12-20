    // feather - icon 
    feather.replace({ 'aria-hidden': 'true' })
    
    // 색상 변경
    let currentColor;
    let changeColor = document.querySelectorAll('.care_selectBtn');

    function colorHandler(){
    if (currentColor){
        currentColor.classList.remove('on');
    }   
        this.classList.add('on');
        currentColor = this;
    }
    for (let i = 0; i < changeColor.length; i++){   
        changeColor[i].addEventListener('click', colorHandler);        
    }




    // let obj = document.querySelector('.care_select_cont')
    // let slb = document.querySelector('.add_child')   
    // let delete_icon = document.querySelector('.delete')

    // slb .onclick = () =>{
        
    //     obj.innerHTML += "<span>" 
    //     console.log('on')
    // }
