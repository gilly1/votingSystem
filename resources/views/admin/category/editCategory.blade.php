@extends('admin.layouts.app')


@section('content')
 <div style="padding:50px 0">
    <div style=" background-color:white; max-width: calc(100% - 2px); width:900px; margin:auto;">
        <!-- form start -->

          <div class="form-group"style="padding:10px 0; max-width: calc(100% - 2px); width:500px; margin:auto;">

            <h3>Edit Category Infomation</h3>

                <form method="POST" action="{{route('categories.update',$category->id)}}" aria-label="{{ __('Update') }}">
                    @csrf
                    @method('PATCH')
                    
                    <div class="form-group row">
                        <label for="category" class="col-sm-4">{{ __('Category') }}</label>
                        
                        <div class="col-md-12">
                            <input id="category" type="text" class="form-control" name="category" value="{{$category->cat_name}}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="rank" class="col-sm-4">{{ __('Rank') }}</label>

                        <div class="col-md-12">
                            <input id="rank" type="text" class="form-control" name="rank" value="{{$category->cat_rank}}" required>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
  </div> 
@endsection