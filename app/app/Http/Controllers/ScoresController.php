<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Score;

class ScoresController extends BaseController
{
    public function yatzyScores()
    {
        $scores = Score::orderBy('points')->get();

        // dd($scores);

        return view('scores', compact("scores"));
    }
}
