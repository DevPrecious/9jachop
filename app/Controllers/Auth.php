<?php namespace App\Controllers;
use App\Models\Admin;

class Auth extends BaseController
{
	public function login()
	{
		$data = [];
		helper(['form']);
		if($this->request->getMethod() == 'post'){
			$rules = [
				'email' => [
					'rules' => 'required|valid_email',
					'label' => 'Email address',
				],
				'password' => [
					'rules' => 'required|validateAdmin[email,password]',
					'label' => 'Password'
				]
			];
			$errors = [
                'password' => [
                    'validateAdmin' => 'Wrong details'
                ]
            ];

			if(!$this->validate($rules, $errors)){
				$data['validation'] = $this->validator;
			}else{
				$model = new Admin();

                $user = $model->where('email', $this->request->getVar('email'))
                              ->first();


                $this->setUserSession($user);
                return redirect()->to('/admin');
			}
		}
		return view('admin/login', $data);
	}

		private function setUserSession($user){
		$data = [
				'id' => $user['id'],
				'name' => $user['name'],
				'isAdmin' => true,
		];

		session()->set($data);
		return true;
}

	//--------------------------------------------------------------------

}
