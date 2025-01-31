<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\CompanyAbout;
use App\Models\CompanyKeypoint;
use App\Models\CompanyStatistic;
use App\Models\HeroSection;
use App\Models\OurPrinciple;
use App\Models\Product;
use App\Models\ProjectClient;
use App\Models\Testimonial;
use App\Models\Client;
use App\Models\OurTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    //
    public function index()
    {
        // Pastikan view ini sesuai dengan yang Anda gunakan
        // $statistics = CompanyStatistic::take(4)->get();
        // $principles = OurPrinciple::take(4)->get();
        // $products = Product::take(4)->get();
        // return view('front.index', compact('statistics', 'principles','products'));
        $appointments = Appointment::take(4)->get();
        $companyAbout = CompanyAbout::take(4)->get();
        $companyKeypoint = CompanyKeypoint::take(4)->get();
        $statistics = CompanyStatistic::take(4)->get();
        $hero_section = HeroSection::orderByDesc('id')->take(1)->get();
        $ourPrinciples = OurPrinciple::take(4)->get();
        $products = Product::take(3)->get();
        $teams = OurTeam::take(7)->get();
        $projectClients = ProjectClient::take(4)->get();
        $testimonials = Testimonial::take(4)->get();
        $principles = OurPrinciple::take(4)->get();

        return view('front.index', compact(
            'appointments', 
            'companyAbout', 
            'companyKeypoint', 
            'statistics', 
            'hero_section', 
            'ourPrinciples', 
            'products',
            'teams',
            'projectClients', 
            'testimonials', 
            'principles'
        ));
    }
    public function team()
    {
        $teams = OurTeam::take(12)->get();
        $statistics = CompanyStatistic::take(4)->get();
        return view('front.team', compact('teams', 'statistics'));
    }
    public function about()
    {
        $abouts = CompanyAbout::take(2)->get();
        $statistics = CompanyStatistic::take(4)->get();
        return view('front.about', compact('abouts', 'statistics'));
    }

    public function appointment()
    {
        $testimonials = Testimonial::take(5)->get();
        $products = Product::take(3)->get();
        return view('front.appointment', compact('testimonials', 'products'));
    }

    public function appointment_store(StoreAppointmentRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();
            $newAppointment = Appointment::create($validated);
            // dd($newAppointment);
        });

        return redirect()->route('front.index');
    }
}
