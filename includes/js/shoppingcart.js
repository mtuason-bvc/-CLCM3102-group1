

    let allServicesJson = null;
    let cartContents = [];
    let cartItemsElement = document.querySelector(".cart-rows");
    
    console.log("Shopping cart js module loaded")

    function addToCart(clickedId){
        if (cartContents.some((item)=> item.serviceId == clickedId)){
            alert("Service already in cart");
        }
        else{
            const cartItem = phpData.find(element=> element.serviceId == clickedId);
            cartContents.push({
                ...cartItem,
                quantity: 1
            });
            console.log(cartContents);
        }
        updateCart();

    }

    function updateCart(){
        renderCartItems();
        renderSubtotal();
    }

    function renderCartItems(){
        cartItemsElement.innerHTML = "";
        cartContents.forEach((rowEntry)=>{
            cartItemsElement.innerHTML += `
                <tr class="cart-row">
                    <th class="cart-item" scope="row">${rowEntry.serviceName}</th>
                    <td class="cart-price">${rowEntry.servicePrice}</td>
                    <td class="cart-qty">
                        <input class="cart-quantity-input" type="number" min="1" value="${rowEntry.quantity}">
                    </td>
                    <td class="cart-remove">
                        <button class="btn btn-danger btn-remove" type="button">REMOVE</button>
                </td>
            `;
        });
    }


    // let addCartItemButtons = document.getElementsByClassName('shop-item-button');
    // // console.log(addCartItemButtons);
    // for (let i = 0; i < addCartItemButtons.length; i++){
    //     let button = addCartItemButtons[i];
    //     button.addEventListener('click', function (event){
    //         console.log('clicked add item to cart');
    //     })
    // }


function removeCartItem(){
    console.log('clicked remove item from cart');
}


