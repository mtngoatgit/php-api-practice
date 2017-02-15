<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>100TB Skills Assessment #2</title>
    <link rel="stylesheet" href="/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400,700" rel="stylesheet">
  </head>
  <body>

    <!-- MYSQL QUERY TO CREATE NEW TABLE:
      CREATE TABLE servers (id INT(10), server_id VARCHAR(20), server_name VARCHAR(20),
      client_id VARCHAR(10), available INT(1), datacenter VARCHAR(30), ip_address VARCHAR(30),
      price VARCHAR(10), server_description VARCHAR(70)); -->

    <?php
    $configs = include('config.php');
    require './vendor/autoload.php';
    use GuzzleHttp\Client;

    $client = new Client([
      'base_uri' => 'https://devassess.100tb.com/',
      'timeout' => 5.0
    ]);

    $response = $client->get('testServers');
    $data = $response->getBody();
    $data = json_decode($data, true);

    $con = mysqli_connect($configs->host,$configs->username,$configs->pass,$configs->db);

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

      $sql = "INSERT INTO servers (id,server_id,server_name,
        client_id,available,datacenter,ip_address,price,server_description)
        VALUES ('$id','$s_id','$s_name','$c','$a','$d','$ip','$p','$sd')";

      mysqli_query($con, $sql);
    }

      echo "<h2>Data Submitted!</h2>";

      mysqli_close($con);

    ?>

  </body>
</html>
