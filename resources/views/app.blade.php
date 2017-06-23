<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" value="{{ csrf_token() }}">

        <title>Emoji-rječnik</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/design.css') }}?{{ time().rand() }}">
        <link rel="stylesheet" href="{{ asset('css/emoji.css') }}">

    </head>
    <body>

        <div id="app">

            <div class="Information" :class="{ 'is-open': app.information }">

                <div class="InformationTitle">
                    <h1>O projektu</h1>
                    <a href="#" class="Button" @click.prevent="hideInformation">&times;</a>
                </div>

                <div class="Content">

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam exercitationem explicabo fugit porro? Esse facere nesciunt obcaecati unde vitae. Blanditiis, dignissimos ea fugit illo mollitia possimus quisquam quos recusandae rerum?</p>

                    <h3>Statistika</h3>
                    <table>
                        <tr>
                            <th>Emojija</th>
                            <td>{{ $stats['emojis'] }}</td>
                        </tr>
                        <tr>
                            <th>Semantičkih def.</th>
                            <td>{{ $stats['semantics'] }}</td>
                        </tr>
                        <tr>
                            <th>Pragmatičkih def.</th>
                            <td>{{ $stats['pragmatics'] }}</td>
                        </tr>
                    </table>

                    <h3>Pristup podacima</h3>
                    <p>Pristup podacima trenutno nije omogućen putem grafičkog sučelja kako bi se prevenirao bias ispitanika. Međutim podacima je moguće pristupiti putem API-ja aplikacije</p>

                    <strong>Popis <em>emojija</em></strong>
                    <div class="code">
                    <p><strong>HTTP request</strong></p>
                    <pre>GET /api/v1/emoji HTTP/1.1
Host: localhost
Content-Type: application/json</pre>

                    <p><strong>HTTP response</strong></p>
                    <pre>[{
    "id": 73,
    "unified": "F132A",
    "name": "CRYING TEARS WITH JOY",
    "short": "cry"
},
{
    "id": 74,
    "unified": "F1334",
    "name": "SMILEY FACE",
    "short": "smile"
}]</pre>
                    </div>

                    <strong>Definicije pojedinog <em>emojija</em></strong>

                    <p>Prilikom GET requesta potrebno je kao parametar proslijediti ID <em>emojija</em>.</p>

                    <div class="code">
                    <p><strong>HTTP request</strong></p>
                    <pre>GET /api/v1/emoji/{id} HTTP/1.1
Host: localhost
Content-Type: application/json</pre>

                    <p><strong>HTTP response</strong></p>
                    <pre>[{
    "emoji_id": 76,
    "semantic": "lubenica",
    "pragmatic": "ljeto",
    "emoji": {
        "id": 76,
        "name": "WATERMELON",
        "unified": "1F349",
        "short": "watermelon"
    }
},
{
    "emoji_id": 76,
    "semantic": "melona",
    "pragmatic": "slatko",
    "emoji": {
        "id": 76,
        "name": "WATERMELON",
        "unified": "1F349",
        "short": "watermelon"
    }
}]</pre>
                    </div>

                    <h3>Razvojno okruženje</h3>
                    <p>Aplikacija je razvijena u <a href="https://lemp.io/" target="_blank">LEMP</a> okruženju, koristeći <a href="http://laravel.com" target="_blank">Laravel</a> razvojni okvir za serversku obradu,
                        <a href="http://vuejs.org" target="_blank">Vue.js</a> razvojni okvir za korisničku funkcionalnost,
                        <a href="https://github.com/iamcal/js-emoji" target="_blank">JS-emoji</a> paket za prikaz <em>emojija</em>,
                        te <a href="https://github.com/mroth/emojitracker" target="_blank">emojitracker</a> za popis 300 najpopularnijih <em>emojija</em>.</p>

                </div>

            </div>

            <div class="App">

                <div class="Navigation">
                    <a href="#" class="Logo" @click.prevent="showInformation">&raquo;</a>
                    <div class="Title">
                        <h1><em>Emoji</em>-rječnik</h1>
                        <h3>leksikografija 2.0</h3>
                    </div>
                </div>
                <div class="Content">

                    @yield('content')

                </div>

            </div>

        </div>

        @yield('script')

    </body>
</html>
