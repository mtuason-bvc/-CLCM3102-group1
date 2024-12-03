

    console.log("Shopping cart js module loaded")
    let removeCartItemButtons = document.getElementsByClassName('btn-danger');
    // console.log(removeCartItemButtons)
    for (let i = 0; i < removeCartItemButtons.length; i++){
        let button = removeCartItemButtons[i];
       
        button.addEventListener('click', function(event){
            let buttonClicked = event.target;
            console.log(buttonClicked);
            buttonClicked
        }
        )
    }

    let addCartItemButtons = document.getElementsByClassName('shop-item-button');
    console.log(addCartItemButtons);
    for (let i = 0; i < addCartItemButtons.length; i++){
        let button = addCartItemButtons[i];
        button.addEventListener('click', function (event){
            console.log('clicked add item to cart');
        })
    }


function removeCartItem(event){
    console.log('clicked remove item from cart');
}


