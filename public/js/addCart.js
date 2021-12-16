function addCart(product_id, user_id){
    
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
   var btn=document.getElementById("btn-addCart"+product_id);
    if (btn.style.color=='') {
      btn.style.color='#FFF056';
      btn.style.border='3px solid #FFF056';
      $.ajax({
        url: "/addCart",
        type: "POST",
        data: {
               
          product_id: product_id,
          user_id: user_id,
          
        },
      })
      .done(function() {
        console.log("success");
      })
      .fail(function() {
        console.log("error");
      })
      .always(function(response) {
        if (response==1) {
          alert("Đã thêm vào giỏ hàng");
        }
        else{
          alert("Sản phẩm đã tồn tại");
         btn.style.color='';
      btn.style.border='';
        }
      });
    }
    else{
      alert("Có lỗi");
    }
     
    
    
}