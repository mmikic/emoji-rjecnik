@extends('app')
@section('content')

    <div class="HTMLContainer">
        @foreach($emojis as $emoji)
        <div class="Dump">

            <div class="Icon">

                <img src="{{ asset('img/apple/160/'.strtolower($emoji->unified).'.png') }}" alt="Emoji">
                <div>
                    <br>
                    <strong>{{ $emoji->name }}</strong>
                </div>

            </div>
            <div class="Definition">
                <div class="Semantic">
                    <strong>Semantic</strong>
                    <ul>
                        @foreach($emoji->definitions->pluck('semantic') as $definition)
                            <li>{{ $definition }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="Pragmatic">
                    <strong>Pragmatic</strong>
                    <ul>
                        @foreach($emoji->definitions->pluck('pragmatic') as $definition)
                            <li>{{ $definition }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
        @endforeach
    </div>

@endsection
@section('script')

    <script>
        window.emojis = [];
    </script>
    <script src="{{ asset('js/emoji.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

@endsection