<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Cosmetic Finance Group</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="margin: 0; padding: 0; font-family: 'Lato', sans-serif;">
    <table cellpadding="0" cellspacing="0" width="100%" style="margin: 20px 0 20px 0;">
        <tr>
            <td>
                <table align="center" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
                    <table align="center" cellpadding="0" cellspacing="0" width="600">
                        <tr>
                            <td bgcolor="#343a40" align="center" style="padding: 20px 20px 20px 20px;">
                                <img src="{{ asset('new_css/img/logo/logo.png') }}" alt=""
                                    style="width: 160px;">
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#eeeeee" style="padding: 60px 40px 60px 40px;">
                                @foreach ($request->toArray() as $key => $value)
                                    @if ($key != '_token')
                                        <p style="font-size: 16px; color: #343a40; margin: 0;">{{ $key }}:
                                            {{ $value }}</p>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#343a40" style="padding: 20px 20px 20px 20px;">

                            </td>
                        </tr>
                    </table>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
