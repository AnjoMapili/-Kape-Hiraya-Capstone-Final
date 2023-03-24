$(document).ready(function () {
  customers();

  $(document).on("click", "#addcustomer", function (e) {
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
        var json = $.parseJSON(data);
        if (json == null) return false;

        if (json.status == 200) {
          $("#TransactionModal").modal("hide");

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
          html += "<tr>";

          html += '<td class="text-center">' + (k + 1) + "</td>";
          html += '<td class="text-center">' + v.name + "</td>";
          html += '<td class="text-center">' + v.email + "</td>";
          html += '<td class="text-center">' + v.contact + "</td>";
          html += '<td class="text-center">' + v.address + "</td>";
          html += '<td class="text-center">' + v.date + "</td>";
          html += '<td class="text-center">';
          html +=
            '<span class="material-icons-outlined spn-view-customer" title="View transaction" data-custno="' +
            v.transaction_number +
            '">search</span>';
          html +=
            '<span class="material-icons-outlined spn-trash-customer" title="Delete transaction" data-custno="' +
            v.transaction_number +
            '">delete</span>';
          html += "</td>";
          html += "</tr>";
        });
        $("#tbl-customers > tbody").html(html);
      }

      $("#tbl-customers").DataTable({
        scrollX: true,
      });
    },
  });
}
