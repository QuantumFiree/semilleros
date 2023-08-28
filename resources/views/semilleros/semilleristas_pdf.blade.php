<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;

    }

    .title {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        text-align: center;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

  .nom{
    width: 136px;
  }
  .apellido{
    width: 158px;
  }
  .identi{

    width: 220px;
  }
    .semillero_td {
        /* width: ; */
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>

<body>
    <div class="title">
        <h1>Semilleros Udenar</h1>
    </div>
    <div>


        <table id="customers">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Identificacion</th>
                    <th>codigo</th>
                </tr>
            </thead>
        </table>
        @foreach( $semilleristas_pdfs as $semillerista)
        <table id="customers">
            <tr>
                <td class="nom">{{$semillerista->nombres}}</td>
                <td class="apellido">{{$semillerista->apellidos}}</td>
                <td class="identi"> {{$semillerista->identificacion}}</td>
                <td>{{$semillerista->cod_semillerista}}</td>
            </tr>
        </table>
        @endforeach
    </div>

</body>

</html>