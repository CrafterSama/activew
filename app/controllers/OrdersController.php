<?php

class OrdersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin.orders');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	public function agreeBasket()
	{
		$order = new Order();
		$order->user_id = Input::get('user_id');
		$order->product_id = Input::get('product_id');
		if($order->save())
		{
		    $orderId = Order::orderBy('id','DESC')->first();
		    //var_dump($orderId);
    		$toOrder = new ProdToOrder();
		    $toOrder->product_id = Input::get('product_id');
		    $toOrder->quantities = Input::get('quantities');
		    $toOrder->order_id = $orderId->id;
		    $toOrder->save();
		    $product = Product::find(Input::get('product_id'));
		    $qtyUpdate = $product->amounts - Input::get('quantities');
		    $product->amounts = $qtyUpdate;
		    $product->save();
		}
		
		return Redirect::back()->with('notice', 'Producto agregado a la Cesta');
	}
	public function showBasket()
	{
		$id = Auth::user()->id;
		$orders = Order::where('user_id','=',$id)->get();

		return View::make('home.orders')->with('orders',$orders);
	}
}
