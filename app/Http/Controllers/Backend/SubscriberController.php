<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCatalogueRequest;
use App\Http\Requests\DeleteCatalogueRequest;
use App\Http\Requests\UpdateCatalogueRequest;
use App\Models\Subscriber;


class SubscriberController extends Controller
{

   
    public function index(Request $request)
    {


    //    $auth = $this->authorize('modules', 'catalogue.index');
    $auth = $this->authorize('modules', 'subscriber.index');
       
      
        $config = $this->indexConfig();

        $config['seo'] = __('messages.subscriber');
        
        $template = 'backend.subscriber.index';
        $sub = Subscriber::all();
        return view('backend.dashboard.layout', compact('template', 'config', 'sub'));
    }


  
    public function delete(Request $request) {
        $auth = $this->authorize('modules', 'subscriber.delete');
        
        
        $config = $this->configData();
        $sub = Subscriber::find($request->id);
        // dd($sub);
        // $list = Catalogue::all();
        

        $config['method']= 'create';
        $template = 'backend.subscriber.delete';
        $config['seo'] = __('messages.subscriber');
        return view('backend.dashboard.layout', compact('template', 'config', 'sub'));

        
}
       public function destroy(Request $request) {
        $sub = Subscriber::find($request->id);
        $sub->delete();
        return redirect()->route('subscriber.index')->with('success', 'xoá thành công');
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
            'model' => 'Catalogue'
        ];
  
    }
  
}
