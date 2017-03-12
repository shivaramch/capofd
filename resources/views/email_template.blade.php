@extends('beautymail::templates.sunny')

@section('content')

    @include ('beautymail::templates.sunny.heading' , [
        'heading' => 'Omaha Fire Department',
        'level' => 'h1',
    ])

    @include('beautymail::templates.sunny.contentStart')

    <p>Hello  {{$officername}} ,</p>
        <br>
    <p>
    {{$firefighter}} has just submitted  {{$formname}} application and pending for your approval.Please review carefully as part of approval
    process and make a decision.
    </p>

    @include('beautymail::templates.sunny.contentEnd')

    @include('beautymail::templates.sunny.button', [
            'title' => 'Click to access Application',
            'link' => $link
    ])

@stop