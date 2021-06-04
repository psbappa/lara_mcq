@extends('Mcq.layout')

@section('content')
<a href="javascript:history.back()">Back</a>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <!-- Category -->
            <div class="single category">
                <h3 class="side-title">Result</h3>
                <ul class="list-unstyled">
                    <li><a href="" title="">Total Questions <span class="pull-right"><?=$total_question;?></span></a></li>
                    <li><a href="" title="">Wrong Answer <span class="pull-right"><?=$wrong_answer;?></span></a></li>
                    <li><a href="" title="">Grade <span class="pull-right"><?=round($percentage,2) . '%';?></span></a></li>
                </ul>
            </div>
        </div> 
    </div>
</div>
@endsection

<link rel="stylesheet" href="{{ url('/') }}/assets/css/customStyle.css">
