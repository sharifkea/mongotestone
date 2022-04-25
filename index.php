<?php
require_once __DIR__.'/mongo.php';
$db = $client->testdb->collone;/* Mongodb 
					$insertOneResult = $db->insertOne([
					'id' =>$last_id,
					'username' => $username,
					'email' => $email,
					'password' => md5($password),
					]);*/
                    $key=array('User'=>'Abul');
                    //$db = $client->$mdb->$coll;
                    $document = $db->findOne($key);  
                    if(isset($document)){
                       // $connect_error = False;
                        echo 'table is  there.';
                        //if($document['tableNo']!=0){
                           // $this->table=$document['tableNames'];}
                      
                    }
                    else echo 'not connected.';
                    ?>