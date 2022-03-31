// app-user-info-detail
const change = document.querySelector('.change');
const cancel = document.querySelector('.cancel');
const changePop = document.querySelector('.app-user-info-detail-change');
const cancelPop = document.querySelector('.app-user-info-detail-cancel');
const goBack = document.querySelector('.goBack');
const goBackc = document.querySelector('.goBackc');

change.onclick = () => {
    changePop.style.display ='block';
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
    cancelPop.style.display ='block';
    console.log('clicked');
}
