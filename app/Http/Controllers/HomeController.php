<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produtos;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index(){
       $produtos = Produtos::all();
       return view ('backend.init' ,array('produtos' => $produtos));
     }
 public function init(){
      return view('welcome');
 }
}