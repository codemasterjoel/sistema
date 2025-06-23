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
            <td style="text-align: left; width: 33%"></td>
            <td style="text-align: right; width: 64%"><?php echo date('d/m/Y'); ?></td>
        </tr>
    </table>
    <table style="width: 100%; border: 0px;" align="center">
        <tr><td align="center"><b>República Bolivariana de Venezuela</b></td></tr>
        <tr><td align="center"><b>Frente Francisco de Miranda</b></td></tr>
        <tr><td align="center"><b>Escuela Nacional Robinsoniana</b></td></tr>
    </table><br>
    <table style="text-align: center; width: 100%">
        <tbody>
			<tr><td style="text-align:center"><b>Certificado de participación y aprobación en el campamento formativo:</b></td></tr>
            <tr><td style="text-align:center"><b>Escuela de Base, Memoria, Ideario, Militancia</b></td></tr><br>
            <tr><td style="text-align:justify; text-indent: 2em;">Estimado militante, su participación ha sido vital en el desarrollo de este Campamento formativo y nos complace informarle que usted ha aprobado satisfactoriamente.</td></tr>
			<tr>
				<td style="text-align:justify; text-indent: 2em;">
                    Por medio de la presente, la Escuela Nacional Robinsoniana, acredita y certifica que <b style="text-transform: uppercase;">{{ $estudiante->apellido }} {{ $estudiante->nombre }}</b>, identificado(a) con el documento de identidad <b style="text-transform: uppercase;">{{ $estudiante->letra }}-{{ $estudiante->cedula }}</b>, 
                    ha aprobado satisfactoriamente el curso denominado "Escuela de Base, Memoria, Ideario, Militancia", impartido por esta institución durante el período comprendido entre el <b style="text-transform: uppercase;">{{$estudiante->fechaInicio}}</b> y el 
                    <b style="text-transform: uppercase;">{{$estudiante->fechaCulminacion}}</b>.
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
						<li>Dinámica de Integración y conformación de comunidades de aprendizaje</li>
						<li>Método dialectico de análisis de Coyuntura</li>
						<li>Una historia del pueblo, para el pueblo y desde el pueblo</li>
						<li>Conversarte</li>
						<li>Guerra cognitiva y la colonización de la mente</li>
						<li>Reforma constitucional y sus cuatros dimensiones</li>
						<li>Importancia del Plan de la Patria y el legado de Hugo Chávez</li>
						<li>El bolivarianismo: poder y soberanía popular</li>
						<li>Nuevo Bloque histórico</li>
					</ul>
				</td>
			</tr>
            <tr><td style="text-align:left">Muchas felicidades y a seguir construyendo patria.</td></tr><br>
		</tbody>
	</table>
    <table style="text-align: left; width: 100%; border-collapse: collapse;" align="center">
        <tr style="vertical-align: top;">
            <td style="border: solid; width: 33%; height: 100px;">
                Sello del FFM
            </td>
            <td style="width: 33%;">
                <p>Atentamente,</p><br><br>
                <p align="center">________________________</p>
                <p align="center">Nombre y cargo del responsable</p>
            </td>
            <td style="border: solid; width: 33%;">
                Sello de la Escuela Nacional Robinsoniana
            </td>
        </tr>
    </table>
</body>
</html>