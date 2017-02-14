<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>1b</title>
  </head>
  <body>
    <?php
    require './vendor/autoload.php';
    use GuzzleHttp\Client;

    $client = new Client([
      'base_uri' => 'https://devassess.100tb.com/',
      'timeout' => 2.0
    ]);

    $response = $client->get('testOrderItems/10');
    $data = $response->getBody();
    $data = json_decode($data, true);

    // function discount($client_id){
    //   foreach($data as $datum){
    //     if ($client_id == 77777) {
    //       if($datum['client_id'] == 77777){
    //       $price = $datum['price'];
    //       $discount = $price - ($price * .20) . "  (20% discount)";
    //       $datum['discount'] = $discount;
    //       }
    //     }
    //   }
    // }




    ?>

    <!-- <div class="task__section">
      <h2>All Data Retrieved and Manipulated (Task 1.a)</h2>
      <?php
      foreach($data as $datum){
        if ($datum['client_id'] == 77777) {
          $price = $datum['price'];
          $discount = $price - ($price * .20) . "  (20% discount)";
          $datum['discount'] = $discount;
        }
        print_r($data);
        echo "<div class='grouping'>
          <div class='line-item'><span>ID:</span> {$datum["id"]}</div>
         <div class='line-item'><span>Name:</span> {$datum["item_name"]}</div>
         <div class='line-item'><span>Description:</span> {$datum["item_desc"]}</div>
         <div class='line-item'><span>Group:</span> {$datum["order_group"]}</div>
         <div class='line-item'><span>Availability:</span> {$datum["available"]}</div>
         <div class='line-item'><span>Client ID:</span> {$datum["client_id"]}</div>
         <div class='line-item'><span>Price:</span> {$datum["price"]}</div>
         <div class='line-item'><span>Discounted Price:</span> $ {$datum["discount"]}</div>
         </div>";
       }
         ?>
    </div>

    <div class="task__section">
      <h2>All Data Retrieved and Manipulated (Task 1.a)</h2>
      <?php
      foreach($data as $datum){
        if ($datum['price'] < 0) {
          $datum['price'] = 0;
        }
        if ($datum['client_id'] == 77777) {
          $price = $datum['price'];
          $discount = $price - ($price * .20) . "  (20% discount)";
          $datum['discount'] = $discount;
        }
        if ($datum['client_id'] == 12345) {
          $price = $datum['price'];
          $discount = $price - ($price * .20) . "  (10% discount)";
          $datum['discount'] = $discount;
        }
        if ($datum['client_id'] == 987789) {
          $price = $datum['price'];
          $discount = $price - ($price * .05) . "  (5% discount)";
          $datum['discount'] = $discount;
        }
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
         ?>
    </div> -->


    <!-- <div class="task__section">
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
    </div> -->

    <div>
        <div class="task__section">
            <h2>All Data Retrieved and Manipulated (Task 2.a)</h2>
            <?php
            function all_servers(){
              $client = new Client([
                'base_uri' => 'https://devassess.100tb.com/',
                'timeout' => 5.0
              ]);
              $response = $client->get('testServers');
              $data = $response->getBody();
              $data = json_decode($data, true);
              foreach($data as $datum){
                if ($datum['price'] == null ) {
                  $datum['price'] = '-';
                }
                $new_server_id = str_replace('TB_', '', $datum['server_id']);
                $datum['server_id'] = $new_server_id;
                echo "<div class='grouping'>
                  <div class='line-item'><span>ID:</span> {$datum["id"]}</div>
                 <div class='line-item'><span>Server ID:</span> {$datum["server_id"]}</div>
                 <div class='line-item'><span>Server Name:</span> {$datum["server_name"]}</div>
                 <div class='line-item'><span>Client ID:</span> {$datum["client_id"]}</div>
                 <div class='line-item'><span>Availability:</span> {$datum["available"]}</div>
                 <div class='line-item'><span>Datacenter:</span> {$datum["datacenter"]}</div>
                 <div class='line-item'><span>IP Address:</span>  {$datum["ip_address"]}</div>
                 <div class='line-item'><span>Price:</span> $ {$datum["price"]}</div>
                 <div class='line-item'><span>Server Description:</span> $ {$datum["server_description"]}</div>
                 </div>";
              }
            }
            all_servers();
             ?>
        </div>
    </div>


  </body>
</html>
