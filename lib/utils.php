<?php
namespace lib;

/**
 * Description of newPHPClass
 *
 * @author charleshenzel
 */
class utils 
{
    static public function camelize($scored,$ucFirst=true) 
    {
        if($ucFirst)
        {
            return ucfirst(
              implode(
                '',
                array_map(
                  'ucfirst',
                  array_map(
                    'strtolower',
                    explode(
                      '_', $scored)))));
        }
        else
        {
            return lcfirst(
              implode(
                '',
                array_map(
                  'ucfirst',
                  array_map(
                    'strtolower',
                    explode(
                      '_', $scored)))));
        }
    }
    
  /**
  * Transforms a camelCasedString to an under_scored_one
  */
  function underscore($cameled) {
    return implode(
      '_',
      array_map(
        'strtolower',
        preg_split('/([A-Z]{1}[^A-Z]*)/', $cameled, -1, PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_NO_EMPTY)));
  }
}