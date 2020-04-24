@if(!empty($data))
    <div class="card mt-3 mb-3">
        <div class="card-body">
            @foreach($data as $item)
                <p class="mb-0">{{ $item['browser'] }}: <strong>{{ $item['count'] }}</strong></p>
            @endforeach
        </div>
    </div>
@endif
