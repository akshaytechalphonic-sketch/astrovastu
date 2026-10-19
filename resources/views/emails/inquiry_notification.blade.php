<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Consultation Inquiry</title>
</head>
<body style="margin: 0; padding: 20px 0; background-color: #f7f4ee; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #2c2523;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #f7f4ee; padding: 20px 10px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width: 620px; background: #ffffff; border-radius: 14px; overflow: hidden; border: 1px solid #e7dcce; box-shadow: 0 10px 30px rgba(0,0,0,0.06);">
                    <!-- Header -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #7c1a12 0%, #9e2318 100%); padding: 30px 25px; text-align: center; color: #ffffff;">
                            <h1 style="margin: 0; font-size: 24px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase;">AstroVastuPooja</h1>
                            <p style="margin: 8px 0 0; font-size: 15px; color: #fbe3b5; font-weight: 500;">
                                New Consultation Enquiry Received
                            </p>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding: 30px 25px;">
                            <p style="margin: 0 0 20px; font-size: 15px; line-height: 1.6; color: #4a423f;">
                                Hello, you have received a new consultation enquiry from your <strong>AstroVastuPooja</strong> landing page. The details are provided below:
                            </p>

                            <!-- Lead Details Table -->
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse; width: 100%; border-radius: 8px; overflow: hidden; border: 1px solid #eedecb;">
                                <tr>
                                    <td style="padding: 12px 16px; background-color: #fcf8f2; border-bottom: 1px solid #eedecb; width: 36%; font-weight: 600; font-size: 14px; color: #6b574a;">
                                        Client Name
                                    </td>
                                    <td style="padding: 12px 16px; background-color: #ffffff; border-bottom: 1px solid #eedecb; font-size: 15px; font-weight: 600; color: #1f1a18;">
                                        {{ $fullName }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px 16px; background-color: #fcf8f2; border-bottom: 1px solid #eedecb; font-weight: 600; font-size: 14px; color: #6b574a;">
                                        Phone Number
                                    </td>
                                    <td style="padding: 12px 16px; background-color: #ffffff; border-bottom: 1px solid #eedecb; font-size: 16px; font-weight: 700; color: #9e2318;">
                                        <a href="tel:{{ $phone }}" style="color: #9e2318; text-decoration: none;">
                                            {{ $phone }}
                                        </a>
                                    </td>
                                </tr>
                                @if(!empty($location))
                                <tr>
                                    <td style="padding: 12px 16px; background-color: #fcf8f2; border-bottom: 1px solid #eedecb; font-weight: 600; font-size: 14px; color: #6b574a;">
                                        Property Location
                                    </td>
                                    <td style="padding: 12px 16px; background-color: #ffffff; border-bottom: 1px solid #eedecb; font-size: 15px; color: #1f1a18;">
                                        {{ $location }}
                                    </td>
                                </tr>
                                @endif
                                @if(!empty($service))
                                <tr>
                                    <td style="padding: 12px 16px; background-color: #fcf8f2; border-bottom: 1px solid #eedecb; font-weight: 600; font-size: 14px; color: #6b574a;">
                                        Consultation For
                                    </td>
                                    <td style="padding: 12px 16px; background-color: #ffffff; border-bottom: 1px solid #eedecb; font-size: 15px; color: #1f1a18;">
                                        <span style="display: inline-block; background-color: #fff2db; color: #8f5803; padding: 3px 10px; border-radius: 12px; font-weight: 600; font-size: 13px;">
                                            {{ $service }}
                                        </span>
                                    </td>
                                </tr>
                                @endif
                                @if(!empty($email))
                                <tr>
                                    <td style="padding: 12px 16px; background-color: #fcf8f2; border-bottom: 1px solid #eedecb; font-weight: 600; font-size: 14px; color: #6b574a;">
                                        Email Address
                                    </td>
                                    <td style="padding: 12px 16px; background-color: #ffffff; border-bottom: 1px solid #eedecb; font-size: 15px; color: #1f1a18;">
                                        <a href="mailto:{{ $email }}" style="color: #9e2318; text-decoration: none;">{{ $email }}</a>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td style="padding: 12px 16px; background-color: #fcf8f2; border-bottom: 1px solid #eedecb; font-weight: 600; font-size: 14px; color: #6b574a;">
                                        Source / Page
                                    </td>
                                    <td style="padding: 12px 16px; background-color: #ffffff; border-bottom: 1px solid #eedecb; font-size: 14px; color: #4a423f;">
                                        {{ $subject }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px 16px; background-color: #fcf8f2; font-weight: 600; font-size: 14px; color: #6b574a;">
                                        Received Time
                                    </td>
                                    <td style="padding: 12px 16px; background-color: #ffffff; font-size: 14px; color: #4a423f;">
                                        {{ $submittedAt }}
                                    </td>
                                </tr>
                            </table>

                            <!-- Quick Action Buttons -->
                            <div style="margin-top: 25px; text-align: center;">
                                <a href="tel:{{ $phone }}" style="display: inline-block; background: #9e2318; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 15px; margin-right: 10px;">
                                    📞 Call Client Now
                                </a>
                                <a href="https://wa.me/91{{ preg_replace('/[^0-9]/', '', $phone) }}" style="display: inline-block; background: #25D366; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 15px;">
                                    💬 Open WhatsApp
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #fcf8f2; padding: 18px 25px; text-align: center; border-top: 1px solid #eedecb; font-size: 13px; color: #7f746d;">
                            This is an automated notification from your <a href="https://astrovastupooja.com" style="color: #9e2318; text-decoration: none; font-weight: 600;">AstroVastuPooja</a> website.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
