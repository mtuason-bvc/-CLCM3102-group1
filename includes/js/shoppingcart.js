
let cartContents = [];
let allServicesJson = null;
let cartItemsElement = document.querySelector(".cart-rows");

let storageKey = "";

console.log("Shopping cart js module loaded")

storageKey = "cart" + "-" + currentLoggedUserId;
currentUserId = currentLoggedUserId;
currentUserLoggedIn = currentLoggedUser;
console.log(storageKey);
let cartFromStorage = JSON.parse(localStorage.getItem(storageKey));
if (cartFromStorage != null){
    cartContents = cartFromStorage;
    updateCart();
}
console.log("Cart initizialized")


function addToCart(clickedId) {
    if (cartContents.some((item) => item.serviceId == clickedId)) {
        const cartItem = cartContents.find(element => element.serviceId == clickedId);
        cartItem.quantity++;
        // console.log(cartContents);
    }
    else {
        const cartItem = phpData.find(element => element.serviceId == clickedId);
        cartContents.push({
            ...cartItem,
            quantity: 1
        });
        // console.log(cartContents);
    }
    updateCart();

}

function updateCart() {
    renderCartItems();
    renderSubtotal();

    localStorage.setItem(storageKey, JSON.stringify(cartContents));
}

function renderCartItems() {
    cartItemsElement.innerHTML = "";
    cartContents.forEach((rowEntry) => {
        let priceTwoDecimal = (Math.round(rowEntry.servicePrice * 100) / 100).toFixed(2);
        cartItemsElement.innerHTML += `
                <tr class="cart-row">
                    <th class="cart-item" scope="row">${rowEntry.serviceName}</th>
                    <td class="cart-price">${priceTwoDecimal}</td>
                    <td class="cart-qty">
                        <input onkeydown="return false" class="cart-quantity-input" type="number" value="${rowEntry.quantity}" min="1" onchange="changeQuantityInCart(${rowEntry.serviceId}, this.value)">
                    </td>
                    <td class="cart-remove">
                        <button class="btn btn-danger btn-remove" type="button" onclick="removeCartItem(${rowEntry.serviceId})">REMOVE</button>
                </td>
            `;
    });
}

function renderSubtotal() {
    let cartSubtotalElement = document.getElementById("cart-total-price");
    let totalPrice = 0.00;
    // console.log(cartSubtotalElement);
    cartContents.forEach((rowEntry) => {
        totalPrice += rowEntry.quantity * parseFloat(rowEntry.servicePrice);
    });
    let priceTwoDecimal = (Math.round(totalPrice * 100) / 100).toFixed(2);
    cartSubtotalElement.innerHTML = `${priceTwoDecimal} CAD`;

}

function changeQuantityInCart(serviceId, quantity) {
    let cartItem = cartContents.find(element => element.serviceId == serviceId);
    cartItem.quantity = quantity;
    updateCart();
    // console.log(cartItem);
    // console.log(cartContents);
}

function removeCartItem(serviceId) {
    cartContents = cartContents.filter(cartRow => serviceId != cartRow.serviceId);
    updateCart();
    // console.log(cartContents);
}


function purchaseCartContents() {
    if (cartContents.length > 0) {
        if (confirm("Are you sure you want to purchase?")) {

            const formData = {
                userId: currentLoggedUserId,
                cartContent: JSON.stringify(cartContents)
            };
            let jsonOfCart = JSON.stringify(formData);
            console.log(jsonOfCart);
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "includes/php/purchase.inc.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");

            xhr.onload = function () {
                if (xhr.status === 200) {
                    console.log("Server Response:", xhr.responseText);
                }
            };
            xhr.send(jsonOfCart);
            cartContents = [];
            updateCart();
        }

    }
    else {
        alert("Cart is empty!");
    }
}