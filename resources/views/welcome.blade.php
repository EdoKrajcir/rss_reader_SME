@extends("layout")

        @section('content')
        <form action="{{ route('search')}}" method="GET" class="form-inline md-form mr-auto mb-4 pt-5" style="width: 100vw; text-align:center;">
            <input class="form-control mx-auto" name="query" value="{{ request()->input('query') }}" type="text" placeholder="RSS url" aria-label="Search">
        </form>
        @endsection
