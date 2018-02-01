<?php

namespace App\Http\Controllers;

use App\Dailynav;
use DB;
use Illuminate\Http\Request;

class DailyNavController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $units;
    public function summary()
    {
        // $dailynav = Dailynav::orderBy('sheme_id','date')->paginate(5);
        $dailynav = DB::table('dailynav')
                            ->join('scheme','dailynav.scheme_id', '=', 'scheme.id')
                            ->orderBy('date')
                            ->select('dailynav.*','scheme.scheme_name')
                            ->get();
                            // return($dailynav);
        $myarr= json_decode(json_encode($dailynav)); // It becomes array
        $ac= array_column($myarr, 'scheme_id');
        $uniqueids=array_unique($ac);
        //Scheme id wise division
        foreach ($dailynav as $key => $nav) {
            $arnav=(array)$nav;
            $schid=array_filter(
                $arnav, 
                    function($k) { return $k == 'scheme_id'; }, 
                     ARRAY_FILTER_USE_KEY)['scheme_id'] ;
                    //  echo('<p>**********************************************************</p>');            
            foreach ($uniqueids as $key => $val) {
                    if($schid ==$val){
                        $sortedmfs[$schid][]=$arnav;
                    }
                }

        }
        foreach($sortedmfs as $key => $val){
                
               $sh= array_column($val, 'scheme_name')[0];
               $this->units= array_column($val, 'units')[0];
               $date= array_column($val, 'date');
                $nav=array_column($val, 'nav');

                

                $date= array_map(function($v){return substr($v,0,10);},$date);
                
               $value= array_map(function($v){return $this->units*$v;},$nav);
               $output[]=[$sh,$this->units,$date,$nav,$value];
            // $value=(array)$nav*$units;
            // echo('<p>**********************************************************</p>');
            // var_dump( $value);

            array_unshift($nav, $sh);
                $navrows[] = $nav;
            array_unshift($value, $sh);
            $valrows[] = $value;
        
        }
        $cols =$date;
        array_unshift($cols, "Date");

          $dvisetotals= array_map(function($v){
                return $v[4];               
                },$output);
        function row_vert_sum($dvisetotals){
            $b=array_fill(0,count($dvisetotals[0]),0);
            foreach($dvisetotals as $a){
                $b = array_map(function (...$arrays) {
                    return array_sum($arrays);
                }, $a, $b);
            }
            return $b;
        }
                $daytotals=row_vert_sum($dvisetotals);
                
                
                $percgain[]=0;
                $valuegain[]=0;
                for($i=1;$i<count($daytotals);$i++){
                    $percgain[]=100*($daytotals[$i]-$daytotals[$i-1])/$daytotals[$i-1];
                    $valuegain[]=$daytotals[$i]-$daytotals[$i-1];
                    // var_dump($percgain);
                }
                // return $percgain;
                array_unshift($daytotals, 'Total value of the day');
                $totrows[] = $daytotals;

        

        
        // }
        

        $options = [
            
            'title' => 'Mutual Funds summary',
            'hAxis' => [
                'title' => 'Mutual Funds',
            ],
            'vAxis' => [
                'title' => 'Nav/Value'
            ],
            'seriesType' => 'bars',
            'series' => [
                '5' => ['type' => 'line']
            ]
        ];
        return view('Portfolio.summary',compact('output','options','cols','navrows',
        'valrows','totrows','percgain','valuegain'));
 
        
        

    }

    public function index()
    {
        // $dailynav = Dailynav::orderBy('sheme_id','date')->paginate(5);
        $dailynav = DB::table('dailynav')
                            ->join('scheme','dailynav.scheme_id', '=', 'scheme.id')
                            ->orderBy('date')
                            // ->distinct('scheme_id')
                            // ->select('scheme.scheme_name','dailynav.units','dailynav.scheme_id')
                            ->select('dailynav.*','scheme.scheme_name')
                            ->get();
        $myarr= json_decode(json_encode($dailynav)); // It becomes array
        // $ac= [array_column($myarr, 'date'),array_column($myarr, 'scheme_id')];
        // $ac= array_unique(array_column($myarr, 'date'));
        $ac= array_column($myarr, 'scheme_id');

        $uniqueids=array_unique($ac);
        // var_dump($uniqueids);
        
        // foreach ($uniqueids as $key => $val) {
        //     // echo("<p>$key => $val</p>");
        // }

        
        // return $output;
        // $fruits = array("d"=>"lemon", "a"=>"orange", "b"=>"banana", "c"=>"apple");
// krsort($ac);
$array=[  ];

  foreach ($dailynav as $key => $nav) {
    $arnav=(array)$nav;
    $schid=array_filter(
        $arnav, 
            function($k) { return $k == 'scheme_id'; }, 
             ARRAY_FILTER_USE_KEY)['scheme_id'] ;
            //  echo('<p>**********************************************************</p>');
    
  foreach ($uniqueids as $key => $val) {
        if($schid ==$val){

            $sortedmfs[$schid][]=$arnav;

        }
    }
    // var_dump($sortedmfs[$schid]);
    // array_map(function($k,$v){echo("<p>$k : $v</p>");},(array)$key,(array)$nav);
}
foreach($sortedmfs as $key => $val){
    // echo('<p>**********************************************************</p>');
    // var_dump(array_column($val, 'date'));
    // var_dump(
        $output[]=[
        array_column($val, 'scheme_name')[0],
        array_column($val, 'units')[0],
        array_column($val, 'date'),
    array_column($val, 'nav')];

}



            return view('Portfolio.index',compact('output','options','cols','rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(portfolio $portfolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, portfolio $portfolio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(portfolio $portfolio)
    {
        //
    }
}
