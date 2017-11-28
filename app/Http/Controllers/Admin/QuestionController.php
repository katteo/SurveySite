<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\QuestionModel;
use App\AnswerModel;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info($request->all());
        
        $question = new QuestionModel;
        $question->issue_id = $request['issue_id'];
        $question->question = $request['question'];

        $question->save();

        $answer = new AnswerModel;
        $answer->question_id = $question->id;
        $answer->answer = $request['answer'];

        $answer->save();

        $answer = new AnswerModel;
        $answer->question_id = $question->id;
        $answer->answer = $request['answer1'];

        $answer->save();
        
        $answer = new AnswerModel;
        $answer->question_id = $question->id;
        $answer->answer = $request['answer2'];

        $answer->save();
        
        $answer = new AnswerModel;
        $answer->question_id = $question->id;
        $answer->answer = $request['answer3'];

        $answer->save();
              
        return redirect()->back()->with('status', 'Pregunta registrada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
