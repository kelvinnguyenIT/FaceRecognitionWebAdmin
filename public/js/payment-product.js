function paymentProduct(product_id,id_type_product,id_quantity_product, user_id){
    
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      quantity_product = $(id_quantity_product).val()
      type_product = $(id_type_product).text()
      
      $.ajax({
        url: "/payment-product",
        type: "POST",
        data: {
          product_id: product_id,
          type_product : type_product,
          quantity_product: quantity_product,
          user_id: user_id,
          
        },
      })
      
         
}