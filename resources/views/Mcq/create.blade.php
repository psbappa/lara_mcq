
@extends('Mcq.layout')

@section('content')

<div class="container">
  <a class="btn btn-info" href="javascript:history.back()">Back</a>
  <h2 class="text-center">Generate Question</h2>
  <br>
  <form method="post" action="{{url('submit_question')}}" class="form-group" style="width:70%; margin-left:15%;">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    @if (count($errors) > 0)
      <div class = "alert alert-danger box-alert">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <label class="form-group">Question:</label>
    <textarea name="question" placeholder="Enter Question.." rows="3" class="form-control"></textarea>
    
    <label>Answer:</label>
    <input type="text" class="form-control" placeholder="Enter answer" name="answer"><br>

    <label class="form-group">Options:</label>
    <textarea name="options" placeholder="Enter Options.." rows="2" class="form-control"></textarea><br>
    
    <button type="submit"  value = "Add" class="btn btn-primary">Submit</button>
  </form>
  </div>

@endsection