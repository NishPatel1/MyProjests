src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"

if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready() {
    var removeCartItemButtons = document.getElementsByClassName('btn-remove')
    for (var i = 0; i < removeCartItemButtons.length; i++) {
        var button = removeCartItemButtons[i]
        button.addEventListener('click', removeCartItem)
    }

    var quantityInputs = document.getElementsByClassName('cart-quantity-input')
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i]
        input.addEventListener('change', quantityChanged)
    }

    var addToCartButtons = document.getElementsByClassName('shop-item-button')
    for (var i = 0; i < addToCartButtons.length; i++) {
        var button = addToCartButtons[i]
        button.addEventListener('click', addToCartClicked)
    }

    var dropdown = document.getElementsByClassName('custom-slect')
    for(var i=0;i<dropdown.length;i++){
        var select = dropdown[i]
        select.addEventListener('click', changeprice)
    }

    var changeprice = document.getElementsByClassName('size-select-s')
    for (var i = 0; i < changeprice.length; i++) {
        var button = changeprice[i]
        button.addEventListener('click', selectPrices)
    }

    var changeprice1 = document.getElementsByClassName('size-select-m')
    for (var i = 0; i < changeprice1.length; i++) {
        var button = changeprice1[i]
        button.addEventListener('click', selectPricem)
    }

    var changeprice2 = document.getElementsByClassName('size-select-l')
    for (var i = 0; i < changeprice2.length; i++) {
        var button = changeprice2[i]
        button.addEventListener('click', selectPricel)
    }

    document.getElementsByClassName('btn-purchase1')[0].addEventListener('click', purchaseClicked)

    document.getElementsByClassName('btn-clear1')[0].addEventListener('click', clearCart)
    // if(document.cookie.length!=0){
    //     var cook = JSON.parse(document.cookie);
    //     var cook = getCookie("cname");
    //     console.log(cook);
    // }
}

function selectPrices(event) {
    var button = event.target
    var shopItem = button.parentElement.parentElement.parentElement
    var title = shopItem.getElementsByClassName('shop-item-title')[0].innerText;
    var l = title.length;
    title = title.substring(0,l-2);
    shopItem.getElementsByClassName('shop-item-title')[0].innerText = title+"-S";
    var price = parseFloat(shopItem.getElementsByClassName('hide-price')[0].innerText);
    shopItem.getElementsByClassName('shop-item-price')[0].innerText = price-(price*0.2)
}

function selectPricem(event) {
    var button = event.target
    var shopItem = button.parentElement.parentElement.parentElement
    var title = shopItem.getElementsByClassName('shop-item-title')[0].innerText;
    var l = title.length;
    title = title.substring(0,l-2);
    shopItem.getElementsByClassName('shop-item-title')[0].innerText = title+"-M";
    var price = parseFloat(shopItem.getElementsByClassName('hide-price')[0].innerText);
    shopItem.getElementsByClassName('shop-item-price')[0].innerText = price
}

function selectPricel(event) {
    var button = event.target
    var shopItem = button.parentElement.parentElement.parentElement
    var title = shopItem.getElementsByClassName('shop-item-title')[0].innerText;
    var l = title.length;
    title = title.substring(0,l-2);
    shopItem.getElementsByClassName('shop-item-title')[0].innerText = title+"-L";
    var price = parseFloat(shopItem.getElementsByClassName('hide-price')[0].innerText);
    shopItem.getElementsByClassName('shop-item-price')[0].innerText = (price+(price*0.2))
}

// function getCookie(cName) {
//     const name = cName + "=";
//     const cDecoded = decodeURIComponent(document.cookie); //to be careful
//     const cArr = cDecoded.split('; ');
//     let res;
//     cArr.forEach(val => {
//       if (val.indexOf(name) === 0) res = val.substring(name.length);
//     })
//     return res
// }

function purchaseClicked() {
    alert('Thank you for your purchase')
    var cartItems = document.getElementsByClassName('cart-items')[0]
    while (cartItems.hasChildNodes()) {
        cartItems.removeChild(cartItems.firstChild)
    }
    updateCartTotal()
}

function clearCart() {
    var cartItems = document.getElementsByClassName('cart-items')[0]
    while (cartItems.hasChildNodes()) {
        cartItems.removeChild(cartItems.firstChild)
    }
    updateCartTotal()
}

function removeCartItem(event) {
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.parentElement.remove()
    updateCartTotal()
}

function quantityChanged(event) {
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }
    updateCartTotal()
}

function addToCartClicked(event) {
    var button = event.target
    var shopItem = button.parentElement.parentElement
    var title = shopItem.getElementsByClassName('shop-item-title')[0].innerText
    var price = shopItem.getElementsByClassName('shop-item-price')[0].innerText
    var imageSrc = shopItem.getElementsByClassName('shop-item-image')[0].src
    addItemToCart(title, price, imageSrc)
    updateCartTotal()
}

