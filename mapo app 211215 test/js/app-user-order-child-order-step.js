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


/*
    -- app-user-order-child-order-step1-add.html 
        select 년도 받아오는 기능
*/ 

var start_year="2010";// 시작할 년도 
var today = new Date(); 
var today_year= today.getFullYear(); 
var index=0; for(var y=start_year; 
    y<=today_year; y++){
         //start_year ~ 현재 년도 
        document.getElementById('select_year').options[index] = new Option(y, y); index++; 
    } index=0; for(var m=1; m<=12; m++){
        document.getElementById('select_month').options[index] = new Option(m, m); index++; 
    } 
    lastday();
    
    function lastday(){ //년과 월에 따라 마지막 일 구하기 
    var Year=document.getElementById('select_year').value; 
    var Month=document.getElementById('select_month').value; 
    var day=new Date(new Date(Year,Month,1)-86400000).getDate(); /* = new Date(new Date(Year,Month,0)).getDate(); */
    var dayindex_len=document.getElementById('select_day').length;
        if(day>dayindex_len){
            for(var i=(dayindex_len+1); i<=day; i++){
                document.getElementById('select_day').options[i-1] = new Option(i, i); 
                }
        }else if(day<dayindex_len){
            for(var i=dayindex_len; i>=day; i--){ 
                document.getElementById('select_day').options[i]=null; 
                } 
        } 
    }
