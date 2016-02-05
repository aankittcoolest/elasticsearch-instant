<?php

require_once 'app/init.php';


$params['index'] = 'shops';
$params['type']  = 'shop';


// $query = $es->search($params);

$query = $es->search([
    'body' => [
        'query' => [
            'bool' => [
                'should' => [
                      'match' => ['credit_card' => 1]

                  ]
              ]
          ]
      ]
  ]);


  if($query['hits']['total'] >= 1) {
      $results = $query['hits']['hits'];
  }

  foreach($results as $result) {
    $output[] = ($result["_source"]);
  }

  echo json_encode($output);

if(isset($_GET['q'])) {
  $q = $_GET['q'];



}

 ?>