function addItemToCart(title, price, imageSrc) {
    var cartRow = document.createElement('div')
    cartRow.classList.add('cart-row')
    var cartItems = document.getElementsByClassName('cart-items')[0]
    var cartItemNames = cartItems.getElementsByClassName('cart-item-title')
    for (var i = 0; i < cartItemNames.length; i++) {
        if (cartItemNames[i].innerText == title) {
            alert('This item is already added to the cart')
            return
        }
    }
    var cartRowContents = `
        <div class="cart-item cart-column">
            <img class="cart-item-image" src="${imageSrc}" width="25" height="25">
            <span><span class="cart-item-title">${title}</span>
            <span><textarea cols="5" rows="1" placeholder="notes"></textarea></span></span>
        </div>
        <span class="cart-price cart-column">Rs. ${price}</span>
        <div class="cart-quantity cart-column">
            <input class="cart-quantity-input" type="number" value="1">
            <button class="btn-remove"><i class="fas fa-duotone fa-trash" style="color: red; width: 25px; height: 25px;"></i></button>
        </div>`
        // <button class="btn btn-danger" type="button">X</button>
        // <font-awesome-icon icon="fa-sharp fa-solid fa-trash" />
        // <i class="fa-sharp fa-solid fa-trash fa-color"></i>
    cartRow.innerHTML = cartRowContents
    cartItems.append(cartRow)
    cartRow.getElementsByClassName('btn-remove')[0].addEventListener('click', removeCartItem)
    cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged)
    document.cookie = "cname = " + cartItems + "; path=/";
}

// function setCookie(title,price,imageSrc){
//     document.cookie = "ctitle=" + title + "; cprice=" + price + "; cimage=" + imageSrc + "; path=/";
// }

function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName('cart-items')[0]
    var cartRows = cartItemContainer.getElementsByClassName('cart-row')
    var total = 0
    var totalitems = 0
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName('cart-price')[0]
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
        var price = parseFloat(priceElement.innerText.replace('Rs. ', ''))
        var quantity = quantityElement.value
        total = total + (price * quantity)
        totalitems = totalitems + parseInt(quantity)
    }
    total = Math.round(total * 100) / 100
    document.getElementsByClassName('total-items-value')[0].innerText = totalitems
    document.getElementsByClassName('cart-total-price')[0].innerText = 'Rs ' + total
}

// function validateForm(){
//     let x = document.forms["loginform"]["user_name"].value;
//     let y = document.forms["loginform"]["password"].value;
//     if(x==""){
//         alert("Username must be filled out");
//         return false;
//     }
//     if(y==""){
//         alert("Password must be filled out");
//         return false;
//     }
//     if(x=="Nish" && y=="Nish" || x=="charusat" && y=="charusat"){
//         location.replace("C:/ Users/Nish Patel/OneDrive/Desktop/POS system/POSRestu.html");
//         return true;
//     }
//     alert("invalid username or password")
//     return false;
// }

// //For dropdown

// var x, i, j, l, ll, selElmnt, a, b, c;
// /* Look for any elements with the class "custom-select": */
// x = document.getElementsByClassName("custom-select");
// l = x.length;
// for (i = 0; i < l; i++) {
//   selElmnt = x[i].getElementsByTagName("select")[0];
//   ll = selElmnt.length;
//   /* For each element, create a new DIV that will act as the selected item: */
//   a = document.createElement("DIV");
//   a.setAttribute("class", "select-selected");
//   a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
//   x[i].appendChild(a);
//   /* For each element, create a new DIV that will contain the option list: */
//   b = document.createElement("DIV");
//   b.setAttribute("class", "select-items select-hide");
//   for (j = 1; j < ll; j++) {
//     /* For each option in the original select element,
//     create a new DIV that will act as an option item: */
//     c = document.createElement("DIV");
//     c.innerHTML = selElmnt.options[j].innerHTML;
//     c.addEventListener("click", function(e) {
//         /* When an item is clicked, update the original select box,
//         and the selected item: */
//         var y, i, k, s, h, sl, yl;
//         s = this.parentNode.parentNode.getElementsByTagName("select")[0];
//         sl = s.length;
//         h = this.parentNode.previousSibling;
//         for (i = 0; i < sl; i++) {
//           if (s.options[i].innerHTML == this.innerHTML) {
//             s.selectedIndex = i;
//             h.innerHTML = this.innerHTML;
//             y = this.parentNode.getElementsByClassName("same-as-selected");
//             yl = y.length;
//             for (k = 0; k < yl; k++) {
//               y[k].removeAttribute("class");
//             }
//             this.setAttribute("class", "same-as-selected");
//             break;
//           }
//         }
//         h.click();
//     });
//     b.appendChild(c);
//   }
//   x[i].appendChild(b);
//   a.addEventListener("click", function(e) {
//     /* When the select box is clicked, close any other select boxes,
//     and open/close the current select box: */
//     e.stopPropagation();
//     closeAllSelect(this);
//     this.nextSibling.classList.toggle("select-hide");
//     this.classList.toggle("select-arrow-active");
//   });
// }

// function closeAllSelect(elmnt) {
//   /* A function that will close all select boxes in the document,
//   except the current select box: */
//   var x, y, i, xl, yl, arrNo = [];
//   x = document.getElementsByClassName("select-items");
//   y = document.getElementsByClassName("select-selected");
//   xl = x.length;
//   yl = y.length;
//   for (i = 0; i < yl; i++) {
//     if (elmnt == y[i]) {
//       arrNo.push(i)
//     } else {
//       y[i].classList.remove("select-arrow-active");
//     }
//   }
//   for (i = 0; i < xl; i++) {
//     if (arrNo.indexOf(i)) {
//       x[i].classList.add("select-hide");
//     }
//   }
// }

// /* If the user clicks anywhere outside the select box,
// then close all select boxes: */
// document.addEventListener("click", closeAllSelect);

const forms = document.querySelector(".box2"),
    pwShowHide = document.querySelectorAll(".eye-icon");

pwShowHide.forEach(eyeIcon => {
    eyeIcon.addEventListener("click", () => {
        let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password");
        pwFields.forEach(password => {
            if(password.type === "password"){
                password.type = "text";
                eyeIcon.classList.replace("bx-hide", "bx-show");
                return;
            }
      password.type = "password";
      eyeIcon.classList.replace("bx-show", "bx-hide");
  })
  
})
})  