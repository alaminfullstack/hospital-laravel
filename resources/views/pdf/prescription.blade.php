<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prescription - {{ $data->invoice }}</title>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            /* padding: 30px; */
            /* border: 1px solid #eee; */
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); */
            font-size: 16px;
            line-height: 24px;
            font-family: 'nikosh','Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="https://sparksuite.github.io/simple-html-invoice-template/images/logo.png"
                                    style="width: 100%; max-width: 300px" />
                            </td>

                            <td>
                                Invoice: #{{ $data->invoice }}<br />
                                Created: {{ $data->date->format('d F Y') }}<br />
                                @if($data->reference != null)
                                Reference: {{ $data->reference }}
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Dr.<br />
                                {{ $data->doctor->name ?? null }}<br />
                                {{ $data->doctor->mobile ?? null }}<br />
                                {{ $data->doctor->email ?? null }}<br />
                                {{ $data->doctor->address ?? null }}
                            
                            </td>

                            <td>
                                Pst.<br />
                                {{ $data->patient->name ?? null }}<br />
                                {{ $data->patient->mobile ?? null }}<br />
                                {{ $data->patient->email ?? null }}<br />
                                {{ $data->patient->address ?? null }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

           
            <tr class="heading">
                <td>Medicine</td>
                <td>Desc.</td>
            </tr>

            @foreach ($data->prs_medicines as $prs_medicine)
                    <tr class="item @if($loop->last) last @endif">
                        <td>{{ $prs_medicine->medicine->title ?? null }}</td>
                        <td>{{ $prs_medicine->note }}</td>
                    </tr>
            @endforeach

            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>


            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Symptoms.<br />
                                {{ $data->symptoms }}
                            </td>

                            <td>
                                Diagnosis<br />
                                {{ $data->diagnosis ?? null }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>


            <tr class="information">
                <td colspan="2">
                   <b>Note: {{ $data->note }}</b>
                </td>
            </tr>

        

           

        </table>
    </div>
</body>
</html>