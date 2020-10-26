<?php 


function idsgenerator($productdetail){
$ids=[];
    foreach($productdetail as $sub){
        array_push($ids,$sub['id']);
    };
return $ids;
};
