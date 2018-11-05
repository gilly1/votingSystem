@extends('layouts.app')

@section('content')

<div class="container">
    
        @include('admin/inc/message')
    
    <form method="POST" action="{{route('results')}}" aria-label="{{ __('Send') }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Enter verification code</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="code" placeholder="Four digit code" required>
        </div>

        <div>
            <button class="btn btn-primary">{{ __('Send') }}</button>
        </div>
    </form>

    <div>
        <table cellspacing="0">
            @foreach($candidate as $cand)
                <tr>
                    <td>{{$cand->category}}</td>
                    <td>{{$cand->fname}}</td>
                    <td>{{$cand->lname}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    
</div>
@endsection