<?php 
  // include 'App\Models\Exam'; 
  // $test = new Exam();
  // echo $test;
?>

@extends('Mcq.layout')

@section('content')

<form role="form" action="{{url('result')}}" method="post">
    @csrf
    <?php
      foreach($get_questions as $questions) {
        $options = explode(",",$questions->options);
    ?>
    <p><strong>Q1. </strong><?php echo $questions->question?></p>
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

<style>
    html {
      box-sizing: border-box;
    }
    *,
    *:before,
    *:after {
      box-sizing: inherit;
    }

    body {
      font-family: sans-serif;
      padding: 1rem;
    }

    .quiz,
    .choices {
      list-style-type: none;
      padding: 0;
    }

    .choices li {
      margin-bottom: 5px;
    }

    .choices label {
      display: flex;
      align-items: center;
    }

    .choices label,
    input[type="radio"] {
      cursor: pointer;
    }

    input[type="radio"] {
      margin-right: 8px;
    }

    .view-results {
      padding: 1rem;
      cursor: pointer;
      font-size: inherit;
      color: white;
      background: teal;
      border-radius: 8px;
      margin-right: 5px;
    }

    .my-results {
      padding: 1rem;
      border: 1px solid goldenrod;
    }


</style>