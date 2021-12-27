let child_care_btn = document.querySelector('#child_care');
let adult_care_btn = document.querySelector('#adult_care');
let child_care = document.querySelector('.biz_childcare_container');
let adult_care = document.querySelector('.biz_adultcare_container');


let menu_container = document.querySelector('.menu_container');
window.onload = function(){
}
// menu_container.style.display = 'none';

child_care_btn.onclick = () => {
    // biz_childcare_container.style.display = 'none'
    child_care.scrollIntoView({
        behavior: 'smooth', block: 'start'
    });
}

adult_care_btn.onclick = () => {
    // biz_childcare_container.style.display = 'none'
    adult_care.scrollIntoView({
        behavior: 'smooth', block: 'start'
    });
}
