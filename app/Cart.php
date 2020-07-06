<?php

namespace App;

/**
* Cart 
*/
class Cart
{
	public $items = null;
	public $totalQty =0;
	public $totalPrice =0;
	
	function __construct($oldcart)
	{
		if($oldcart)
		{
			$this->items 	= $oldcart->items;
			$this->totalQty = $oldcart->totalQty;
			$this->totalPrice = $oldcart->totalPrice;
		}
	}

	public function add($item, $id)
	{
		$storedItem = ['qty'=>0, 'price'=>$item->price, 'item'=>$item];
		if($this->items)
		{
			if(array_key_exists($id, $this->items))
			{
				$storedItem =$this->items[$id];
			}
		}
		$storedItem['qty']++;
		$storedItem['price']=$item->price * $storedItem['qty'];
		$this->items[$id]=$storedItem;
		$this->totalQty++;
		$this->totalPrice +=$item->price;
	}

	public function reduceByOne($id)
	{
		$this->items[$id]['qty']--;
		$this->items[$id]['price']-=$this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];

		// if the Qty is zero or less then take the item out of the array
		if($this->items[$id]['qty'] <=0)
		{
			unset($this->items[$id]);
		}
	}

	// Remove the item
	public function removeItem($id)
	{
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -=$this->items[$id]['price'];
		unset($this->items[$id]);
	}
}



?>