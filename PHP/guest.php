<?php

include "Guest.class.php";

//### Usage for single entity ###
$guest=array('name'=>'Peter', 'address'=>'new hyde park, new york', 'phone'=>'9871123456', 'email'=>'peter@example.com');
$objGuest=new Guest('localhost', 'root', '', 'guest_records');
$objGuest->addGuest($guest);


//### Usage for multiple entity ###
$guests=array(
    array('name'=>'Peter1', 'address'=>'new hyde park, new york', 'phone'=>'9871123456', 'email'=>'peter@example.com'),
    array('name'=>'Peter2', 'address'=>'new hyde park, new york', 'phone'=>'9871123456', 'email'=>'peter@example.com'),
    array('name'=>'Peter3', 'address'=>'new hyde park, new york', 'phone'=>'9871123456', 'email'=>'peter@example.com'),
    array('name'=>'Peter4', 'address'=>'new hyde park, new york', 'phone'=>'9871123456', 'email'=>'peter@example.com')
);
$objGuest=new Guest('localhost', 'root', '', 'guest_records');
$objGuest->addGuests($guests);