### Usage for single entity ###
$guest=array('name'=>'Peter', 'address'=>'new hyde park, new york', 'phone'=>'9871123456', 'email'=>'peter@example.com');
$objGuest=new Guest('localhost', 'root', '', 'guest_records');
$objGuest->addGuest($guest);


### Usage for multiple entity ###
$guests=array(
    array('name'=>'Peter1', 'address'=>'new hyde park, new york', 'phone'=>'9871123456', 'email'=>'peter@example.com'),
    array('name'=>'Peter2', 'address'=>'new hyde park, new york', 'phone'=>'9871123456', 'email'=>'peter@example.com'),
    array('name'=>'Peter3', 'address'=>'new hyde park, new york', 'phone'=>'9871123456', 'email'=>'peter@example.com'),
    array('name'=>'Peter4', 'address'=>'new hyde park, new york', 'phone'=>'9871123456', 'email'=>'peter@example.com')
);
$objGuest=new Guest('localhost', 'root', '', 'guest_records');
$objGuest->addGuests($guests);


### Database Schema needs to be imported ###
CREATE DATABASE guest_records;
USE guest_records;
CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `guest_name` varchar(255) NOT NULL,
  `guest_address` text NOT NULL,
  `guest_phone` varchar(20) NOT NULL,
  `guest_email` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

