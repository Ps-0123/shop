<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'name',
        'content',
        'price',
        'inventory',
        'cover',
    ];


    public function Comments(): HasMany{
        return $this->hasMany(comment::class)->where('status',1);
    }
    function short_content(){
        return Str::limit($this->content,90, '...');
    }
function fa_num()
{
     $number = $this->price;
    for ($i = 0; $i < $len = strlen($number); ++$i) {
        if (isset($j)) {
            $j++;
        }
        switch ($number[$i]) {
            case 0:
                echo "۰";
                break;
            case 1:
                echo "۱";
                break;
            case 2:
                echo "۲";
                break;
            case 3:
                echo "۳";
                break;
            case 4:
                echo "۴";
                break;
            case 5:
                echo "۵";
                break;
            case 6:
                echo "۶";
                break;
            case 7:
                echo "۷";
                break;
            case 8:
                echo "۸";
                break;
            case 9:
                echo "۹";
                break;
        }
        if ($len > 3) {
            if (($len % 3) == 0 && ($i + 1) % 3 == 0 && ($i + 1) != $len) {
                echo ",";
            } else {
                if (($len % 3) == ($i + 1)) {
                    $j = 0;
                }
                if (isset($j)) {
                    if (($j % 3) == 0 && ($i + 1) != $len) {
                        echo ",";
                    }
                }
            }
        }
    }
} 

    public function Cart(){
        return $this->hasMany(Cart::class)->where('user_id',auth()->user()->id);
    }
}
