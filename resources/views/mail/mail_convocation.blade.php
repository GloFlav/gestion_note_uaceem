<!DOCTYPE html>
<html>

<head>
    <title>CONVOCATION CONCOURS</title>
</head>

<body>
    <div>
        Bonjour,<br><br>
        Suite à votre inscription au concours d'entrée au sein de notre établissement, nous vous adressons ci-joint la
        convocation à imprimer que vous emmènerez lors du concours à la date du
        @php
            $date = Carbon\Carbon::parse($candidat->concours->deb_conc);
            $date->locale('fr');
            $formattedDate = $date->translatedFormat('d F Y');
            echo $formattedDate;
        @endphp
        .
    </div>
    <br>
    <strong>N°: {{ $candidat->num_conc }}</b>
        <div><br>Merci<br>
</body>

</html>
