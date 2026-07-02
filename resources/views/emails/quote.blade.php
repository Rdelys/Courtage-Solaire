<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvelle demande de devis</title>
</head>
<body style="font-family: Arial, sans-serif; color:#1e293b; line-height:1.6;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width:600px;margin:0 auto;">
        <tr>
            <td style="background:#229954;padding:20px;border-radius:8px 8px 0 0;">
                <h2 style="color:#ffffff;margin:0;">Nouvelle demande de devis - ÉnergiePlus</h2>
            </td>
        </tr>
        <tr>
            <td style="background:#ffffff;padding:24px;border:1px solid #e2e8f0;border-top:none;border-radius:0 0 8px 8px;">
                <p><strong>Nom :</strong> {{ $data['nom'] }}</p>
                <p><strong>E-mail :</strong> {{ $data['email'] }}</p>
                <p><strong>Téléphone :</strong> {{ $data['telephone'] }}</p>
                <p><strong>Profil :</strong> {{ $data['type'] }}</p>
                @if(!empty($data['code_postal']))
                    <p><strong>Code postal :</strong> {{ $data['code_postal'] }}</p>
                @endif
                @if(!empty($data['message']))
                    <p><strong>Message :</strong></p>
                    <p style="background:#f7fcff;padding:14px;border-radius:6px;">{{ $data['message'] }}</p>
                @endif
                <hr style="border:none;border-top:1px solid #e2e8f0;margin:20px 0;">
                <p style="font-size:0.85rem;color:#64748b;">
                    Message envoyé automatiquement depuis le formulaire de demande de devis du site ÉnergiePlus.
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
