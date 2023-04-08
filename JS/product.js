/*----------------------------------- Add  Product -----------------------------------*/

$(document).on("submit", "#addProduct", function (e) {
  e.preventDefault();
  var formData = new FormData(this);
  formData.append("add_product", true);

  $.ajax({
    type: "POST",
    url: "addproductQuery.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      var res = jQuery.parseJSON(response);
      if (res.status == 422) {
        $("#errorMessage").removeClass("d-none");
        $("#errorMessage").text(res.message);
      } else if (res.status == 200) {
        $("#errorMessage").addClass("d-none");
        $("#productModal").modal("hide");
        $("#addProduct")[0].reset();
        alertify.set("notifier", "position", "top-right");
        alertify.success(res.message);
        $("#myTable").load(location.href + " #myTable");
      }
    },
  });
});
function myFunction() {
  document.getElementById("addProduct").reset();
}

/*--------------------------------- Delete Product ---------------------------------*/
$(document).on("click", ".delteBtn", function () {
   var product_id = $(this).attr("delete_id");
   $("#delete_id").val(product_id);
 });
 
 $(document).on("submit", "#deleteID", function (event) {
   event.preventDefault(); // prevent form from submitting normally
 
   var product_id = $("#delete_id").val();
 
   $.ajax({
     type: "POST",
     dataType: "JSON",
     url: "deleteproductQuery.php",
     data: {
       delete_product: true, // add this parameter to indicate that it is a delete request
       product_id: product_id,
     },
     success: function (response) {
       console.log(response);
       if (response.status == 500) {
         alert(response.message);
       } else {
         alertify.set("notifier", "position", "top-right");
         alertify.success(response.message);
         $("#deleteModal").modal("hide");
         $("#myTable").load(location.href + " #myTable");
       }
     },
   });
 });
/*----------------------------------- Edit Product -----------------------------------*/

$(document).on("click", ".updateBtn", function () {
  var product_id = $(this).attr("dataid");
  $("#product_id").val(product_id);

  // console.log($(this).attr("dataid"));
  $.ajax({
    type: "POST",
    dataType: "JSON",
    data: { product_id: product_id },
    url: "addproductQuery.php?product_id=" + product_id,
    success: function (data) {
      $("#product_id").val(data.productid);
      $("#UproductName").val(data.UproductName);

      $("#qty_250g").val(data.qty_250g);
      $("#qty_500g").val(data.qty_500g);
      $("#qty_1kg").val(data.qty_1kg);

      $("#UproductPrice2").val(data.UproductPrice2);
      $("#UproductPrice3").val(data.UproductPrice3);
      $("#UproductPrice4").val(data.UproductPrice4);
    },
  });
});

/*--------------------------------- Update Product ---------------------------------*/

$(document).on("submit", "#updateProduct", function (e) {
  e.preventDefault();
  var formData = new FormData(this);

  formData.append("update_product", true);

  $.ajax({
    type: "POST",
    url: "updateproduct.php",
    data: formData,
    dataType: "JSON",
    processData: false,
    contentType: false,
    success: function (data) {
      // var res = jQuery.parseJSON(response);

      alert(data.status);
      $("#myTable").load(location.href + " #myTable");
      $("#UpdateModal").modal("hide");
      // if (res.status == 422) {
      //   $("#errorMessageUpdate").removeClass("d-none");
      //   $("#errorMessageUpdate").text(res.message);
      // } else if (res.status == 200) {
      //   $("#errorMessageUpdate").addClass("d-none");
      //   alertify.set("notifier", "position", "top-right");
      //   alertify.success(res.message);

      //   $("#UpdateModal").modal("hide");

      //   $("#myTable1").load(location.href + " #myTable1");
      // }
    },
  });
});
