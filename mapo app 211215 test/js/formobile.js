const input = document.querySelector('input')


history.pushState(null, null, location.href); 

window.onpopstate = function(event) { 

    alert("여기에 작성하고 싶은 코드를 작성하면 됩니다!");
    // history.back()

}


var checkPageShow = false;
window.onpageshow = function(event){
    checkPageShow = true;
    if(event.persisted || 
        (window.performance && window.performance.navigation.type==2)){
        history.back();
    }
}



// input.addEventListener('keypress', function(event){
//     let key = event.key || event.keyCode;
    
//     if (key === 'Enter' || key === 13) {
//         // key =  console.log('전송');
//         event.preventDefault();
//         input.blur();
//     }
// })
l 
// input.onfocus =this.blur()

// function submitTextarea(event) {

// }

// let textarea = document.getElementById('my-textarea');
// textarea.addEventListener('keyup', event => submitTextarea(event));


// inputmode에는 none, text, decimal, numeric, tel, search, email, url
