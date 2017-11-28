<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all live issues
        $issues = \App\IssueModel::where('status', 'live')->get();
       
        
        $collect_issues=collect();
        foreach($issues as $key => $i){
            $response = \App\ResponseModel::where('issue_id', $i->id)
                                            ->where('user_id', Auth::user()->id)
                                                ->first();
            if(!$response){
                $collect_issues->push($i);
            }
        }
        Log::info($collect_issues->all());
       // return view('admin.issue_list', ['issues' => $issues, 'statusType' => 'All']);



       // $issues = \App\IssueModel::where('status', 'live')->get();
        return view('main.index', ['issues' => $collect_issues->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $issue = \App\IssueModel::find($id);
        $questions = \App\QuestionModel::where('issue_id', $id)->get();
        
        $collect = collect();
        foreach($questions as $question){
            $answers = \App\AnswerModel::where('question_id', $question->id)->get();
            $collect->push(['question' => $question, 'answers' => $answers]);
        }

        
                                        
        return view('main.issue', ['issue' => $issue, 'data' => $collect->all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
