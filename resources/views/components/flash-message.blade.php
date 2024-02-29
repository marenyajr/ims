@if (session()->has('message'))
    <div x-show="{show:true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-10 left-1 transform-translate-x-1/2 bg-laravel px-48 py-3">
    <p>{{session('message')}}</p>
    </div>
@endif