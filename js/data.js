

function getShop() {
 var id = $("#shop_id").val();
 $.ajax({
        type: 'POST',
        url: 'http://aankit-pc.mbtn.sbmgs.info/ankit/shopData/',
        data: {shop_id: JSON.stringify(id)},
        success: function(data) {
            console.log(data);
            obj = data;
            if(obj) {
                  var shop_id = $("#shop_id").val();
                  $.ajax({
                      type: 'POST',
                      url: 'http://172.26.29.95//tutorials/elasticsearch/insert_shop.php',
                      data: {
                             shop_data: obj,
                                shop: shop_id},

                       success: function(result) {
                           if(result == true) {
                               $('#success').html("data entered successfully!");
                           } else {
                            $('#failure').html("Data already present in elastic engine");
                           }
                       }
                      });
            
            
            } else {
                $('#failure').html("ID is either inactive or not present in database");
            }
        }
      });

}



function searchShop() {
   var freeword = $("#freeword").val();
   $.ajax({
        type: 'GET',
        url: 'http://172.26.29.95//tutorials/elasticsearch/search_shop.php',
       dataType : 'json',
       cache : false,
       data: {freeword: freeword},
        success: function(shops, result) {
            
//            if(shops) {
//                
//                for (index = 0, len = shops.length; index < len; ++index) {
//                    console.log(shops[index]);
//                }
////                shops.forEach(function(shop) {
////                
////                  console.log(shop);              
////                });
//            
//            }
//         /   data = JSON.decode(shops);
//            console.log(shops.length);
//            $.each(shop in shops){
//            console.log(shop);
//            }
//            console.log(shops);
//            console.log(result);
            //console.log(shops);
            $.each(shops, function(key, shop) {
                console.log(shop.name);
                console.log(shop.id);

            });
//          console.log(shops);
            
        }

       
   
   });
}