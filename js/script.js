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
        $("#wholesale").attr("checked", "checked");
      } else {
        $("#retail").attr("checked", "checked");
      }

      let price_id = data.price_id;
      let product_id = data.product_id;

      $("#form").append(
        `
            <input type="hidden" name="price_id" value="` +
          price_id +
          `" />
            <input type="hidden" name="product_id" value="` +
          product_id +
          `" />
      `
      );
    },
  });
});
