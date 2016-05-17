<ol class="breadcrumb">
    <li><a href="{{ URL::to('home') }}">Home</a></li>
    @for($i = 0; $i <= count(Request::segments()); $i++)
        @if($i < 1)
        @else
            <li><a href="{{ URL::to('home') }}">{{ucfirst(Request::segment($i))}}</a></li>
        @endif
    @endfor
</ol>