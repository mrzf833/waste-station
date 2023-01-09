<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\InformationEducation;
use App\Models\Role;
use App\Models\TransactionDetail;
use App\Models\User;
use App\Models\WasteCategory;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function home()
    {
        $roleNasabah = Role::where('role', 'client')->first()->id;
        $nasabahCount = User::where('role_id', $roleNasabah)->count();
        $sampahCount = TransactionDetail::sum('total_waste');
        return view('user.landing-page.index', [
            'nasabahCount' => $nasabahCount,
            'sampahCount' => $sampahCount
        ]);
    }

    public function program()
    {
        return view('user.landing-page.program-non-organik');
    }

    public function informationEducation()
    {
        $informationEducations = InformationEducation::all();
        return view('user.landing-page.information-education', [
            'informationEducations' => $informationEducations
        ]);
    }

    public function informationEducationDetail(InformationEducation $informationEducation)
    {
        return view('user.landing-page.infomation-education-detail', [
            'informationEducation' => $informationEducation
        ]);
    }

    // public function programOrganik()
    // {
    //     return view('user.landing-page.program-organik');
    // }

    // public function programNonOrganik()
    // {
    //     return view('user.landing-page.program-non-organik');
    // }

    // public function programDetail(InformationEducation $informationEducation)
    // {
    //     return view('user.landing-page.program-infomation-education', [
    //         'informationEducation' => $informationEducation
    //     ]);
    // }

    public function kategori()
    {
        $categoryWastes = WasteCategory::all();
        return view('user.landing-page.kategori', [
            'categoryWastes' => $categoryWastes
        ]);
    }

    public function tentang()
    {
        return view('user.landing-page.tentang');
    }
}
