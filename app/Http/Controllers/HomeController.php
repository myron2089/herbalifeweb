<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\SaleDetail;
use App\Distributor;
use App\Order;
use App\product;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*
    public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {



        return view('home');
    }

    /*
    * Mostrar pagina principal de herbalife
    */
    public function getHomePage(){

        return view('public.home');
    }

    /*
    * Pagina de productos
    */

    public function getProductsPage(Request $request, $tipo){

        $type = 0;
        switch ($tipo) {
            case 'nutricion':
                $type = 1;
                break;
            
            case 'personal':
                $type = 2;
            break;

            case 'Nutrición':
                $type = 1;
                break;
           
        }


        $products = Product::from('products as p')
                         ->join('unities as u', 'u.id', 'p.unity_id')
                         ->join('statuses as st', 'st.id', 'p.status_id')
                         ->join('categories as c', 'c.id', 'p.category_id')
                         ->join('product_pictures as pi', 'pi.product_id', 'p.id' )
                         ->select('p.id', 'p.productHerbaLifeCode', 'p.productName', 'p.productBenefits', 'p.productDescription', 'u.unityName', 'c.categoryName', 'p.productMeasure', 'st.statusName', 'p.status_id', 'pi.pictureName');
                         

        if($type <> 0){
            $products = $products->where('p.category_id', $type);
        }

        $products = $products->get();

        //dd($products);
        return view('public.products.products_index', ['products' => $products]);
        //dd($request->all());
    }



     /*
    * Pagina de producto
    */

    public function getProductPage( $id){

        

        $product = Product::from('products as p')
                         ->join('unities as u', 'u.id', 'p.unity_id')
                         ->join('statuses as st', 'st.id', 'p.status_id')
                         ->join('categories as c', 'c.id', 'p.category_id')
                         ->join('product_pictures as pi', 'pi.product_id', 'p.id' )
                         ->where('p.id', $id)
                         ->select('p.id', 'p.productHerbaLifeCode', 'p.productName', 'p.productBenefits', 'p.productDescription', 'u.unityName', 'c.categoryName', 'p.productMeasure', 'st.statusName', 'p.status_id', 'pi.pictureName')
                         ->get();
                         

        

       // dd($product);
        return view('public.products.product_detail', ['productdata' => $product]);
        //dd($request->all());
    }
}
