// app-user-info-detail
const change_addr = document.querySelector('#change_addr');
const change_tel = document.querySelector('#change_tel');
const logout = document.querySelector('#logout');
const out = document.querySelector('#out');

const Popup_addr = document.querySelector('.app-user-info-manage-addr');
const Popup_tel = document.querySelector('.app-user-info-manage-tel');
const Popup_logout = document.querySelector('.app-user-info-manage-logout');
const Popup_out = document.querySelector('.app-user-info-manage-out');


change_addr.onclick = () => {
    Popup_addr.style.display ='flex';
    console.log('clicked-addr');
}

change_tel.onclick = () => {
    Popup_tel.style.display ='flex';
    console.log('clicked-tel');
}
logout.onclick = () => {
    Popup_logout.style.display ='flex';
    console.log('clicked-user-logout');
}
out.onclick = () => {
    Popup_out.style.display ='flex';
    console.log('clicked-out');
}


function goBack(){
    if(Popup_addr.style.display='flex'){
        Popup_addr.style.display = 'none';
    }
    if(Popup_tel.style.display='flex'){
        Popup_tel.style.display = 'none';
    }
    if(Popup_out.style.display='flex'){
        Popup_out.style.display = 'none';
    }
    console.log("clicked-inPopup-goBack");
}


// history.go






