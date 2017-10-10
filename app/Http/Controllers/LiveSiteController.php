<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Models\UnpublishedPages;
use Illuminate\Support\Facades\Request;

class LiveSiteController extends Controller {

    public function __construct() {
        $this->checkUnpublishedPage();
    }

    public function machine() {
        return view('frontend.pages.machine-frames.machine');
    }

     public function continuum() {
        return view('frontend.pages.machine-frames.continuum-frame');
    }

    public function gqframe() {
        return view('frontend.pages.machine-frames.gq-frame');
    }

    public function compareMachineFrames() {
        return view('frontend.pages.machine-frames.compare-machine-frames');
    }

    public function comparison() {
        return view('frontend.pages.machine-frames.comparison');
    }

    public function accessories() {
        return view('frontend.pages.machine-frames.accessories');
    }

    public function graciekq() {
        return view('frontend.pages.machine-frames.gracie-kq');
    }

    public function sr2frame() {
        return view('frontend.pages.machine-frames.sr-2-frame');
    }

// QNIQUE
    public function qm() {
        return view('frontend.pages.qnique.quilting-machines');
    }

    public function dynamicProduct(Request $request) {
        $data=\App\Models\ProductPages::where('slug',Request::segment(2))->first();
        
        return view('frontend.pages.dynamic-product.index', compact('data'));
    }

    public function qnique() {
        return view('frontend.pages.qnique.qnique');
    }

    public function qnique21() {
        return view('frontend.pages.qnique.qnique21');
    }

    public function qfeatures() {
        return view('frontend.pages.qnique.features');
    }

    public function qspecs() {
        return view('frontend.pages.qnique.specs');
    }

    public function qaccessories() {
        return view('frontend.pages.qnique.accessories');
    }

    public function q14sitdown() {
        return view('frontend.pages.qnique.qnique-14-sitdown');
    }

    public function q21sitdown() {
        return view('frontend.pages.qnique.qnique-21-sitdown');
    }

// AUTOMATION
    public function qct() {
        return view('frontend.pages.qct.qct');
    }

    public function qctfeatures() {
        return view('frontend.pages.qct.features');
    }

    public function qctcompare() {
        return view('frontend.pages.qct.compare');
    }

    public function qctspecs() {
        return view('frontend.pages.qct.specs');
    }

    public function qcttutorials() {
        return view('frontend.pages.qct.tutorials');
    }

    public function qctsupport() {
        return view('frontend.pages.qct.support');
    }

    public function qctpurchase() {
        return view('frontend.pages.qct.purchase');
    }

// HAND QUILTING
    public function handquilting() {
        return view('frontend.pages.hand-quilting.handquilting');
    }

    public function z44frame() {
        return view('frontend.pages.hand-quilting.z44-frame');
    }

    public function startrightez3() {
        return view('frontend.pages.hand-quilting.start-right-ez3');
    }

    public function gracehoop2() {
        return view('frontend.pages.hand-quilting.grace-hoop-2');
    }

    public function gracelaphoops() {
        return view('frontend.pages.hand-quilting.grace-lap-hoops');
    }

    public function graciebee() {
        return view('frontend.pages.hand-quilting.graciebee');
    }

    public function handaccessories() {
        return view('frontend.pages.hand-quilting.accessories');
    }

    public function comparehandframes() {
        return view('frontend.pages.hand-quilting.compare-frames');
    }

// TRUECUT
    public function truecut() {
        return view('frontend.pages.truecut.truecut');
    }

    public function comfort() {
        return view('frontend.pages.truecut.comfort-cutter');
    }

    public function cuttingMats() {
        return view('frontend.pages.truecut.cutting-mats');
    }

    public function cuttingTable() {
        return view('frontend.pages.truecut.cutting-table');
    }

    public function linearSharpener() {
        return view('frontend.pages.truecut.linear-sharpener');
    }

    public function rotaryCuttingAccessories() {
        return view('frontend.pages.truecut.rotary-cutting-accessories');
    }

    public function rulers() {
        return view('frontend.pages.truecut.rulers');
    }

    public function truesharp() {
        return view('frontend.pages.truecut.truesharp');
    }

    public function truecut360() {
        return view('frontend.pages.truecut.truecut360');
    }

// ACCESSORIES
    public function addons() {
        return view('frontend.pages.accessories.accessories');
    }

    public function luminess() {
        return view('frontend.pages.accessories.luminess');
    }

    public function ppp() {
        return view('frontend.pages.accessories.plastic-pattern-perfect');
    }

    public function qclips() {
        return view('frontend.pages.accessories.quilt-clips');
    }

//COMMUNITY
    public function community() {
        return view('frontend.pages.community');
    }

    public function resouces() {
        return view('frontend.resources');
    }

//SUPPORT
    public function support() {
        return view('frontend.pages.support.support');
    }

    public function newsletter() {
        return view('frontend.pages.support.newsletter');
    }

    public function support_videos() {
        //$support = \App\Models\Video::where('video_section', 'like', '%support%')->get();
        $categories = \App\Models\VideoCategory::whereHas('videos', function($query) {
                    $query->Support();
                })->get();
        //dd($categories->videos()->get());
        //dd($support->videoCategory()->get());
        return view('frontend.pages.support.videos', compact('categories'));
    }

    public function instructions() {
        return view('frontend.pages.support.instructions');
    }

//VIDEOS
    public function videos() {
        $categories = \App\Models\VideoCategory::whereHas('videos', function($query) {
                    $query->Regular();
                })->get();
        return view('frontend.pages.videos.index', compact('categories'));
    }

    public function checkUnpublishedPage() {
        $current_url = Route::getCurrentRoute()->getPath();
        $current_url = str_replace('en/', '', $current_url);

        $unpublished_page = UnpublishedPages::where('slug', $current_url)->first();

        if (isset($unpublished_page)) {
            if ($unpublished_page->new_slug) {
                return Redirect::to(getLang() . '/' . $unpublished_page->new_slug)->send();
            } else {
                return Redirect::to(getLang())->send();
            }
        }
    }

}
