<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p>veuillez telecharger la convocation</p>

<div class="btn-group relative justify-center flex" role="group">

    <form class="inline" action="{{ route('scolarite.show', [$scolarite->num_conc]) }}" method="GET">
    @csrf
    @method('POST')
    <input type="hidden" name="num_conc" id="num_conc"
        value="{{ $scolarite->num_conc }}">
        <button type="submit" class="text-grey-500 hover:text-grey-700"
            name="showDotation">
            <i class="fa-solid fa-print"></i>
        </button>
    </form>
</div>
</body>
</html>
