<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;



use App\TaskUser;

use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_status=TaskUser::all();
        return view('home.index',compact('all_status'));
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

    public function statuallshow($id=null)
    {
        if($id=='')
        {
            $status=TaskUser::get();
            return response()->json(['status'=>$status],200);
        }
        else
        {
            $status=TaskUser::find($id);
            return response()->json(['status'=>$status],200);

        }
    }

    /* user input their status*/
    public function statusadd(Request $request)
    {
        if($request->ismethod('post'))
        {
            $data=$request->all();
            //return $data;
            $rules =  [
                'status' => 'required',

            ];
            $cutomsmsg=
            [
                'status.status'=>'please write something here',
            ];

            $validator = Validator::make($data,$rules,$cutomsmsg);
            if($validator->fails()){
                return response()->json($validator->errors(),422);
            }

            $ad_status=new TaskUser();
            $ad_status->status=$data['status'];
            $ad_status->save();
            $msg='add successfully';
            return response()->json(['msg'=>$msg],201);
            //return redirect()->back()->with('$msg');
        }

    }
    /* if any status make your backend multiple*/
    public function addmultistatus(Request $request)
    {
        if($request->ismethod('post'))
        {
            $data=$request->all();
            //return $data;
            $rules =  [
                'add_once_status.*.status' => 'required',

            ];
            $cutomsmsg=
            [
                'add_once_status.*.status.required'=>'please write something here',
            ];

            $validator = Validator::make($data,$rules,$cutomsmsg);
            if($validator->fails()){
                return response()->json($validator->errors(),422);
            }
            foreach($data['add_once_status'] as $added_status)
            {
                $m_status=new TaskUser();
                $m_status->status=$added_status['status'];
                $m_status->save();
                $msg='add successfully';

            }

            return response()->json(['msg'=>$msg],201);
        }

    }
    public function updatestatus(Request $request, $id)
    {
        if($request->ismethod('put'))
        {
            $data=$request->all();
            //return $data;
            $rules =  [
                'status' => 'required',

            ];
            $cutomsmsg=
            [
                'status.status'=>'please write something here',
            ];

            $validator = Validator::make($data,$rules,$cutomsmsg);
            if($validator->fails()){
                return response()->json($validator->errors(),422);
            }

            $ad_status=TaskUser::FindOrFail($id);
            $ad_status->status=$data['status'];
            $ad_status->save();
            $msg='update successfully';
            return response()->json(['msg'=>$msg],202);
        }

    }

    public function deletestatus($id=null)
    {
        TaskUser::findOrFail($id)->delete();
        $msg='status delete success';
        return response()->json(['msg'=>$msg],200);

    }

    public function deletedetailsstatus(Request $request)
    {
        if($request->isMethod('delete'))
        {
            $data=$request->all();
            TaskUser::where('id',$data['id'])->delete();
            $msg='status details delete success';
            return response()->json(['msg'=>$msg],200);
        }


    }

    public function deletemultistatus($id)
    {
        $ids=explode(',',$id);
        TaskUser::whereIn('id',$ids)->delete();
        $msg='multi status delete success';
            return response()->json(['msg'=>$msg],200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //$response = Http::post('http://127.0.0.1:8000/api/addstatus', $request->input());
        $this->validate($request, [
            'status' => 'required|string',

        ]);

        $ad_status= new TaskUser;
        $ad_status->status=$request->status;
        $ad_status->save();
        return redirect()->back()->with('msg', 'Success');

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
