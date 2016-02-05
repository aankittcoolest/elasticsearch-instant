function searchShop() {
   var freeword = $("#freeword").val();
    console.log(freeword);
    $('#populate-data tbody').remove();
   $.ajax({
        type: 'GET',
        url: 'http://127.0.0.1/tutorials/elasticsearch/search_shop.php',
       dataType : 'json',
       cache : false,
       data: {freeword: freeword},
        success: function(shops) {
            var html = '';
            
            $('#populate-data').append('<tbody>');
            $.each(shops, function(key, shop) {
                           $('#populate-data').append('<tr><td>' +shop.name+ '</td>'+
                                                      '<td>' +shop.distance+' km away'+ '</td></tr>');


            });
            $('#populate-data').append('</tbody>');
           // $('#populate-data').append('<tr><td>' +shop.name+ '</td></tr>');
        // console.log(shops);
            
        },
       
       error: function() {
                   $('#populate-data').append('<tbody>');
                           $('#populate-data').append('<tr><td>' +'No data available'+ '</td>');
            $('#populate-data').append('</tbody>');
   }

       
   
   });
}


$("#cake").click(function() {
    alert(1);
});
