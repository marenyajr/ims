@if (session()->has('message'))
    <div x-show="{show:true}" x-init="setTimeout(() => show = false, 1000)" x-show="show" class="fixed top-10 text-center transform-translate-x-1/2 bg-green-400 px-48 py-3 mt-20 z-40">
    <p>{{session('message')}}</p>
    </div>
@endif