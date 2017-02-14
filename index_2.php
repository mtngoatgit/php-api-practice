<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>100TB Skills Assessment #2</title>
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

    $response = $client->get('testServers');
    $data = $response->getBody();
    $data = json_decode($data, true);
    $descriptions = array_filter($data, function($description){
      return $description['server_description'] == 'description';
    });

    ?>

    <div>
        <div class="task__section">
            <h2>All Data Retrieved and Manipulated (Task 2.a)</h2>
            <?php
              foreach($data as $datum){
                if($datum['available'] == 1){
                  $datum['available'] = 'Yes';
                  echo "<div class='grouping'>
                    <div class='line-item'><span>ID:</span> {$datum["server_id"]}</div>
                   <div class='line-item'><span>Datacenter:</span> {$datum["datacenter"]}</div>
                   <div class='line-item'><span>Available?</span> {$datum["available"]}</div>
                   </div>";
                }
              }
             ?>
        </div>
    </div>

    <div>
        <div class="task__section">
            <h2>Items displayed according to "available" property(Task 2.b)</h2>
            <?php
              foreach($data as $datum){
                if($datum['available'] == 1){
                  $datum['available'] = 'Yes';
                  echo "<div class='grouping'>
                    <div class='line-item'><span>ID:</span> {$datum["server_id"]}</div>
                   <div class='line-item'><span>Datacenter:</span> {$datum["datacenter"]}</div>
                   <div class='line-item'><span>Available?</span> {$datum["available"]}</div>
                   </div>";
                }
              }
             ?>
        </div>
    </div>


    <div>
        <div class="task__section">
            <h2>Items Arranged by availability of server_description (Task 2.c)</h2>
            <?php
            if(isset($_POST['formSubmit']) )
            {
            $serverSelect = $_POST['description-form'];
            $errorMessage = "You didn't make a selection.";
            }
             ?>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
              Select Server Description:
              <select name="description-form">
              <option value="">Select...</option>
              <option value="Jump server hosted in 100TB datacenter">Jump server hosted in 100TB datacenter</option>
              <option value="Production server - don't touch!">Production server - don't touch!</option>
              <option value="QA Server (oooh scary!)">QA Server (oooh scary!)</option>
              <option value="Load Balancer">Load Balancer</option>
              <option value="DB Master">DB Master</option>
              <option value="DB Slave">DB Slave</option>
              <option value="Monitoring server">Monitoring server</option>
              <option value="We don't spam">We don't spam</option>
              <option value="Backups for when things go wrong">Backups for when things go wrong</option>
              <option value="Available server">Available server</option>
              </select>
              <input type="submit" name="formSubmit" value="Submit" >
            </form>
            <?php

              function server_description($user_input){
                $client = new Client([
                  'base_uri' => 'https://devassess.100tb.com/',
                  'timeout' => 2.0
                ]);

                $response = $client->get('testServers');
                $data = $response->getBody();
                $data = json_decode($data, true);

                foreach($data as $datum) {
                  if($user_input == $datum['server_description']){
                    echo "<div class='grouping'>
                      <div class='line-item'><span>ID:</span> {$datum["server_id"]}</div>
                     <div class='line-item'><span>Name:</span> {$datum["server_name"]}</div>
                     <div class='line-item'><span>Description:</span> {$datum["server_description"]}</div>
                     </div>";
                  }
                }
              }
              server_description($serverSelect);
            ?>
              <!-- <?php
              foreach($descriptions as $description){
                echo "<div class='grouping'>
                  <div class='line-item'><span>ID:</span> {$description["server_id"]}</div>
                 <div class='line-item'><span>Name:</span> {$description["server_name"]}</div>
                 <div class='line-item'><span>Description:</span> {$description["server_description"]}</div>
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
                    ?> -->
        </div>
    </div>

  </body>
</html>
