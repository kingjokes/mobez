let cart = !!localStorage.cart ? JSON.parse(localStorage.cart) : [];

$(document).ready(function () {
    $(window).ready(function () {
        CartUpdater(cart);
    });

    $(".add-to-cart").click(function () {
        let cart = !!localStorage.cart ? JSON.parse(localStorage.cart) : [];

        ItemChecker(cart, $(this).attr("data-product-id")) // this method performs a check to avoid duplication of entries
            ? cart.push({
                  id: $(this).attr("data-product-id"),
                  name: $(this).attr("data-product-name"),
                  image: $(this).attr("data-product-image"),
                  price: parseFloat($(this).attr("data-product-price")),
                  slug: $(this).attr("data-product-slug"),
                  category: $(this).attr("data-product-category-name"),
                  quantity: 1,
              }) // if element does not exist, push into cart
            : quantityIncremental(cart, $(this).attr("data-product-id")); //if element exist update the quantity of element

        CartUpdater(cart);
    });
});

const formatAmount = (nStr) => {
    if (nStr === undefined) return 0;
    nStr += "";
    let x = nStr.split(".");
    let x1 = x[0];
    let x2 = x.length > 1 ? "." + x[1] : "";
    let rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, "$1" + "," + "$2");
    }
    return x1 + x2;
};

const ItemChecker = (array, prodId) => {
    let find = array.find((item) => item.id === prodId);
    return find === undefined;
};

const quantityIncremental = (array, prodId) => {
    let index = array.findIndex((item) => item.id === prodId);
    if (index !== -1) return (array[index].quantity += 1);
};

//function gets the count of items in cart
//updates the dom in charge of showing cart item count
const cartStatus = (array) => {
     $(".cart-amount").html(array.length);

    if(array.length ===0){
      return  $('.process_cart').attr('disabled', true).css('display','none')
    }

    $('.process_cart').attr('disabled', false).css('display','block')

    

};

//function update sum of products

const cartTotal = (array) => {
    let total = array.reduce(
        (total, item) => total + item.quantity * parseFloat(item.price),
        0
    );

    $(".total-cart-item").html(`${localStorage.currency || '$'}${formatAmount(total)}`);
    $("#total_order").val(total);
};

//function in charge of removing element from the cart
$(document).on("click", ".remove-item", function () {
  
    let cart = JSON.parse(localStorage.cart); //convert content in localStorage to array format
    let find = cart.findIndex(
        (item) => item.id === $(this).attr("data-product-id")
    ); //find index of item using item name
    find !== -1 //if found
        ? cart.splice(find, 1) //remove item
        : ""; //else do nothing

    //return
    return CartUpdater(cart);
});

//function updates the quantity of items on the check-out page
$(document).on(
    "click",
    ".qty-control__reduce, .qty-control__increase ",
    function () {
        let cart = JSON.parse(localStorage.cart); //convert localStorage cart to array form
        let findIndex = cart.findIndex(
            (item) => item.id === $(this).attr("data-product-id")
        ); //find item in cart using name

        if (findIndex !== -1) {
            if ($(this).attr("data-mode") === "increase") {
                cart[findIndex].quantity += 1;
            }

            if ($(this).attr("data-mode") === "decrease") {
                cart[findIndex].quantity =
                    cart[findIndex].quantity > 1
                        ? (cart[findIndex].quantity -= 1)
                        : 1;
            }
        }

        return CartUpdater(cart);
    }
);

//function increases or decreases the quantity of items in the cart
$(document).on("change", ".cart-quantity", function () {
    let cart = JSON.parse(localStorage.cart); //convert localStorage cart to array form
    let find = cart.find((item) => item.id === $(this).attr("data-product-id")); //find item in cart using name
    //if the quantity entered by user is 1 or more
    if ($(this).val() >= 1) {
        find !== undefined //if item was found
            ? (find.quantity = $(this).val()) //update the item quantity
            : ""; //else do nothing

        //update dom
        return CartUpdater(cart);
    }
    //else,alert users and return item value to 1
    window.alert("Quantity can not be less than 1");
    return $(this).val(1);
});

//function gets the list of items in the cart and displays them
const cartLister = (array) => {
    //if the item in cart is 0, display no item found
    if (array.length === 0)
        return $("#cart-list").html(
            `<div class="cart-drawer-item text-center" style="padding-top:50px">
                    <h5>Cart is Empty!!!</h5>
                    <p style="font-size:12px">Continue shopping....</p>
            </div>`
        );
    let list = "";

    //if item list is not zero, display each item with name, quantity, price and subtotal
    array.map((item) => {
        list += `<div class="cart-drawer-item d-flex position-relative">
        <div class="position-relative">
            <a href="/product/${item["id"]}/${item["slug"]}">
                <img loading="lazy" class="cart-drawer-item__img" src="${
                    item["image"]
                }"
                    alt="" />
            </a>
        </div>
        <div class="cart-drawer-item__info flex-grow-1">
            <h6 class="cart-drawer-item__title fw-normal">
                <a href="/product/${item["id"]}/${item["slug"]}">${
            item.name
        }</a>
            </h6>
            <p class="cart-drawer-item__option text-secondary text-capitalize">Category: ${
                item.category
            }</p>

            <div class="d-flex align-items-center justify-content-between mt-1">
                <div class="qty-control position-relative">
                    <input type="number" name="quantity" value="${
                        item.quantity
                    }" min="1"
                    data-product-id="${item.id}" 
                        class="qty-control__number border-0 text-center cart-quantity" />
                    <div class="qty-control__reduce text-start" data-product-id="${
                        item.id
                    }" data-mode="decrease">-</div>
                    <div class="qty-control__increase text-end" data-product-id="${
                        item.id
                    }" data-mode="increase">+</div>
                </div>
                <!-- .qty-control -->
                <span class="cart-drawer-item__price money price">${localStorage.currency || '$' }${formatAmount(
                    item.quantity * parseFloat(item.price)
                )}</span>
            </div>
        </div>

        <button data-product-id="${
            item.id
        }" class="btn-close-xs position-absolute top-0 end-0 js-cart-item-remove remove-item "></button>
    </div>
    <hr class="cart-drawer-divider" />
    `;
    });
    let total = array.reduce(
        (total, item) => total + item.quantity * parseFloat(item.price),
        0
    );

    $(".total-cart-item").html(formatAmount(total));

    //displays on html dom
    return $("#cart-list").html(list);
};

