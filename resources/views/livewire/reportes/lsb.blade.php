<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table style="width: 100%; border: 0px;">
        <tr>
            <td style="text-align: left; width: 33%"><img src="img/logo.svg" width="100"></td>
            <td style="text-align: right; width: 64%"><?php echo date('d/m/Y'); ?></td>
        </tr>
    </table>
    <table style="width: 100%; border: 0px;" align="center">
        <tr>
            <td align="center"><h1>Constancia de Registro</h1></td>
        </tr>
    </table>
    <table style="text-align: center; width: 100%">
        <tbody>
			<tr>
				<td style="text-align:justify">
					<br><br>
				</td>
			</tr>
			<tr>
				<td style="text-align:justify;">
					En el Instituto Universitario del Oeste "Mariscal Sucre", se llevó a cabo la presentación del proyecto sociotecnológico, titulado:
					<b><p>Titulo</p></b>bajo la tutela del profesor(a)
					<b>Profesor.</b> Dicha presentación, fue realizada por el alumno
					<b>{{$lsb->NombreCompleto}},</b> portador de la cédula de identidad número
					<b>{{$lsb->cedula}},</b> en fecha
				    de
					de
					, obteniendo una calificación de
					<b></b> puntos.
					<br><br>
					Constancia que se expide por parte interesada, en la ciudad de Caracas, a los <?php echo date("d"); ?> días del mes de  de <?php echo date("Y"); ?>.
				</td>
			</tr>
			<tr>
				<td style="text-align: center; font-size:12pt"><br><br><br><br><br>
					______________________________________<br>
							Erika Farias<br>
							<i>Directora Nacional</i>
					
				</td>
			</tr>
            <tr>
                <td style="text-align:right">
                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('svg')->size(150)->generate('https://intranet.sistemadeformacionfranciscodemiranda.org.ve/info/'.$lsb->id)) !!} "></td>
            </tr>
		</tbody>
	</table>
</body>
</html>