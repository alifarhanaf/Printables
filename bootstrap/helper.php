<?php 


function idsgenerator($productdetail){
$ids=[];
    foreach($productdetail as $sub){
        array_push($ids,$sub['id']);
    };
return $ids;
};

const AWAITING_DESIGN = 1;
const IN_PROCESS = 2;
const PACKEGED = 3;
const DELIVERED = 4;
const CLOSED = 5;

