<?php
$stuff=file_get_contents('http://localhost/social/json.php');

$result = json_decode($stuff);

$data_array = $result->data;

/*for($i=0;$i<count($data_array);$i++)
{
    $data_array[$i]->user->username;

    print($data_array[$i]->images->standard_resolution->url);

}*/
$data_array_result = array();
$index = 0;
$id=0;
if(isset($_GET['from']) && isset($_GET['to'])){
    $id=0;
    $idx=0;
    for($i=$_GET['from'];$i<$_GET['to'];$i++){
        $id++;
        if(	$id >= $_GET['from'] && $id <= $_GET['to']){
            $data_array_result[$index]['username'] = $data_array[$idx]->user->username;
             $data_array_result[$index]['image_url'] = $data_array[$idx]->images->standard_resolution->url;
            $data_array_result[$index]['createdAt'] = $data_array[$idx]->created_time;
            $data_array_result[$index]['text'] = $data_array[$idx]->caption->text;
            $data_array_result[$index]['likes'] = $data_array[$idx]->likes->count;


            $index++;
        }
        $idx++;
    }
}
else if(isset($_GET['limit'])){
    $id=0;
    $idx=0;
    for($i=0;$i<$_GET['limit'];$i++){

        $id++;

        if(	$id <= $_GET['limit']){
            $data_array_result[$index]['username'] = $data_array[$idx]->user->username;
             $data_array_result[$index]['image_url'] =$data_array[$idx]->images->standard_resolution->url;
            $data_array_result[$index]['createdAt'] = $data_array[$idx]->created_time;
            $data_array_result[$index]['text'] = $data_array[$idx]->caption->text;
            $data_array_result[$index]['likes'] = $data_array[$idx]->likes->count;
            $index++;

        }
        $idx++;

    }
}
else{

    $id=0;
    $idx=0;
    foreach($data_array as $j){

        $id++;

        if(	$id <= 5){
            $data_array_result[$index]['username'] = $data_array[$idx]->user->username;
            $data_array_result[$index]['image_url'] = $data_array[$idx]->images->standard_resolution->url;
            $data_array_result[$index]['createdAt'] = $data_array[$idx]->created_time;
            $data_array_result[$index]['text'] = $data_array[$idx]->caption->text;
            $data_array_result[$index]['likes'] = $data_array[$idx]->likes->count;
            $index++;
        }
        $idx++;

    }


}

echo json_encode($data_array_result);



?>
