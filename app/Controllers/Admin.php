<?php namespace App\Controllers;
use App\Models\Admin as AdminModel;
use App\Models\Resturant;
use App\Models\Menu;
use App\Models\Item;
use App\Models\Orders;

class Admin extends BaseController
{
	public function index()
	{
		$data = [];
		$admin = new AdminModel();
		$id = session()->get('id');
		$data['user'] = $admin->find($id);
		return view('admin/index', $data);
	}

	public function resturant()
	{
		$data = [];
		helper(['form']);
		if($this->request->getMethod() == 'post'){
			$rules = [
				'name' => [
					'rules' => 'required|min_length[10]',
					'label' => 'Resturant Name'
				],
				'email' => [
					'rules' => 'required|valid_email',
					'label' => 'Email address'
				],
				'number' => [
					'rules' => 'required|min_length[11]|max_length[14]',
					'label' => 'Phone number'
				],
				'openhour' => [
					'rules' => 'required',
					'label' => 'Open hours',
				],
				'closehour' => [
					'rules' => 'required',
					'label' => 'Close hours',
				],
				'openday' => [
					'rules' => 'in_list[1,2,3,4,5,6,7]',
					'label' => 'Open day'
				],
				'theFile' => [
                    'rules' => 'uploaded[theFile]|max_size[theFile, 20000]|is_image[theFile]',
                    'label' => 'Profile or Logo'
                ]
			];
			if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
			}else{
				$model = new Resturant();
				if($this->request->getFile('theFile')!=""){
                $data['file'] = $this->request->getFile('theFile');
               }
                if ($data['file']->isValid() && !$data['file']->hasMoved()) {
                 $data['file']->move('uploads/resturant', $data['file']->getRandomName());
                }
                $newData = [
                    'resname' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'phone' => $this->request->getVar('number'),
                    'openh' => $this->request->getVar('openhour'),
                    'closeh' => $this->request->getVar('closehour'),
                    'openday' => $this->request->getVar('openday'),
                    'image' => $data['file']->getName(),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successfully Created');
                return redirect()->to('/resturant');
			}
		}
		return view('admin/resturant', $data);
	}

	public function menu()
	{
		$data = [];
		$mod = new Resturant();
		$data['res'] = $mod->findAll();
		helper(['form']);
		if($this->request->getMethod() == 'post'){
			$rules = [
				'name' => [
					'rules' => 'required|min_length[2]',
					'label' => 'Menu name'
				]
			];
			if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
			}else{
				$model = new Menu();
				$newData = [
                    'menu_name' => $this->request->getVar('name'),
                    'res_id' => $this->request->getVar('res_id'),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successfully Created Menu');
                return redirect()->to('/menu');
			}
		}
		return view('admin/menu', $data);
	}

	public function list()
	{
		$data = [];
		$resmenu = new Resturant();
		$menu = new Menu();
		$item = new Item();
		$orders = new Orders();
		$data['resturant'] = $resmenu->findAll();
		$data['menu'] = $menu->join('resturant', 'resturant.resid = res_id')->findAll();
		$data['items'] = $item->join('menu', 'menu.id = menu_id')->findAll();
		$data['orders'] = $orders->findAll();
		return view('admin/list', $data);
	}

	public function order($id)
	{
		if($this->request->getMethod() == 'post'){
			$model = new Orders();
			$status = $this->request->getVar('status');
			$model->query("UPDATE orders SET status ='$status' WHERE id='$id'");
			$session = session();
            $session->setFlashdata('success', 'Successfully Updated Status');
            return redirect()->to('/list');
		}
		return view('admin/edit');
	}

