$(document).ready(function () {
  customers();

  // $(document).on("click", ".btn-create-customer", function () {
  //   $("#customerModal").modal("show");
  //   // $("#customerModal").modal({
  //   //   backdrop: "static",
  //   //   keyboard: false,
  //   // });
  // });
  $(document).on("click", ".btn-create-customer", function () {
    $("#customerModal").modal({
      backdrop: "static",
      keyboard: false,
    });
    $("#customerModal").modal("show");
  });
  $(document).on("click", ".btn-close-add-customer", function () {
    $("#customerModal").modal("hide");
    $(".completeName").val("");
    $(".completeEmail").val("");
    $(".completeContact").val("");
    $(".completeAddress").val("");
    $(".completeDate").val("");

    // $("#mdl-view-details").modal("hide");
  });
  $(document).on("click", ".btn-close-view-customer", function () {
    $("#updateCustModal").modal("hide");

    // $("#mdl-view-details").modal("hide");
  });
  $(document).on("click", "#btn_submit_customer", function (e) {
    e.preventDefault();

    var customer_name = $(".completeName").val();
    var customer_email = $(".completeEmail").val();
    var customer_contact = $(".completeContact").val();
    var customer_address = $(".completeAddress").val();
    var customer_date = $(".completeDate").val();
    // console.log(customer_name);
    // console.log(customer_email);
    // console.log(customer_contact);
    // console.log(customer_address);
    // console.log(customer_date);
    if (
      !customer_name ||
      !customer_email ||
      !customer_address ||
      !customer_contact ||
      !customer_date
    ) {
      alertify.set("notifier", "position", "top-right");
      alertify.error("Please fill out all fields.");
      return;
    }

    $.ajax({
      url: "customer_add.php",
      type: "POST",
      dataType: "text",
      data: {
        action: "submit",
        customer_name: customer_name,
        customer_email: customer_email,
        customer_contact: customer_contact,
        customer_address: customer_address,
        customer_date: customer_date,
      },
      success: function (data) {
        // console.log(data)
        var json = $.parseJSON(data);
        if (json == null) return false;
        if (json.status == 200) {
          $("#customerModal").modal("hide");

          alertify.set("notifier", "position", "top-right");
          alertify.success(json.message);

          setTimeout(() => {
            location.reload();
          }, 1000);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR.status);
        console.log(textStatus);
        console.log(errorThrown);
      },
    });
  });
});

$(document).on("click", "#btn_update_customer", function (e) {
  e.preventDefault();
  var customer_number = $(".custNumber").val();
  var customer_name = $(".updateName").val();
  var customer_email = $(".updateEmail").val();
  var customer_contact = $(".updateContact").val();
  var customer_address = $(".updateAddress").val();
  var customer_date = $(".updateDate").val();

  if (
    !customer_name ||
    !customer_email ||
    !customer_address ||
    !customer_contact ||
    !customer_date
  ) {
    alertify.set("notifier", "position", "top-right");
    alertify.error("Please fill out all fields.");
    return;
  }
  $.ajax({
    url: "customer_update.php",
    type: "POST",
    dataType: "text",
    data: {
      action: "submit",
      customer_number: customer_number,
      customer_name: customer_name,
      customer_email: customer_email,
      customer_contact: customer_contact,
      customer_address: customer_address,
      customer_date: customer_date,
    },
    success: function (data) {
      // console.log(data);
      var json = $.parseJSON(data);

      if (json == null) return false;

      if (json.status == 200) {
        $("#updateCustModal").modal("hide");

        alertify.set("notifier", "position", "top-right");
        alertify.success(json.message);

        setTimeout(() => {
          location.reload();
        }, 1000);
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR.status);
      console.log(textStatus);
      console.log(errorThrown);
    },
  });
});

$(document).on("click", ".spn-trash-transaction", function () {
  var cust_no = $(this).data("custno");
  // console.log(cust_no);

  $.ajax({
    url: "customer_delete.php",
    type: "POST",
    dataType: "text",
    data: {
      action: "delete",
      cust_no: cust_no,
    },
    success: function (data) {
      var json = $.parseJSON(data);
      if (json == null) return false;

      if (json.status == 200) {
        alertify.set("notifier", "position", "top-right");
        alertify.success(json.message);

        setTimeout(() => {
          location.reload();
        }, 1000);
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR.status);
      console.log(textStatus);
      console.log(errorThrown);
    },
  });
});
$(document).on("click", ".spn-view-transaction", function () {
  $("#updateCustModal").modal({
    backdrop: "static",
    keyboard: false,
  });
  $("#updateCustModal").modal("show");
  var cust_no = $(this).data("custno");
  // console.log(cust_no);
  detailedCustomer(cust_no);
});

function detailedCustomer(cust_no) {
  $.ajax({
    url: "customer_list.php?cust_no=" + cust_no,
    type: "GET",
    dataType: "text",
    beforeSend: function () {},
    success: function (data) {
      var json = $.parseJSON(data);
      if (json == null) return false;
      // console.log(json);
      if (json.status == 200) {
        $.each(json.data, function (k, v) {
          $(".custNumber").val(v.customer_number);
          $(".updateName").val(v.name);
          $(".updateEmail").val(v.email);
          $(".updateContact").val(v.contact);
          $(".updateAddress").val(v.address);
          $(".updateDate").val(v.date);
        });
      }
    },
  });
}
function customers() {
  var html = "";
  $.ajax({
    url: "customer_list.php",
    type: "GET",
    dataType: "text",
    beforeSend: function () {},
    success: function (data) {
      var json = $.parseJSON(data);
      if (json == null) return false;

      if (json.status == 200) {
        $.each(json.data, function (k, v) {
          html += "<tr class='tr-cust-" + v.id + "'>";
          html +=
            '<td class="text-center" style="color:D1D6DD;">' +
            (k + 1) +
            "</td>";
          html +=
            '<td class="text-center" style="color:D1D6DD;">' + v.name + "</td>";
          html +=
            '<td class="text-center"  style="color:D1D6DD;">' +
            v.email +
            "</td>";
          html +=
            '<td class="text-center"  style="color:D1D6DD;">' +
            v.contact +
            "</td>";
          html +=
            '<td class="text-center"  style="color:D1D6DD;">' +
            v.address +
            "</td>";
          html +=
            '<td class="text-center"  style="color:D1D6DD;">' +
            v.date +
            "</td>";
          html += '<td class="text-center" >';
          html +=
            '<span class="material-icons-outlined spn-view-transaction" title="View customer" data-custno="' +
            v.customer_number +
            '">search</span>';
          html +=
            '<span class="material-icons-outlined spn-trash-transaction" title="Delete customer" data-custno="' +
            v.customer_number +
            '">delete</span>';
          html += "</td>";
          html += "</tr>";
        });
        $("#tbl-customers > tbody").html(html);
      }

      $("#tbl-customers").DataTable({
        ordering: false,
        scrollX: true,
      });
    },
  });
}
