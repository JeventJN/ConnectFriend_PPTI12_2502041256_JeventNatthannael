@extends('woman.master')
@section('title', 'HomeWoman')
@section('content')
    <div class="w-full flex flex-col justify-center items-center">
        <h1 class="text-md">
            Your Wallet : {{ auth()->user()->wallet }}
        </h1>
        <form action="/homeMan/top-up" method="post">
            @csrf
            @method('put')
            <div class="relative w-full max-w-2xl max-h-full">
                <div class="p-6 space-y-6">
                    <div class="border-2 h-10 w-full relative bg-transparent">
                        <input type="number" id="Qty" value="0"
                            class="Qty text-center text-center w-full text-md " name="wallet">
                        <div id="addButton" onclick="addAmount()"
                            class="bg-[#850000] text-white h-full w-20 cursor-pointer">
                            <span class="m-auto text-2xl font-thin">+</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center p-6 border-gray-200">
                    <button type="submit" class=" px-5 py-3 text-white bg-blue-700">
                        Top Up
                    </button>
                </div>
            </div>
        </form>
    </div>
    <h1 class="text-[5vw]">Hi, Welcome to ConnecFriend, Mrs. {{auth()->user()->username}}</h1>
    <a href="homeWoman/matching" class="text-[4vw] hover:text-red-500">
    Looking for match?</a>
    <script>
        function addAmount() {
            var amount = document.getElementById('Qty');
            amount.value = parseInt(amount.value) + 100;
        };
    </script>
@endsection
