'use strict'
// =======================================================GLOBALS====================================================

// axios requests -- globals
let csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const axiosHeader = { "X-Requested-With": "XMLHttpRequest", 'X-CSRF-TOKEN': csrf_token }

console.log('token', csrf_token)

// data-box is gotten from the 'dashboard' (in the <head>)
const data_box = JSON.parse(
  document.querySelector("#data-box").getAttribute("all_products")
);

console.log("helo", data_box);

// axios search -- globals

// ================= SEARCH BAR====================
// working with the search bar 
let doneTypingTimeout = 700;  //time in ms (~ 1 second)
let myInput = document.getElementById('q');

// =========================================================
if (myInput) {
  myInput.addEventListener('keyup', debounce(doneTyping, doneTypingTimeout))
  //user is "finished typing," do something
  function doneTyping() { return showResults(myInput.value) }
}

// ==============Alerts====================

// ============ fading out the session alerts
$(".floating-alert").fadeIn("slow");
$(".floating-alert").fadeOut(10000);

















































































































































































// =======================================================FUNCTIONS==============================================================
// =======================================================FUNCTIONS==============================================================
// =======================================================FUNCTIONS==============================================================
// =======================================================FUNCTIONS==============================================================

function showResults(val) {
  const res = dqid("result");
  if (res) {
    res.innerHTML = "";
    console.log("before", res);
    const searchresult_top = dq('[name = "searchresult_top"]')
    let list = ""; // this holds the <li> containing all the items from the db
    if (val.length < 3) {
      searchresult_top.classList.add('hidden')
      return false
    }
    searchresult_top.classList.remove('hidden')


    $.ajax({
      type: "GET",
      url: "/suggest?q=" + val,
      data: { "searchfor": val, "_token": csrf_token },
      success: function (data, status) {

        const preview_limit = 12;
        console.log(
          'total_data_received : ' + data.length,
          "preview_limit : " + preview_limit,
          data
        );
        // dynamically limiting the total preview data based on the search results recieved from DB 
        let smallestPossibleData =
          data.length < preview_limit ? data.length : preview_limit;
        for (let i = 0; i < smallestPossibleData; i++) {
          list += `<div class="card m-3" style="width: 12rem;">
              <img class="card-img-top img-custom-size" src='/adminlte/dist/img/prod-4.jpg' alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">${data[i].name}</h5>
                <p class="card-text">Some quick example </p>
                <span onclick='add2cart(event,${data[i].id})' data_id='${data[i].id}' name='add2cart_btn' class="btn btn-primary">Add to cart</a>
              </div>
            </div>`;
        }
        res.innerHTML = `${list}`;
        return true;
      },
      error: function (request, status, error) {
        alert(request.responseText);
        console.error("Something went funny.", error);
      }
      // dataType: 'json'
    })
  }
}
// =========================DEbOUNCE==============================

function debounce(callback, wait) {
  let timeout;
  return (...args) => {
    clearTimeout(timeout);
    timeout = setTimeout(function () { callback.apply(this, args); }, wait);
  };
}


// ================================ CART =======================================

// =========Add To Cart==============
function add2cart(e, product_id) {
  let elem = e.target;
  elem.innerHTML = 'Processing...'
  const cart_contents = document.getElementById("cart");
  let cartlist = cart_contents.innerHTML || ""; // this holds the <li> containing all the items from the db
  console.log("beforeONload", cart_contents);
  $.ajax({
    type: "POST",
    url: '/cart',
    data: { "id": product_id, "_token": csrf_token },
    success: function (data, status) {
      console.log('see what we got', data)
      // alert the user
      if (data.duplicate) {
        return elem.innerHTML = 'Already Added to Basket'
      }
      // alert('Success! ' + data.productInCart.name + ' added to basket')
      elem.innerHTML = 'Added to Basket'
      const item = data.productInCart;
      // now we want insert this cart content into a div lower in the page. 
      cartlist += `
                 <div class="card m-3" style="width: 9rem;" name='${item.rowId}'>
                    <img class="card-img-top img-custom-size"  src='/adminlte/dist/img/prod-4.jpg' alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">${item.name}</h5>
                      <p class="card-text">
                        <label for="${item.rowId}">Qty
                          <input type="number" min="1" id='${item.rowId}' name="update_cart" value="${item.qty}"
                          onchange="updateCart4rmDynamicContent(this)" style="width:60px;border:none;">
                        </label>
                        
                        <span>&#8358;  ${item.price}</span>

                        <a class="btn inline-block float-right" onclick="rm_4rmCart(event, this.id, this.name)"
                          id='${item.rowId}' name='${item.name}' data_id='${item.id}'>
                          <i class="fa fa-trash text-danger" sr-only='remove from cart' title='remove from cart'></i>
                        </a>

                      </p>
                    </div> 
                  </div>`;

      // this would be statically programmed in the page, note that cart_contents.innerHTML is a variable
      //  and not a reference to the object itself
      cart_contents.innerHTML = `${cartlist}`;
    },
    error: function (request, status, error) {
      alert(request.responseText);
    }
    // dataType: 'json'
  })
}



