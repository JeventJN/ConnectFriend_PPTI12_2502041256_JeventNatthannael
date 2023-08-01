<div class="w-full h-[5vw] text-[2vw] flex justify-evenly items-center bg-green-500">
    <div class="">
        Hello, Sir {{auth()->user()->username}}
    </div>
    <div class="">
        Casual Friend
    </div>
    <div class="flex">
        <div class="w-[10vw] h-fit rounded-[10vw] flex justify-center hover:bg-slate-500">
            <a href="/profile">
                Profile
            </a>
        </div>
        <div class="ml-[10vw] w-[10vw] h-fit rounded-[10vw] flex justify-center hover:bg-slate-500">
            <a href="/logout">
                Log Out
            </a>
        </div>
    </div>
</div>

