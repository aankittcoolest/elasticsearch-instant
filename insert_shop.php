
<?php

require_once 'app/init.php';

$data = json_decode($_POST['shop_data']);
$shop_id = $_POST['shop'];

$array = (array)$data;

$params = array();
$params['body']  = $array;

$params['index'] = 'shops';
$params['type']  = 'shop';
$params['id'] = $shop_id;

$result = $es->index($params);

//return json_encode($result);



var_dump($result);
return var_dump($result['created']);








if(isset($_GET['q'])) {
  $q = $_GET['q'];
    
       $params['index'] = 'shops';
    $params['type']  = 'shop';
    $query = $es->search($params);
    
//      $query = $es->search([
//      'body' => [
//          'query' => [
//              'bool' => [
//                  'should' => [
//                        'match' => ['id' => $q]
//
//                    ]
//                ]
//            ]
//        ]
//    ]);
    
        if($query['hits']['total'] >= 1) {
        $results = $query['hits']['hits'];
    }
    
    var_dump($results);die();

    
    $params = array();
    $params['body'] = array(
        'id' => 6,
        'name' => 'ankit');  
    
    $params['index'] = 'shops';
    $params['type']  = 'shop';
   // $params['id'] = 5;
    
    $result = $es->index($params);
    
    var_dump($result);die();



// $query = $es->search($params);

  $query = $es->search([
      'body' => [
          'query' => [
              'bool' => [
                  'should' => [
                        'match' => ['keywords' => $q],
                        'match' => ['name' => $q]

                    ]
                ]
            ]
        ]
    ]);


    if($query['hits']['total'] >= 1) {
        $results = $query['hits']['hits'];
    }
}

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Search | ES</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  </head>
  <body>

    <div class="loader"></div>


            <form class="" action="index.php" autocomplete="off">
              <label for="">Search for something
                  <input type="text" name="q" value="">
              </label>

              <input type="submit" name="name" value="Search">

            </form>


            <?php
              if(isset($results)){
                  ?>
                  <label id="label"><?php echo $_GET['q'] ?></label>
                  <table class="table table-striped" id="test">
                      <thead>
                        <tr>
                          <th>service_code</th>
                          <th>shop_code</th>
                          <th>name</th>
                          <th>name_kana</th>
                          <th>shop_category_id</th>
                          <th>category_name</th>
                          <th>xl_category_id</th>
                          <th>big_category_id</th>
                          <th>mid_category_id</th>
                          <th>zip_code</th>
                          <th>pref_id</th>
                          <th>pref_name</th>
                          <th>city_id</th>
                          <th>pref_address</th>
                          <th>address1</th>
                          <th>address2</th>
                          <th>tel</th>
                          <th>fax</th>
                          <th>latitude</th>
                          <th>longitude</th>
                          <th>keywords</th>
                          <th>owner_shop_id</th>
                          <th>custom_specification_type</th>
                          <th>department_kbn</th>
                          <th>future_reservation_only</th>
                          <th>mobile_wait_view_status</th>
                          <th>mobile_wait_display</th>
                          <th>unit_price_lunch</th>
                          <th>takeout</th>
                          <th>free_drink</th>
                          <th>free_food</th>
                          <th>credit_card</th>
                          <th>parking</th>
                          <th>child_seats</th>
                          <th>zashiki</th>
                          <th>smoking</th>
                          <th>barrier_free</th>
                          <th>lunch</th>
                          <th>late_night</th>
                          <th>receivable</th>
                          <th>only_publication</th>
                          <th>timesaving_flg</th>
                          <th>display_point</th>
                          <th>max_cnt_last_month</th>
                          <th>new_arrival_date</th>
                          <th>created_at</th>
                          <th>updated_at</th>
                        </tr>
                      </thead>

                <?php
                foreach ($results as $r) {
                  ?>
                  <div class="result">

                      <div class="result-keywords">
                        <tbody>
                          <tr>
                              <div id="myDiv">
                                <td><?php echo ( $r['_source']['service_code']); ?></td>
                                <td><?php echo ( $r['_source']['shop_code']); ?></td>
                                <td><?php echo ( $r['_source']['name']); ?></td>
                                <td><?php echo ( $r['_source']['name_kana']); ?></td>
                                <td><?php echo ( $r['_source']['shop_category_id']); ?></td>
                                <td><?php echo ( $r['_source']['category_name']); ?></td>
                                <td><?php echo ( $r['_source']['xl_category_id']); ?></td>
                                <td><?php echo ( $r['_source']['big_category_id']); ?></td>
                                <td><?php echo ( $r['_source']['mid_category_id']); ?></td>
                                <td><?php echo ( $r['_source']['zip_code']); ?></td>
                                <td><?php echo ( $r['_source']['pref_id']); ?></td>
                                <td><?php echo ( $r['_source']['pref_name']); ?></td>
                                <td><?php echo ( $r['_source']['city_id']); ?></td>
                                <td><?php echo ( $r['_source']['pref_address']); ?></td>
                                <td><?php echo ( $r['_source']['address1']); ?></td>
                                <td><?php echo ( $r['_source']['address2']); ?></td>
                                <td><?php echo ( $r['_source']['tel']); ?></td>
                                <td><?php echo ( $r['_source']['fax']); ?></td>
                                <td><?php echo ( $r['_source']['latitude']); ?></td>
                                <td><?php echo ( $r['_source']['longitude']); ?></td>
                                <td><?php echo ( $r['_source']['keywords']); ?></td>
                                <td><?php echo ( $r['_source']['owner_shop_id']); ?></td>
                                <td><?php echo ( $r['_source']['custom_specification_type']); ?></td>
                                <td><?php echo ( $r['_source']['department_kbn']); ?></td>
                                <td><?php echo ( $r['_source']['future_reservation_only']); ?></td>
                                <td><?php echo ( $r['_source']['mobile_wait_view_status']); ?></td>
                                <td><?php echo ( $r['_source']['mobile_wait_display']); ?></td>
                                <td><?php echo ( $r['_source']['unit_price_lunch']); ?></td>
                                <td><?php echo ( $r['_source']['takeout']); ?></td>
                                <td><?php echo ( $r['_source']['free_drink']); ?></td>
                                <td><?php echo ( $r['_source']['free_food']); ?></td>
                                <td><?php echo ( $r['_source']['credit_card']); ?></td>
                                <td><?php echo ( $r['_source']['parking']); ?></td>
                                <td><?php echo ( $r['_source']['child_seats']); ?></td>
                                <td><?php echo ( $r['_source']['zashiki']); ?></td>
                                <td><?php echo ( $r['_source']['smoking']); ?></td>
                                <td><?php echo ( $r['_source']['barrier_free']); ?></td>
                                <td><?php echo ( $r['_source']['lunch']); ?></td>
                                <td><?php echo ( $r['_source']['late_night']); ?></td>
                                <td><?php echo ( $r['_source']['receivable']); ?></td>
                                <td><?php echo ( $r['_source']['only_publication']); ?></td>
                                <td><?php echo ( $r['_source']['timesaving_flg']); ?></td>
                                <td><?php echo ( $r['_source']['display_point']); ?></td>
                                <td><?php echo ( $r['_source']['max_cnt_last_month']); ?></td>
                                <td><?php echo ( $r['_source']['new_arrival_date']); ?></td>
                                <td><?php echo ( $r['_source']['created_at']); ?></td>
                                <td><?php echo ( $r['_source']['updated_at']); ?></td>
                              </div>
                          </tr>
                        </tbody>
                  </div>
                  </div>
                  <?php
                }?>
              </table>
              <table>
                  <tbody id = "new_data">
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
              </table>


                  <?php
              }
             ?>
            <input type="radio" name="credit_card" value="1" id="allowed">Credit Card<br>
            <input type="radio" name="credit_card" value="0">No Credit Card

