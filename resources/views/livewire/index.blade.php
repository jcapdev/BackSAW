<div>
    <h1>Lista de Sliders</h1>
    
    <ul>
        @foreach($sliders as $slider)
            <li>{{ $slider['title'] }}</li>
        @endforeach
    </ul>
</div>