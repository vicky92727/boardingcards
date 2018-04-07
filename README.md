# boardingcards
sorting boarding cards to make a conecting trip
[Boarding Card Sort](https://github.com/vivky92727/boardingcard) 
==============================================
Description 
----------------------------------------------
Travel class shorts your unordered boarding cards. 
Each boarding card must have destination and source. 
vehicle, seat, gate members are optional.

### Tools & Technologies used
- PHP > 5.6 used 7.2
- Appache 
- Xampp server /wamp

### Extending class
* You can use CardSort to sort boarding cards.

Files 
----------------------------------------------
    doc
    └── [Documentation]
    index.php
    app
    ├── autoload.php
    └── config
        └── trip
            ├── assets
            │   ├── BoardingCardAbstract.php
            │   ├── BoardingCardFactory.php
            │   ├── cards
            │   │   └── BoardingCard.php
            ├── modules
            │   └── travel
            │       └── Travel.php 
            ├── interfaces
            │   └── SortInterface.php
            └── sorters
                └── CardSort.php

Triggering test from CMD 
----------------------------------------------
$ php index.php


Usage 
----------------------------------------------
### Include autoload file.
    require_once 'app/autoload.php';

### Create four cards
    

    $test_cards = array(
      array(
        'source' => 'Madrid',
        'destination' => 'Barcelona',
        'vehicle' => 'train',
        'seat' => '45B',
        'ticketcounter' => null,
        'gate' => null,
        'vehiclenumber' => '78A'
      ),
      array(
        'source' => 'Barcelona',
        'destination' => 'Gerona Airport',
        'vehicle' => 'Airport Bus',
        'seat' => null,
        'ticketcounter' => null,
        'gate' => null,
        'vehiclenumber' => null
      ),
      array(
        'source' => 'Gerona Airport',
        'destination' => 'Stockholm Airport',
        'vehicle' => 'plane',
        'seat' => '3A',
        'ticketcounter' => 344,
        'gate' => '45B',
        'vehiclenumber' => 'SK455'
      ),
      array(
        'source' => 'Stockholm Airport',
        'destination' => 'New York Airport',
        'vehicle' => 'plane',
        'seat' => '7B',
        'ticketcounter' => null,
        'gate' => 22,
        'vehiclenumber' => 'SK22'
      )
  );

  BoardingCardFactory::create($test_cards[0]);
----------------------------------------------
Please check documentation for more information.

