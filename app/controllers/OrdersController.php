<?php

class OrdersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$items = Item::orderBy('id','=','desc')->paginate(10);
		return View::make('admin.orders')->with('items', $items);
	}
	public function approveOrder($id)
	{
		$approved = Item::where('factura_id','=',$id);

		$approved->delete();

		return Redirect::back()->with('notice','El Pedido ha sido aprobado y entregado satisfactoriamente');
	}
	public function approved()
	{
		$items = Item::onlyTrashed()->orderBy('created_at','desc')->paginate(10);
		return View::make('admin.approved')->with('items', $items);
	}
	public function cancelOrder($id)
	{
		$item = Item::find($id);
		//print_r($item);
		$product = Product::find($item->producto_id);
		//print_r($product);/*
		$product->amounts = $item->cantidad + $product->amounts;
		if($product->save())
		{
			$item->forceDelete();
			return Redirect::back()->with('notice','Los Productos fueron devueltos a stock y el pedido cancelado');
		}
		else
		{
			return Redirect::back()->with('notice','El pedido no pudo ser cancelado');
		}

	}
}