	public function resedit($id = null)
	{
		$data = [];
		$model = new Resturant();
		$data['resturant'] = $model->getRes($id);
		if (empty($data['resturant']))
    	{
        return view('admin/404');
    	}
    	if($this->request->getMethod() == 'post'){
			$rules = [
				'name' => [
					'rules' => 'required|min_length[10]',
					'label' => 'Resturant Name'
				],
				'email' => [
					'rules' => 'required|valid_email',
					'label' => 'Email address'
				],
				'number' => [
					'rules' => 'required|min_length[11]|max_length[14]',
					'label' => 'Phone number'
				],
				'openhour' => [
					'rules' => 'required',
					'label' => 'Open hours',
				],
				'closehour' => [
					'rules' => 'required',
					'label' => 'Close hours',
				],
				'openday' => [
					'rules' => 'in_list[1,2,3,4,5,6,7]',
					'label' => 'Open day'
				],
				'theFile' => [
                    'rules' => 'uploaded[theFile]|max_size[theFile, 20000]|is_image[theFile]',
                    'label' => 'Profile or Logo'
                ]
			];
			if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
			}else{
				$model = new Resturant();
				if($this->request->getFile('theFile')!=""){
                $data['file'] = $this->request->getFile('theFile');
               }
                if ($data['file']->isValid() && !$data['file']->hasMoved()) {
                 $data['file']->move('uploads/resturant', $data['file']->getRandomName());
                }
                $updateData = [
                    'id' => $id,
                    'name' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'phone' => $this->request->getVar('number'),
                    'openh' => $this->request->getVar('openhour'),
                    'closeh' => $this->request->getVar('closehour'),
                    'openday' => $this->request->getVar('openday'),
                    'image' => $data['file']->getName(),
                ];
                $model->update($updateData['id'], $updateData);
                $session = session();
                $session->setFlashdata('success', 'Successfully Updated');
                return redirect()->to('/list');
			}
		}
		return view('admin/editresturant.php', $data);
	}

	public function resdelete($id = null)
	{
		$data = [];
		$model = new Resturant();
		$data['resturant'] = $model->getRes($id);
		if (empty($data['resturant']))
    	{
        return view('admin/404');
    	}
    	else{
    		$model->delete($id);
    		return redirect()->to('/list');
    	}
	}

	public function menuedit($id = null)
	{
		$data = [];
		$model = new Menu();
		$mod = new Resturant();
		$data['menu'] = $model->getMenu($id);
		$data['res'] = $mod->findAll();
		if (empty($data['menu']))
    	{
        return view('admin/404');
    	}else{
    		if($this->request->getMethod() == 'post'){
			$rules = [
				'name' => [
					'rules' => 'required|min_length[2]',
					'label' => 'Menu name'
				]
			];
			if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
			}else{
				$model = new Menu();
				$updateData = [
					'id' => $id,
					'name' => $this->request->getVar('name')
				];
				$name = $this->request->getVar('name');
				// dd($updateData)
				// $model->where('id', $id)->update('menu', $updateData);
				$model->query("UPDATE menu SET menu_name='$name' WHERE id='$id'");
                $session = session();
                $session->setFlashdata('success', 'Successfully Updated');
                return redirect()->to('/list');
			}
		}
	}

    	

    	return view('admin/editmenu', $data);
	}

		public function menudelete($id = null)
	{
		$data = [];
		$model = new Menu();
		$data['menu'] = $model->getMenu($id);
		if (empty($data['menu']))
    	{
        return view('admin/404');
    	}
    	else{
    		$model->delete($id);
    		return redirect()->to('/list');
    	}
	}

	public function menuitem($id)
	{
		$data = [];
		helper(['form']);
		$model = new Menu();
		// $data['res'] = $model->join('resturant', 'resturant.resid = res_id')->first();
		$data['menu'] = $model->getMenu($id);
		if (empty($data['menu']))
    	{
        return view('admin/404');
    	}

    	if($this->request->getMethod() == 'post'){
			$rules = [
				'name' => [
					'rules' => 'required|min_length[2]',
					'label' => 'Menu item name'
				],
				'desc' => [
					'rules' => 'required|min_length[10]',
					'label' => 'Description'
				],
				'price' => [
					'rules' => 'required',
					'label' => 'Price'
				],
				'theFile' => [
                    'rules' => 'uploaded[theFile]|max_size[theFile, 20000]|is_image[theFile]',
                    'label' => 'Ittem image'
                ]
			];
			if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
			}else{
				$model = new Item();
				if($this->request->getFile('theFile')!=""){
                $data['file'] = $this->request->getFile('theFile');
               }
                if ($data['file']->isValid() && !$data['file']->hasMoved()) {
                 $data['file']->move('uploads/item', $data['file']->getRandomName());
                }
				$newData = [
					'name' => $this->request->getVar('name'),
					'description' => $this->request->getVar('desc'),
					'price' => $this->request->getVar('price'),
					'image_show' => $data['file']->getName(),
					'menu_id' => $id,
					'res_id' => $this->request->getVar('res_id')
				];
				$model->save($newData);
				$session = session();
                $session->setFlashdata('success', 'Successfully Added');
                return redirect()->to('/list');
			}
		}
		return view('admin/menuitem', $data);
	}

		public function itemedit($id = null)
	{
		$data = [];
		$model = new Item();
		// $mod = new Resturant();
		$data['item'] = $model->getMenu($id);
		// $data['res'] = $mod->findAll();
		if (empty($data['item']))
    	{
        return view('admin/404');
    	}

    	if($this->request->getMethod() == 'post'){
			$rules = [
				'name' => [
					'rules' => 'required|min_length[2]',
					'label' => 'Menu item name'
				],
				'desc' => [
					'rules' => 'required|min_length[10]',
					'label' => 'Description'
				],
				'price' => [
					'rules' => 'required',
					'label' => 'Price'
				],
				'theFile' => [
                    'rules' => 'uploaded[theFile]|max_size[theFile, 20000]|is_image[theFile]',
                    'label' => 'Ittem image'
                ]
			];
			if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
			}else{
				$model = new Menu();
				if($this->request->getFile('theFile')!=""){
                $data['file'] = $this->request->getFile('theFile');
               }
                if ($data['file']->isValid() && !$data['file']->hasMoved()) {
                 $data['file']->move('uploads/item', $data['file']->getRandomName());
                }
				// $updateData = [
				// 	'id' => $id,
				// 	'name' => $this->request->getVar('name'),
				// 	'desc' => $this->request->getVar('desc'),
				// 	'price' => $this->request->getVar('price'),
				// 	'show' => $data['file']->getName(),
				// ];
				 $name = $this->request->getVar('name');
				 $desc = $this->request->getVar('desc');
				 $price = $this->request->getVar('price');
				 $show = $data['file']->getName();
				$model->query("UPDATE item SET name='$name', description='$desc', price='$price', image_show='$show' WHERE id='$id'");
                $session = session();
                $session->setFlashdata('success', 'Successfully Updated');
                return redirect()->to('/list');
			}
		}

    	return view('admin/edititem', $data);
	}

	public function delitem($id)
	{
		$model = new Item();
		$model->delete($id);
    	return redirect()->to('/list');
	}

	//--------------------------------------------------------------------

}
