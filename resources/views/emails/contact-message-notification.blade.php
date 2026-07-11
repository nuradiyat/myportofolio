<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Baru Contact Form</title>
</head>

<body style="margin:0; padding:0; background-color:#f1f5f9; font-family:Arial, Helvetica, sans-serif; color:#0f172a;">

    <table role="presentation" cellpadding="0" cellspacing="0" width="100%"
        style="background-color:#f1f5f9; margin:0; padding:32px 16px;">
        <tr>
            <td align="center">

                <table role="presentation" cellpadding="0" cellspacing="0" width="100%"
                    style="max-width:760px; background:#ffffff; border-radius:24px; overflow:hidden; border:1px solid #e2e8f0; box-shadow:0 18px 45px rgba(15,23,42,0.08);">

                    {{-- HEADER --}}
                    <tr>
                        <td
                            style="background:linear-gradient(135deg, #0f172a 0%, #1e293b 35%, #2563eb 100%); padding:38px 32px 34px; color:#ffffff;">

                            <table role="presentation" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="left" style="vertical-align:top;">
                                        <div
                                            style="display:inline-block; padding:8px 14px; border-radius:999px; background:rgba(255,255,255,0.14); border:1px solid rgba(255,255,255,0.18); font-size:12px; font-weight:700; letter-spacing:1px; text-transform:uppercase;">
                                            Website Portfolio Notification
                                        </div>

                                        <h1
                                            style="margin:18px 0 10px; font-size:30px; line-height:1.25; font-weight:800; color:#ffffff;">
                                            Pesan Baru dari Contact Form
                                        </h1>

                                        <p
                                            style="margin:0; max-width:560px; font-size:15px; line-height:1.8; color:rgba(255,255,255,0.90);">
                                            Seseorang baru saja mengirimkan pesan melalui halaman contact website
                                            portfolio kamu. Detail pengirim dan isi pesannya ada di bawah ini.
                                        </p>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    {{-- BODY --}}
                    <tr>
                        <td style="padding:32px;">

                            {{-- TOP INFO CARD --}}
                            <table role="presentation" cellpadding="0" cellspacing="0" width="100%"
                                style="margin-bottom:24px;">
                                <tr>
                                    <td style="padding:0 0 18px; font-size:18px; font-weight:800; color:#0f172a;">
                                        Detail Pengirim
                                    </td>
                                </tr>
                            </table>

                            {{-- GRID INFO --}}
                            <table role="presentation" cellpadding="0" cellspacing="0" width="100%"
                                style="border-collapse:separate; border-spacing:0 14px;">

                                {{-- Nama --}}
                                <tr>
                                    <td width="140"
                                        style="vertical-align:top; padding-top:8px; font-size:14px; font-weight:700; color:#475569;">
                                        Nama
                                    </td>
                                    <td>
                                        <div
                                            style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:16px; padding:16px 18px; font-size:15px; line-height:1.7; color:#0f172a;">
                                            {{ $contactMessage->name }}
                                        </div>
                                    </td>
                                </tr>

                                {{-- Email --}}
                                <tr>
                                    <td width="140"
                                        style="vertical-align:top; padding-top:8px; font-size:14px; font-weight:700; color:#475569;">
                                        Email
                                    </td>
                                    <td>
                                        <div
                                            style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:16px; padding:16px 18px; font-size:15px; line-height:1.7; color:#0f172a;">
                                            {{ $contactMessage->email }}
                                        </div>
                                    </td>
                                </tr>

                                {{-- Subject --}}
                                <tr>
                                    <td width="140"
                                        style="vertical-align:top; padding-top:8px; font-size:14px; font-weight:700; color:#475569;">
                                        Subject
                                    </td>
                                    <td>
                                        <div
                                            style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:16px; padding:16px 18px; font-size:15px; line-height:1.7; color:#0f172a;">
                                            {{ $contactMessage->subject }}
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            {{-- MESSAGE SECTION --}}
                            <div style="margin-top:30px;">
                                <div style="margin-bottom:12px; font-size:18px; font-weight:800; color:#0f172a;">
                                    Isi Pesan
                                </div>

                                <div
                                    style="border:1px solid #dbeafe; background:linear-gradient(180deg, #f8fbff 0%, #f8fafc 100%); border-radius:20px; overflow:hidden;">

                                    <div
                                        style="padding:14px 18px; border-bottom:1px solid #e2e8f0; background:#eff6ff;">
                                        <span
                                            style="font-size:13px; font-weight:700; color:#1d4ed8; letter-spacing:0.5px; text-transform:uppercase;">
                                            Message Content
                                        </span>
                                    </div>

                                    <div
                                        style="padding:22px 20px; font-size:15px; line-height:1.95; color:#1e293b; white-space:pre-line;">
                                        {{ $contactMessage->message }}
                                    </div>
                                </div>
                            </div>

                            {{-- QUICK NOTICE --}}
                            <div
                                style="margin-top:28px; border:1px solid #bfdbfe; background:linear-gradient(135deg, #eff6ff 0%, #f8fbff 100%); border-radius:18px; padding:18px 20px;">
                                <table role="presentation" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td width="28" valign="top" style="padding-top:2px;">
                                            <div
                                                style="width:18px; height:18px; border-radius:999px; background:#2563eb; display:inline-block;">
                                            </div>
                                        </td>
                                        <td>
                                            <p style="margin:0; font-size:14px; line-height:1.85; color:#1e40af;">
                                                Email ini dikirim otomatis dari
                                                <strong>contact form website portfolio</strong>.
                                                Pesan ini juga sudah tersimpan di database dan bisa kamu lihat melalui
                                                dashboard admin / Filament.
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            {{-- MINI SUMMARY --}}
                            <div style="margin-top:26px; padding-top:22px; border-top:1px dashed #cbd5e1;">
                                <table role="presentation" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td style="font-size:13px; color:#64748b; line-height:1.8;">
                                            <strong style="color:#334155;">Waktu Notifikasi:</strong>
                                            {{ $contactMessage->created_at->format('d M Y, H:i') }} WIB
                                        </td>
                                    </tr>
                                </table>
                            </div>

                        </td>
                    </tr>

                    {{-- FOOTER --}}
                    <tr>
                        <td
                            style="padding:24px 32px; background:#f8fafc; border-top:1px solid #e2e8f0; text-align:center;">

                            <p style="margin:0 0 6px; font-size:14px; font-weight:700; color:#0f172a;">
                                Website Portfolio — M Nuradiyat
                            </p>

                            <p style="margin:0; font-size:13px; line-height:1.8; color:#64748b;">
                                Notifikasi otomatis dari sistem contact form website portfolio.
                            </p>

                            <p style="margin:10px 0 0; font-size:12px; line-height:1.8; color:#94a3b8;">
                                © {{ date('Y') }} All rights reserved.
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>
</body>

</html>
