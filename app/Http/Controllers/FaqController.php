<?php

namespace App\Http\Controllers;

use App\Faqs;
use App\Answers;
use App\FaqsAnswers;
use App\DesignImages;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){
        return view ('admin.faqsForm');
    }
    public function submitfaq(Request $request){
        // dd($request);
        $faqs = new Faqs();
        $faqs->questions =request('questions');
        $faqs->save();
        $answers = new Answers();
        $answers->answers =request('answers');
        $answers->save();
        $faqsanswers = new FaqsAnswers();
        $faqsanswers->faqs_id = $faqs->id;
        $faqsanswers->answers_id = $answers->id;
        $faqsanswers->save();
    }
}
