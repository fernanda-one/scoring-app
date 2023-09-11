<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scoring</title>
</head>
<body>

<span id="redScore">0</span>
<span id="blueScore">0</span>
<input id="user" type="text" hidden="hidden" value="{{auth()->user()}}">

<form action="" id="pukul">
    <input id="gelanggang_id" type="number" hidden="" value="{{auth()->user()->gelanggang_id??1}}">
    <button type="submit">Pukulan</button>
</form>
<form action="" id="tendang">
    <input id="gelanggang_id" type="number" hidden="" value="{{auth()->user()->gelanggang_id??1}}">
    <button type="submit">Tendangan</button>
</form>

<script src="{{ mix('js/scoringJuri.js') }}">
</script>
<script src="{{ mix('js/scoreUpdate.js') }}">
</script>
</body>
</html>
