@extends('admin.layouts.app')

@section('headerSection')
    <link href="{{ asset('css/tables.css') }}" rel="stylesheet" media="all">
@endsection

@section('content')
   <div>
       <div class="table-users">
            <div class="header">Categories</div>
            
                <table cellspacing="0">
                    

                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->cat_name}}</td>
                            <td>{{$category->cat_rank}}</td>
                            <td>
                                <div class="table-data-feature">
                                    <a href="{{route('categories.edit',$category->id)}}">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa fa-pencil fa-fw"></i>
                                        </button>
                                    </a>&nbsp;&nbsp;&nbsp;
                                    
                                    <form id="delete-form-{{$category->id}}" method="POST" action="{{route('categories.destroy',$category->id)}}">
                                        @csrf
                                        @method('DELETE')
                                    
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="
                                        if(confirm('Are you sure to delete {{$category->cat_name}}')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{$category->id}}').submit();
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