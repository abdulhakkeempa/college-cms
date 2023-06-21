<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phd;
use App\Models\Events;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportGeneratorController extends Controller
{
    public function generatePhD(){
        $phds = Phd::all();
        $pdf = Pdf::loadView('admin.report.phd', ['phds' => $phds]);
        return $pdf->stream();
    }

    public function generateEvents(){
        $events = Events::all();
        $pdf = Pdf::loadView('admin.report.events', ['events' => $events]);
        return $pdf->stream();
    }
}
