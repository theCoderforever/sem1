<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\updateBannerRequest;

class BannerController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $auth = $this->authorize('modules', 'banner.index');
       

        $config = $this->indexConfig();

        $config['seo'] = __('messages.banner');

        if(!empty(request()->keyword)) 
        {
           $banner = Banner::where('name', request()->keyword)->get();

        }else{
            $banner = Banner::all();
        }
       

        // xu ly where 

        $template = 'backend.banner.index';

        return view('backend.dashboard.layout', compact('template', 'config','banner'));
    
    }

    public function create() 
    {

        $auth = $this->authorize('modules', 'banner.create');

        $config = $this->configData();
        // $banner = Banner::all();
        $config['method']= 'create';
        $template = 'backend.banner.store';
        $config['seo'] = __('messages.banner');

        return view('backend.dashboard.layout', compact('template', 'config'));
    }
        


    public function store(StoreBannerRequest $request)
    {
        $fileName = $request->photo->getClientOriginalName();
        $request->photo->storeAs('public/image',$fileName);

        $filename = $request->anh->getClientOriginalName();
        $request->anh->storeAs('public/image',$filename);

        $banner = Banner::create(
            [
                'name'=> $request->name,
                'image'=> $fileName,
                'avatar'=> $filename
            ]
        );
        try{
           return redirect()->route('banner.index')->with('success', 'Created Success');
        } catch(\Throwable $th){
            return redirect()->back()->with('error', 'Created Failed');
        }    
    }
    public function edit(Request $request, $id)
    {

        $auth = $this->authorize('modules', 'banner.edit');

        
        $banner = Banner::where('id', $id)->get()->first();
      
        $config = $this->configData();

        $config['method']= 'edit';

        $template = 'backend.banner.store';
        $config['seo'] = __('messages.banner');


        return view('backend.dashboard.layout', compact('template', 'config', 'banner'));
    }

    public function update(updateBannerRequest $request,Banner $banner, $id)
    {
        if($request->hasFile('photo')){
            $fileName = $request->photo->getClientOriginalName();
            $request->photo->storeAs('public/image',$fileName);
        } else {
            $k = Banner::find($id);
            $fileName = $k->image;
        }

        if($request->hasFile('anh')){
            $filename = $request->anh->getClientOriginalName();
            $request->anh->storeAs('public/image',$filename);
        } else {
            $k = Banner::find($id);
            $filename = $k->avatar;
        }

        // dd($request->all());
        try {
            $banner->where('id',$id)->update([
                'name'=> $request->name,
                'image'=> $fileName,
                'avatar'=> $filename
            ]);               
            return redirect()->route('banner.index')->with('success','Updated Success');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Updated Failed');
        }
    }

    public function delete($id)
    {

        $auth = $this->authorize('modules', 'banner.delete');

        $banner = Banner::find($id);

        $template = 'backend.banner.delete';
        $config['seo'] = __('messages.banner');

        return view('backend.dashboard.layout', compact('template', 'config','banner'));
    }

    public function destroy(Banner $banner, $id)
    {
        $k = $banner->where('id', $id)->delete();
        if($k) {
            return redirect()->route('banner.index')->with('success', 'Xóa bản ghi thành công');
        }else {
            return redirect()->route('banner.index')->with('error', 'Xóa bản ghi không thành công.Hãy thử lại');
        }
    }



    private function configData() 
    {
        return [
           
            'js' => [
                'backend/plugin/ckfinder/ckfinder.js',
                'backend/plugin/ckeditor/ckeditor.js',
                'backend/library/finder.js',
                'backend/library/seo.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',

            ],
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'

            ]
        ];
    }

    private function indexConfig()
     {
        return [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',

            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'

            ],
            'model' => 'Banner'
        ];
  
    }

   
}
