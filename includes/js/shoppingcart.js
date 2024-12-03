
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', loadShoppingCartButtonActions)
} else {
    loadShoppingCartButtonActions()
}


function loadShoppingCartButtonActions(){
    console.log("Shopping cart js module loaded")
    var removeCartItemButtons = document.getElementsByClassName('btn-danger')
    for (var i = 0; i < removeCartItemButtons.length; i++){
        var button = removeCartItemButtons[i]
        button.addEventListener('clicked', removeCartItem)
    }

    var addCartItemButtons = document.getElementsByClassName('shop-item-button')
    console.log(addCartItemButtons)
    for (var i = 0; i < addCartItemButtons.length; i++){
        var button = addCartItemButtons[i]
        button.addEventListener('clicked', function (event){
            console.log('clicked add item to cart')
        })
    }
}

function removeCartItem(event){
    console.log('clicked remove item from cart')
}


