<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        .invoice-box {
            max-width: unset;
            box-shadow: none;
            border: 0px;
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
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="information">
                <td>
                    Nama : {{ $data->user->name }}<br />
                    Email : {{ $data->user->email }}<br />
                    Created: {{ $data->created_at->format('d-M-Y') }}
                </td>

                <td>
                    <br />
                    <br />
                    {{ $data->month . ', ' . $data->year }}
                </td>

            </tr>

            <tr class="heading">
                <td>Name</td>
                <td>Salary</td>
            </tr>

            <tr class="item">
                <td>Basic Salary</td>
                <td>Rp.{{ $data->basic_salary }}</td>
            </tr>

            <tr class="item">
                <td>Position Salary</td>
                <td>Rp.{{ $data->position_salary }}</td>
            </tr>

            <tr class="item">
                <td>Overtime Salary</td>
                <td>Rp.{{ $data->overtime_salary }}</td>
            </tr>

            <tr class="item last">
                <td>Piece</td>
                <td>-Rp.{{ $data->piece }}</td>
            </tr>

            <tr class="total">
                <td></td>
                <td>Total: {{ $data->total_salary }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
