<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;

  class ProductController extends Controller
  {
    //
    private $products = [
      [
        'header' => 'Elephant 1', 'description' => 'Donetsk war id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
           condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod.
           Donec sed odio dui.', 'button' => 'Click',
      ], [
        'header' => 'Elephant 2', 'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
           condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod.
           Donec sed odio dui.', 'button' => 'No corona',
      ], [
        'header' => 'Elephant 3', 'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
           condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod.
           Donec sed odio dui.', 'button' => 'View details',
      ], [
        'header' => 'Elephant 4', 'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
           condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod.
           Donec sed odio dui.', 'button' => 'View details',
      ], [
        'header' => 'Elephant 5', 'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
           condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod.
           Donec sed odio dui.', 'button' => 'View details',
      ],
    ];

    public function index()
    {

      $products = $this->products;
      //$products = [];
      return view('products.index', compact('products'));
    }

    public function show($id)
    {
      $product = $this->products[$id];

      return view('products.show', compact('product'));
    }
  }
