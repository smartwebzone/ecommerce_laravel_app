<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Stats;

/**
 * Class DashboardController.
 *
 * @author Phillip Madsen <contact@affordableprogrammer.com>
 */
class DashboardController extends Controller
{
    public function index(Stats $stats)
    {
        return view('backend/layout/dashboard', compact('chartData','stats'))->with('active', 'home');
    }
}
