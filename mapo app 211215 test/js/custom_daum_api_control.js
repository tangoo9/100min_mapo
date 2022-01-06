// 레이어 팝업으로 인한 배경흐리기에 대한 컨트롤 부분
const addr_iframe_wrap = document.querySelector('.addr_iframe_wrap');
const xBtn = document.getElementById('btnFoldWrap');


function block(){
    addr_iframe_wrap.style.display = 'block';
}

xBtn.addEventListener('click', remove);
function remove(){
    addr_iframe_wrap.style.display = 'none';
}

