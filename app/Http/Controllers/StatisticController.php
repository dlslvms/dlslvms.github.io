<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Charts;
use App\Visitor;
use DB;

class StatisticController extends Controller
{
    // public function view()
    // {
    //     return view('pagestatistic.statistic');
    // }

    public function statistic_view()
    {
        $visitor = DB::table('visitors')
        ->select(
            DB::raw("date_format(created_at, '%b') month"),
            DB::raw("count(*) as number"))
        ->groupBy("month")
        ->oldest()
        ->get();

        $result[] = ['','Total number of Visitor',];
        foreach ($visitor as $key => $value) 
        {
            $result[++$key] = [date("F", strtotime($value->month)), (int)$value->number];
        }

        return view('pagestatistic.statistic')->with('visitor',json_encode($result));
    }

    public function frequent_visitor()
    {
        $data = DB::table('visitors')
          ->select(
            DB::raw('firstname'),
            DB::raw('count(*) as number'))
          ->groupBy('firstname')
          ->where('status', 0)
          ->get();
        $array[] = ['firstname', 'Total Number of Visit'];
        foreach($data as $key => $value)
        {
          $array[++$key] = [$value->firstname, $value->number];
        }
        return view('pagestatistic.frequentvisitor')->with('firstname', json_encode($array));
    }

    public function frequent_destination()
    {
        $data = DB::table('visitors')
        ->select(
          DB::raw('destination as destination'),
          DB::raw('count(*) as number'))
        ->groupBy('destination')
        ->get();
      $array[] = ['destination', 'Number'];
      foreach($data as $key => $value)
      {
        $array[++$key] = [$value->destination, $value->number];
      }
      return view('pagestatistic.frequentdestination')->with('destination', json_encode($array));
    
    //     $visitor = DB::table('visitors')
    //          ->join('destinations', 'destinations.id', '=', 'visitors.destination')
    //          ->select('destination', DB::raw('count(*) as total'))
    //          ->groupBy('destination')
    //          ->get();

    //          $result[] = ['','Number',];
    //             foreach ($visitor as $key => $value) 
    //             {
    //                 $result[++$key] = [date("F", strtotime($value->month)), (int)$value->number];
    //             }


    //          $array[] = ['destination_id', 'Number'];
    //             foreach($visitor as $key => $value)
    //             {
    //             $array[++$key] = [$value->destination_id, (int)$value->number];
    //             }
    //     return view('pagestatistic.frequentdestination-report')->with('destination', json_encode($array));
    }
}
