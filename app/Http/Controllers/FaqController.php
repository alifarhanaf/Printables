<?php

namespace App\Http\Controllers;

use App\Faqs;
use App\Answers;
use App\FaqsAnswers;
use App\DesignImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    public function index(){
        return view ('admin.faqsForm');
    }

    public function editfaq($id){
        $faq = Faqs::where('id',$id)->get();
        $data = array(
            "faq"=> $faq,
        );
        return view ('admin.faqsForm')->with($data);
    }

    public function faqgrid(){
        $faqs = Faqs::all();
        $data = array(
            "faqs"=> $faqs,
        );
        return view ('admin.faqsgrid')->with($data);

    }

    public function submitfaq(Request $request){
       
        DB::beginTransaction();
        try {
        $faqs = new Faqs();
        $faqs->questions =request('questions');
        $faqs->save();
        foreach($request->answers as $answer){
        $answers = new Answers();
        $answers->answers =$answer;
        $answers->save();
        $faqs->answers()->attach($answers->id);
        };
        DB::commit();
        return redirect()->route('faq.form')->with('message','Faq Submitted Successfully');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('faq.form')->with('message',$ex->getMessage());
        }
    }
    //Update Method for FAQs
    public function submiteditfaq(Request $request,$id){
        DB::beginTransaction();
        try {
        $faq = Faqs::find($id);
        $faq->questions =request('questions');
        $faq->save();
        $faqid =  $faq->id;
        for($i=0;$i<count($request->answerids);$i++){
            $answers = Answers::find($request->answerids[$i]);
            $answers->answers =$request->answers[$i];
            $answers->save();
        }
        DB::commit();
        return redirect()->route('faq.edit',$faqid)->with('message','Faq Submitted Successfully');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('faq.edit',$faqid)->with('message',$ex->getMessage());
        }
    }
    //Deleting FAQ
    public function destroy($id)
        {
        DB::beginTransaction();
        try {
        $faq = Faqs::find($id);
        if($faq->groups){
            $ids = idsgenerator($faq->groups);
            $faq->groups()->detach($ids);
        }
        if($faq->answers){
            $ids = idsgenerator($faq->answers);
            $faq->answers()->detach($ids);
            Answers::destroy($ids);
        }
       
        Faqs::destroy($id);
        DB::commit();
        return redirect()->route('faq.grid',$id)->with('message','Faq Deleted Successfully');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('faq.grid',$id)->with('message',$ex->getMessage());
        }
       
        
    }
}
