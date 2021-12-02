// app-manager-login
const loginButton = document.querySelector('.loginButton');
const loginFailPop = document.querySelector('.app-manager-login-fail');
const loginFailOk = document.querySelector('.btn_loginfail');


loginButton.onclick = () => {
  loginFailPop.style.display ='flex';
    console.log('login Fail');
}

// 팝업창 닫기
loginFailOk.onclick = () =>{
  loginFailPop.style.display = 'none';
    console.log('login Fail');
}

