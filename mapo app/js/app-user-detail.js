// app-user-info-detail
const change = document.querySelector('.change');
const cancel = document.querySelector('.cancel');
const changePop = document.querySelector('.app-user-info-detail-change');
const cancelPop = document.querySelector('.app-user-info-detail-cancel');
const goBack = document.querySelector('.goBack');
const goBackc = document.querySelector('.goBackc');

change.onclick = () => {
    changePop.style.display ='flex';
    console.log('clicked');
}

goBack.onclick = () =>{
    changePop.style.display = 'none';
    console.log('clicked cancel');
}

goBackc.onclick = () =>{
    cancelPop.style.display = 'none';
    console.log('clicked cancel');
}


cancel.onclick = () => {
    cancelPop.style.display ='flex';
    console.log('clicked');
}

$(document).ready(function(){
    $("#reason").change(function(){
        let status = this.value;
        console.log("선택된 취소사유 num" + status)
        if(status=='기타'){
            $('.input_box_etc').show()
        }else{
            $('.input_box_etc').hide()
        }

    })
})