let options = document.getElementsByClassName("pet-filter__option");
let select = document.getElementById("kind");
let cards = document.getElementsByClassName("petCard__li");

function filter(){
    let input = select.value;

    for (let index = 0; index < options.length; index++) {
        if(input == "All Pets"){
            for (let index = 0; index < cards.length; index++) {
                cards[index].style.display = 'block';
            }
        }

        else if(input == options[index].value){
            for (let index = 0; index < cards.length; index++) {
                if(input == cards[index].dataset.kindOfPet){cards[index].style.display = 'block';}

                else{cards[index].style.display = 'none';}
            }
        }
    }
}

document.addEventListener("change", filter);