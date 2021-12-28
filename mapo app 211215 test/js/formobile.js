const input = document.querySelector('input')

input.addEventListener('keypress', function(event){
    let key = event.key || event.keyCode;
    
    if (key === 'Enter' || key === 13) {
        // key =  console.log('전송');
        event.preventDefault();
        input.blur();
    }
})

document.querySelector('input')

// function submitTextarea(event) {

// }

// let textarea = document.getElementById('my-textarea');
// textarea.addEventListener('keyup', event => submitTextarea(event));

/*
모바일에서 datepicker사용중 가상키보드와 겹쳐서 픽커사용이 힘들고 스크립트 실행에 방해요소 있어 찾아보니 다음이 가장 쉬운 적용인거 같습니다.



1. onfocus="this.blur()" 적용

 <input type="text" onfocus="this.blur()" ~~



2. html5에서 도입된 inputmode = "none"적용

 <input type="text" ~~ inputmode="none">







참고로 inputmode에는 none, text, decimal, numeric, tel, search, email, url 등의 값을 줄수 있고 값에 따른 적절한 가상키보드가 노출되는데 브라우저별로 적용, 미적용이 있습니다.
*/