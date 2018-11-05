<?php

namespace App\Http\Controllers;

use App\candidate;
use App\category;
use App\kura;
use\App\Events\CandidateAdded;
use Illuminate\Http\Request;

class CandidateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates=candidate::all();
        $category=category::all();
        return view('admin/candidate/viewCandidate')->with('candidates',$candidates)->with('category',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=category::all();
        return view('admin/candidate/addCandidate')->with('category',$category);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'fname'=>'required',
            'lname'=>'required',
            'cat'=>'required',
            'desc'=>'required',
            'image'=>'image|nullable|max:1999'
        ]);

        if($request->hasFile('image')){
            //getting file name with extension
            $fileNamewithext=$request->file('image')->getClientOriginalName();
            //getting the file
            $fileName=pathInfo($fileNamewithext,PATHINFO_FILENAME);
            //getting the extension
            $extension=$request->file('image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;
            //upload image
            $path=$request->file('image')->storeAs('/public/thumbnails',$fileNameToStore);
        }else{
            $fileNameToStore='noimage.jpg';
        }


        $candidate=new candidate;
        $candidate->fname=$request->input('fname');
        $candidate->lname=$request->input('lname');
        $candidate->category=$request->input('cat');
        $candidate->desc=$request->input('desc');
        $candidate->image=$fileNameToStore;
        $candidate->linkOne=$request->input('link1');
        $candidate->linkTwo=$request->input('link2');
        $candidate->linkThree=$request->input('link3');
        $candidate->save();

        $kura=new kura;
        $kura->votes=0;
        $kura->category=$request->input('cat');
        $candidate->kura()->save($kura);

        $category=category::all();

        return view('admin/candidate/addCandidate')->with('success','Candidate Added Successfully')->with('category',$category)->with('success','candidate Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(candidate $candidate)
    {
        $candidate= candidate::find($candidate)->first();
        $category=category::all();
        return view('admin.candidate.editCandidate')->with('candidate',$candidate)->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, candidate $candidate)
    {
        $this->validate($request,[
            'fname'=>'required',
            'lname'=>'required',
            'desc'=>'required',
            'image'=>'image|nullable|max:1999'
        ]);

        if($request->hasFile('image')){
            //getting file name with extension
            $fileNamewithext=$request->file('image')->getClientOriginalName();
            //getting the file
            $fileName=pathInfo($fileNamewithext,PATHINFO_FILENAME);
            //getting the extension
            $extension=$request->file('image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;
            //upload image
            $path=$request->file('image')->storeAs('/public/thumbnails',$fileNameToStore);
        }else{
            $fileNameToStore='noimage.jpg';
        }


        $candidate=candidate::find($candidate)->first();
        $candidate->fname=$request->input('fname');
        $candidate->lname=$request->input('lname');
        $candidate->desc=$request->input('desc');
        $candidate->linkOne=$request->input('link1');
        $candidate->linkTwo=$request->input('link2');
        $candidate->linkThree=$request->input('link3');
        $candidate->save();

        $candidates=candidate::all();
        $category=category::all();

        session()->flash('success','Candidate Updated Successfully');
        
        return view('admin/candidate/viewCandidate')->with('candidates',$candidates)->with('category',$category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy($candidate)
    {
        candidate::where('id',$candidate)->delete();
        kura::where('candidate_id',$candidate)->delete();
        $candidates=candidate::all();

        session()->flash('success','Candidate Removed Successfully');

        return view('admin/candidate/viewCandidate')->with('candidates',$candidates);
    }
}
