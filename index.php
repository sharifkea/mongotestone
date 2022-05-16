<?php
  session_start();
  require_once __DIR__ . '/vendor/autoload.php';
  if(isset($_SESSION['txtMurl'])){
    header('Location: home.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <title>login</title>
  </head>
  <body>
      <header>
          <h1>Welcome to Relational MongoDB</h1>
      </header>	
<?php
        if (isset($_POST['txtMurl'])){
          $txtMurl=$_POST['txtMurl'];
          try {
            $client = new MongoDB\Client($_POST['txtMurl']);
            $dk=$client->listDatabases();
            $i=0;
            foreach ($dk as $item) {
            $dbNames[$i]= $item->getName();
            $i=$i+1;
            $_SESSION['Murl']=$txtMurl;
            }
?>
            <div class="form-doc">
              <form action="" method="POST" name="login" >
                <label for="MongoDBURL">MongoDB URL:<?php echo $txtMurl; ?></label><br>
                <label for="doc">Select a Document:</label>
                <select name="document">
                  <option value="">--Select--</option>
                  <?php
                    for ($z = 0; $z <$i; $z++){
                  ?>
                  <option value="<?php echo $dbNames[$z]?>"  <?php if(isset($_POST['document']) && $_POST['document']==$dbNames[$z]) { ?>selected<?php  } ?>><?php echo $dbNames[$z]?></option>
                  <?php }?>
                </select>
                <input name="submitDoc" id='doc' type="submit" value="SUBMITE" tabindex="2">
              </form>
            </div>
<?php 

          }
          catch(Exception $e) {
            
            echo 'Error:'.$e;
            ?><br><a class=""  href='logout.php'>Try Again</a><?php
          }
        }else if(isset($_POST['document'])){
            unset($client);
            $doc=$_POST['document'];
            $client = new MongoDB\Client($_SESSION['Murl']);
            $db = $client->$doc;
            $colls = $db->listCollections();
            $i=0;
            foreach ($colls as $item) {
            $collNames[$i]= $item->getName();
            $i=$i+1;
            $_SESSION['document']=$_POST['document'];
            }
?>
            <div class="form-coll">
              <form action="" method="POST" name="login" >
                <label for="MongoDBURL">MongoDB URL:<?php echo $_SESSION['Murl']; ?></label><br>
                <label for="doc">Selected Document:<?php echo $_SESSION['document']; ?></label><br>
                <label for="coll">Select a Collection:</label>
                <select name="collection">
                  <option value="">--Select--</option>
                  <?php
                    for ($z = 0; $z <$i; $z++){
                  ?>
                  <option value="<?php echo $collNames[$z]?>"  <?php if(isset($_POST['collection']) && $_POST['collection']==$collNames[$z]) { ?>selected<?php  } ?>><?php echo $collNames[$z]?></option>
                  <?php }?>
                </select>
                <input name="submitColl" id='col' type="submit" value="SUBMITE" tabindex="2">
              </form>
            </div>
<?php 
            }else if (isset($_POST['collection'])){
            $coll=$_POST['collection'];
            $doc=$_SESSION['document'];
            //require_once __DIR__ . '/vendor/autoload.php';
            $client = new MongoDB\Client($_SESSION['Murl']);
            $db = $client->$doc->$coll;
            $returnMdb = $db->findOne();
            if(isset($returnMdb)){
              $key=array('db'=>"RDMS");
              $returnRDMS = $db->findOne($key);
              if(isset($returnRDMS)){
                $_SESSION['collection']=$_POST['collection'];
                $_SESSION['txtMurl']=$_SESSION['Murl'];
                $_SESSION['empty']=false;
                $_SESSION['mdbInfo']['txtMurl']=$_SESSION['txtMurl'];
                $_SESSION['mdbInfo']['collection']=$_SESSION['collection'];
                $_SESSION['mdbInfo']['document']=$_SESSION['document'];
                $_SESSION['mdbInfo']['empty']=$_SESSION['empty'];
                header('Location: home.php');
              }else {
                echo 'The Collection is not Empty or not configured with RDMS.';
                ?><br><a class="out"  href='logout.php'>Try Again</a><?php
              } 
          }
              else {
                $_SESSION['collection']=$_POST['collection'];
                $_SESSION['txtMurl']=$_SESSION['Murl'];
                $_SESSION['empty']=true;
                $_SESSION['mdbInfo']['txtMurl']=$_SESSION['txtMurl'];
                $_SESSION['mdbInfo']['collection']=$_SESSION['collection'];
                $_SESSION['mdbInfo']['document']=$_SESSION['document'];
                $_SESSION['mdbInfo']['empty']=$_SESSION['empty'];
                header('Location: home.php');
              }
          
       /* $db = $client->$doc->$coll;
        
        try {
            $returnMdb = $db->findOne();
            if(isset($returnMdb)){
                echo 'table is  there.';
                $_SESSION=$_POST; 
                header('Location: home.php');
            }
            else {
              echo 'Not connected to Database.';
              ?><br><a class=""  href='logout.php'>Try Again</a><?php
            }
          } catch(Exception $e) {
            
            echo 'Error:'.$e;
            ?><br><a class=""  href='logout.php'>Try Again</a><?php
          }
        
        
          
          
          
          
           /* if($_POST['txtEmail']=='admin@kea.dk'){
            $curl = curl_init();
            curl_setopt_array(
              $curl, array(
            CURLOPT_URL => 'http://localhost/music-api-testing/admin',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET',));
            $response = curl_exec($curl);
            curl_close($curl);
            $obj = json_decode($response, true);
            $pass=$obj['admin'][0]['Password'];
            if(password_verify($_POST['password'], $pass)){   
              $_SESSION['Name']='Admin';
              $_SESSION['Password']=$pass;
              $_SESSION['Email']='admin@kea.dk';
              $_SESSION['UserId']=-1;
              header('Location: home.php');
            }else{
              echo "<div>
                      <p>User Password is incorrect.</p>
                      <p><a href='index.php'>Try Again</a></p>
                      <p><a href='registration.php'>For Register </a></p> 
                    </div>";
            }
          }else{
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost/music-api-testing/customer/'.$_POST['txtEmail'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET',));
            
            $response = curl_exec($curl);
            curl_close($curl);
            $obj = json_decode($response, true);
            if($obj['customer']['return']==false){
              echo "<div>
                      <p>User Email address is incorrect.</p>
                      <p><a href='index.php'>Try Again</a></p>
                      <p><a href='registration.php'>For Register </a></p>
                    </div>";
            }else{
              $pass=$obj['customer']['Password'];
              if(password_verify($_POST['password'], $pass)){   
                foreach($obj['customer'] as $key => $value) {
                  $_SESSION[$key]=$value;
                }$_SESSION['UserId']=$_SESSION['CustomerId'];
                $_SESSION['Name']=$_SESSION['FirstName'].' '.$_SESSION['LastName'];
                header('Location: home.php?login=Success');
              }else{
                echo "<div>
                        <p>Password is incorrect.</p>
                        <p><a href='index.php'>Try Again</a></p>
                        <p><a href='registration.php'>For Register </a></p>
                    </div>";
              }
            }
          }*/
        }else{
      ?>
      
        <main>
          <p1># Add password in url if needed.</p1> 
          <div class ="form">
              <form action="" method="POST" name="login" >
                  <input id="murl" placeholder="MongoDB URL" type="text" name="txtMurl"  required tabindex="1">
                  <input name="submitMongo" id='smdb' type="submit" value="SUBMIT" tabindex="2">
              </form>
              
          </div>
          
          
          
        </main>

        <?php 
        }
        include_once('footer.php');?>

      
      
      

