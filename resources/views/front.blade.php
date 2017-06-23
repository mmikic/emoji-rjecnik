@extends('app')
@section('content')

    <div class="Emoji" :class="{ 'is-open': app.active }">
        <p></p>
    </div>
    <div class="Message" :class="{ 'is-open': (app.active == false) }">
        <p>
            <img src="img/apple/160/1f389.png" alt="Bravo" width="80px" height="80px"><br><br>
            Hvala na sudjelovanju!<br>
            Tvoji podaci su pohranjeni.
        </p>
    </div>
    <div class="Questions" :class="{ 'is-open': app.active }">

        <div class="Input">
            <label for="">Što je prikazano na slici?</label>
            <input type="text" v-model="semantic" id="semantic" placeholder="obavezno*">
        </div>
        <div class="Input">
            <form @submit.prevent="nextEmoji">
                <label for="">Što označava taj <em>emoji</em>?</label>
                <input type="text" v-model="pragmatic" id="pragmatic" placeholder="(proizvoljno)">
            </form>
        </div>
        <div class="Button is-md-hidden">
            <label for="#">&nbsp;</label>
            <a href="#" @click.prevent="nextEmoji">Nastavi</a>
        </div>

    </div>

    <div class="Questions" :class="{ 'is-open': (app.active == false) }">
        <div class="Button">
            <label for="#">&nbsp;</label>
            <a href="#" @click.prevent="restart">Novi ciklus</a>
        </div>
    </div>

@endsection
@section('script')

    <script>
        window.emojis = {!! $emojis !!};
    </script>
    <script src="{{ asset('js/emoji.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

@endsection