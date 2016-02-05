
<?php
require_once 'app/init.php';

 $db = mysql_connect('127.0.0.1', 'root', '');
 mysql_set_charset('utf8',$db);

$db_selected = mysql_select_db('shops_coordinates', $db);

$users = "
    SELECT *
    FROM shop_search";

    $result = mysql_query($users);




    $params['index'] = 'attractions';
    $params['type']  = 'restaurant';

    $i = 1;
    while ($row = mysql_fetch_assoc($result)) {

          $params['body'][] = array(
              'index' => array(
                  '_id' => $i
              )
          );

          $params['body'][] = array(
              'name'             => $row["name"],
              'location' => array(
           'lat'             => $row["latitude"],
              'lon'             => $row["longitude"])

          );
          $i++;
    }



$indexed = $es->bulk($params);

  if($indexed) {
      print_r($indexed);
  }
