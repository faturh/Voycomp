<?php

namespace App\Http\Controllers;

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
}
