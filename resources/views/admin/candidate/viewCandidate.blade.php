@extends('admin.layouts.app')

@section('headerSection')
    <link href="{{ asset('css/tables.css') }}" rel="stylesheet" media="all">
@endsection

@section('content')
   <div>
       <h3>Choose category to View</h3>
        <div class="form-group row">
            <label for="cat" class="col-sm-4">{{ __('Category') }}</label>
            <div class="col-md-12">
                <select class="form-control" id="cat" name="cat">
                    @foreach($category as $category)
                        <option value="{{$category->id}}">{{$category->cat_name}}</option>
                    @endforeach
                    
                </select>
            </div>
        </div>
       <div class="table-users">
            <div class="header">Categories</div>
            
                <table cellspacing="0">
                    @foreach($candidates as $candidate)

                    <tr>
                        <td>{{$candidate->fname}}</td>
                        <td>{{$candidate->lname}}</td>
                        <td>
                            <div class="table-data-feature">
                                    <a href="{{route('candidate.edit',$candidate->id)}}">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa fa-pencil fa-fw"></i>
                                        </button>
                                    </a>&nbsp;&nbsp;&nbsp;
                                    
                                    <form id="delete-form-{{$candidate->id}}" method="POST" action="{{route('candidate.destroy',$candidate->id)}}">
                                        @csrf
                                        @method('DELETE')
                                    
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="
                                        if(confirm('Are you sure to delete {{$candidate->fname}}')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{$candidate->id}}').submit();
                                        }else{
                                            event.preventDefault();
                                        }
                                        ">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                    </form>
                                </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
   </div>
@endsection