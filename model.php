<?php
/*
function fkRowIn($mdbInfo,$table,$fkV){
    $i=0;    
    $dbKey=array('db'=>'RDMS');
    $dbif=find_one($mdbInfo,$dbKey);
    $dbif = json_decode(json_encode($dbif), true);

    foreach($dbif['tableNames'] as $index => $value){
        if ($value!=$table){
            $newKey=array('tableInfo'=>$value);
            $newtbif=find_one($mdbInfo,$newKey);
            $newtbif = json_decode(json_encode($newtbif), true);
            if($newtbif['fkNo']>0){
                foreach($newtbif['fkTable'] as $fktindex => $fktvalue){
                    if($fktvalue==$table){
                        $newfkC=$newtbif['fkName'][$fktindex];
                        $findFK=array('tableName'=>$value,$newfkC=>$fkV);
                        if(find_one($mdbInfo,$findFK))$i=1; 
                    }
                }
            }
        }
    }
    return $i;
}


/*
require_once('fun.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"></style>
    <title>Document</title>
</head>
<body>
<h2>A basic HTML table</h2>

<?php
if (isset($_POST['sub'])) {
    var_dump($_POST);
    
    
}else {




/*?>
<div hidden id='murl'><?php echo $murl;?></div>
<div hidden id='coll'><?php echo $coll;?></div>
<div hidden id='doc'><?php echo $doc;?></div> <?php




$selectedTable='users';
$mdbInfo['txtMurl']="mongodb://localhost:27017";
$mdbInfo['document']='newdb';
$mdbInfo['collection']='collone';
//$colldb=$mdbInfo['document'].'.'.$mdbInfo['collection'];
$i=0;
$key=array('tableInfo'=>$selectedTable);
$re=find_one($mdbInfo,$key);
?>
<div hidden id='tbName'><?php echo $selectedTable;?></div> 
<div hidden id='tableInfo'><?php echo json_encode($re); ?></div><?php
//$columnNames=$re->columnNames;
//var_dump($columnNames);
/*if($re['rowNo']==0){
    echo 'no Data';
}else{
    $key=array('tableName'=>$selectedTable);
    $rows=query($mdbInfo,$which);
    $count=0;
    foreach($rows as $ret){
        //echo $ret->tableName;
        ?><div hidden id='<?php echo $selectedTable.$count; ?>'><?php echo json_encode($ret); ?></div><?php
        $count=$count+1;
    }
}?>


<div id='seeTable'>
<table style="width:50%">
  <tr><?php 
    for ( $i = 0; $i < $re['columnNo']; $i++) {
        ?><th><?php echo $re['columnNames'][$i]; ?></th><?php
    }
  ?>
  </tr><?php
  if($re['rowNo']!=0){
    $key=array('tableName'=>$selectedTable);
    $rows=query($mdbInfo,$which);
    $count=0;
    foreach($rows as $ret){
        //echo $ret->tableName;
        ?><tr><?php
        for ( $j = 0; $j < $re['columnNo']; $j++) {
            ?><td><?php echo $ret[$re['columnNames'][j]]; ?></td><?php
        }
        $count=$count+1;
    ?></tr><?php
    }
}?>
  <tr>
  <form action=""  method="POST">
  <?php 
    for ( $i = 0; $i < $re['columnNo']; $i++) {
        ?><th><input type="text" id="fname" name=<?php echo $re['columnNames'][$i]; ?> value=""></th><?php
    }?>
    <td><input type="submit" name="sub" value="Add"></td>
</form> 
  </tr>
</table>
</div>
    <?php } ?>
    </body>
</html>
<?php

/*foreach($return->tableNames as $z => $z_value) {
    $keyTbNm=array('tableName'=>$z_value);
    $colldb=$doc.'.'.$coll;
    $options= [];
    $query = new MongoDB\Driver\Query($keyTbNm, $options);
    $rows = $manager->executeQuery($colldb, $query);
    $count=0;
    foreach($rows as $ret){
        echo $ret->tableName;
        ?><div hidden id='<?php echo $z_value.$count; ?>'><?php echo json_encode($ret); ?></div><?php
        $count=$count+1;
    }

    //echo '</script>';
    
    echo "<br>";
    echo "Table-" . $z+1 . ":". $z_value;
    ?><div hidden id='<?php echo $z_value.'rowCount'; ?>'><?php echo $count;?></div>
    <a href="#">
        <img id='<?php echo $z;?>' name='<?php echo $z_value;?>' class='smallButton see' src='img/see2.png'>
    </a>
<?php
            
        }


/*require_once('fun.php');
function form($sec,$post) {
    var_dump($post);
    echo $colm;
    for($i=0;$i<$colm;$i++){

        $columnNames[$i]=$post['columnNames_'.$i];
        echo $columnNames[$i];
        echo "<br>";
        $type[$i]=$post['type_'.$i];
        if(isset($post['nl_'.$i]))$nl[$i]=1;
        else $nl[$i]=0;

        if(isset($post['pk_'.$i])){
            if(!isset($pk))
                {$pk=$columnNames[$i]; echo $pk;}
            else
                {$out='pkc1';break;}
            if($nl[$i]==0){$out='nlc';break;}
        }
        if(isset($post['ai_'.$i])){
            if(!isset($ai))
                $ai=$columnNames[$i];
            else
                {$out='aic1';break;}
            if($ai!=$pk){$out='aic2';break;}
            elseif($type[$i]!='Int'){$out='aic3';break;}
        }
    }
    if(isset($out)) return $out;
    elseif(!isset($pk)) return 'pkc2';
    
    else{
        $ret['columnNames']=$columnNames;
        $ret['type']=$type;
        $ret['nl']=$nl;
        $ret['pk']=$pk;
        $ret['ai']=$ai;
        return $ret;
    } 

    }




       
/*}
/*
echo "i am here";
echo "<br>";
$sec['txtMurl']='mongodb://localhost:27017';
$sec['collection']='collone';
$sec['document']='stmdb';
$key=array('db'=>"RDMS");
$sec ['tbData'] ['tableInfo']='Omar';
$re=find_one($sec,$key);
var_dump($re);
$data = array( 
    $re->tableNo+1 => $sec ['tbData'] ['tableInfo']);
if($re->tableNo==0){
$re->tableNames=$data;
}
else{
    $ary=$re->tableNames;
    $myArray = json_decode(json_encode($ary), true);
    $myArray=array_merge($myArray,$data);
    $re->tableNames=$myArray;

}
$re->tableNo =$re->tableNo+1;
var_dump($re);
/*$delret=del($sec,$key);
if(isset($delret)){
    $retval=create($sec,$re);
    if(isset($retval))echo 'The Table has been created successfully';}

/*$key=array('tableInfo'=>"users");
$re=find_one($sec,$key);

var_dump($re);
$f=$re->names;
echo $f['1'];


/*$data = array( 
    '0' => 'Arad',
   '1' => 'rony',
   '2' => 'Ripa'
 );

 $re->names=$data;
unset($re->_id);
 $retval=create($sec,$re);
 if(isset($retval))echo 'The Table has been created successfully';

/*
$enre = json_encode($re);


 $data = array( 
    '0' => 'Arad',
   '1' => 'rony',
   '2' => 'Ripa'
 );
 $new=array('tableNames'=>$data);
 $newen = json_encode($new);
$enre.=$newen;
print_r($enre);
$re=json_decode($enre);
// array_push($re,$new);
var_dump($re);
/*
*/




//print_r($re);
/*foreach($re as $doc) {
foreach($doc as $z => $z_value) {
    echo "Key=" . $z . ", Value=" . $z_value;
    echo "<br>";
}}
/*if(isset($re))
{if($re==TRUE){
    
   
elseif ($re==FALSE) echo 'False';
else echo $re;
/*}
else echo 'No';*/
?>
