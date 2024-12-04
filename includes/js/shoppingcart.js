

    let allServicesJson = null;


    let div = document.getElementById('php-data');
    let phpData = JSON.parse(div.getAttribute('data-json'));
    console.log(phpData); 
    let servicesElement = document.getElementById("serviceRender");
 
    function renderProducts(){
        phpData.forEach(element => {
            servicesElement.innerHTML += `
            <tr>
            <th scope="row">${element.serviceName}</th>
            <td>${element.serviceDescription}</td>
            <td>${element.serviceCategory}</td>
            <td>${element.servicePrice} ${element.serviceCurrency}</td>
            <td> <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button> </td>
            </tr>`;
        });
    }

    // renderProducts();
    
    console.log("Shopping cart js module loaded")
    // let removeCartItemButtons = document.getElementsByClassName("btn-remove");
    // console.log(removeCartItemButtons)
    // for (let i = 0; i < removeCartItemButtons.length; i++){
    //     let button = removeCartItemButtons[i];
       
    //     button.addEventListener("click", removeCartItem);
        
    // }

    function addToCart(clickedId){
        // alert(clickedId);
        phpData.forEach(element => {
            if (element.serviceId == clickedId){
                console.log(element);
            }
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


