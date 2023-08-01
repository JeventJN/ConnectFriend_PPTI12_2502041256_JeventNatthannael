@extends('layout.master')
@section('title', 'Registration')
@section('content')
    <div class="w-full flex justify-center h-fit">
        <div class="w-[50vw] h-fit flex flex-col justify-evenly items-center bg-slate-500 mt-[3vw] rounded-[10vw]">
            <h1 class="text-[2vw]">Hi, Register Here</h1>
            <form action="{{ url('/register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex items-center justify-center h-[5vw] mt-[1vw]">
                    Username :
                    <input type="text" name="username" class="bg-slate-500 outline outline-white ml-[1vw]" value="{{ old('username') }}" required>
                </div>
                @error('username')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="flex items-center justify-center h-[5vw]">
                    Gender:
                    <input type="radio" name="gender" value="Woman" class="ml-[1vw]" @if(old('gender') === 'Woman') checked @endif required> Woman
                    <input type="radio" name="gender" value="Man" class="ml-[1vw]" @if(old('gender') === 'Man') checked @endif required> Man
                </div>
                @error('gender')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="hobby">Hobbies (comma-separated):</label>
                <input type="text" name="hobby" class="bg-slate-500 outline outline-white ml-[1vw]" id="hobby" value="{{ old('hobby') }}" required>
                @error('hobby')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="flex items-center justify-center h-[5vw]">
                    Instagram :
                    <input type="url" name="instagram" class="bg-slate-500 outline outline-white ml-[1vw]" value="{{ old('instagram') }}" required>
                </div>
                @error('instagram')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="flex items-center justify-center h-[5vw]">
                    Phone :
                    <input type="tel" name="number" class="bg-slate-500 outline outline-white ml-[1vw]" value="{{ old('number') }}" required>
                </div>
                @error('number')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="flex items-center justify-center h-[5vw]">
                    Password :
                    <input type="password" name="password" class="bg-slate-500 outline outline-white ml-[1vw]" required>
                </div>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="flex items-center justify-center h-[5vw]">
                    <input type="file" name="image" class="bg-slate-500 outline outline-white ml-[1vw]" value="" required>
                </div>
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="w-[5vw] h-[3vw] bg-white rounded-[2vw] mb-[2vw] ml-[15vw]">
                    Submit
                </button>
            </form>
        </div>
    </div>
@endsection
