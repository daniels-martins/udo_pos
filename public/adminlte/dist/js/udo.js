// data-box is gotten from the 'dashboard' (in the <head>)
const data_box = JSON.parse(
  document.querySelector("#data-box").getAttribute("all_products")
);

console.log("helo", data_box);

function showResults(val) {
  // alert(val)
  res = document.getElementById("result");
  res.innerHTML = "";
  console.log("before", res);
  let list = "";
  fetch("/suggest?q=" + val, {
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then(function (response) {
      return response.json();
    })
    .then(function (data) {
      const preview_limit = 12;
      console.log(data);
      console.log(
        "we got here",
        data.length,
        "preview_limit = ",
        preview_limit,
        data
      );
      let smallestPossibleData =
        data.length < preview_limit ? data.length : preview_limit;
      for (i = 0; i < smallestPossibleData; i++) {
        list += `<div class="col-md-3 col-sm-6 col-12">
                     <div class="info-box">
                       <span class="info-box-icon bg-info"> <i class="fa fa-shopping-basket"></i></span>
                       <div class="info-box-content" id="result" name='searchresult_top'>
                         <span class="info-box-text h5">Purchase</span>
                         <span class="info-box-number font-weight-normal text-lg">410 items @ N333,430</span>
                       </div>
                       <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                 </div>
               `;
      }
      res.innerHTML = `${list}`;
      return true;
    })
    .catch(function (err) {
      console.warn("Something went wrong.", err);
      return false;
    });
}
// ================= SEARCH BAR====================

// working with the search bar 
// this should be refactored into a function
const searchresult_top = $('[name="searchresult_top"]');
const searchInPage = $('[name="searchresult_in_page"]'); //this is optional
$(document).on("keydown", function (e) {
  if (e.keyCode === 27) {
    // ESC : Toggle the visibility of the search results when the ESC key is pressed
    searchresult_top.toggle("hidden");
    searchInPage.toggle("hidden"); //optional
  }
});
$(".content-wrapper").on("dblclick", function (e) {
  searchresult_top.hide();
  searchInPage.hide();
});

// ==============Alerts====================

// ============ fading out the session alerts
$(".floating-alert").fadeIn("slow");
$(".floating-alert").fadeOut(10000);
