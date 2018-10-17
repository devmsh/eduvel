<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // For Shopping Cart
	// V #8 :: https://www.youtube.com/watch?v=4J939dDUH4M
    // V #9 :: https://www.youtube.com/watch?v=L_5BZKe0Ab4
    // V #10 :: https://www.youtube.com/watch?v=jNWDrw3vRU4
    // V #11 :: https://www.youtube.com/watch?v=dGkQwBWel4Q
    // V #12 :: https://www.youtube.com/watch?v=bu0J-j5qYas #Return Show Vedio
    // V #13 :: https://www.youtube.com/watch?v=6u2xVBgaRb0
    // V #14 :: https://www.youtube.com/watch?v=9VxiFhl6e8o
    // V #15 :: https://www.youtube.com/watch?v=2LDcnkQLwp8&list=PL55RiY5tL51qUXDyBqx0mKVOhLNFwwxvH&index=16
    // V #16 :: https://www.youtube.com/watch?v=UlGZY15ter4&index=17&list=PL55RiY5tL51qUXDyBqx0mKVOhLNFwwxvH
    
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart){
    	
    	if ($oldCart){
    		$this->items = $oldCart->items;
    		$this->totalQty = $oldCart->totalQty;
    		$this->totalPrice = $oldCart->totalPrice;
    	}
    }

    public function add($item, $id){
    	$storedItem = ['qty' => 0, 'price' => ($item->course_price - $item->course_discount_price), 'item' => $item];
    	if ($this->items) {
    		if (array_key_exists($id, $this->items)) {
    			$storedItem = $this->items[$id];
    		}
    	}
    	$storedItem['qty']++;
    	$storedItem['price'] = ($item->course_price - $item->course_discount_price) * $storedItem['qty'];
    	$this->items[$id] = $storedItem;
    	$this->totalQty++;
    	$this->totalPrice += ($item->course_price - $item->course_discount_price);
    }

    public function reduceByOne($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];

        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    public function removeItem($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['item']['price'];
        unset($this->items[$id]);
    }

    public function addCoupon($id, $coupon){

        $this->items[$id]['price'] - $coupon;
        $this->items[$id]['price'] = $this->items[$id]['price'] - $coupon;

        // $this->items[$id]['price'] - $coupon;
        // // $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        // $this->totalPrice - $coupon;
        // // $this->totalPrice -= $this->items[$id]['item']['price'];

        // if ($this->items[$id]['qty'] <= 0) {
        //     unset($this->items[$id]);
        // }

    }

}
