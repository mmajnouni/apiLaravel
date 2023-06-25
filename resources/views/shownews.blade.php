 @foreach($data as $show)
    <h2> {{$show->titles}}</h2>
     <img src="{{$show->images}}" width="400"/>
     <p>{{$show->description}}</p>
     <hr/>
 @endforeach
