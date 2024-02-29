 @props(['detailsCSV'])
 @php
     $details = explode(',', $detailsCSV)
 @endphp
 <ul class="flex">
    @foreach ($details as $detail)
        <li
            class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
        >
            <a href="/?detail={{$detail}}">{{$detail}}</a>
        </li>
    @endforeach
        
                                
</ul>