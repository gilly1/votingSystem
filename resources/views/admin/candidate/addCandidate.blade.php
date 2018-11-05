@extends('admin.layouts.app')

@section('content')
 <div style="padding:50px 0">
    <div style=" background-color:white; max-width: calc(100% - 2px); width:900px; margin:auto;">
        <!-- form start -->

          <div class="form-group"style="padding:10px 0; max-width: calc(100% - 2px); width:500px; margin:auto;">

            <h3>Add Candidate</h3>

                <form method="POST" action="{{ route('candidate.store') }}" enctype="multipart/form-data" aria-label="{{ __('Save') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="fname" class="col-sm-4">{{ __('First Name') }}</label>

                        <div class="col-md-12">
                            <input id="fname" type="text" class="form-control" name="fname" value="" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lname" class="col-sm-4">{{ __('Last Name') }}</label>

                        <div class="col-md-12">
                            <input id="lname" type="text" class="form-control" name="lname" value="" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cat" class="col-sm-4">{{ __('Category') }}</label>
                        <div class="col-md-12">
                            <select class="form-control" id="cat" name="cat">
                                @foreach($category as $cat)
                                    <option value="{{$cat->cat_name}}">{{$cat->cat_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="desc" class="col-sm-4">{{ __('Description') }}</label>

                        <div class="col-md-12">
                            <textarea class="form-control" value="" id="desc" class="form-control" name="desc"></textarea>
                        </div>
                    </div>

                        <div class="form-group row">
                            <label for="link1" class="col-sm-4">{{ __('First Link') }}</label>

                            <div class="col-md-12">
                                <input id="link1" type="text" class="form-control" name="link1" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="link2" class="col-sm-6">{{ __('Second Link') }}</label>

                            <div class="col-md-12">
                                <input id="link2" type="text" class="form-control" name="link2" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="link3" class="col-sm-4">{{ __('Third Link') }}</label>

                            <div class="col-md-12">
                                <input id="link3" type="text" class="form-control" name="link3" value="">
                            </div>
                        </div>
                        <div>
                            <label for="image">File input</label>
                            <input type="file" id="image" name="image" class="form-control">
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                        
                    </div>

                </form>
        </div>
    </div>
  </div> 
@endsection