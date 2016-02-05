
<?php

require_once 'app/init.php';

$data = $_GET['freeword'];

//$data = "高田馬場牧場";


  $query = $es->search([
      'body' => [
          'query' => [
              'bool' => [
                  'should' => [
                        'match' => ['name' => $data]
                    ]
                ]
            ],
          
          'sort' => [
              '_geo_distance' => [
                  'location' => [
                      'lat' => '35.7114',
                      'lon' => '139.704'
                  ],
                  
                  'order' => 'asc',
                  'unit'  =>  'km',
                  'distance_type' => 'plane'
              ]
          ]
        ]
    ]);

   


    if($query['hits']['total'] >= 1) {
        $results = $query['hits']['hits'];
    }

 //var_dump(($results));die();


foreach($results as $result) {
 $data = $result["_source"];
 $sort = $result["sort"];
    $collection[] = array(
    
         'name' => $data["name"],
         'distance' => round($sort[0], 2)
    );
// $name[] = $data["name"];
// $shop_id[] = $data["id"];

}


//var_dump($collection);die();
return print_r((json_encode($collection)));

