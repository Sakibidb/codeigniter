<?php

// namespace App\Controllers;

// use App\Controllers\BaseController;
// use App\Models\ProductModel;


// class Products extends BaseController
// {
//     private $products = '';
//     protected $helpers = ['form'];
//     public function __construct(){
//         $this->products = new ProductModel();
//     }
//     public function index()
//     {
//         $data['items']=$this-> products->findAll();
//         $data['title']= "Display all products";
//         //print_r($data['products']);
//         return view("products/index", $data);
//     }
//     public function create(){
//         return view("products/create");
//     }
//     public function store(){
//         $data = [
//             'product' => $this->request->getVar('pname'),
//             'category'  => $this->request->getVar('cat'),
//             'price'  => $this->request->getVar('price'),
//             'sku'  => $this->request->getVar('sku'),          
//             'model'  => $this->request->getVar('model'),
//         ];
        
//         //print_r ($data);
//         $rules = [
//             'pname' => 'required|max_length[5]|min_length[3]',
//             // 'cat' => 'required|max_length[5]',
//             // 'price' => 'required|max_length[5]',
//             // 'sku' => 'required|max_length[5]',
//             // 'model' => 'required|max_length[5]',
                      
//                ];

//         if(! $this->validate($rules)){
//             return view('/product/create');
//         }else{

//         $this->products->insert($data);
//         $session = session(); 
//         $session->setFlashdata('message', 'Product Successfully Added');   
//         return $this->response->redirect('/products/create');       
//     }
//         // $this->products->insert($data);
//         // $session = session(); 
//         // $session->setFlashdata('message', 'Product Successfully Added');   
//         // return $this->response->redirect('/products/create'); 
// }
// }




namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;


class Products extends BaseController
{
    private $products = '';
    protected $helpers = ['form', 'url'];
    public function __construct(){
        $this->products = new ProductModel();
    }
    public function index()
    {
        $data['items']=$this-> products->findAll();
        $data['title']= "Display all products";
        //print_r($data['products']);
        return view("products/index", $data);
    }
    public function create(){
        return view("products/create");
    }

    public function store()
    {
        $data = [
                'product' => $this->request->getVar('pname'),
                'category'  => $this->request->getVar('cat'),
                'price'  => $this->request->getVar('price'),
                'sku'  => $this->request->getVar('sku'),          
                'model'  => $this->request->getVar('model'),
                'photo'=> $this->request->getFile('photo')->getName(),
            ];



        //print_r($data);

       $rules = [
        'pname' => 'required|max_length[30]|min_length[3]',
        // 'category' => 'required|max_length[255]|min_length[10]',
        'price' => 'required|numeric',
        // 'sku'    => 'required|max_length[254]|valid_email',
        'photo'=> 'uploaded[photo]|max_size[photo,10024]|ext_in[photo,jpg,jpeg]'
       ];

       if (! $this->validate($rules)) {
        return view('products/create');
    } else {
        $img = $this->request->getFile('photo');
        $img->move(WRITEPATH). '/uploads';
        $this->products->insert($data);
        $session = session();
        $session->setFlashdata('message','Inserted and Uploaded Successfully');
        $this->response->redirect('/products/create');
    }

       

    }

    public function edit($id){
        $data = $this->products->find($id);
        return view("products/edit", $data);
    }

    public function update($id){
        //$this->products = new ProductModel(); 
        $data = [
            'product' => $this->request->getVar('pname'),
            'category'  => $this->request->getVar('cat'),
            'price'  => $this->request->getVar('price'),
            'sku'  => $this->request->getVar('sku'),          
            'model'  => $this->request->getVar('model'),
        ];
        $this->products->update($id, $data);
        $session = session();
        $session->setFlashdata('message','Updated Successfully');
        $this->response->redirect('/products');
    }

    public function delete($id){
        $this->products->delete($id);
        $session = session();
        $session->setFlashdata('message','Deleted Successfully');
        $this->response->redirect('/products');
    }

}
