<?php

namespace Less\Node;

class Anonymous
{
    public $value;

    public function __construct($value)
    {
        $this->value = is_string($value) ? $value : $value->value;
    }

    public function toCss()
    {
        return $this->value;
    }

    public function compile($env)
    {
        return $this;
    }

    function compare($x){
		if( !method_exists( $x, 'toCSS' ) ){
            return -1;
        }

        $left = $this.toCSS();
        $right = $x.toCSS();

        if( $left === $right ){
            return 0;
        }

        return $left < $right ? -1 : 1;
    }
}