</body>


    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script charset="utf-8">



      $(function() {

        var $orders = $('#orders');
        var $name = $('#name');
        var $drink = $('#drink');
        var $label = $('#label');
        var $table = $("#test");
        var $data = $('#new_data');

        console.log($label.html());

          $('#allowed').on('click', function() {
              console.log($table.hide());

              $.ajax({
                type: 'GET',
                url: '/tutorials/elasticsearch/credit.php',
                dataType: 'json',

                success: function(data) {
                    for(var i = 0; i < data.length; i++) {
                        $data.append("<tr><td>"+data[i].service_code+"</td><td>"
                                                +data[i].shop_code+"</td><td>"
                                                +data[i].name+"</td><td>"
                                                +data[i].name_kana+"</td><td>"
                                                +data[i].shop_category_id+"</td><td>"
                                                +data[i].category_name+"</td><td>"
                                                +data[i].xl_category_id+"</td><td>"
                                                +data[i].big_category_id+"</td><td>"
                                                +data[i].mid_category_id+"</td><td>"
                                                +data[i].zip_code+"</td><td>"
                                                +data[i].pref_id+"</td><td>"
                                                +data[i].pref_name+"</td><td>"
                                                +data[i].city_id+"</td><td>"
                                                +data[i].pref_address+"</td><td>"
                                                +data[i].address1+"</td><td>"
                                                +data[i].address2+"</td><td>"
                                                +data[i].tel+"</td><td>"
                                                +data[i].fax+"</td><td>"
                                                +data[i].latitude+"</td><td>"
                                                +data[i].longitude+"</td><td>"
                                                +data[i].keywords+"</td><td>"
                                                +data[i].custom_specification_type+"</td><td>"
                                                +data[i].department_kbn+"</td><td>"
                                                +data[i].future_reservation_only+"</td><td>"
                                                +data[i].service_code+"</td><td>"
                                                +data[i].service_code+"</td><td>"
                                                +data[i].service_code+"</td><td>"
                                                +data[i].service_code+"</td><td>"
                                                +data[i].service_code+"</td><td>"
                                                +data[i].service_code+"</td><td>"
                                                +data[i].service_code+"</td><td>"
                                                +data[i].service_code+"</td><td>");



                    }



                },
                error: function() {
                  alert('error saving order.');
                }
              });
           });


      });

    </script>



</html>
