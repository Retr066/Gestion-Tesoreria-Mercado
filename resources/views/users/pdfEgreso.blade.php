<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            background-color: #ffffff;
            font-family: Arial;
        }

        #main-container {
            margin: 150px auto;
            width: 600px;
        }

        table {
            background-color: white;
            text-align: left;
            border-collapse: collapse;
            width: 100%;
            -fs-table-paginate: paginate;
        }

        th,
        td {
            border: 1px solid #000;
            border-collapse: collapse;
            padding: 2px;
            text-align: center;

        }

        thead {
            background-color: #ffffff;
            color: rgb(0, 0, 0);
            display: table-header-group;
        }

        tr:nth-child(even) {
            background-color: rgb(255, 255, 255);
        }

        tr:hover td {
            background-color: #ffffff;
            color: white;
        }

        .izquierda {
            text-align: left;
        }

        h1 {
            text-align: center;
        }

        .border-titulo {
            display: block;
            text-align: center;
            width: 50%;
            border: 2px solid #000;
            margin-left: 25%;
            margin-right: 25%;
            margin-bottom: 1rem;
        }

    </style>
    <title>Document</title>
</head>

<body>
    <H1> Movimiento Económico del Mes de {{ $reporte->mes }} {{ $date->year }}</H1>
    <div class="border-titulo">
        <b>EGRESOS</b>
    </div>
    <div id="#main-container">
        <table>
            <thead>
                <tr>
                    <th scope="col">FECHA</th>
                    <th scope="col">RECIBO</th>
                    <th scope="col">CONCEPTO</th>
                    <th scope="col">IMPORTE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($egresos as $egreso)
                    <tr>
                        <th scope="row">{{ $egreso->egreso_fecha }}</th>
                        <td>{{ $egreso->egreso_codigo }}</td>
                        <td class="izquierda">{{ $egreso->egreso_descripcion }}</td>
                        <td>S/.{{ $egreso->egreso_importe }}</td>
                    </tr>
                @endforeach
                <tr>
                    <th scope="row"> </th>
                    <td> </td>
                    <td><b>TOTAL</b></td>
                    <td style="border:2px solid #000"><b>S/.{{ $reporte->egreso_importe_total }}</b></td>
                </tr>
            </tbody>
        </table>
        <br>
        <label>Total, de Recibos: <b>{{ $egresos->count() }}.</b></label>
    </div>
</body>

</html>
