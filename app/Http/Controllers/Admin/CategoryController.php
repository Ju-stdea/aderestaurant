<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\CategoryAsset;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function createCategory(){
        return view('admin.categories.create_category')->with(compact('categoryAssets'));
    }

    public function listCategories(){
        $categories = Category::orderBy('category_name', 'asc')->get();
        $categoryAssets = CategoryAsset::orderBy('name', 'asc')->get();
        // dd($categories); die;
        return view('admin.categories.list_categories')->with(compact('categories', 'categoryAssets'));
    }

    public function updateCategoryStatus(Request $request){
        if($request->ajax()){
            $data= $request->all();
            if($data['status'] == "ACTIVE"){
                $status= 'INACTIVE';
            }else{
                $status = 'ACTIVE';
            }

            Category::where('id', $data['category_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'category_id'=> $data['category_id']]);
        }
    }

    public function addEditCategory(Request $request, $id=null){
        if($id==""){
            $title= "Add Category";
            $category = new Category;
            $categorydata = array();
            $getCategories = array();
            $categoryAssets = CategoryAsset::get();
            // dd($categoryAssets); die;
            $message ="Category Added Successfully!";

        }else{
            $title = "Edit Category";
            $categorydata = Category::where('id', $id)->first();
            if (!$categorydata) {
                return redirect()->back()->with('error_message', 'Category not found');
            }
            $getCategories = Category::orderBy('category_name', 'asc')->get();  
            $categoryAssets = CategoryAsset::orderBy('name', 'asc')->get();
            $getCategories = json_decode(json_encode($getCategories), true);
            $category = Category::where('id', $id)->first();
            $message = "Category updated Successfully";
        }

        if($request->isMethod('post')){
            $data= $request->all();
            // dd($data); die;
            $validator = Validator::make($data, [
                'category_name' => 'required|string|unique:categories,category_name' . ($id ? ",$id" : ''),
            ], [
                'category_name.unique' => 'This category name already exists',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $category->slug =              Str::slug($request->category_name);
            $category->category_name =     $request->category_name;
            $category->description =       $request->description;
            $categoryImage = CategoryAsset::where('id', $request->categoryImageId)->first();
            $category->asset_image_id = $categoryImage->id;
            $category->asset_image_url = $categoryImage->color_url;
            $category->asset_icon_path = $categoryImage->dark_url;

            $categoryImage = $request->file('main_image');
        
            if($request->hasFile('main_image') && empty($request->is_cover)){
                session()->flash('error_message', 'Please click on the featured to make the image visible.');
                return redirect()->back(); 
            }else {
                if ($request->hasFile('main_image')) {
                    $uploadCloudinary = cloudinary()->upload(
                        $request->file('main_image')->getRealPath(),
                        [
                            'folder' => 'amrasgrocery/category-cover',
                            'resource_type' => 'auto',
                            'transformation' => [
                                'quality' => 'auto',
                                'fetch_format' => 'auto'
                            ]
                        ]
                    );
                    $imageUrl = $uploadCloudinary->getSecurePath();
                    $imageId = $uploadCloudinary->getPublicId();
                } else {
                    $imageUrl = Null;
                    $imageId = Null;
                }
                $category->image_id = $imageId;
                $category->image_url = $imageUrl;

                $category->status = 'ACTIVE';
            
            if(!empty($request->is_cover)){
                $category->is_cover= $request->is_cover;
            }else{
                $category->is_cover = false;
            }

                $category->save();
                Session::flash('success_message', $message);
                if($id == "") {
                    return redirect('admin/add-edit-category')->with(compact('title', 'categorydata', 'getCategories', 'categoryAssets'));
                }else{
                    return redirect('admin/add-edit-category/'.$categorydata->id)->with(compact('title', 'categorydata', 'getCategories','categoryAssets'));
                }
            }
        }
    
        return view('admin.categories.add_edit_category')->with(compact('title', 'categorydata', 'getCategories', 'categoryAssets'));
    }

    public function deleteCategory($id){
        Category::where('id', $id)->delete();
        $message = 'Category been deleted successfully';
        session::flash('success_message', $message);
        return redirect()->back();
    }
}
