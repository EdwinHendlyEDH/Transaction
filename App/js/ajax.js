const input = document.querySelector('#search-input');
const cards = document.querySelector('#cards');


input.addEventListener('input', function(e){
    let ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function(){
        if(ajax.readyState == 4){
            if(ajax.status == 200){
                cards.innerHTML = ajax.response;
            }else{
                cards.innerHTML = 'Failed to Get Data!';
            }
        }
    }

    url = `../../ajax-php-source/card_${e.target.className.split(' ')[1]}.php?search=${e.target.value}`;

    ajax.open('get', url); 
    ajax.send('');
});