<?php

namespace App\Http\Controllers;

use DB;
use App\Product;
use App\Unity;
use App\Category;
use App\ProductPicture;
use File;
use Image;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // Productos
        
        try{


            $products = Product::from('products as p')
                         ->join('unities as u', 'u.id', 'p.unity_id')
                         ->join('statuses as st', 'st.id', 'p.status_id')
                         ->join('categories as c', 'c.id', 'p.category_id')
                         ->select('p.id', 'p.productHerbaLifeCode', 'p.productName', 'p.productDescription', 'u.unityName', 'c.categoryName', 'p.productMeasure', 'st.statusName', 'p.status_id')
                         ->get();
            
            return view('management.products.products_index', ['products'=>$products]);


        } catch(Exception $e){
            
            return back()->with(['error'=> $e->getMessage()]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        try{
            $categories = Category::select('id', 'categoryName')->get();

            $unities = Unity::select('id', 'unityName')->get();

            return view('management.products.product_create', ['categories'=> $categories,
                                                              'unities' => $unities]);

         } catch(Exception $e){
            return back();
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request->file('productPicture'));

        
        DB::beginTransaction();
        try{


            $productId = mt_rand();
            // Almacenar la imagen
            $filename="noProductPicture.png";
            $picture_path = "admin/images/products/";
            $imgurl = url($picture_path . $filename);
           

            if ($request->hasFile('productPicture')) {
                $imageFile = $request->file('productPicture');
                $extension = $imageFile->getClientOriginalExtension();
                $filename = $productId . '.' . $extension;
              
                $imgurl = public_path($picture_path .'/' . $filename);
                $image = Image::make($imageFile->getRealPath());
                $image->save($imgurl);

                $imgurl = url($picture_path . $filename);
               
            }


            
            //Almacenar registro en la tabla users
            $user =  Product::create([
                'id' => $productId,
                'productName' => $request->productName,
                'productDescription' => $request->productDescription,
                'productBenefits' => $request->productBenefits,
                'unity_id' => $request->unity,
                'productHerbaLifeCode' => 'HBLFP-' . $productId,
                'category_id' => $request->category,
                'productMeasure' => $request->productMeasure,
                'status_id' => 1,
                ]);


            //Almacenar registro en la tabla products_images
            $picture = ProductPicture::create([
                'id' => mt_rand(),
                'product_id' => $productId,
                'pictureName' => $filename
            ]);




            DB::commit();
            return redirect('administracion/productos');
        }
        catch(Exception $e){
            DB::rollBack();
            return back()->with(['error'=> $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        try{
            $productData = Product::from('products as p')
                         ->join('unities as u', 'u.id', 'p.unity_id')
                         ->join('statuses as st', 'st.id', 'p.status_id')
                         ->join('categories as c', 'c.id', 'p.category_id')
                         ->join('product_pictures as pic', 'pic.product_id', 'p.id')
                         ->where('p.id', $id)
                         ->select('p.id', 'p.productHerbaLifeCode', 'p.productName', 'p.productDescription', 'p.productBenefits', 'u.unityName', 'c.categoryName', 'p.productMeasure', 'st.statusName', 'p.unity_id', 'p.category_id', 'pic.pictureName')
                         ->get();

            
            $categories = Category::select('id', 'categoryName')->get();

            $unities = Unity::select('id', 'unityName')->get();

            return view('management.products.product_edit', [  'id' => $id,
                                                               'productData' => $productData,
                                                               'categories' => $categories, 
                                                               'unities' => $unities,
                                                               'picture' => "admin/images/products/".$productData[0]->pictureName
                                                           ]);

        } catch(Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        //dd($request->all());

        DB::beginTransaction();
        try{

            $filename= ProductPicture::where('product_id',$id)->first()->pictureName;
            $picture_path = "admin/images/products/";
            $imgurl = url($picture_path . $filename);

            

            $productUpdate = Product::where('id', $id)
                    ->update(['productName' => $request->productName,
                              'productDescription' => $request->productDescription,
                              'productBenefits' => $request->productBenefits,
                              'unity_id' => $request->unity,
                              'productMeasure' => $request->productMeasure,
                              'category_id' => $request->category,
                             
                              ]);

            //Verificar si la imagen del producto ha cambiado
            if($request->pictureChanged==1){

                //Verificar que haya seleccionado un archivo en el input:file
                if($request->hasFile('productPicture')){

                    $pictureId = mt_rand();
                    $imageFile = $request->file('productPicture');
                    $extension = $imageFile->getClientOriginalExtension();
                    
                    //Generar nuevo nombre para la imagen, en caso haya cambiado
                    $filename = $pictureId . '.' . $extension;
                  
                    $imgurl = public_path($picture_path .'/' . $filename);
                    $image = Image::make($imageFile->getRealPath());
                    //Almacenar imagen
                    $image->save($imgurl);

                    $imgurl = url($picture_path . $filename);

                }
                else{
                    $filename="noProductPicture.png";
                }

                //Actualizar dato en la tabla
                $pictureUpdate = ProductPicture::where('product_id',$id)
                                 ->update(['pictureName' => $filename
                                 ]);

            }

           
            DB::commit();
            return redirect('administracion/productos');    

        } catch(Exception $e){
            DB::rollBack();
            return back()->with(['error' => $e->getMessage()]);
        }
    }


    /*
    * Almacenar imagen del producto
    */
    public function storeProductImage(){


    }

    /*
    * Cambiar estado del producto
    */
    public function changeProductStatus($id, $statusId){

        DB::beginTransaction();
        try{

            // Estado inactivo 
            $newStatus = 2; 
            $newStatusName = "Incativo";

            // Verificar el estado que viene
            if($statusId==2){
                $newStatus = 1;
                $newStatusName = "Activo";
            }
            

            //Actualizar el estado del producto
            $productUpdate = Product::where('id', $id)
                    ->update(['status_id' => $newStatus]);
            DB::commit();
            return json_encode(['status'=> 'success', 'message' => 'Se ha cambiado el estado del producto exitosamente.', 'newStatus' => $newStatus, 'newStatusName' => $newStatusName]);

        }catch(Exception $e){

            DB::rollBack();
            return json_encode(['status'=> 'error', 'message' => 'Ha ocurrido un error, porfavor, póngase en contacto con el administrador del sistema.']);
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function getProductByIdForList($id){
        try{
            $product = new Product();

            $productData = $product->getProductById($id);

            return json_encode(['status' => 'success', 'message' => 'Se ha obtenido exitosamente el producto', 'productData' => $productData]);
        }catch(Exception $e){
            return json_encode(['status'=> 'error', 'message' => 'Ha ocurrido un error, porfavor, póngase en contacto con el administrador del sistema.']);
        }
    }
}
