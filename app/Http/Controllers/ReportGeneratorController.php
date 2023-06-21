<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phd;
use App\Models\Events;
use App\Models\FundedProjects;
use App\Models\MoU;
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

    public function generateFundedProjects(){
        // Retrieve all funded projects
        $fundedProjects = FundedProjects::all();

        // Group funded projects by researcher
        $fundedProjects = $fundedProjects->groupBy('researcher')->sortBy('researcher');

        // Sort the grouped projects by researcher name in ascending order
        $fundedProjects = $fundedProjects->sortBy(function ($projects, $researcher) {
            return $researcher;
        });

        $pdf = Pdf::loadView('admin.report.projects', ['fundedProjects' => $fundedProjects]);
        return $pdf->stream();
    }

    function generateMoU(){
        #fetches all the MoU.
        $MoUs = MoU::all();
        $pdf = Pdf::loadView('admin.report.mou', ['MoUs' => $MoUs]);
        return $pdf->stream();
    }
}
