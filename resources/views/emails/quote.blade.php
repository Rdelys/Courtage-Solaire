<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvelle demande de devis</title>
</head>
<body style="margin:0;padding:0;background:#f4f1ea;font-family:'Segoe UI',Arial,sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f4f1ea;padding:30px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="580" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:10px;overflow:hidden;">
                    <tr>
                        <td style="background:#0a0a0a;padding:28px 32px;text-align:center;">
                            <div style="color:#D9A94E;font-weight:800;letter-spacing:2px;font-size:16px;">COURTAGE SOLAIRE</div>
                            <div style="color:#999;font-size:10px;letter-spacing:1px;margin-top:2px;">VOTRE PARTENAIRE ÉNERGÉTIQUE</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:32px;">
                            <h2 style="margin:0 0 6px;color:#111;font-size:19px;">Nouvelle demande de devis</h2>
                            <p style="margin:0 0 24px;color:#777;font-size:13px;">Profil : {{ $data['type'] }}</p>

                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="font-size:14px;color:#333;">
                                <tr>
                                    <td style="padding:10px 0;border-bottom:1px solid #eee;width:130px;color:#888;">Nom</td>
                                    <td style="padding:10px 0;border-bottom:1px solid #eee;font-weight:600;">{{ $data['nom'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:10px 0;border-bottom:1px solid #eee;color:#888;">E-mail</td>
                                    <td style="padding:10px 0;border-bottom:1px solid #eee;">
                                        <a href="mailto:{{ $data['email'] }}" style="color:#B8863A;text-decoration:none;">{{ $data['email'] }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:10px 0;border-bottom:1px solid #eee;color:#888;">Téléphone</td>
                                    <td style="padding:10px 0;border-bottom:1px solid #eee;">
                                        <a href="tel:{{ $data['telephone'] }}" style="color:#333;text-decoration:none;">{{ $data['telephone'] }}</a>
                                    </td>
                                </tr>
                                @if(!empty($data['code_postal']))
                                <tr>
                                    <td style="padding:10px 0;border-bottom:1px solid #eee;color:#888;">Code postal</td>
                                    <td style="padding:10px 0;border-bottom:1px solid #eee;">{{ $data['code_postal'] }}</td>
                                </tr>
                                @endif
                                @if(!empty($data['message']))
                                <tr>
                                    <td style="padding:10px 0;color:#888;vertical-align:top;">Message</td>
                                    <td style="padding:10px 0;white-space:pre-line;">{{ $data['message'] }}</td>
                                </tr>
                                @endif
                            </table>

                            <div style="margin-top:28px;text-align:center;">
                                <a href="mailto:{{ $data['email'] }}" style="background:#D9A94E;color:#111;text-decoration:none;font-weight:700;font-size:13px;letter-spacing:.5px;padding:12px 28px;border-radius:999px;display:inline-block;">
                                    RÉPONDRE AU CLIENT
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="background:#faf8f4;padding:16px 32px;text-align:center;color:#aaa;font-size:11px;">
                            Formulaire de demande de devis reçu via courtage-solaire.fr
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
