@extends('layout')

@section('content')

      <div class="row">
        <h1>Pet Details</h1>
        @if ( isset($petData['id']) && $petData['id'] )

            @if ( isset($petData['name']) && $petData['name'] )
                    <p>Name: {{ $petData['name'] }}</p>
            @else
                    <p>Name: does not exist</p>
            @endif

            @if ( isset($petData['status']) && $petData['status'] )
                <p>Status: {{ $petData['status'] }}</p>
            @else
                <p>Status: does not exist</p>
            @endif

            @if ( isset($petData['category']['name']) && $petData['category']['name'] )
                <p>Category name {{ $petData['category']['name'] }}
            @else
                <p>Category name: does not exist</p>
            @endif

            @if ( isset($petData['photoUrls']) && $petData['photoUrls'] )
                <p>Photo <img src="{{ $petData['photoUrls']  }}">
            @else
                <p>Photo: does not exist</p>
            @endif

            @if ( isset($petData['tags']) && $petData['tags'] )
                <p>Tags:
                @foreach ($petData['tags'] as $tag)
                    {{ $tag['name'] }}
                @endforeach
                </p>
            @else
                <p>Tags: does not exist </p>
            @endif
        @else
            <p>The entry does not exist</p>
        @endif
    </div>
@endsection
