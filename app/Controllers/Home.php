<?php namespace App\Controllers;
use App\Models\Resturant;
use App\Models\Item;
use App\Models\Menu;

class Home extends BaseController
{
	public function index()
	{
		$data = [];
		$model = new Item();
		$mod = new Menu();
		$modr = new Resturant();
		$data['items'] = $model->join('resturant', 'resturant.resid = res_id')->orderBy('id', 'DESC')->findAll(3);
		$data['res'] = $modr->findAll(6);
		// dd($data['items']);
		return view('9jachop/index', $data);
	}

	public function profile($id)
	{
		$data =  [];
		$model = new Resturant();
		$mod = new Item();
		$data['details'] = $model->find($id);
		$data['items'] = $mod
						->where(['id' => $id])
						->join('resturant', 'resturant.resid ='.$id)->findAll();
		// dd($model->find($id));
		return view('9jachop/resp.php', $data);
	}

	public function result()
	{
			$data = [];
			$db      = \Config\Database::connect();
            $search = $this->request->getVar('search');
            if($search === ''){
            	return redirect('/');
            }
            $query = $db->query("SELECT * FROM item JOIN resturant ON resturant.resid = item.res_id WHERE name LIKE '$search%'");
			// $data['datas'] = $query->getResult('array');
			$row = $query->getRow();
			if (empty($row)) {
				return view('9jachop/404');
			}else{
			$data['datas'] = array($row);
		}
			// dd($data['datas']);
		return view('9jachop/result', $data);
	}

	public function food()
	{
		$data = [];
		$item = new Item();
		$data['datas'] = $item->join('resturant', 'resturant.resid = res_id')->findAll();
		return view('9jachop/food', $data);
	}

	//-------------------------------------- ------------------------------

}
