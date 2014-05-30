<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/30/14
 * Time: 6:58 PM
 */



    // Declare a simple class
    class ToString{

        public $string;

        public function __construct( $object )
        {
            $this->string = $object;
        }

        public function __toString()
        {
            return $this->string;
        }
    }