//function in charge of listing item on the cart page
const cartTableLister = (array) => {
    let data = "";

    //if no item is the cart, display cart is empty
    if (array.length === 0)
        return $("#cart-item-table").html(`<tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>Your Cart is empty </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>`);

    //if item is more than zero,display each item as row with name, price , subtotal, and quantity
    array.map((item) => {
        data += `
        
        <tr>
        <td>
          <div class="shopping-cart__product-item">
          <a href="/product/${item["id"]}/${item["slug"]}">
              <img loading="lazy" src="${
                  item["image"]
              }" width="120" height="120" alt="">
            </a>
          </div>
        </td>
        <td>
          <div class="shopping-cart__product-item__detail">
            <h4>    <a href="/product/${item["id"]}/${item["slug"]}">
            ${item.name}</a>
            </h4>
            <ul class="shopping-cart__product-item__options">
              <li class="text-capitalize">Category: ${item.category}</li>
              
            </ul>
          </div>
        </td>
        <td>
          <span class="shopping-cart__product-price">$ ${formatAmount(
              item.quantity * parseFloat(item.price)
          )} </span>
        </td>
        <td>
          <div class="qty-control position-relative">
            <input type="number" name="quantity"  data-product-id="${
                item.id
            }" value="${
            item.quantity
        }"min="1" class="qty-control__number text-center cart-quantity">
            <div class="qty-control__reduce" data-product-id="${
                item.id
            }" data-mode="decrease">-</div>
            <div class="qty-control__increase" data-product-id="${
                item.id
            }" data-mode="increase" >+</div>
          </div><!-- .qty-control -->
        </td>
        <td>
          <span class="shopping-cart__subtotal">${localStorage.currency || '$' }${formatAmount(
              item.quantity * parseFloat(item.price)
          )}</span>
        </td>
        <td>
          <a href="javascript:void(0)" data-product-id="${
              item.id
          }" class="remove-cart remove-item ">
            <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676" xmlns="http://www.w3.org/2000/svg">
              <path d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z"/>
              <path d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z"/>
            </svg>                  
          </a>
        </td>
      </tr>
      `;
    });

    //displays content in the table
    return $("#cart-item-table").html(data);
};

//function in charge of listing item on the checkout page
const checkoutItemLister = (array) => {
    let data = "";

    //if no item is the cart, display cart is empty
    if (array.length === 0)
        return $("#checkout-item-table").html(`<tr>
        
        <td colspan="2">Your Cart is empty </td>
        
       
        </tr>`);

    //if item is more than zero,display each item as row with name, price , subtotal, and quantity
    array.map((item) => {
        data += `

        <tr>
        <td class="text-capitalize">
        ${item.name} x ${item.quantity}
        </td>
        <td>
        ${localStorage.currency || '$' }${formatAmount(item.quantity * parseFloat(item.price))}
        </td>
      </tr>
        
           `;
    });

    //displays content in the table
    return $("#checkout-item-table").html(data);
};

//function calls other functions in-charge of updating html dom, all explained individually
const CartUpdater = (cart) => {
    localStorage.setItem("cart", JSON.stringify(cart)); //converts cart into string format before storing in local storage
    cartStatus(JSON.parse(localStorage.cart)); //gets cart item count
    cartLister(JSON.parse(localStorage.cart)); //lists cart item
    cartTotal(JSON.parse(localStorage.cart)); //total sum of cart item

    checkoutItemLister(JSON.parse(localStorage.cart)); //lists cart items in check out page
    cartTableLister(JSON.parse(localStorage.cart)); //lists cart item on check out page

    $("#order_breakdown").val(JSON.stringify(cart));
    // cartTableSum(JSON.parse(localStorage.cart)); //shows sum of item prices * quantity
    // checkOutButtonStatus(JSON.parse(localStorage.cart), "#checkout"); //updates the checkout button
};

$(document).ready(function () {
    $("#checkout-form").on("submit", function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        

        $.ajax({
            url: "/add-order",
            method: "POST",
            data,
            // headers: {
            //     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            // },
            beforeSend: function () {
                $("#submit-order")
                    .text("PROCESSING ORDER.....")
                    .attr("disabled", true);
                $("#error-order").css("display", "none");

                console.log("sending");
            },
            success: function (response) {
                $("#submit-order").text("PLACE ORDER").attr("disabled", false);

                if (response.status) {
                    localStorage.removeItem("cart");
                    window.location.href =
                        window.location.origin +
                        "/" +
                        "order-complete?order_id=" +
                        response.order_id;
                }

                $("#error-order")
                    .css("display", "block")
                    .html(response.message);
            },
            error: function () {
                $("#submit-order").text("PLACE ORDER").attr("disabled", false);
                $("#error-order")
                    .css("display", "block")
                    .html("Error occurred while trying to place order");
            },
        });
    });
});


