<?php

class CartController extends BaseController {

    public function get_cart()
    {
        echo Cart::content();        
    }  

    public function post_add($id, $qty = 1)
    {   
        $product = Product::find($id);

        $rid = Cart::search(array('id' => $id));
        if(isset($rid[0])){
            $cart = Cart::get($rid[0]);
        }        

        if(!isset($cart) || (($cart->qty + $qty) <= $product->amounts)){            
            $precio = Modelo::getPrice($product->model_id);
            $name = Stamp::getStampName($product->stamp_id) . "(". Modelo::getName($product->model_id) .")";

            Cart::add($id, $name, $qty, $precio, array('image' => Stamp::getName($product->stamp_id)));
        }        
    } 

    public function get_removeitem($rowid)
    {
        if(Cart::get($rowid))
            Cart::remove($rowid);

        return Redirect::to('/carrito');
    }  

    public function post_minus($rowid)
    {
        if($cart = Cart::get($rowid)){
            $qty = $cart->qty-1;
            if($qty==0){
                Cart::remove($rowid);
            } else{
                Cart::update($rowid, array("qty" => $qty));
            }
        }            

        return Redirect::to('/carrito');
    } 

    public function post_plus($rowid)
    {

        if($cart = Cart::get($rowid)){
            $product = Product::find($cart->id);                 

            if(($qty = $cart->qty+1) <= $product->amounts){            
                Cart::update($rowid, array("qty" => $qty));
            }             
        }

        return Redirect::to('/carrito');
    } 


    public function get_procesar()
    {
        if (Auth::guest()){
            Session::put('mensaje_error', 'Inicie sesión para realizar la compra.');
            Session::put('next_url', 'procesar');
            return View::make('login');
        }else{

            /* crear factura */
            $factura = new Factura();
            $factura->user_id = Auth::user()->id;
            $factura->slug = Uuid::generate();
            $factura->save();

            foreach ($carts = Cart::content() as $key => $cart) {
                $product = Product::find($cart->id);                 

                if(( $product->amounts - $cart->qty ) >= 0 ){
                    /* actualiza existencia */
                    $product->amounts = $product->amounts - $cart->qty;
                    $product->save();
                     /* crea item del pedido */
                    $item = new Item();
                    $item->producto_id = $cart->id;
                    $item->cantidad = $cart->qty;
                    $item->precio = $cart->price;
                    $item->factura_id = $factura->id;

                    $item->keep = $cart->name ." | ". $cart->qty ." | ". $cart->price ." | ". $cart->options['image'];  
                    $item->save();
                }
            }  
            Cart::destroy();     

            return Redirect::to('/orders');
        }
    } 

    public function get_factura($slug){
        $factura = Factura::where('slug', '=', $slug)->firstOrFail();
        return View::make('factura', array('factura' => $factura));
    }

    public function post_pagar(){
        $inputs = Input::all();

        $pago = new Pago();
        $pago->recibo = $inputs['recibo'];
        $pago->monto = $inputs['monto'];
        $pago->fecha = $inputs['fecha'];

        $adj = Input::file('adjunto');
        $destinationPath = 'uploads/pagos/';
        $filename = str_random(16)."_".$adj->getClientOriginalName();
        $adjunto = Input::file('adjunto')->move($destinationPath, $filename);

        $pago->factura_id = $inputs['id'];
        $pago->adjunto = $adjunto;

        $pago->save();

        $factura = Factura::find($inputs['id']);

        $data['factura'] = $factura->toArray();
        $data['items'] = $factura->items->toArray();
        $data['pago'] = $factura->pago->toArray();

        Mail::send('emails.pago', $data , function($m) use ($factura)
        {
            $m->from('ventas@joelblackberryzone.com.ve', 'JoelBlackBerryZone.com.ve');
            $m->to($factura['correo'])->cc('ventas@joelblackberryzone.com.ve')->subject('Confirmación de Pago.');
        });

        return Redirect::back();
    }

    public function get_orders(){
        return View::make('home.orders', array('orders' => Auth::user()->facturas));
    }

    public function get_order($id){
        $order = Factura::find($id);
        return View::make('home.order', array('order' => $order));
    }

}