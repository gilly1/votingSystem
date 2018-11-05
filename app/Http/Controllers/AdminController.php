<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\candidate ;
use App\kura ;
use JavaScript;

class adminController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=category::all();

        $main_array=$this->pieChart();
        $main_array2=$this->barGraphs();

        JavaScript::put([
            'bargraphs' => $main_array2
        ]);
    

        //return $main_array;

        for($i=0;$i<count($main_array);$i++){
            $chartjs = app()->chartjs
                ->name('pieChartTest')
                ->type('pie')
                ->size(['width' => 400, 'height' => 200])
                ->labels($main_array[0])
                ->datasets([
                    [
                        'backgroundColor' => ['#FF6384', '#36A2EB'],
                        'hoverBackgroundColor' => ['#FF6384', '#36A2EB'],
                        'data' => $main_array[1]
                    ]
                ])
                ->options([]);
        }
            return view('admin/dashboard')->with('chartjs',$chartjs)->with('categories',$categories)->with('main_array2',$main_array2);
        

        
        //return view('admin/dashboard');
    }


    protected function pieChart(){

        $categories=category::pluck('cat_name')->toArray();

        $main_array=array();

        $candCount=array();
        foreach($categories as $category){
            $candidates=candidate::where('category',$category)->get()->count();
            array_push($candCount,$candidates);
        }

        array_push($main_array,$categories);
        array_push($main_array,$candCount);
        
        return $main_array;
    }

    protected function barGraphs(){

        $candidatesArray=array();
        $main_array2=array();
        $votesArray=array();

        $categories=category::pluck('cat_name')->toArray();

        for( $i=0;$i<count($categories);$i++){

            $candidates=candidate::where('category',$categories[$i])->pluck('fname')->toArray();
            array_push($candidatesArray,$candidates);

            $votes=kura::where('category',$categories[$i])->pluck('votes')->toArray();
            array_push($votesArray,$votes);

        }

        array_push($main_array2,$categories);
        array_push($main_array2,$candidatesArray);
        array_push($main_array2,$votesArray);

        return $main_array2;
    }
}

