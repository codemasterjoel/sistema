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
            <td align="center"><h3>República Bolivariana de Venezuela
            <td align="center"><h3>Frente Francisco de Miranda</h3></td>
            <td align="center"><h3>Escuela Nacional Robinsoniana</h3></td>
        </tr>
    </table>
    <table style="text-align: center; width: 100%">
        <tbody>
			<tr>
				<td style="text-align:justify"><h3>Certificado de participación y aprobación en el campamento formativo:</h3></td>
                <td style="text-align:justify"><h3>Escuela de Base, Memoria, Ideario, Militancia</h3></td>
            </tr>
            <tr><td style="text-align:justify; text-indent: 2em;">Estimado militante, su participación ha sido vital en el desarrollo de este Campamento formativo y nos complace informarle que usted ha aprobado satisfactoriamente.</td></tr>
			<tr>
				<td style="text-align:justify; text-indent: 2em;">
                    Por medio de la presente, la Escuela Nacional Robinsoniana, acredita y certifica que [Nombre completo del participante], identificado(a) con el documento de identidad [Nombre completo del participante], 
                    ha aprobado satisfactoriamente el curso denominado "Escuela de Base, Memoria, Ideario, Militancia", impartido por esta institución durante el período comprendido entre el [fecha de inicio 00/00/0000] y el 
                    [fecha de finalización 00/00/0000].
				</td>
			</tr>
            <tr>
				<td style="text-align:justify; text-indent: 2em;">
                    Este curso estuvo organizado desde la perspectiva de los principios robinsonianos y los preceptos de la educación popular, cumpliendo con los estándares académicos y metodológicos establecidos por la 
                    Escuela Nacional Robinsoniana garantizando la reflexión teoría-práctica para la adquisición de saberes y habilidades clave para el ejercicio del liderazgo y trabajo de comunitario necesario para la 
                    construcción del Socialismo Bolivariano del siglo XXI. Conto con una carga horaria de 36 horas académicas, distribuidas en: 24 horas de seminarios especializados y 12 horas de construcción y reflexión 
                    teórica, en la modalidad presencial e interno durante tres días continuos, abordando los siguientes ejes temático:
				</td>
			</tr>
            <tr>
				<td style="text-align:justify">
					<ul>
						{{-- <ol>1.	El transporte de residuos y desechos sólidos especiales (reciclables), se realizará conforme al contenido de la “Hoja de seguimiento” y la respectiva autorización emitida por este despacho.</ol> --}}
						<ol>●	Dinámica de Integración y conformación de comunidades de aprendizaje</ol>
						<ol>●	Método dialectico de análisis de Coyuntura</ol>
						<ol>●	Una historia del pueblo, para el pueblo y desde el pueblo</ol>
						<ol>●	Conversarte</ol>
						<ol>●	Guerra cognitiva y la colonización de la mente</ol>
						<ol>●	Reforma constitucional y sus cuatros dimensiones</ol>
						<ol>●	Importancia del Plan de la Patria y el legado de Hugo Chávez</ol>
						<ol>●	El bolivarianismo: poder y soberanía popular</ol>
						<ol>●	Nuevo Bloque histórico</ol>
					</ul>
				</td>
			</tr>
            <tr><td>Muchas felicidades y a seguir construyendo patria.</td></tr>
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