<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'first_name', 'last_name', 'email', 'option', 'paid', 'token', 'tshirt', 'lighter', 'hat', 'cap'
    ];

    function getPrice() {
        $value = 0;
        if($this->option == 'weekend') {
            $value = $value + 30;
        } else {
            $value = $value + 10;
        }
        if($this->tshirt != "Nein") {
            $value = $value + 20;
        }
        if($this->lighter != 0) {
            $value = $value + $this->lighter * 2;
        }
        if($this->hat != "Nein") {
            $value = $value + 13;
        }
        if($this->cap != "Nein") {
            $value = $value + 18;
        }

        return $value;
    }
}
