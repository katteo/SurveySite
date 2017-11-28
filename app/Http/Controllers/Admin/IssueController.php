<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\IssueModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function showList()
    {
        $issues = \App\IssueModel::all();
        return view('admin.issue_list', ['issues' => $issues, 'statusType' => 'All']);
    }
    
    
    public function showListByStatus($status)
    {
        $issues = \App\IssueModel::where('status', $status)->get();
        return view('admin.issue_list', [
            'issues' => $issues, 
            'statusType' => ucfirst($status)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.issue_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        Log::info($request->all());

        $issue = new IssueModel; 
        $issue->title = $request['title'];
        $issue->motive = $request['motive'];
        $issue->created_by_id = Auth::user()->id;
    
        
        $result = $issue->save();

        return redirect('/admin/issues/add')->with('status', 'Encuesta registrada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $issue = \App\IssueModel::findOrFail($id);
        $questions = \App\IssueModel::find($id)->questions;
        
        // get available status & editable status
        $editable = true;
        $availableStatus = getAvailableStatuses($issue->status);
    
        return view('admin.issue', [
            'issue' => $issue, 
            'questions' => $questions, 
            'editable' => $editable, 
            'availableStatus' => $availableStatus
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
       
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
        $issue = \App\IssueModel::findOrFail($id);

        $issue->title = $request['title'];
        $issue->motive = $request['motive'];
        $issue->status = $request['status'];

        $issue->save();

        return redirect()->back()->with('status', 'Encuesta modificada correctamente');
    }

    public function saveResponse(Request $request){
        
        //return response()->json($request->all());

        if(isset($request['answer'])){
            $response = new \App\ResponseModel;
            $response->user_id = Auth::user()->id;
            $response->issue_id = $request['issue_id'];
            $response->answer_id=$request['answer'];
            $response->save();
            return redirect('/')->with('success', 'Se ha completado la encuesta');
        }
        return redirect()->back()->with('warning', 'Por favor, seleccione una respuesta');

       

        
        
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
