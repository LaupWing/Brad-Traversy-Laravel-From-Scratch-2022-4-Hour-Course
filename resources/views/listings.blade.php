<h1>{{$heading}}</h1>

@if(count($listings) == 0)
   <p>No listings found</p>
@endif

@foreach($listings as $listing)
   <h1>{{$listing["title"]}}</h1>
   <p>{{$listing["description"]}}</p>
@endforeach