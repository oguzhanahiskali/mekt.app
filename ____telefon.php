<?php

function PhoneConvert($num){
    $to = sprintf("+90 %s %s %s",
                  substr($num, 0, 3),
                  substr($num, 3, 3),
                  substr($num, 6, 5));
    
                  return $to;
}

PhoneConvert("5052851166");