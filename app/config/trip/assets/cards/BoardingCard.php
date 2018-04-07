<?php
/**
 * The class uses for creating a card to use of passanger
 */

namespace trip\assets\cards;

use \trip\assets\BoardingCardAbstract as BoardingCardAbstract;

/**
 * The class uses for creating a card to use of passanger
 */

class BoardingCard extends BoardingCardAbstract
{
  
  public $source;
  public $destination;
  public $seat;
  public $gate;
  public $vehicle;
  public $ticketcounter;
  public $vehiclenumber;
  function __construct(array $card)
  {
        $this->setSource($card['source']);
        $this->setDestination($card['destination']);
        $this->setSeat($card['seat']);
        $this->setGate($card['gate']);
        $this->setTicketcounter($card['ticketcounter']);
        $this->setVehicle($card['vehicle']);
        $this->setVehiclenumber($card['vehiclenumber']);

  }

  public function getSource() {
        return $this->source;
    }

    public function setSource($source) {
        $this->source = $source;
    }

    public function getDestination() {
        return $this->destination;
    }

    public function setDestination($destination) {
        $this->destination = $destination;
    }    

    public function getVehiclenumber() {
        return $this->vehiclenumber;
    }

    public function setVehiclenumber($vehiclenumber) {
        $this->vehiclenumber = $vehiclenumber;
    }    

    public function getSeat() {
        return $this->seat;
    }

    public function setSeat($seat) {
        $this->seat = $seat;
    }  

    public function getVehicle() {
        return $this->vehicle;
    }

    public function setVehicle($vehicle) {
        $this->vehicle = $vehicle;
    } 


    public function getGate() {
        return $this->gate;
    }

    public function setGate($gate) {
        $this->gate = $gate;
    }    

    public function getTicketcounter() {
        return $this->ticketcounter;
    }

    public function setTicketcounter($ticketcounter) {
        $this->ticketcounter = $ticketcounter;
    }

}
