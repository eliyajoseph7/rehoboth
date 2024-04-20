<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\CostReturn;
use App\Models\CostTaken;
use App\Models\Expenditure;
use App\Models\MonthlyReport;
use App\Models\StaffAllowance;
use App\Models\Support;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonthlyReportController extends Controller
{
    public function generate()
    {
        $year = now()->format('Y');
        $month = now()->format('m');
        // $day = now()->format('d');
        $total_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        for($i = 1; $i <= $total_days; $i++) {
            $day = $i;
            $date = new DateTime($year . '-' . $month . '-' . $day);
            $report = new MonthlyReport;
            $report->date = $date;
            $report->save();
            //============== cost taken ================
            $takens = CostTaken::whereDay('date', $day)->whereMonth('date', $month)->whereYear('date', $year)->select(
                'date',
                DB::raw('SUM(amount) as amount'),
                DB::raw('SUM(form) as form'),
                DB::raw('SUM(CASE WHEN payment_method_id = 2 THEN amount END) mtaji_mpesa')
            )->groupBy('date')->oldest()->get();
    
            foreach ($takens as $taken) {
                $exist = MonthlyReport::where(DB::raw("(DATE_FORMAT(date,'%Y-%m-%d'))"), $taken->date)->first();
                if ($exist) {
                    $exist->gawa = $taken->amount;
                    $exist->form = $taken->form;
                    $exist->mtaji_mpesa = $taken->mtaji_mpesa ?? 0;
                    $exist->save();
                } else {
                    $report->date = $taken->date;
                    $report->gawa = $taken->amount;
                    $report->form = $taken->form;
                    $report->mtaji_mpesa = $taken->mtaji_mpesa ?? 0;
                    $report->save();
                }
            }
            //=============== end cost taken ============
    
            //=============== returns ============
            $returns = CostReturn::whereDay('date', $day)->whereMonth('date', $month)->whereYear('date', $year)->select(
                'date',
                DB::raw('SUM(CASE WHEN payment_method_id = 2 THEN amount END) as mauzo_mpesa'),
                DB::raw('SUM(CASE WHEN payment_method_id = 1 THEN amount END) as mauzo_cash')
            )->groupBy('date')->oldest()->get();
    
            foreach ($returns as $return) {
                $exist = MonthlyReport::where(DB::raw("(DATE_FORMAT(date,'%Y-%m-%d'))"), $return->date)->first();
                if ($exist) {
                    $exist->mauzo_mpesa = $return->mauzo_mpesa ?? 0;
                    $exist->mauzo_cash = $return->mauzo_cash ?? 0;
                    $exist->save();
                } else {
                    $report->date = $taken->date;
                    $report->mauzo_mpesa = $return->mauzo_mpesa ?? 0;
                    $report->mauzo_cash = $return->mauzo_cash ?? 0;
                    $report->save();
                }
            }
            //=============== end returns ============
    
            //=============== allowances ============
            $allowances = StaffAllowance::whereDay('date', $day)->whereMonth('date', $month)->whereYear('date', $year)->select('date', DB::raw('SUM(amount) as allowance'))
                ->oldest()->groupBy('date')->get();
    
            foreach ($allowances as $allowance) {
                $exist = MonthlyReport::where(DB::raw("(DATE_FORMAT(date,'%Y-%m-%d'))"), $allowance->date)->first();
                if ($exist) {
                    $exist->allowance = $allowance->allowance;
                    $exist->save();
                } else {
                    $report->date = $allowance->date;
                    $report->allowance = $allowance->allowance;
                    $report->save();
                }
            }
    
            //============= end allowances ===========
    
    
            //============= expenditure ===========
            $expenditures = Expenditure::whereDay('date', $day)->whereMonth('date', $month)->whereYear('date', $year)->select(
                'date',
                DB::raw('SUM(CASE WHEN payment_method_id = 2 THEN amount END) as expenditure_mpesa'),
                DB::raw('SUM(CASE WHEN payment_method_id = 1 THEN amount END) as expenditure_cash')
            )->groupBy('date')->oldest()->get();
    
            foreach ($expenditures as $expenditure) {
                $exist = MonthlyReport::where(DB::raw("(DATE_FORMAT(date,'%Y-%m-%d'))"), $expenditure->date)->first();
                if ($exist) {
                    $exist->expenditure_mpesa = $expenditure->expenditure_mpesa ?? 0;
                    $exist->expenditure_cash = $expenditure->expenditure_cash ?? 0;
                    $exist->save();
                } else {
                    $report->date = $taken->date;
                    $report->expenditure_mpesa = $expenditure->expenditure_mpesa ?? 0;
                    $report->expenditure_cash = $expenditure->expenditure_cash ?? 0;
                    $report->save();
                }
            }
    
            //============= end expenditure ===========
    
            //============= support ===========
            $supports = Support::whereDay('date', $day)->whereMonth('date', $month)->whereYear('date', $year)->select(
                'date',
                DB::raw('SUM(CASE WHEN support_category_id = 2 THEN amount END) as support_out'),
                DB::raw('SUM(CASE WHEN support_category_id = 1 THEN amount END) as support_in')
            )->groupBy('date')->oldest()->get();
    
            foreach ($supports as $support) {
                $exist = MonthlyReport::where(DB::raw("(DATE_FORMAT(date,'%Y-%m-%d'))"), $support->date)->first();
                if ($exist) {
                    $exist->support_out = $support->support_out ?? 0;
                    $exist->support_in = $support->support_in ?? 0;
                    $exist->save();
                } else {
                    $report->date = $taken->date;
                    $report->support_out = $support->support_out ?? 0;
                    $report->support_in = $support->support_in ?? 0;
                    $report->save();
                }
            }
            //============= end support ===========
    
            // if all are empty, insert null for today
    
            if(count($takens) == 0 && count($returns) == 0 && count($allowances) == 0 && count($expenditures) == 0 && count($supports) == 0) {
                $newreport = MonthlyReport::where(DB::raw("(DATE_FORMAT(date,'%Y-%m-%d'))"), now()->format('Y-m-d'))->first();
                if(!$newreport) {
                    $report->save();
                }
    
            }
        }

        return;
    }
    public function fetchTotals($month, $year)
    {
        $totals = MonthlyReport::whereMonth('date', $month)->whereYear('date', $year)
            ->select(
                DB::raw('SUM(gawa) as gawa'),
                DB::raw('SUM(form) as form'),
                DB::raw('SUM(mauzo_cash) as mauzo_cash'),
                DB::raw('SUM(mauzo_mpesa) as mauzo_mpesa'),
                DB::raw('SUM(allowance) as allowance'),
                DB::raw('SUM(mtaji_mpesa) as mtaji_mpesa'),
                DB::raw('SUM(expenditure_cash) as expenditure_cash'),
                DB::raw('SUM(expenditure_mpesa) as expenditure_mpesa'),
                DB::raw('SUM(support_in) as support_in'),
                DB::raw('SUM(support_out) as support_out')
            )
            ->get();

        return $totals;
    }
}
