<?php

namespace App\Charts;

use App\Models\Camp;
use App\Models\Checkout;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class EarningsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $months = date("m");
        $years = date("Y");
        for ($i = 1; $i <= $months; $i++) {
            $data = Checkout::whereMonth("created_at", $i)
                ->whereYear("created_at", $years)
                ->where("is_paid", true)
                ->sum("total");
            // format number 40000 jadi Rp. 40.000
            $totalPrice[] = $data;
            $totalMonth[] = Carbon::createFromDate(
                $years,
                $i
            )->translatedFormat("F");
        }
        // dd($totalPrice);
        return $this->chart
            ->areaChart()
            ->setTitle("Earnings Chart, " . $years)
            ->addData("Earnings", $totalPrice)
            ->setXAxis($totalMonth);
    }
}
