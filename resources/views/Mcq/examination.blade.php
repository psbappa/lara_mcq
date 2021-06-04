@extends('Mcq.layout')

@section('content')
<div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('add-question') }}"><span class="glyphicon glyphicon-user"></span>Add Question</a></li>
    </ul>
</div>
<form role="form" action="{{url('result')}}" method="post">
    @csrf
    <?php
      foreach($get_questions as $key=>$questions) {
        $options = explode(",",$questions->options);
    ?>
    <p><strong>Q<?php echo $key+1;?> .</strong><?php echo $questions->question?></p>
    <?php
      foreach($options as $key=>$option) {
    ?>
    <div class="question">
        <label><input required type="radio" name=<?php echo $questions->id;?> value=<?php echo $key+1;?>><?php echo $option;?></label>
    </div>
    <?php
      }}
    ?>
    <input type="submit" />
</form>

@endsection

<link rel="stylesheet" href="{{ url('/') }}/assets/css/customStyle.css">