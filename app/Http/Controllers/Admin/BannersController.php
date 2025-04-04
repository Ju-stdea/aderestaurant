<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Session;

class BannersController extends Controller
{
    public function listBanners(){
        $banners = Banner::get();
        return view('admin.banners.list_banners')->with(compact('banners'));
    }

    public function addEditBanner(Request $request, $id=null){
        if($id == ""){
            // Add Banner
            $banner = new Banner;
            $bannerdata = array();
            $title= "Add Banner Image";
            $message = "Banner added Successfully";
        }else{
            $banner = Banner::where('id', $id)->first();
            $bannerdata = Banner::where('id', $id)->first();
            $title= "Edit Banner Image";
            $message = "Banner Updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();
            $validator = Validator::make($data, [
                'title' => 'required|string|unique:banners,title' . ($id ? ",$id" : ''),
            ], [
                'title.unique' => 'This banner title already exists',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $banner->link = $request->link;
            $banner->title = $request->title;
            $banner->alt = $request->alt;
            
            if ($request->hasFile('main_image')) {
                $uploadCloudinary = cloudinary()->upload(
                    $request->file('main_image')->getRealPath(),
                    [
                        'folder' => 'amrasgrocery/banners',
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
            $banner->image_id = $imageId;
            $banner->image_url = $imageUrl;

            $banner->status = 'ACTIVE';

            $banner->save();
            session::flash('success_message', $message);
            if($id == "") {
                return redirect('admin/add-edit-banner')->with(compact('title', 'bannerdata'));
            }else{
                return redirect('admin/add-edit-banner/'.$bannerdata->id)->with(compact('title', 'bannerdata'));
            }
        }

        return view('admin.banners.add_edit_banner')->with(compact('title', 'bannerdata'));
    }

    public function updateBannerStatus(Request $request){
        if($request->ajax()){
            $data= $request->all();
            if($data['status'] == "ACTIVE"){
                $status= 'INACTIVE';
            }else{
                $status = 'ACTIVE';
            }

            Banner::where('id', $data['banner_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'banner_id'=> $data['banner_id']]);
        }
    }

    public function deleteBanner($id){
        Banner::where('id', $id)->delete();
        $message = 'Banner been deleted successfully';
        session::flash('success_message', $message);
        return redirect()->back();
    }
    
}
