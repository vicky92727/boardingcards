<?php
/**
 * main file to run for sorting boarding cards.
 */
  
  /**
   * Include autoload file to initialize boarding card sorter.
   */
   echo PHP_EOL . 'Trip Sort Mechanism start here ,waiting for test to pass [x]' . PHP_EOL;
   
  require_once __DIR__ . '/app/autoload.php';
  
  /**
   * Classes to use in this context.
   */
  use \trip\assets\BoardingCardFactory;
  use \trip\assets\BoardingCardAbstract;
  use \trip\modules\travel\Travel;
  
 
  /**
   * Tickets an array of Cards.
   */
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
  
  $tickets = array();
  foreach ($test_cards as $t) {
    array_push($tickets, BoardingCardFactory::create($t));
  }
  
  echo PHP_EOL . '- Boarding Cards tests:' . PHP_EOL;
  
  if (!is_array($tickets)) {
      throw new Exception("Tickets should be an array which contains a kind of Card object by extending BoardingCardAbstract");
    }

    foreach ($tickets as $key => $ticket) {
      if ($ticket instanceof BoardingCardAbstract) {
          echo 'PASS: ' . $ticket->source . ' to ' . $ticket->destination . ' card should extends BoardingCardAbstract' . PHP_EOL;
      }
      else {
          throw new Exception($ticket->source . ' to ' . $ticket->destination . ' card should extends BoardingCardAbstract');
      }
    }
  
  /**
   * Create a Travel class and sort boarding cards.
   * Boarding cards should be in correct order 
   */
   
  $travel = new Travel($tickets);
  $route = $travel->sortCards()->getCards();
  

  echo PHP_EOL . '- Order test result for boarding cards:' . PHP_EOL;
  
  for ($i=0; $i < count($route); $i++) { 
      
      $next = isset($route[$i+1]) ? $route[$i+1]->source : $route[$i]->destination;
      
    if ($route[$i]->destination == $next) {

      if ($route[$i]->vehicle == 'train' || $route[$i]->vehicle == 'Airport Bus') {
        echo "Take ".$route[$i]->vehicle." ".$route[$i]->vehiclenumber." from ".$route[$i]->source." to ". $route[$i]->destination .". Sit in seat ".$route[$i]->seat.".";
      } elseif($route[$i]->vehicle == 'plane') {
        echo "From ". $route[$i]->source .", take ".$route[$i]->vehicle." ".$route[$i]->vehiclenumber." to ". $route[$i]->destination .". Gate ". $route[$i]->gate .", seat ". $route[$i]->seat .".
Baggage drop at ticket counter ". $route[$i]->ticketcounter .".";
echo PHP_EOL;
      } else {
        echo 'PASS: ' . $route[$i]->source . ' to ' . $route[$i]->destination . ' by ' . $route[$i]->vehicle;
        echo ($route[$i]->gate) ? ', gate ' . $route[$i]->gate : '';
        echo ($route[$i]->seat) ? ', seat ' . $route[$i]->seat : '';
        echo PHP_EOL;      }
    }
    else {
        echo 'ERROR: ' . $route[$i]->source . ' to ' . $route[$i]->destination . ' by ' . $route[$i]->vehicle;
        echo ($route[$i]->gate) ? ', gate ' . $route[$i]->gate : '';
        echo ($route[$i]->seat) ? ', seat ' . $route[$i]->seat : '';
        echo PHP_EOL;
    }
    if ($i == count($route) -1 ) {
      echo 'PASS: You arrived to final destination.' . PHP_EOL;
      break;
    }
  }
