<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Phpml\Classification\KNearestNeighbors;

class MLController extends Controller
{
    public function predict()
    {
        $samples = [
            [1, 2], [2, 4], [3, 6], [6, 8],
            [5, 7], [8, 9], [9, 10], [7, 8]
        ];
        $labels = ['a', 'a', 'a', 'b', 'b', 'b', 'b', 'b'];

        $classifier = new KNearestNeighbors();
        $classifier->train($samples, $labels);

        $sampleToPredict = [4, 5];
        $predictedLabel = $classifier->predict($sampleToPredict);

        return view('ml_result', ['prediction' => $predictedLabel]);
    }
}
