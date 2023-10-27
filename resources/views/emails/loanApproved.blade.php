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
                                <table cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td style="font-size: 18px; color: #000000;">
                                            Thank you for choosing to finance your treatment with
                                            {{ $data->clinic_name }} through Cosmetic Finance Group!<br>
                                            <br>
                                            Now that your loan has been approved, you need to contact your chosen clinic
                                            directly to book your appointment.<br>
                                            <br>
                                            ACTIVATING YOUR LOAN REPAYMENTS<br>
                                            <br>
                                            Your repayments don’t start until you have completed your treatment.<br>
                                            <br>
                                            Your clinic will ask you to activate your repayments at the point they
                                            require payment.<br>
                                            <br>
                                            To activate the repayments simply click the link below.<br>
                                            <br>
                                            <a
                                                href="https://api-preprod.globalanalytics.in/pos/sandbox/applications/{{ $data->application_ref }}/payout">https://api-preprod.globalanalytics.in/pos/sandbox/applications/{{ $data->application_ref }}/payout</a><br>
                                            <br>
                                            <br>
                                            Your Application Reference Number is {{ $data->application_ref }}<br>
                                            <br>
                                            <br>
                                            It is important you retain this email so that you can activate your
                                            repayments when prompted. Please contact your chosen with any issues.
                                        </td>
                                    </tr>
                                </table>
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
