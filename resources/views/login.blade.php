@extends('layout.master')
@section('title', 'Login')
@section('content')
    <div class="w-full flex justify-center h-fit">
        <div class="w-[50vw] h-[25vw] flex flex-col justify-evenly items-center bg-slate-500 mt-[5vw] rounded-[10vw]">
            @if(Session()->has('loginError'))
                <h2 class="text-red-500">{{Session()->get('loginError')}}</h2>
            @endif
            <form action="/login" method="post">
                @csrf
                <div class="flex justify-center items-center mt-[2vw]">
                    Username :
                    <input type="text" name="username" class="ml-[1vw]bg-slate-500 outline outline-white ml-[1vw]" value="{{ old('username') }}">
                </div>
                <div class="h-[3vw]"></div>
                <div class="flex justify-center items-center">
                    Password :
                    <input type="password" name="password" class=" ml-[1vw] bg-slate-500 outline outline-white ml-[1vw]" value="{{ old('password') }}">
                </div>
                <button type="submit" class="ml-[8vw] mt-[2vw] w-[10vw] h-[3vw] bg-red-500">
                    Login
                </button>
            </form>
            <h1>If you dont have account, please</h1>
            <a href="/register" class="hover:text-red-500 mb-[1vw]">
                Register here
            </a>
        </div>
    </div>
@endsection
