    // feather - icon 
    feather.replace({ 'aria-hidden': 'true' })
    
    // 색상 변경
    let currentColor;
    let careSelect = document.querySelectorAll('.care_selectBtn');

    function colorHandler(){
    if (currentColor){
        currentColor.classList.remove('on');
    }   
        this.classList.add('on');
        currentColor = this;

    }
    for (let i = 0; i < careSelect.length; i++){   
        careSelect[i].addEventListener('click', colorHandler);        
    }

    



    //전체동의
    function selectAll(selectAll)  {
        const checkboxes = document.getElementsByName('agree');
        
        checkboxes.forEach((checkbox) => {
            checkbox.checked = selectAll.checked;
        })
    }
    // let obj = document.querySelector('.care_select_cont')
    // let slb = document.querySelector('.add_child')   
    // let delete_icon = document.querySelector('.delete')

    // slb .onclick = () =>{
        
    //     obj.innerHTML += "<span>" 
    //     console.log('on')
    // }



    //버전 1 아이디로 가져오고 하나하나 밸류값을 추가하는 방법?
    // let input_value = document.getElementById('val_periodcare');
    // let input_value2 = document.getElementById('val_timecare');

    // function colorHandler(){
    //     if (currentColor){
    //         currentColor.classList.remove('on');
    //     }   
    //         this.classList.add('on');
    //         currentColor = this;
    //         console.log(input_value)
    //         input_value.setAttribute("value", "selected");
    
    // }

    // for (let i = 0; i < changeColor.length; i++){   
    //     changeColor[i].addEventListener('click', colorHandler);  
    // }
    