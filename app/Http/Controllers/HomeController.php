<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\PaymentUser;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $courses = Course::where('status', '3')->latest('id')->get()->take(12);

        //  return Course::find(13)->rating;

        return view('welcome', compact('courses'));
    }
    public function invoices()
    {
        $invoices = PaymentUser::where('user_id', auth()->user()->id)->get();
        return view('invoices', compact('invoices'));
    }
}
