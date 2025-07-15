<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lettre de Motivation</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #333; font-size: 12px; line-height: 1.6; }
        .header { text-align: right; margin-bottom: 40px; }
        .header h1 { margin: 0; font-size: 1.5em; }
        .header p { margin: 0; }
        .company-info { margin-bottom: 40px; }
        .content { margin-top: 20px; }
        .signature { margin-top: 40px; text-align: right; }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $user_name }}</h1>
        <p>{{ $user_email }}</p>
    </div>

    <div class="company-info">
        <strong>{{ $company_name }}</strong><br>
        À l'attention du service de recrutement
    </div>

    <p><strong>Objet : Candidature pour le poste de {{ $job_title }}</strong></p>

    <div class="content">
        {!! nl2br(e($body)) !!}
    </div>

    <div class="signature">
        <p>Cordialement,</p>
        <p>{{ $user_name }}</p>
    </div>
</body>
</html>
