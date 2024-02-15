@extends('layout')

@section('content')
    <div class="row">
        @if (isset($message))
            <p class="text-success">{{ $message }}</p>
        @elseif (isset($error))
            <p class="text-danger">{{ $error }}</p>
        @endif
    </div>
    <div class="row">
        <h1>Pet Details</h1>
        @if (isset($petData[0]))
            @foreach ($petData as $pet)
                <table class="table table-primary">
                    <tr>
                        <th>Name</th>
                        <td>{{ isset($pet['name']) ? $pet['name'] : 'does not exist' }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ isset($pet['status']) ? $pet['status'] : 'does not exist' }}</td>
                    </tr>
                    <tr>
                        <th>Category name</th>
                        <td>{{ isset($pet['category']['name']) ? $pet['category']['name'] : 'does not exist' }}</td>
                    </tr>
                    <tr>
                        <th>Photos</th>
                        <td>
                            @if (isset($pet['photoUrls']) && is_array($pet['photoUrls']))
                                @foreach ($pet['photoUrls'] as $photoUrl)
                                    <img src="{{ $photoUrl }}"><br>
                                @endforeach
                            @else
                                does not exist
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Tags</th>
                        <td>
                            @if (isset($pet['tags']) && is_array($pet['tags']))
                                @foreach ($pet['tags'] as $tag)
                                    {{ $tag['name'] }}<br>
                                @endforeach
                            @else
                                does not exist
                            @endif
                        </td>
                    </tr>
                </table>
                <form method="POST" id="test" action="{{ route('components.pet.delete', $pet['id']) }}">
                    @csrf
                    @method('delete')
                    <button class="ms-1 btn btn-danger btn-sm"> Delete </button>
                </form>
            @endforeach
        @elseif (isset($error))
            <p>{{ $error }}</p>
        @else
            @if ( isset($petData['id']) && $petData['id'] )
                <table class="table table-primary">
                    <tr>
                        <th>Name</th>
                        <td>{{ isset($petData['name']) ? $petData['name'] : 'does not exist' }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ isset($petData['status']) ? $petData['status'] : 'does not exist' }}</td>
                    </tr>
                    <tr>
                        <th>Category name</th>
                        <td>{{ isset($petData['category']['name']) ? $petData['category']['name'] : 'does not exist' }}</td>
                    </tr>
                    <tr>
                        <th>Photos</th>
                        <td>
                            @if (isset($petData['photoUrls']) && is_array($petData['photoUrls']))
                                @foreach ($petData['photoUrls'] as $photoUrl)
                                    <img src="{{ $photoUrl }}"><br>
                                @endforeach
                            @else
                                does not exist
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Tags</th>
                        <td>
                            @if (isset($petData['tags']) && is_array($petData['tags']))
                                @foreach ($petData['tags'] as $tag)
                                    {{ $tag['name'] }}<br>
                                @endforeach
                            @else
                                does not exist
                            @endif
                        </td>
                    </tr>
                </table>
                <form method="POST" action="{{ route('components.pet.delete', $petData['id']) }}">
                    @csrf
                    @method('delete')
                    <button class="ms-1 btn btn-danger btn-sm"> Delete </button>
                </form>
              @else
                 <p>The entry does not exist</p>
              @endif

        @endif
    </div>
@endsection
