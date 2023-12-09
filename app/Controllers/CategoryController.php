<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    private $category = '';
    protected $helpers = ['form', 'url'];
    public function __construct(){
        $this->category = new CategoryModel();
    }
    public function index()
    {
        $data['items']=$this-> category->findAll();
        return view("category/index", $data);
    }

    public function creat()
    {
        //
    }

    public function store()
    {
        //
    }

    public function update()
    {
        //
    }

    public function edit()
    {
        //
    }

    public function delete()
    {
        //
    }

    }
    

