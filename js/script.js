$("#submit").on("click", function () {
  if ($("#price_id") && $("#product_id")) {
    $("#price_id").remove();
    $("#product_id").remove();
  }
});

$("#table").on("click", "#id-edit", function () {
  let id_price = $(this).data("id");
  console.log(id_price);

  $.ajax({
    url: "ajax.php",
    type: "post",
    data: { id: id_price },
    dataType: "json",
    success: function (data) {
      console.log(data);
      $("#product_name").val(data.product_name);

      $("#price").val(data.price);

      if (data.customer_group == "Wholesale") {
        $("#wholesale").prop("checked", true);
        $("#retail").prop("checked", false);
      }

      if (data.customer_group == "Retail") {
        $("#retail").prop("checked", true);
        $("#wholesale").prop("checked", false);
      }

      //   if ($("#price_id") && $("#product_id")) {
      //     $("#price_id").remove();
      //     $("#product_id").remove();
      //   }

      let price_id = data.price_id;
      let product_id = data.product_id;

      $("#price_id").val(price_id);
      $("#product_id").val(product_id);
    },
  });
});
