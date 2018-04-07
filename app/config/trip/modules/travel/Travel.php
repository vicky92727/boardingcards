<?php
/**
 * Travel class.
 * Sorts a stack of Cards to make a trip in correct order.
 */

namespace trip\modules\travel;

use \trip\sorters\CardSort as CardSort;
use \trip\assets\BoardingCardAbstract;
use \Exception;

/**
 * Create more than one Card class.
 * You could able to order the trip cards by calling sortCards() method.
 * @param array $cards An array of the Card class.
 */
class Travel {
  
  /**
   * An unordered array of Card class.
  */
  public $cards = null;
  
  
  /**
   * Constructor of the Travel
   * @param array $cards An array of unsorted boarding cards.
   * @return Travel 
   */
  function __construct($cards) {
    $this->setCards($cards);
    return $this;
  }
  

  
  /**
   * returns an array of boarding cards.
   */
  public function getCards() {
    return $this->cards;
  }
  
  /**
   * Setter for cards
   * @param array $cards an unsorted array of cards.
   * @return Travel
   */
  public function setCards(array $cards){
    
    foreach ($cards as $card) {
      if (!$card instanceof BoardingCardAbstract) {
        throw new Exception("Cards should be an instance of BoardingCardAbstract class");
      }
    }
    
    $this->cards = $cards;
    return $this;
  }
  
  
  /**
   * Sorts cards as ascended
   * @return Card
   */
  public function sortCards() {
    $this->cards = CardSort::sort($this->cards);
    return $this;
  }
}