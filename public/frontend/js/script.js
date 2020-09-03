$(document).ready(function(){

  getData();

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // Count
  count();

  function count(){
    var shopString = localStorage.getItem("heinshop");
    if (shopString) {
      var shopArray = JSON.parse(shopString);
      if (shopArray!=0) {
        var count = shopArray.length;

        var total = 0;

        $.each(shopArray,function (i,v) {
          if (v.discount>0) {
            var price = v.price-(v.price*(v.discount/100));
            var old_price= v.price;
          }else{
            var price = v.price;
            var old_price = v.price;
          }
          total +=(price*v.qty);
        })

        $(".cartNoti").html(count);
        $(".cartTotal").html(formatNumber(total));

      }else {
        $(".cartNoti").html(0);
        $(".cartTotal").html(0);    
      }
    }else {
      $(".cartNoti").html(0);
      $(".cartTotal").html(0);    
    }
  };

  // Add To Cart
  $(".addtocartBtn").on('click',function(e){
    var item_qty=parseInt($('#qty').val());
    var id = $(this).data('id');
    var name = $(this).data('name');
    var photo = $(this).data('photo');
    var price = $(this).data('price');
    var discount = $(this).data('discount');
    var codeno = $(this).data('codeno');
    var qty=1;

    if (item_qty) {
      qty+=item_qty;
    }

    var shop_item = {
      id:id,
      codeno:codeno,
      name:name,
      price:price,
      discount:discount,
      photo:photo,
      qty:qty
    }

    var shopString = localStorage.getItem("heinshop");
    var shopArray;
    if (shopString==null) {
      shopArray=Array();
    }else {
      shopArray=JSON.parse(shopString);
    }

    var status = false;
    $.each(shopArray,function(i,v){
      if (id==v.id) {
        status = true;
        if (!item_qty) {
          v.qty++;
        }else{
          v.qty+=item_qty;
        }
      }
    })

    if (status==false) {
      shopArray.push(shop_item);

    }

    var shopData = JSON.stringify(shopArray);
    localStorage.setItem("heinshop", shopData);
    count();
  });

  // Show to Table Data
  function getData(){
    var shopString = localStorage.getItem("heinshop");
    if (shopString) {
      var shopArray = JSON.parse(shopString);
      if (shopArray.length > 0) {
        var html='';
        var no=1;
        var total=0;
        $.each(shopArray,function(i,v){
          var photo = v.photo;
          var name = v.name;
          var codeno = v.codeno;
          var unit_price = v.price;
          var discount = v.discount;
          var qty = v.qty;
          if (discount>0) {
            var price = unit_price-(unit_price*(discount/100));
            var old_price= unit_price;
          }else{
            var price = unit_price;
            var old_price = unit_price;
          }

          var subtotal = price*qty;

          html +=`<tr>
                <td>
                  <button class="btn btn-outline-danger remove btn-sm" style="border-radius: 50%"> 
                    <i class="icofont-close-line"></i> 
                  </button> 
                </td>
                <td> 
                  <img src="${photo}" class="cartImg">           
                </td>
                <td> 
                  <p> ${name} </p>
                  <p> ${codeno} </p>`;

          html +=`<p> <strong>discount</strong>: ${discount}%</p>`;
                  
          html +=`</td>
                <td class="text-center">
                  <button class="btn btn-outline-secondary max" data-item_i="${i}"> 
                    <i class="icofont-plus"></i> 
                  </button>
                
                  <p class="mt-3"> ${qty} </p>
                
                  <button class="btn btn-outline-secondary min" data-item_i="${i}"> 
                    <i class="icofont-minus"></i>
                  </button>
                </td>
                <td>
                  <p class="text-danger"> 
                    ${formatNumber(price)} Ks
                  </p>`;

          if(discount>0){
            html  +=`<p class="font-weight-lighter"> 
                  <del> ${formatNumber(old_price)} Ks </del> </p>`;
          }

          html  +=`</td>
                <td>
                  ${formatNumber(subtotal)} Ks
                </td>
              </tr>`;

            total += subtotal;
        });
        $('.shoppingcart').show();
        $('.noneshoppingcart_div').hide();
        $("#shoppingcart_table").html(html);
        $(".total").html(formatNumber(total));
      }else{
        $('.shoppingcart').hide();
        $('.noneshoppingcart_div').show();
      }
    }else{
      html='';
      $('.shoppingcart').hide();
      $('.noneshoppingcart_div').show();
      $("#shoppingcart_table").html(html);
    }
  }

  // puls btn
  $("tbody").on('click','.max',function(){

    var item_i = $(this).data('item_i');

    var shopString = localStorage.getItem("heinshop");
    if (shopString) {

      var shopArray = JSON.parse(shopString);

      $.each(shopArray,function(i,v){
        if (item_i==i) {
          v.qty++;
        }
      })

      var shopData=JSON.stringify(shopArray);
      localStorage.setItem("heinshop",shopData);
      getData();
      count();
    }

  });

  // minus btn
  $("tbody").on('click','.min',function(){
    var item_i = $(this).data('item_i');

    var shopString = localStorage.getItem("heinshop");
    if (shopString) {

      var shopArray = JSON.parse(shopString);

      $.each(shopArray,function(i,v){
        if (item_i==i) {
          v.qty--;
          if (v.qty==0) {
            shopArray.splice(item_i,1);
          }
        }

      })

      var shopData=JSON.stringify(shopArray);
      localStorage.setItem("heinshop",shopData);
      getData();
      count();
    }

  });

  // For But Now
  $('.checkoutbtn').on('click',function(){
    var notes = $('.notes').val();
    if (notes == '') {
      alert('Please fill request message!');
    }else{
      // var total = $('.total').val();
      var shopString = localStorage.getItem("heinshop"); // string
      if (shopString) {
        // var shopArray = JSON.parse(shopString);
        $.post('/orders',{shop_data:shopString,notes:notes},function(response){
          if (response) {
            alert(response);
            localStorage.clear();
            getData();
            location.href="/";
          }
        })
      }
    }

  });

  function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
  }

})