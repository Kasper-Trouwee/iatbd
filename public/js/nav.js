const menubtn = document.getElementById('js--menu');
let nav = document.getElementById('js--nav');

function openNav(){
    if(nav.className == 'navigation'){
        nav.className += ' navigation--responsive';
    }
    else{
        nav.className = 'navigation';
    }
}

menubtn.addEventListener('click', openNav);