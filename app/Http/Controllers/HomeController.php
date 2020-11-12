<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportItemFile;
use DB;

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
    public function index()
    {
        if(auth()->user()->isAdmin()) {
            return view('admin/dashboard');
        } else {
            return view('home');
        }
    }


    public function store(Request $request)
    {
        
        try{

            DB::beginTransaction();
      
                // $request=request();
                if ($request->hasfile('file')){
                    // return dd($request);
                    return dd($request->file);
                    foreach($request->file as $file){
                        $filename = $file;
                        return dd($file);
                        $file->storeAs('public/upload',$filename);
                        $report_itemFile = new ReportItemFile();
                        $report_itemFile->name = $filename;
                        $report_itemFile->save();
                    }
                    return redirect()->back() ->with('alert', 'upload สำเร็จ!');
                }

                // return ('nodata');
                // $request=request();
                // return dd($request);
                // if($file = $request->file('file')){
                //     // return dd($file);
                //     foreach($file as $files){
                //         return
                //         $name = $files->getClientOriginalName();
                //         if($files->move('file_upload',$name)){
                //             $report_itemFile = new ReportItemFile();
                //             $report_itemFile->name = $name();
                //             $report_itemFile->save();
                        
                //             return redirect()->back() ->with('alert', 'upload สำเร็จ!');
                //         };
                //     }
                // }
                
                
                // // return dd($request);

        
            DB::commit();
            return 1;
        }
        catch (\PDOException $e) {
            // Woopsy
            DB::rollBack();
            // return $e;
            return 0;
      }
    }
}