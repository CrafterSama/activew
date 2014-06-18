<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showIndex');
	|
	*/
		/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('home.index');
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
	public function showIndex()
	{
		/*$posts = Post::all();
		
		if(is_null($posts))
		{*/
	
		/*}
		else
		{
			return View::make('home.index')->with(array('posts',$posts));
		}*/
		
	}

	public function showProducts()
	{
		$products = Product::where('amounts','!=','0')
		  ->orderBy('id','desc')
					->paginate(5);
		return View::make('home.products')->with('products',$products);
	}
	
	public function showProductProfile($id,$title=null)
	{
		$product = Product::find($id);
		return View::make('home.prodprofile')->with('product',$product);
	}
	public function showOrders($id)
	{
		/*if(is_null($orders))
		{*/
			return View::make('home.orders')->with('orders',$orders);
		/*}
		else
		{
			return View::make('home.orders')->with(array('orders',$orders));
		}*/
	}

	public function showAbout()
	{
		return View::make('home.about');
	}

	public function showContact()
	{
		return View::make('home.contact');
	}

}
