<?php
/**
 * BoardingCardFactory class in factory pattern.
 */
namespace trip\assets;

use \trip\assets\cards\BoardingCard;
use \Exception;

/**
 * BoardingCardFactory class in factory pattern.
 * Creates a kind of travel card, if card type is not defined then creates an instance of BoardingCard.
 */

abstract class BoardingCardFactory {
    
    /**
     * Creates an instance of a card.
     * @return BoardingCard If $card['type] is not defined then it returns BoardingCard as default.
     * @param array $card
     */
    public static function create($card) {
    
      // if type is not setted then use BoardingCard class.
      if (!isset($card['type'])) {
        return new BoardingCard($card);
      }
      else {
        // then use the type like PlaneCard, BusCard, MetroCard, TaxiCard
        try {
          return new $card['type'] . 'Card';
        }
        catch (Exception $e) {
          throw new Exception($card['type'] . 'Card' . ' class not found! ' . $e);
        }
      }
    }
}
