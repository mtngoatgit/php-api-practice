<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>100TB Skills Assessment</title>
    <link rel="stylesheet" href="/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400,700" rel="stylesheet">
  </head>
  <body>
  <?php
  require './vendor/autoload.php';
  use GuzzleHttp\Client;

  $client = new Client([
    'base_uri' => 'https://devassess.100tb.com/',
    'timeout' => 2.0
  ]);

  $response = $client->get('testOrderItems');
  $data = $response->getBody();
  $data = json_decode($data, true);

  // TASK 1.a


  // TASK 1.b
  $id_response = $client->get('testOrderItems/1');
  $id_data = $id_response->getBody();
  $id_data = json_decode($id_data, true);

  // TASK 1.c
  $disk_group = array_filter($data, function($disk){
    return $disk['order_group'] == 'disk';
  });
  $cpu_group = array_filter($data, function($cpu){
    return $cpu['order_group'] == 'cpu';
  });
  $ram_group = array_filter($data, function($ram){
    return $ram['order_group'] == 'ram';
  });
  $ungrouped_group = array_filter($data, function($ungrouped){
    return $ungrouped['order_group'] == 'ungrouped';
  });
  ?>
  
  <div class="task__section">
    <h2>All Data Retrieved and Manipulated (Task 1.a)</h2>
    <form class="" method="get">
      Enter Client ID here: <input type="number" name="val1" value="0" required>
      <input type="submit" name="submit" value="send"></input>
    </form>
    <?php

    $val1 = htmlentities($_GET['val1']);

    function discount($client_id = ''){
      echo "<h4>Client ID: {$client_id}</h4>";
      $client = new Client([
        'base_uri' => 'https://devassess.100tb.com/',
        'timeout' => 5.0
      ]);
      $response = $client->get('testOrderItems');
      $data = $response->getBody();
      $data = json_decode($data, true);
      foreach($data as $datum){
        if ($datum['price'] < 0) {
          $datum['price'] = 0;
        }
        if ($client_id == 77777) {
          if($datum['client_id'] == 77777){
          $price = $datum['price'];
          $discount = $price - ($price * .20) . "  (20% discount)";
          $datum['discount'] = $discount;
        }}else if ($client_id == 12345) {
          if($datum['client_id'] == 12345){
          $price = $datum['price'];
          $discount = $price - ($price * .10) . "  (10% discount)";
          $datum['discount'] = $discount;
        }} elseif ($client_id == 987789) {
          $price = $datum['price'];
          $discount = $price - ($price * .05) . "  (5% discount)";
          $datum['discount'] = $discount;
        } else {
          $datum['discount'] = "N/A";
        }
        // }
        echo "<div class='grouping'>
          <div class='line-item'><span>ID:</span> {$datum["id"]}</div>
         <div class='line-item'><span>Name:</span> {$datum["item_name"]}</div>
         <div class='line-item'><span>Description:</span> {$datum["item_desc"]}</div>
         <div class='line-item'><span>Group:</span> {$datum["order_group"]}</div>
         <div class='line-item'><span>Availability:</span> {$datum["available"]}</div>
         <div class='line-item'><span>Client ID:</span> {$datum["client_id"]}</div>
         <div class='line-item'><span>Price:</span> $ {$datum["price"]}</div>
         <div class='line-item'><span>Discounted Price:</span> $ {$datum["discount"]}</div>
         </div>";
      }
    }
    // print_r($val1);
    // discount($val1);
    discount($val1);
    ?>
  </div>

  <div class="task__section">
    <h2>Item Retrieved According to ID # (Task 1.b)</h2>
    <?php
    foreach($id_data as $id){
      echo "<div class='grouping'>
        <div class='line-item'><span><strong>ID:</span> {$id["id"]}</strong></div>
       <div class='line-item'><span>Name:</span> {$id["item_name"]}</div>
       <div class='line-item'><span>Description:</span> {$id["item_desc"]}</div>
       <div class='line-item'><span>Group:</span> {$id["order_group"]}</div>
       <div class='line-item'><span>Availability:</span> {$id["available"]}</div>
       <div class='line-item'><span>Client ID:</span> {$id["client_id"]}</div>
       <div class='line-item'><span>Price:</span> {$id["price"]}</div>
       </div>";
     }
       ?>
  </div>

  <div>
      <div class="task__section">
          <h2>Items Arranged by Order Group (Task 1.c)</h2>
            <h3 class="new__group">DISK Group</h3>
            <?php
            foreach($disk_group as $disk){
              echo "<div class='grouping'>
                <div class='line-item'><span>ID:</span> {$disk["id"]}</div>
               <div class='line-item'><span>Name:</span> {$disk["item_name"]}</div>
               <div class='line-item'><span>Description:</span> {$disk["item_desc"]}</div>
               <div class='line-item'><span><strong>Group:</span> {$disk["order_group"]}</strong></div>
               <div class='line-item'><span>Availability:</span> {$disk["available"]}</div>
               <div class='line-item'><span>Client ID:</span> {$disk["client_id"]}</div>
               <div class='line-item'><span>Price:</span> {$disk["price"]}</div>
               </div>";
             }
               ?>

            </div>
             <h3 class="new__group">CPU Group</h3>
             <?php
             foreach($cpu_group as $cpu){
               echo "<div class='grouping'>
                 <div class='line-item'><span>ID:</span> {$cpu["id"]}</div>
                <div class='line-item'><span>Name:</span> {$cpu["item_name"]}</div>
                <div class='line-item'><span>Description:</span> {$cpu["item_desc"]}</div>
                <div class='line-item'><span><strong>Group:</span> {$cpu["order_group"]}</strong></div>
                <div class='line-item'><span>Availability:</span> {$cpu["available"]}</div>
                <div class='line-item'><span>Client ID:</span> {$cpu["client_id"]}</div>
                <div class='line-item'><span>Price:</span> {$cpu["price"]}</div>
                </div>";
              }
                ?>
              <br>
              <h3 class="new__group">RAM Group</h3>
              <?php
              foreach($ram_group as $ram){
                echo "<div class='grouping'>
                  <div class='line-item'><span>ID:</span> {$ram["id"]}</div>
                 <div class='line-item'><span>Name:</span> {$ram["item_name"]}</div>
                 <div class='line-item'><span>Description:</span> {$ram["item_desc"]}</div>
                 <div class='line-item'><span><strong>Group:</span> {$ram["order_group"]}</strong></div>
                 <div class='line-item'><span>Availability:</span> {$ram["available"]}</div>
                 <div class='line-item'><span>Client ID:</span> {$ram["client_id"]}</div>
                 <div class='line-item'><span>Price:</span> {$ram["price"]}</div>
                 </div>";
               }
                 ?>
              <br>
               <h3 class="new__group">UNGROUPED Group</h3>
               <?php
               foreach($ungrouped_group as $ungrouped){
                 echo "<div class='grouping'>
                   <div class='line-item'><span>ID:</span> {$ungrouped["id"]}</div>
                  <div class='line-item'><span>Name:</span> {$ungrouped["item_name"]}</div>
                  <div class='line-item'><span>Description:</span> {$ungrouped["item_desc"]}</div>
                  <div class='line-item'><span><strong>Group:</span> {$ungrouped["order_group"]}</strong></div>
                  <div class='line-item'><span>Availability:</span> {$ungrouped["available"]}</div>
                  <div class='line-item'><span>Client ID:</span> {$ungrouped["client_id"]}</div>
                  <div class='line-item'><span>Price:</span> {$ungrouped["price"]}</div>
                  </div>";
                }
                  ?>
      </div>
  </div>



  </body>
</html>
