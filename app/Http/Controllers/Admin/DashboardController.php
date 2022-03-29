<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WarrantyRegistration;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $meta = [
            'warrantyRegistrations' => [
                'new'     => WarrantyRegistration::new()->count(),
                'flagged' => WarrantyRegistration::flagged(true)->count(),
                'total'   => WarrantyRegistration::count(),
            ]
        ];

        $warrantyRegistrations = WarrantyRegistration::orderBy('created_at','desc')->limit(5)->get();

        return compact('meta','warrantyRegistrations');
    }
}
