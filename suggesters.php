
<?php

require_once 'app/init.php';

$data = $_POST['searchVal'];

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

   

$results = '';
    if($query['hits']['total'] >= 1) {
        $results = $query['hits']['hits'];
    }

 //var_dump(($results));die();


if($results) {
    
    
    foreach($results as $result) {
 $data = $result["_source"];
 $sort = $result["sort"];
    $collection[] = $data["name"];


}
$data = implode('<br>', array_values($collection));
echo $data;
//$i = 1;
// foreach($collection as $col) {
//    echo '<li id ="cake"><a href="http://127.0.0.1/tutorials/elasticsearch/freeword_search.php">'.$col.'</a></li>';
//     $i++;
//     //echo $col.'<br>';
// }
    
}

//var_dump($collection);die();
//return print_r((json_encode($collection)));

