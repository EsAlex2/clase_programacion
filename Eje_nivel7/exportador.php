<?php

// 1. DEFINICIÓN DE LA INTERFAZ
// Establece el contrato que todas las clases exportadoras deben cumplir.
interface Exportable {
    public function exportarDatos(array $datos): string;
}

// 2. CLASES INDEPENDIENTES QUE IMPLEMENTAN LA INTERFAZ

class ExportarPDF implements Exportable {
    public function exportarDatos(array $datos): string {
        $resultado = "=== PDF GENERADO ===\n";
        $resultado .= "Reporte Oficial de Notas Escolares\n";
        $resultado .= "---------------------------------\n";
        foreach ($datos as $alumno => $nota) {
            $resultado .= "| Alumno: " . str_pad($alumno, 10) . " | Nota: " . $nota . " |\n";
        }
        $resultado .= "---------------------------------\n";
        return $resultado;
    }
}

class ExportarJSON implements Exportable {
    public function exportarDatos(array $datos): string {
        // Usamos las opciones para que el JSON se vea ordenado (sin comprimir)
        return json_encode($datos, JSON_PRETTY_PRINT);
    }
}

class ExportarCSV implements Exportable {
    public function exportarDatos(array $datos): string {
        $lineas = [];
        // Añadimos una fila de encabezados opcional para darle estructura de CSV
        $lineas[] = "Alumno,Nota"; 
        
        foreach ($datos as $alumno => $nota) {
            // Unimos los datos en formato CSV (Alumno,Nota)
            $lineas[] = implode(",", [$alumno, $nota]);
        }
        
        // Unimos todas las líneas con un salto de página
        return implode("\n", $lineas);
    }
}

// 3. LA PRUEBA DEL POLIMORFISMO

// El set de datos académicos (Array asociativo)
$notasAlumnos = [
    'Franklin' => 19,
    'Pedro'    => 14,
    'Maria'    => 20,
    'Luis'     => 11
];

// Instanciamos las tres clases distintas
$generadorPdf  = new ExportarPDF();
$generadorJson = new ExportarJSON();
$generadorCsv  = new ExportarCSV();

// Creamos un array con las diferentes herramientas de exportación para probarlas en bucle
// Nota cómo gracias al type-hinting (Exportable $exportador), garantizamos el polimorfismo.
function procesarExportacion(Exportable $exportador, array $datos) {
    // No importa qué clase sea, sabemos con 100% de certeza que este método existe
    echo $exportador->exportarDatos($datos) . "\n\n";
}

echo "--- PROBANDO EXPORTACIÓN POLIMÓRFICA ---\n\n";

echo "1. SALIDA EN PDF:\n";
procesarExportacion($generadorPdf, $notasAlumnos);

echo "2. SALIDA EN JSON:\n";
procesarExportacion($generadorJson, $notasAlumnos);

echo "3. SALIDA EN CSV:\n";
procesarExportacion($generadorCsv, $notasAlumnos);

?>