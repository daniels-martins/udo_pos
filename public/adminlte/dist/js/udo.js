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
let doneTypingInterval = 1500;  //time in ms (2 seconds)
let myInput = document.getElementById('q');

// =========================================================


myInput.addEventListener('keyup', debounce(doneTyping, doneTypingInterval))

//user is "finished typing," do something
function doneTyping() {
  // alert(myInput.value)
  return showResults(myInput.value)
} 


// ================= CART====================

// ================= SEARCH BAR====================
// working with the search bar 
// this should be refactored into a function
const searchresult_top = document.querySelector('[name="searchresult_top"]');
$(document).on("keydown", function (e) {
  if (e.keyCode === 27) {
    // ESC : Toggle the visibility of the search results when the ESC key is pressed
    // searchresult_top.toggle("hidden");
  }
});
// ==============Alerts====================

// ============ fading out the session alerts
$(".floating-alert").fadeIn("slow");
$(".floating-alert").fadeOut(10000);

















































































































































































// =======================================================FUNCTIONS==============================================================
// =======================================================FUNCTIONS==============================================================
// =======================================================FUNCTIONS==============================================================
// =======================================================FUNCTIONS==============================================================

function showResults(val) {
  const res = document.getElementById("result");
  res.innerHTML = "";
  console.log("before", res);
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
    success: function (data, text) {
     
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
        // pls don't delete its useful 
        //     list+=
        // `<div class="col-md-3 col-sm-6 col-12">
        //     <div class="info-box">
        //       <span class="info-box-icon bg-info"> <i class="fa fa-shopping-basket"></i></span>
        //       <div class="info-box-content" id="result" name='searchresult_top'>
        //         <span class="info-box-text h5">${data[i].name}</span>
        //         <span class="info-box-number font-weight-normal text-lg">410 items @ N333,430</span>
        //       </div><!-- /.info-box-content -->
        //     </div><!-- /.info-box -->
        // </div>`
        list += `
                 <div class="card m-3" style="width: 18rem;">
              <img class="card-img-top" src='/adminlte/dist/img/prod-4.jpg' alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">${data[i].name}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <span onclick='add2cart(${data[i].id})' data_id='${data[i].id}' name='add2cart_btn' class="btn btn-primary">Add to cart</a>
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
// =========================DEbOUNCE==============================

function debounce(callback, wait) {
  let timeout;
  return (...args) => {
    clearTimeout(timeout);
    timeout = setTimeout(function () { callback.apply(this, args); }, wait);
  };
}


// =========Cart==============

// =========Add To Cart==============
function add2cart(product_id) {
  const cart_contents = document.getElementById("cart");
let cartlist =  cart_contents.innerHTML ; // this holds the <li> containing all the items from the db

  // res.innerHTML = "";
  console.log("beforeONload", cart_contents);
  $.ajax({
    type: "POST",
    url: '/cart',
    data: { "id": product_id, "_token": csrf_token },
    success: function (data, text) {
      console.log('see what we got',data)
      // alert the user
      alert(data.productInCart.name + ' added to basket')
      // now we want insert this cart content into a div lower in the page. 
     cartlist += `
                 <div class="card m-3" style="width: 18rem;" name='${data.productInCart.rowId}'>
                    <img class="card-img-top" src='/adminlte/dist/img/prod-4.jpg' alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">${data.productInCart.name}</h5>
                        <p class="card-text">Some quick ${data.productInCart.rowId} example text to build on the card title and make up the bulk of the card's content.</p>
                        <a class="btn btn-warning" onclick="rm_4rmCart(this.id, this.name)" id='${data.productInCart.rowId}' name='${data.productInCart.name}' data_id='${data.productInCart.id}'>Remove from basket</a>
                    </div> 
                    </div>`;
      // this would be statically programmed in the page
      cart_contents.innerHTML = `${cartlist}`;

  },
  error: function (request, status, error) {
      alert(request.responseText);
  }
    // dataType: 'json'
  })
}



// =========Remove from Cart==============
function rm_4rmCart(row_id, item_name) {
  $.ajax({
    type: "DELETE",
    // url: '/cart',
    url: `/cart/${row_id}`,
    data: {"item_name": item_name, "_token": csrf_token },
    dataType: 'json',
    success: function (data, text) {
      console.log('good day ==> ',data)
      if (data.operation = 'success')
      // alert the user
      alert(data['item_name'] + ' removed from basket')

      // remove it form the dom
      document.querySelector(`[name="${row_id}"]`).remove()
  },
  error: function (request, status, error) {
      alert(request.responseText);
  }
  })
}