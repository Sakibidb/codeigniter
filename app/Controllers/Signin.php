<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;


class Signin extends BaseController
{
    protected $helpers = ['form', 'url'];
    public function index()
    {
        return View('login');
    }
    
    // public function login(){
        // echo "msg";
        //$session = session();
        // $userModel = new UserModel();
        // $email = $this->request-> getVar ('email');
        // $formpass = $this->request-> getVar ('password');

        // $data = $userModel->where('email', $email)->first();
        // print_r ($data);
        
        // // if($data){
        // //     $dbpass = $data['password'];
        // //     $varifiedpass = password_verify($formpass, $dbpass);
        // //     print_r($varifiedpass);
        //     // if($varifiedpass){
        //     //     return redirect()->to('dashboard');
        //     // } else {
        //     //     $session->setFlashdata('message', 'password incorrect');
        //     //     return redirect()->to('/login');
        //     // }
            
        // // }
        // // else{
        // //     $session->setFlashdata('message', 'Your Email is incorrect');
        // //     return redirect()->to('/login');
        // // }

    // }
    public function login(){
        $userModel = new UserModel();
        $session = session();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->where('email', $email)->first();
        // print_r($data);

        if($data){
            $dbpass = $data['password'];
            $authenticatePassword = password_verify($password, $dbpass);
            // echo $authenticatePassword;
            if($authenticatePassword){

                $user_data =[
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($user_data);
                return redirect()->to('/');
                // echo "<br> Password Varified";
            
            }else{
                $session->setFlashdata('message', 'Password is incorrect.');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('message', 'Email does not exist');
            return redirect()->to('/login');
        }
    }
    public function logout (){
        session()->destroy();
        return redirect()->to('login');
    }


}
