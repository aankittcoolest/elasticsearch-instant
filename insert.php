
<?php
require_once 'app/init.php';

 $db = mysql_connect('127.0.0.1', 'root', '');
 mysql_set_charset('utf8',$db);

$db_selected = mysql_select_db('shops', $db);

$users = "
    SELECT *
    FROM shop_search";

    $result = mysql_query($users);

    $params['index'] = 'shops';
    $params['type']  = 'shop';

    $i = 1;
    while ($row = mysql_fetch_assoc($result)) {

          $params['body'][] = array(
              'index' => array(
                  '_id' => $i
              )
          );

          $params['body'][] = array(
              'service_code' => $row["service_code"],
              'shop_code'             => $row["shop_code"],
              'name'             => $row["name"],
              'name_kana'             => $row["name_kana"],
              'shop_category_id'             => $row["shop_category_id"],
              'category_name'             => $row["category_name"],
              'xl_category_id'             => $row["xl_category_id"],
              'big_category_id'             => $row["big_category_id"],
              'mid_category_id'             => $row["mid_category_id"],
              'zip_code'             => $row["zip_code"],
              'pref_id'             => $row["pref_id"],
              'pref_name'             => $row["pref_name"],
              'city_id'             => $row["city_id"],
              'pref_address'             => $row["pref_address"],
              'address1'             => $row["address1"],
              'address2'             => $row["address2"],
              'tel'             => $row["tel"],
              'fax'             => $row["fax"],
              'latitude'             => $row["latitude"],
              'longitude'             => $row["longitude"],
              'keywords'             => $row["keywords"],
              'owner_shop_id'             => $row["owner_shop_id"],
              'custom_specification_type'             => $row["custom_specification_type"],
              'department_kbn'             => $row["department_kbn"],
              'future_reservation_only'             => $row["future_reservation_only"],
              'mobile_wait_view_status'             => $row["mobile_wait_view_status"],
              'mobile_wait_display'             => $row["mobile_wait_display"],
              'unit_price_lunch'             => $row["unit_price_lunch"],
              'takeout'             => $row["takeout"],
              'free_drink'             => $row["free_drink"],
              'free_food'             => $row["free_food"],
              'credit_card'             => $row["credit_card"],
              'parking'             => $row["parking"],
              'child_seats'             => $row["child_seats"],
              'zashiki'             => $row["zashiki"],
              'smoking'             => $row["smoking"],
              'barrier_free'             => $row["barrier_free"],
              'lunch'             => $row["lunch"],
              'late_night'             => $row["late_night"],
              'receivable'             => $row["receivable"],
              'only_publication'             => $row["only_publication"],
              'timesaving_flg'             => $row["timesaving_flg"],
              'display_point'             => $row["display_point"],
              'max_cnt_last_month'             => $row["max_cnt_last_month"],
              'new_arrival_date'             => $row["new_arrival_date"],
              'created_at'             => $row["created_at"],
              'updated_at'             => $row["updated_at"]

          );
          $i++;
    }

$indexed = $es->bulk($params);

  if($indexed) {
      print_r($indexed);
  }
