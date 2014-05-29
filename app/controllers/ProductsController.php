<?php

class ProductsController extends \BaseController {

	private $autorizado;
	
	public $errors;

	public $file;
	
	public function __construct() {
		$this->autorizado = (Auth::check() and Auth::user()->role_id == 1);
	}	

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::paginate(10);
		$modelos = Modelo::all();
		$stamps = Stamp::all();
		return View::make('admin.products')->with('products',$products)->with('modelos',$modelos)->with('stamps',$stamps);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(!$this->autorizado) return Redirect::to('/login');
		$modelos = Modelo::all();
		$product = new Product();
		$stamp = new Stamp();
		return View::make('products.form')->with('product', $product)->with('modelos',$modelos)->with('stamp',$stamp);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(!$this->autorizado) return Redirect::to('/login');
		$stamp = new Stamp();
		$file = Input::file('stamp');
		/*var_dump($file);*/
		$filename = str_random(16).'_'.date('d_m_Y_H_i_s').'_'.$file->getClientOriginalName();
		$stamp->stamp = $filename;
		$rules = array(
			'stamp' => 'image|max:1024'
		);
		$inputs = array(
			'stamp' => Input::file('stamp')
		);
		$validation = Validator::make($inputs, $rules);
		if( $validation->passes() )
		{
			//Upload the file
			$uploadPath = 'assets/images/stamps';
			$upload = $file->move($uploadPath,$filename);
			if ($upload) {
				$stamp->save();
			}
		}//if it validate

		$stampId 	= 	Stamp::orderBy('created_at','DESC')->first();
		foreach (Input::get('model_id') as $modelId) {
			$product 			= 	new Product();
			$product->model_id 	= 	$modelId;
			$amounts = Input::get('amounts_'.$modelId.'');
			$product->amounts 	= 	$amounts;
			$product->stamp_id 	= 	$stampId->id;
			var_dump($product);
			$amount = 'amounts_'.$modelId;
			$rules = array(
				$amount => 'required|numeric'
			);
			$inputs = array(
				$amount => $amounts
			);
			$messages = array(
				'required' => 'Dede llenar el campo Cantidades',
				'numeric' => 'Las cantidades solo pueden ser numeros'
			);
			
			$validator 			= 	Validator::make($inputs,$rules);
			if($validator->fails())
			{
				$errors = $messages;
				return Redirect::back()->withErrors($validator)->withInput();
			}
			else
			{
				$product->save();
				
			}/* */
		}
		return Redirect::to('admin/productos')->with('notice', 'Los productos han sido agregados correctamente.');
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


}
