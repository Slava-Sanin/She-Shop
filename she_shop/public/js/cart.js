
$('.add-to-cart').on('click', function(){
  
  var product_id = $(this).data('id');

  $.ajax({
    
      url: CI_ROOT + "cart/addToCart",  
      type: "GET", 
      dataType: "html",
      data: { id: product_id }, 
      success: function(data) {
        
        location.reload();
      
      } 
      
  });
  
});


$('.update-btn').on('click',function(){
  
  var op = $(this).data('op');
  var amount;
  
  if(op == 'up'){
    
    amount = parseInt($(this).prev().val());
    amount++;
    $(this).prev().val(amount);
    
  } else {
    
    amount = parseInt($(this).next().val());
    amount--;
    $(this).next().val(amount);
    
  }
  
  $('#checkout-form').submit();
  
});
















