@extends('layouts.admin.app')

@section('title')
    Prescription Show
@endsection


@section('breadcrumb')
    Prescriptions Details
@endsection

@push('style')
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
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

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('prescription.download', $prescription->id) }}" class="btn btn-success">Download</a>

                        <div class="invoice-box">
                            <table cellpadding="0" cellspacing="0">
                                <tr class="top">
                                    <td colspan="2">
                                        <table>
                                            <tr>
                                                <td class="title">
                                                    <img src="#"
                                                        style="width: 100%; max-width: 300px" />
                                                </td>

                                                <td>
                                                    Invoice: #{{ $prescription->invoice }}<br />
                                                    Created: {{ $prescription->date->format('d F Y') }}<br />
                                                    @if($prescription->reference != null)
                                                    Reference: {{ $prescription->reference }}
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
                                                    {{ $prescription->doctor->name ?? null }}<br />
                                                    {{ $prescription->doctor->mobile ?? null }}<br />
                                                    {{ $prescription->doctor->email ?? null }}<br />
                                                    {{ $prescription->doctor->address ?? null }}
                                                
                                                </td>

                                                <td>
                                                    Pst.<br />
                                                    {{ $prescription->patient->name ?? null }}<br />
                                                    {{ $prescription->patient->mobile ?? null }}<br />
                                                    {{ $prescription->patient->email ?? null }}<br />
                                                    {{ $prescription->patient->address ?? null }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                               
                                <tr class="heading">
                                    <td>Medicine</td>
                                    <td>Desc.</td>
                                </tr>

                                @foreach ($prescription->prs_medicines as $prs_medicine)
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
                                                    {{ $prescription->symptoms }}
                                                </td>

                                                <td>
                                                    Diagnosis<br />
                                                    {{ $prescription->diagnosis ?? null }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>


                                <tr class="information">
                                    <td colspan="2">
                                       <b>Note: {{ $prescription->note }}</b>
                                    </td>
                                </tr>

                            

                               

                            </table>
                        </div>
                  
            </div>
        </div>
    </div>
@endsection
