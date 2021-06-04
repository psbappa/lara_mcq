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


<style>
    .single {
        padding: 30px 15px;
        margin-top: 40px;
        background: #fcfcfc;
        border: 1px solid #f0f0f0; }
    .single h3.side-title {
        margin: 0;
        margin-bottom: 10px;
        padding: 0;
        font-size: 20px;
        color: #333;
        text-transform: uppercase; }
    .single h3.side-title:after {
        content: '';
        width: 60px;
        height: 1px;
        background: #ff173c;
        display: block;
        margin-top: 6px; }
    .single ul {
        margin-bottom: 0; }
    .single li a {
        color: #666;
        font-size: 14px;
        text-transform: uppercase;
        border-bottom: 1px solid #f0f0f0;
        line-height: 40px;
        display: block;
        text-decoration: none; }
    .single li a:hover {
        color: #ff173c; }
    .single li:last-child a {
        border-bottom: 0; }
</style>