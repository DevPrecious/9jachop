<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\Orders;

class User extends Controller
{
	public function index()
	{
		$data = [];
        helper(['form']);
        if($this->request->getMethod() == 'post')
        {
            $rules = [
                'email' => [
                    'rules' => 'required|valid_email',
                    'label' => 'Email Address',
                ],
                'password' => [
                    'rules' => 'required|min_length[6]|validateUser[email,password]',
                    'label' => 'Password'
                ],
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Email or Password don\'t exists'
                ]
            ];


            if(!$this->validate($rules, $errors)){
                $data['validation'] = $this->validator;
            }else{
                $model = new UserModel();

                $user = $model->where('email', $this->request->getVar('email'))
                              ->first();


                $this->setUserSession($user);
                return redirect()->to('/dashboard');
            }
        }
		return view('auth/login', $data);
	}

	private function setUserSession($user){
		$data = [
				'id' => $user['id'],
				'isLoggedIn' => true,
		];

		session()->set($data);
		return true;
}

	public function register()
	{

        $data = [];
        helper(['form']);

        if($this->request->getMethod() == 'post')
        {
            $rules = [
                'firstname' => [
                    'rules' => 'required',
                    'label' => 'First name'
                ],
                'lastname' => [
                    'rules' => 'required',
                    'label' => 'Last name'
                ],
                'email' => [
                    'rules' => 'required|valid_email|is_unique[users.email]',
                    'label' => 'Email Address',
                ],
                'phone' => [
                    'rules' => 'required',
                    'label' => 'Phone number'
                ],
                'password' => [
                    'rules' => 'required|min_length[6]',
                    'label' => 'Password'
                ],
                'passconf' => [
                    'rules' => 'required|min_length[6]|matches[password]',
                    'label' => 'Confirm Password'
                ]
            ];

            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
            }else{
                $model = new UserModel();

                $newData = [
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'email' => $this->request->getVar('email'),
                    'phone' => $this->request->getVar('phone'),
                    'password' => $this->request->getVar('password'),
                ];

                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successfully Registered');
                return redirect()->to('/login');
            }
        }
		return view('auth/register', $data);
	}

	public function dashboard()
	{
		$data = [];
		$modelUser = new UserModel();
		$model = new Orders();
    	$id = session()->get('id');
    	$data['user'] = $modelUser->getUser($id);
    	$data['orders'] = $model->where(['user_id' => $id])->findAll();
    	// dd($data['orders']);
		return view('9jachop/dashboard', $data);
	}
}