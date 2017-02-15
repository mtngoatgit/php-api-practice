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

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>100TB Skills Assessment #2</title>
    <link rel="stylesheet" href="/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400,700" rel="stylesheet">
  </head>
  <body>
    <!--CREATE A FUNCTION TO SEND DATA TO A MYSQL TABLE  -->
    <?php

    require './vendor/autoload.php';
    use GuzzleHttp\Client;

    $client = new Client([
      'base_uri' => 'https://devassess.100tb.com/',
      'timeout' => 10.0
    ]);

    $response = $client->get('testServers');
    $data = $response->getBody();
    $data = json_decode($data, true);

    $con = mysqli_connect("127.0.0.1","root","MyNewPass","100tb");

    if (!$con)
    {
      die('Could not connect: ' . mysql_error());
    }else{
      echo "Connected!!";
    }

    foreach($data as $datum){
      $id = $datum['id'];
      $s_id = $datum['server_id'];
      $s_name = $datum['server_name'];
      $c = $datum['client_id'];
      $a = $datum['available'];
      $d = $datum['datacenter'];
      $ip = $datum['ip_address'];
      $p = $datum['price'];
      $sd = $server_description['server_description'];

      var_dump($con);

      // $result = mysqli_query($con,"INSERT INTO servers (id,server_id,server_name,
      //   client_id,available,datacenter,ip_address,price,server_description)
      //   VALUES ('$id','$s_id','$s_name','$c','$a','$d','$ip','$p','$sd')");
      // var_dump($result);

      $sql = "INSERT INTO servers (id,server_id,server_name,
        client_id,available,datacenter,ip_address,price,server_description)
        VALUES ('$id','$s_id','$s_name','$c','$a','$d','$ip','$p','$sd')";

      mysqli_query($con, $sql);

      // echo "DEBUG SQL: $sql <hr>\n";

    }




    // for ($i = 0; $i < count($data); $i++){
    //   $id = $data[$i]->id;
    //   $s_id = $data[$i]->server_id;
    //   $s_name = $data[$i]->server_name;
    //   $c = $data[$i]->client_id;
    //   $a = $data[$i]->available;
    //   $d = $data[$i]->datacenter;
    //   $ip = $data[$i]->ip_address;
    //   $p = $data[$i]->price;
    //   $sd = $data[$i]->server_description;
    //   mysqli_query($con, "INSERT INTO servers (id,server_id,server_name,
    //     client_id,available,datacenter,ip_address,price,server_description)
    //     VALUES ('{$data[$i]->id}', '{$data[$i]->server_id}', '{$data[$i]->server_name}', '{$data[$i]->client_id}', '{$data[$i]->available}',
    //        '{$data[$i]->datacenter}', '{$data[$i]->ip_address}', '{$data[$i]->price}', '{$data[$i]->server_description}')");
    //   mysqli_query($con, "INSERT INTO servers (id,server_id,server_name,
    //     client_id,available,datacenter,ip_address,price,server_description)
    //     VALUES ('{$id}','{$s_id}','{$s_name}','{$c}','{$a}','{$d}','{$ip}','{$p}','${sd}')");
    // }


    // for ($i = 0; $i < count($data); $i++){
    //   $sql = mysqli_query($con, "INSERT INTO servers (id,server_id,server_name,
    //     client_id,available,datacenter,ip_address,price,server_description)
    //     VALUES ('{$data[$i]->id}', '{$data[$i]->server_id}', '{$data[$i]->server_name}',
    //        '{$data[$i]->client_id}', '{$data[$i]->available}', '{$data[$i]->datacenter}',
    //        '{$data[$i]->ip_address}', '{$data[$i]->price}', '{$data[$i]->server_description}')");
    //    mysqli_query($con, $sql);
    //   // var_dump($result);
    //   echo "DEBUG SQL: $sql <hr>\n";
    // }

    //
    // mysqli_query($con, "INSERT INTO servers (id,server_id,server_name,
    //   client_id,available,datacenter,ip_address,price,server_description)
    //   VALUES ('$id', '$server_id', '$server_name', '$client_id', '$available',
    //   '$datacenter', '$ip_address', '$price', '$server_description')");

    // foreach($data as $datum){
    //   $query1 = "INSERT INTO servers (id,server_id,server_name,client_id,available,datacenter,ip_address,price,server_description)
    //     VALUES (
    //             '". $datum['id']."',
    //             '". $datum['server_id']."',
    //             '". $datum['server_ name']."',
    //             '". $datum['client_id']."',
    //             '". $datum['available']."',
    //             '". $datum['datacenter']."',
    //             '". $datum['ip_address']."',
    //             '". $datum['price']."',
    //             '". $datum['server_description']."'
    //             )";
    //
    //   $q = mysqli_query($con, $query1) or die (mysqli_error($con));
    // }

    // MYSQL QUERY TO CREATE NEW TABLE:
      // CREATE TABLE servers (id INT(10), server_id VARCHAR(20), server_name VARCHAR(20),
    	// client_id VARCHAR(10), available INT(1), datacenter VARCHAR(30), ip_address VARCHAR(30),
    	// price VARCHAR(10), server_description VARCHAR(70));


      // mysql_select_db("100tb", $con);

      // $id =  $_POST['id'];
      // $server_id = $_POST['server_id'];
      // $server_name = $_POST['server_name'];
      // $client_id = $_POST['client_id'];
      // $available = $_POST['available'];
      // $datacenter = $_POST['datacenter'];
      // $ip_address = $_POST['ip_address'];
      // $price = $_POST['price'];
      // $server_description = $_POST['server_description'];

      // echo $id;
      //


        $test = $server_name[0];

        // mysqli_query($con, "INSERT INTO servers (id,server_id,server_name,
        //   client_id,available,datacenter,ip_address,price,server_description)
        //   VALUES ('201', '1', 'john', '8789', '0',
        //   'test', 'test', '45', 'test')");

        // mysqli_query($con, "INSERT INTO servers (id,server_id,server_name,
        //   client_id,available,datacenter,ip_address,price,server_description)
        //   VALUES ('201', '1', '$data[0]['server_name']', '8789', '0',
        //   'test', 'test', '45', 'test')");

      echo "<h2>Data Submitted!</h2>";

      // mysqli_close($con);

    ?>

  </body>
</html>
