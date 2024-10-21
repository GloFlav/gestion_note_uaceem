<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Convocation Concours</title>
</head>
<style>
    @page {
        margin: 0px;
    }
</style>

<body style="margin: 0; padding: 0; font-family: Arial, sans-serif;">

    @foreach ($candidats as $candidat)
        <div
            style="width: 170mm; height: 297mm; margin: auto; margin-block: 1rem; padding: 0mm; box-sizing: border-box; background-color: #fff; position: relative; background-image: url('../images/aceem backgroud.png'); background-repeat: no-repeat; background-position: center; background-size: calc(100% - 40mm) auto; font-family: 'Times New Roman', Times, serif;">
            <img src="{{ public_path('images/aceem backgroud.png') }}" alt=""
                style="position: absolute; top: 50%; width: 170mm; height: auto; left: 50%; transform: translate(-50%, -50%);">
            <img src="{{ public_path('images/accem header.png') }}" alt="header" style="width: 100%;">
            <h1
                style="text-align: center; font-family: 'Freda Font', Times, serif; font-size: 20pt; margin-block: 2.5rem; text-transform: uppercase;">
                Convocation</h1>
            <div style="display: block; width: 100%; font-size: 12pt; margin-top: 3rem;">
                <table style="width: 100%; border-spacing: 0 1rem;">

                    <tr>
                        <td style="font-weight: 600; text-decoration: underline; padding-right: 1rem;">MENTION:</td>
                        <td style="text-transform: uppercase;">{{ $candidat->mention->design }}</td>
                    </tr>

                    <tr>
                        <td style="font-weight: 600; text-decoration: underline; padding-right: 1rem;">N° CONCOURS:</td>
                        <td>{{ $candidat->num_conc }}</td>
                    </tr>

                    <tr>
                        <td style="font-weight: 600; text-decoration: underline; padding-right: 1rem;">N° Reçu:</td>
                        <td style="text-transform: uppercase;">{{ $candidat->payement->reference }}</td>
                    </tr>

                    <tr>
                        <td style="font-weight: 600; text-decoration: underline; padding-right: 1rem;">NOM ET PRENOM(S):
                        </td>
                        <td>{{ $candidat->nom }}</td>
                    </tr>

                </table>
            </div>
            <p style="line-height: 1.5; margin-top: 2rem; margin-bottom">
                Vous êtes invité(e) à vous présenter à l’Université ACEEM pour subir le test d'admission prévu le
                @php
                    $date = Carbon\Carbon::parse($candidat->vague->deb_conc);
                    $date->locale('fr');
                    $formattedDate = $date->translatedFormat('l j F');
                    echo $formattedDate;
                @endphp
                à 07h30mn
            </p>
            <p style="margin-bottom: 2rem;">Remerciements.</p>
            <div style="font-weight: 600; text-decoration: underline; margin-bottom: 1.2rem;">DOSSIERS A FOURNIR POUR
                L'INSCRIPTION:</div>
            <div style="display: block;">
                <div style="margin-bottom: 1rem;"><strong>&bull;</strong>&nbsp;&nbsp;&nbsp;&nbsp; Relevé de notes BACC
                    (photocopie certifiée)
                </div>
                <div style="margin-bottom: 1rem;"><strong>&bull;</strong>&nbsp;&nbsp;&nbsp;&nbsp; Diplôme du BACC
                    (photocopie
                    certifiée)</div>
                <div style="margin-bottom: 1rem;"><strong>&bull;</strong>&nbsp;&nbsp;&nbsp;&nbsp; Demande manuscrite
                    avec
                    motivation (à adresser à Mr Le Recteur de l’Université ACEEM)</div>
                <div style="margin-bottom: 1rem;"><strong>&bull;</strong>&nbsp;&nbsp;&nbsp;&nbsp; Bulletin ou Acte de
                    naissance</div>
                <div style="margin-bottom: 1rem;"><strong>&bull;</strong>&nbsp;&nbsp;&nbsp;&nbsp; Certificat de
                    résidence
                    (Domicile légale)</div>
                <div style="margin-bottom: 1rem;"><strong>&bull;</strong>&nbsp;&nbsp;&nbsp;&nbsp; 04 Photos d’identité
                    récentes</div>
                <div style="margin-bottom: 1rem;"><strong>&bull;</strong>&nbsp;&nbsp;&nbsp;&nbsp; Chemise cartonnée (DT:
                    Rouge
                    / GE: Rose / COM: Bleue / SS: Verte / IE: Jaune / ECO: Orange)</div>
            </div>
            <div style="position: absolute; bottom: 20mm; width: 100%; display: table;">
                <div style="display: table-cell; width: 20%; font-weight: 600; text-decoration: underline;">Date:</div>
                <div style="display: table-cell;">{{ \Carbon\Carbon::now()->format('d/m/Y') }}</div>
            </div>
            <div style="position: absolute; bottom: 20mm; right:0">
                @php
                    $resultat = 'https://resultats.uaceem.mg/' . App\Helpers\NumEncrypt::encrypt($candidat->num_conc);
                @endphp
                <img
                    src="data:image/svg+xml;base64,{{ base64_encode(SimpleSoftwareIO\QrCode\Facades\QrCode::size(120)->generate($resultat)) }}" />
                {{-- <img src="{!! SimpleSoftwareIO\QrCode\Facades\QrCode::size(120)->generate($candidat->num_conc) !!}" alt=""> --}}
            </div>
            <img src="{{ public_path('images/aceem footer.png') }}" alt="footer"
                style="width: 100%; position: absolute; bottom: 4mm; left: 0;">
        </div>
    @endforeach
</body>

</html>
