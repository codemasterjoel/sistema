<?php

namespace App\Exports;

use App\Models\RegistroLuchador;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithMapping;

class lsbExport implements FromCollection, WithColumnFormatting, ShouldAutoSize, WithHeadings, WithStyles, WithMapping
{
    public function collection()
    {
        return RegistroLuchador::with('estado')->get();
    }

    public function map($luchador): array
    {
        return [
            $luchador->id,
            $luchador->letra,
            $luchador->estatus,
            $luchador->inactivo,
            $luchador->cedula,
            $luchador->nombre,
            $luchador->apellido,
            $luchador->fecha_nac,
            $luchador->telefono,
            $luchador->correo,
            $luchador->edad,
            $luchador->hijos,
            $luchador->vocero,
            $luchador->pertenece_al_psuv,
            $luchador->cargo_popular,
            $luchador->cargo,
            $luchador->nivel_id ? $luchador->nivel_id : '',
            $luchador->avanzada_id ? $luchador->avanzada_id : '',
            $luchador->genero_id ? $luchador->genero_id : '',
            $luchador->nivel_academico_id ? $luchador->nivel_academico_id : '',
            $luchador->profesion_id ? $luchador->profesion_id : '',
            $luchador->responsabilidad_id ? $luchador->responsabilidad_id : '',
            $luchador->nivel_responsabilidad_id ? $luchador->nivel_responsabilidad_id : '', // este campo parece duplicado, verifica si es otro
            $luchador->estado ? $luchador->estado->nombre : '', // <-- Aquí mostramos el NOMBRE del estado
            $luchador->municipio_id ? $luchador->municipio->nombre : '',
            $luchador->parroquia_id ? $luchador->parroquia->nombre : '',
            $luchador->comuna_id ? $luchador->comuna->nombre : '',
            $luchador->direccion,
            $luchador->created_at,
            $luchador->updated_at,
            $luchador->deleted_at,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nacionalidad',
            'Estatus',
            'Fecha Inactivo',
            'Cédula',
            'Nombres',
            'Apellidos',
            'Fecha de Nacimiento',
            'Teléfono',
            'Correo',
            'Edad',
            'Hijos',
            'Es Vocero',
            'Pertenece al PSUV',
            'Posee Cargo de Elección Popular',
            'Cargo',
            'Nivel',
            'Avanzada',
            'Género',
            'Nivel Académico',
            'Profesión',
            'Responsabilidad',
            'Nivel',
            'Estado',
            'Municipio',
            'Parroquia',
            'Comuna',
            'Dirección',
            'Fecha de Registro',
            'Fecha de Actualización',
            'Fecha de Eliminación',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT, //ID
            'B' => NumberFormat::FORMAT_TEXT, //Nacionalidad
            'C' => NumberFormat::FORMAT_TEXT, //Estatus
            'D' => NumberFormat::FORMAT_DATE_DDMMYYYY, //Fecha Inactivo
            'E' => NumberFormat::FORMAT_NUMBER, //Cédula
            'F' => NumberFormat::FORMAT_TEXT, //Nombres
            'G' => NumberFormat::FORMAT_TEXT, //Apellidos
            'H' => NumberFormat::FORMAT_DATE_DDMMYYYY, //Fecha de Nacimiento
            'I' => NumberFormat::FORMAT_NUMBER, //Teléfono
            'J' => NumberFormat::FORMAT_TEXT, //Correo
            'K' => NumberFormat::FORMAT_NUMBER, //Edad
            'L' => NumberFormat::FORMAT_NUMBER, //Hijos
            'M' => NumberFormat::FORMAT_TEXT, // Es Vocero
            'N' => NumberFormat::FORMAT_TEXT, //PERTENECE AL PSUV
            'O' => NumberFormat::FORMAT_TEXT, //POSEE CARGO DE ELECCIÓN POPULAR
            'P' => NumberFormat::FORMAT_TEXT, //Cargo
            'Q' => NumberFormat::FORMAT_TEXT, //Nivel
            'R' => NumberFormat::FORMAT_NUMBER, //Avanzada
            'S' => NumberFormat::FORMAT_TEXT, //Género
            'T' => NumberFormat::FORMAT_TEXT, //Nivel Académico
            'U' => NumberFormat::FORMAT_TEXT, //Profesión
            'V' => NumberFormat::FORMAT_TEXT, //Responsabilidad
            'W' => NumberFormat::FORMAT_TEXT, //Nivel
            'X' => NumberFormat::FORMAT_TEXT, //Estado
            'Y' => NumberFormat::FORMAT_TEXT, //Municipio
            'Z' => NumberFormat::FORMAT_TEXT, //Parroquia
            'AA' => NumberFormat::FORMAT_TEXT, //Comuna
            'AB' => NumberFormat::FORMAT_TEXT, //Dirección
            'AC' => NumberFormat::FORMAT_DATE_DDMMYYYY, //Fecha de Registro
            'AD' => NumberFormat::FORMAT_DATE_DDMMYYYY, //Fecha de Actualización
            'AE' => NumberFormat::FORMAT_DATE_DDMMYYYY, //Fecha de Eliminación
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Obtener el número de filas
        $rowCount = $sheet->getHighestRow();

        // Aplicar bordes a todo el rango de datos (encabezados + datos)
        $range = 'A1:AE' . $rowCount;
        $sheet->getStyle($range)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // Estilo para los encabezados
        $sheet->getStyle('A1:AE1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FFE0E0E0'], // Gris claro
            ],
        ]);

        // Ocultar las líneas de cuadrícula (gridlines)
        $sheet->setShowGridLines(false);

        // Opcional: centrar encabezados
        $sheet->getStyle('A1:AE1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        return [];
    }
}