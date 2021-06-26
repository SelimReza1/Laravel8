
@php
$name = 'selim';
$fruits = ['apple','orange','painaple','mango']
@endphp

<h2>{{$name}}</h2>

@foreach($fruits as $fruit)
    <ul>
        <li>{{$fruit}}</li>
    </ul>
@endforeach
@for($i=1;$i<=10;$i++)
    {{$i}} <br>
@endfor
@if(count($fruits)==1)
    single fruit
@elseif(count($fruits)>1)
    more than one fruits
@else
No Fruits
@endif
