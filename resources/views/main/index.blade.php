@extends('layouts.app')

@section('content')

@include('admin/inc/message')

    <div>
        <h2>Vote For Your Favourite Candidates</h2>
    </div>
    <form method="POST" action="{{ route('verify') }}" aria-label="{{ __('Vote') }}" id="update-form">
        @csrf
        @foreach($category as $cat)
            <div class="table-users">
                <div class="header">{{$cat->cat_name}}</div>
                <table>
                    @foreach($candidates as $cand)
                        @if($cand->category==$cat->cat_name)
                            <tr>
                                <td><input type="radio" id="{{$cand->id}}" name="{{$cat->cat_name}}" value="{{$cand->id}}"></td>
                                <td><label for="{{$cand->id}}">{{$cand->fname}} &nbsp;&nbsp;{{$cand->lname}}</label></td>
                                <td align="right"><a href=""><img src="/storage/thumbnails/{{$cand->image}}" alt="" /></a></td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        @endforeach


                <div class="votebtn" id="btn">
                    <button class="btn btn-outline-success btn-lg btn-block" data-toggle="modal" data-target="#exampleModal" onclick="event.preventDefault();">
                            {{ __('Vote') }}
                    </button>
        
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Enter Your Phone Number</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
        
                        <div class="modal-body modal-size">
        
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone Number</label>
                                <input type="text" class="form-control" name="no" id="exampleInputEmail1" aria-describedby="phonehelp" placeholder="Enter your phone no." autofocus required>
                                <small id="phonehelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
                            </div>
        
                        </div>
        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="document.getElementById('update-form').submit();">Send</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>

@endsection