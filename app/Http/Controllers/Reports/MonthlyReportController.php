<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\CostReturn;
use App\Models\CostTaken;
use App\Models\Expenditure;
use App\Models\MonthlyReport;
use App\Models\StaffAllowance;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonthlyReportController extends Controller
{
    public function generate()
    {

        $report = new MonthlyReport;
        //============== cost taken ================
        $takens = CostTaken::select(
            'date',
            DB::raw('SUM(amount) as amount'),
            DB::raw('SUM(form) as form'),
            DB::raw('SUM(CASE WHEN payment_method_id = 2 THEN amount END) mtaji_mpesa')
        )->groupBy('date')->oldest()->get();

        foreach($takens as $taken) {
            $exist = MonthlyReport::where('date', $taken->date)->first();
            if($exist) {
                $exist->gawa = $taken->amount;
                $exist->form = $taken->form;
                $exist->mtaji_mpesa = $taken->mtaji_mpesa;
                $exist->save();
            } else {
                $report->date = $taken->date;
                $report->gawa = $taken->amount;
                $report->form = $taken->form;
                $report->mtaji_mpesa = $taken->mtaji_mpesa;
                $report->save();
            }

        }
        //=============== end cost taken ============

        //=============== returns ============
        $returns = CostReturn::select(
            'date',
            DB::raw('SUM(CASE WHEN payment_method_id = 2 THEN amount END) as mauzo_mpesa'),
            DB::raw('SUM(CASE WHEN payment_method_id = 1 THEN amount END) as mauzo_cash')
        )->groupBy('date')->oldest()->get();

        foreach($returns as $return) {
            $exist = MonthlyReport::where('date', $return->date)->first();
            if($exist) {
                $exist->mauzo_mpesa = $return->mauzo_mpesa;
                $exist->mauzo_cash = $return->mauzo_cash;
                $exist->save();
            } else {
                $report->date = $taken->date;
                $report->mauzo_mpesa = $return->mauzo_mpesa;
                $report->mauzo_cash = $return->mauzo_cash;
                $report->save();
            }
        }
        //=============== end returns ============

        //=============== allowances ============
        $allowances = StaffAllowance::select('date', DB::raw('SUM(amount) as allowance'))
            ->oldest()->groupBy('date')->get();

            foreach($allowances as $allowance) {
                $exist = MonthlyReport::where('date', $allowance->date)->first();
                if($exist) {
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
        $expenditures = Expenditure::select(
            'date',
            DB::raw('SUM(CASE WHEN payment_method_id = 2 THEN amount END) as expenditure_mpesa'),
            DB::raw('SUM(CASE WHEN payment_method_id = 1 THEN amount END) as expenditure_cash')
        )->groupBy('date')->oldest()->get();

        foreach($expenditures as $expenditure) {
            $exist = MonthlyReport::where('date', $expenditure->date)->first();
            if($exist) {
                $exist->expenditure_mpesa = $expenditure->expenditure_mpesa;
                $exist->expenditure_cash = $expenditure->expenditure_cash;
                $exist->save();
            } else {
                $report->date = $taken->date;
                $report->expenditure_mpesa = $expenditure->expenditure_mpesa;
                $report->expenditure_cash = $expenditure->expenditure_cash;
                $report->save();
            }
        }

        //============= end expenditure ===========
        
        //============= support ===========
        $supports = Support::select(
            'date',
            DB::raw('SUM(CASE WHEN support_category_id = 2 THEN amount END) as support_out'),
            DB::raw('SUM(CASE WHEN support_category_id = 1 THEN amount END) as support_in')
        )->groupBy('date')->oldest()->get();

        foreach($supports as $support) {
            $exist = MonthlyReport::where('date', $support->date)->first();
            if($exist) {
                $exist->support_out = $support->support_out;
                $exist->support_in = $support->support_in;
                $exist->save();
            } else {
                $report->date = $taken->date;
                $report->support_out = $support->support_out;
                $report->support_in = $support->support_in;
                $report->save();
            }
        }
        //============= end support ===========
        return;
    }
}