// =========Remove from Cart==============
function rm_4rmCart(e, row_id, item_name) {
  let elem = e.target;
  elem.innerHTML = 'Processing...'
  $.ajax({
    type: "DELETE",
    // url: '/cart',
    url: `/cart/${row_id}`,
    data: { "item_name": item_name, "_token": csrf_token },
    dataType: 'json',
    success: function (data, status) {
      console.log('good day ==> ', data)
      if (data.operation = 'success')
        // alert the user
        alert('Success! ' + data['item_name'] + ' removed from basket')

      // remove it form the dom
      document.querySelector(`[name="${row_id}"]`).remove()
    },
    error: function (request, status, error) {
      alert(request.responseText);
    }
  })
}

// =========Update Cart==============
const cartItems = Array.from(document.querySelectorAll('[name="update_cart"]'));
let timeout = 0;
cartItems.forEach((elem) => elem.addEventListener('change', event => {
  clearTimeout(timeout);
  timeout = setTimeout(() => updateCart(elem), 700);
}));

function updateCart4rmDynamicContent(elem) { debounce(updateCart(elem), 2000); }

// update cart function
function updateCart(elem) {
  const row_id = elem.id;
  const qty = elem.value;
  $.ajax({

    type: "PATCH",
    url: `/cart/${row_id}`,
    data: { qty, "_token": csrf_token },
    dataType: 'json',

    success: function (data, status, xhr) {
      console.log('good day ==> ', data)
      // destructure
      const { sms, item, alert_type } = data;

      // alert the user
      alert(sms)
      // console.log('the itemz',item) // for debug
      const itemInCart = item
      console.log('the item relmodel', item.model)


      //notify user of new evaluated subtotal for this product
      const eval_subtotal = dqid(`item_subtotal_${row_id}`);
      if (eval_subtotal) {
        console.log('debug', eval_subtotal)
        eval_subtotal.textContent = moneyFormat(item.subTotal);

        // notify user of new evaluated stock qty for this product
        const eval_stock = dqid(`eval_stock_${row_id}`);
        eval_stock.textContent = item.model.qty - itemInCart.qty
      }
    },
    error: function (request, status, error) {
      console.log('error', error)
      // alert(request.responseText);
    }
  })

}


// =========Helpers==============


function sendOnce(e) {
  const the_elem = e.target;
  // alert(the_elem)
  this.value = 'Wait...';

  the_elem.addEventListener('mousedown', () => this.disabled = true)

  // this.disabled
}

/**
 * Alias for document.querySelector()
 * @param {params} params query selector 
 * @returns html element
 */
function dq(params) {
  return document.querySelector(params);
}

/**
 * Alias for document.querySelectorAll()
 * @param {params} params query selector 
 * @returns a collection of html elements
 */
function dqa(params) {
  return document.querySelectorAll(params);
}
/**
 * Search for an element using its name attribute
 * @param {params} params query selector 
 * @returns html element
 */
function dqn(param) {
  return document.querySelector(`[name="${param}"]`)
}
/**
 * Alias for document.getElementById()
 * @param {params} params query selector 
 * @returns html element
 */
function dqid(id) {
  return document.getElementById(id)
}

/**
 * Search for any element using any attribute = value pair
 * @param {attribute} attribute  eg. class, id, name, uid, width, name selector 
 * @param {value} value  e.g 'navbar', topheader, etc.
 * @returns html element
 */
function dquery(attribute, value) {
  return document.querySelector(`[${attribute}="${value}"]`)

}

/**
 * Search for any collection of elements that match a given attribute = value pair
 * @param {attribute} attribute  eg. class, id, name, uid, width, name selector 
 * @param {value} value  e.g 'navbar', topheader, etc.
 * @returns a collection of html elements
 */
function dquery_all(attribute, value) {
  return document.querySelectorAll(`[${attribute}="${value}"]`)

}


/**
 * format a number to a money format
 * @param {*} number 
 * @returns 
 */
function moneyFormat(number, currency) {
  currency = currency || 'USD'
  return number.toLocaleString('en-US', { style: 'currency', currency });
  return number.toLocaleString('en-US', { style: 'currency', currency: 'USD' });
  //   console.log(formatMoney(10000));   // $10,000.00
  // console.log(formatMoney(1000000)); // $1,000,000.00
}