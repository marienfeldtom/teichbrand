<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'first_name', 'last_name', 'email', 'option', 'paid', 'token', 'tshirt'
    ];

    function getPrice() {
        $value = 0;
        if($this->option == 'weekend') {
            $value = $value + 30;
        } else {
            $value = $value + 5;
        }
        if($this->tshirt != "Nein") {
            $value = $value + 20;
        }

        return $value;
    }
}
