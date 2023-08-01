@extends('man.master')
@section('title', 'Matching Detail')
@section('content')
    <div class="w-full flex flex-col justify-center items-center mt-[5vw]">
        <img class="w-[20vw] h-fit" src="{{ asset('storage/'.$match->image)}}" alt="" />
        <h1>{{$match->username}}</h1>
        <h1>{{$match->instagram}}</h1>
        <h1>{{$match->hobby}}</h1>
        <h1 class="hover:text-red-500">Give thump</h1>
    </div>
@endsection
