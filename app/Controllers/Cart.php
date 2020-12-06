<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Item;
use App\Models\UserModel;
use App\Models\Orders;

class Cart extends Controller
{
	public function index()
	{
		$data = [];
		$modelUser = new UserModel();
    	$id = session()->get('id');
    	if($id == false){
    		$data['user'] =  "You need to login to checkout";
    	}
    	$data['user'] = $modelUser->getUser($id);
		if(session('cart')){
		$data['items'] = array_values(session('cart'));
		$data['total'] = $this->total();
	}else{
		return redirect('/');
	}

		if($this->request->getMethod() == 'post'){
			$url = "https://api.paystack.co/transaction/initialize";
  $fields = [
    'email' => $data['user']['email'],
    'email' => $data['user']['email'],
    'email' => $data['user']['email'],
    'amount' => $data['total'] * 100
  ];
  $fields_string = http_build_query($fields);
  //open connection
  $ch = curl_init();
  
  //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_POST, true);
  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer sk_test_9c48cbea7947a79542d1a5af9dd51ef4c23e8b32",
    "Cache-Control: no-cache",
  ));
  
  //So that curl_exec returns the contents of the cURL; rather than echoing it
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
  
  //execute post
  $result = curl_exec($ch);
  $result = json_decode($result, true);
  // echo $result['data']['authorization_url'];
  // return redirect($result['data']['authorization_url']);
  return $this->response->redirect($result['data']['authorization_url']);
}
		return view('9jachop/cart', $data);
	}

	public function buy($id)
	{
		$model = new Item();
		$orders = $model->find($id);
		$item = array(
			'id' => $orders['id'],
			'name' => $orders['name'],
			'price' => $orders['price'],
			'menu_id' => $orders['menu_id'],
			'res_id' => $orders['res_id'],
			'image_show' => $orders['image_show'],
			'description' => $orders['description'],
			'quantity' => 1
		);
		$session = session();
		if($session->has('cart')){
			$index = $this->exists($id);
			$cart = array_values(session('cart'));
			if($index === -1){
				array_push($cart, $item);
			}else{
				$cart[$index]['quantity']++;
			}
				$session->set('cart', $cart);

		}else{
			$cart = array($item);
			$session->set('cart', $cart);
		}
		return $this->response->redirect(site_url('cart/index'));
	}

	public function remove($id)
	{
		$index = $this->exists($id);
		$cart = array_values(session('cart'));
		unset($cart[$index]);
		$session = session();
		$session->set('cart', $cart);
		return $this->response->redirect(site_url('cart/index'));
	}

	private function exists($id){
		$items = array_values(session('cart'));
		for ($i=0; $i < count($items); $i++) { 
			if($items[$i]['id'] == $id){
				return $i;
			}
		}
		return -1;
	}

	private function total(){
		$s = 0;
		$items = array_values(session('cart'));
		foreach ($items as $item) {
			$s += $item['price'] * $item['quantity'];
		}
		return $s;
	}

	public function checkout($da)
	{
		$data = [];
		$modelUser = new UserModel();
    	$id = session()->get('id');
    	if($id == false){
    		return redirect('/food');
    	}
    	$data['user'] = $modelUser->getUser($id);
    	if(session('cart')){
		$data['items'] = array_values(session('cart'));
		$data['total'] = $this->total();
		// dd($data['items'][0]['name']);
	}else{
		return redirect('/');
	}
		$curl = curl_init();
$reference = isset($_GET['reference']) ? $_GET['reference'] : '';
if(!$reference){
  return redirect('/food');
}

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => [
    "accept: application/json",
    "authorization: Bearer sk_test_9c48cbea7947a79542d1a5af9dd51ef4c23e8b32",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
    // there was an error contacting the Paystack API
  die('Curl returned error: ' . $err);
}

$tranx = json_decode($response);

if(!$tranx->status){
  // there was an error from the API
  die('API returned error: ' . $tranx->message);
}

if('success' == $tranx->data->status){
  // transaction was successful...
  // please check other things like whether you already gave value for this ref
  // if the email matches the customer who owns the product etc
  // Give value
	// dd($data['user']['email']);
	if($tranx->data->customer->email == $data['user']['email']){
		$model = new Orders();
		$Data = [
			'product_name' => $data['items'][0]['name'],
			'product_price' => $data['items'][0]['price'],
			'user_email' => $data['user']['email'],
			'user_id' => $data['user']['id'],
		];
		$model->save($Data);
		$session = session();
        $session->setFlashdata('success', 'Successfully Ordered');
        return redirect()->to('/food');
	}else{
		echo "Error";
	}
  
}

	}
}