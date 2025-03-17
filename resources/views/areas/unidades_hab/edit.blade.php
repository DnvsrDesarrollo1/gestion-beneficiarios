@extends('layouts.app')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons para el diseño boton siguiente anterior-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .custom-container {
            max-width: 900px;
            /* Ancho máximo */
            margin: 0 auto;
            /* Centrar el contenedor */
            padding: 15px;
            /* Espaciado interno */
        }

        /* Estilo general del form-group */
        .form-group {
            display: flex;
            flex-direction: column;
            /* Alinea verticalmente label y select */
            margin-bottom: 15px;
            /* Espaciado entre campos */
        }

        /* Estilo del label */
        .form-group label {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
            /* Espaciado debajo del label */
        }

        /* Estilo del select */
        .form-group select {
            width: 600px;
            /* Tamaño fijo del select */
            max-width: 100%;
            /* Asegura que no exceda el ancho del contenedor */
            padding: 8px;
            /* Espaciado interno */
            font-size: 14px;
            /* Tamaño de texto */
            border: 1px solid #ccc;
            /* Borde estándar */
            border-radius: 4px;
            /* Esquinas redondeadas */
            background-color: #fff;
            /* Fondo blanco */
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            /* Sombra interna */
        }

        .form-input {
            margin-bottom: 10px;
            /* Espacio debajo de cada input */
            flex: 1;
            /* Hace que los inputs se expandan para ocupar el espacio restante */

        }
    </style>
@endsection

@section('content')
    <div class="custom-container mt-4 p-4 bg-light border rounded shadow-md">
        <div style="display: flex; justify-content: center; align-items: center; height: 10vh;" id="step1">
            <h5>Unidad Habitacional</h5>
        </div>
        <form action="{{ route('unidades_hab.update', $unidades->unidad_habitacional_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="custom-container">
                <div class="row mb-3 align-items-center">
                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="unidad_habitacional_id" class="form-label">Codigo Unidad Habitacional:</label>
                            <input type="text" class="form-control" id="unidad_habitacional_id"
                                name="unidad_habitacional_id" value="{{ $unidades->unidad_habitacional_id }}" required>
                        </div>
                    </div>


                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="departamento" class="form-label">Departamento</label>

                            <select class="form-input" id="departamento" name="departamento_id">
                                <option value="">-- Seleccione un Departamento --</option>
                                <option value="1" {{ $unidades->departamento_id == 'CHUQUISACA' ? 'selected' : '' }}>
                                    CHUQUISACA</option>
                                <option value="2" {{ $unidades->departamento_id == 'LA PAZ' ? 'selected' : '' }}>LA PAZ
                                </option>
                                <option value="3" {{ $unidades->departamento_id == 'COCHABAMBA' ? 'selected' : '' }}>
                                    COCHABAMBA</option>
                                <option value="4" {{ $unidades->departamento_id == 'ORURO' ? 'selected' : '' }}>ORURO
                                </option>
                                <option value="5" {{ $unidades->departamento_id == 'POTOSÍ' ? 'selected' : '' }}>POTOSÍ
                                </option>
                                <option value="6" {{ $unidades->departamento_id == 'TARIJA' ? 'selected' : '' }}>TARIJA
                                </option>
                                <option value="7" {{ $unidades->departamento_id == 'SANTA CRUZ' ? 'selected' : '' }}>
                                    SANTA CRUZ</option>
                                <option value="8" {{ $unidades->departamento_id == 'BENI' ? 'selected' : '' }}>BENI
                                </option>
                                <option value="9"{{ $unidades->departamento_id == 'PANDO' ? 'selected' : '' }}>PANDO
                                </option>
                            </select>
                        </div>
                    </div>

                    <!--Busqueda por proyecto-->
            <div class="col-4 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="proyecto" class="form-label fw-bold">Busqueda por Proyecto:</label>
                    <select wire:model.live.debounce.300ms="proyecto" id="proyecto" class="form-select">
                        <option value="">-- Seleccione un Proyecto --</option>
                        <option value="CONSTRUCCION DE 72 VIVIENDAS TIPO PROYECTO EL PORVENIR">CONSTRUCCION DE 72
                            VIVIENDAS TIPO PROYECTO "EL PORVENIR"</option>
                        <option value="URBANIZACION SANTA ISABEL">URBANIZACION SANTA ISABEL</option>
                        <option value="CONSTRUCCION DE 72 VIVIENDAS DE VIVIENDA SOCIAL Y SOLIDARIA DEL SUBPROGRAMA 3">
                            CONSTRUCCION DE 72 VIVIENDAS DE VIVIENDA SOCIAL Y SOLIDARIA DEL SUBPROGRAMA 3</option>
                        <option value="CONTRUCCIÓN DE VIVIENDAS EN SECTORES DISPERSOS">CONTRUCCIÓN DE VIVIENDAS EN
                            SECTORES DISPERSOS</option>
                        <option value="URBANIZACION SENOR DE MAYO - 7UH">URBANIZACION SENOR DE MAYO - 7UH</option>
                        <option value="URBANIZACION SENOR DE MAYO - 1UH">URBANIZACION SENOR DE MAYO - 1UH</option>
                        <option
                            value="CUMPLIMIENTO DE CONTRATO DE LA CONSTRUCCION DE VIVIENDAS SOLIDARIAS DE LA URBANIZACION AMACHUMA">
                            CUMPLIMIENTO DE CONTRATO DE LA CONSTRUCCION DE VIVIENDAS SOLIDARIAS DE LA URBANIZACION
                            AMACHUMA</option>
                        <option value="PROYECTO DE LA CIUDAD DE EL ALTO DE LA URBANIZACION TADEO">PROYECTO DE LA CIUDAD
                            DE EL ALTO DE LA URBANIZACION TADEO</option>
                        <option value="URBANIZACION CHARAPAQUI I">URBANIZACION CHARAPAQUI I</option>
                        <option value="CONSTRUCCION URBANIZACION SAN CARLOS  - 25UH">CONSTRUCCION "URBANIZACION SAN
                            CARLOS" - 25UH</option>
                        <option value="CONSTRUCCION URBANIZACION SAN CARLOS  - 2UH">CONSTRUCCION "URBANIZACION SAN
                            CARLOS" - 2UH</option>
                        <option value="PURA PURA">PURA PURA</option>
                        <option value="CONSTRUCCION DE VIVIENDAS SOLIDARIAS URBANIZACION MERCEDARIO">CONSTRUCCION DE
                            VIVIENDAS SOLIDARIAS URBANIZACION MERCEDARIO</option>
                        <option value="URBANIZACIÓN JARDIN - 39UH">URBANIZACIÓN "JARDIN" - 39UH</option>
                        <option value="URBANIZACIÓN JARDIN -9UH">URBANIZACIÓN "JARDIN" -9UH</option>
                        <option value="TECHOS BOLIVIANOS">TECHOS BOLIVIANOS</option>
                        <option value="CONSTRUCCIÓN DE 90 VIVIENDAS PROYECTO EL SALVADOR CIUDAD DE EL ALTO">CONSTRUCCIÓN
                            DE 90 VIVIENDAS PROYECTO EL SALVADOR CIUDAD DE EL ALTO</option>
                        <option value="URBANIZACIÓN RETAMAS III MARIA CAMA ANCALLE">URBANIZACIÓN RETAMAS III MARIA CAMA
                            ANCALLE</option>
                        <option value="URBANIZACIÓN RETAMAS III - 10UH">URBANIZACIÓN RETAMAS III - 10UH</option>
                        <option value="URBANIZACIÓN RETAMAS III - 12UH">URBANIZACIÓN RETAMAS III - 12UH</option>
                        <option value="URBANIZACIÓN SAN ISIDRO">URBANIZACIÓN SAN ISIDRO</option>
                        <option value="URBANIZACIÓN TILATA - SECTOR B - 3UH">URBANIZACIÓN TILATA - SECTOR "B" - 3UH
                        </option>
                        <option value="URBANIZACIÓN TILATA - SECTOR B - 1UH">URBANIZACIÓN TILATA - SECTOR "B" - 1UH
                        </option>
                        <option value="CONSTRUCCIÓN PROYECTO URBANIZACIÓN CRISTAL (625 VIVIENDAS)">CONSTRUCCIÓN PROYECTO
                            URBANIZACIÓN CRISTAL (625 VIVIENDAS)</option>
                        <option value="COMPRA DE VIVIENDAS Y TERRENOS URBANIZACIÓN "VILLA MERCEDES" EL ALTO LA PAZ">
                            COMPRA DE VIVIENDAS Y TERRENOS URBANIZACIÓN "VILLA MERCEDES" EL ALTO LA PAZ</option>
                        <option value="URBANIZACIÓN VILLA MERCEDES - SECTOR E">URBANIZACIÓN VILLA MERCEDES - SECTOR "E"
                        </option>
                        <option value="COMPRA DE VIVIENDA ALTO LIMA TERCERA SECCION">COMPRA DE VIVIENDA "ALTO LIMA
                            TERCERA SECCION"</option>
                        <option value="COMPRA DE VIVIENDA RETAMAS III">COMPRA DE VIVIENDA "RETAMAS III"</option>
                        <option value="COMPRA DE VIVIENDA ZONA 6 DE JUNIO">COMPRA DE VIVIENDA ZONA 6 DE JUNIO</option>
                        <option value="HUGO CHAVEZ FRIAS">HUGO CHAVEZ FRIAS</option>
                        <option value="COMPRA DE VIVIENDA CIUDAD SATELITE">COMPRA DE VIVIENDA "CIUDAD SATELITE"</option>
                        <option value="COMPRA DE VIVIENDA URBANIZACION VILLA MERCEDES">COMPRA DE VIVIENDA "URBANIZACION
                            VILLA MERCEDES"</option>
                        <option value="COMPRA DE VIVIENDA ALTO SAN PEDRO">COMPRA DE VIVIENDA ALTO SAN PEDRO</option>
                        <option value="COMPRA DE VIVIENDA COSMOS 79">COMPRA DE VIVIENDA "COSMOS 79"</option>
                        <option value="COMPRA DE VIVIENDA ZONA NORTE">COMPRA DE VIVIENDA ZONA NORTE</option>
                        <option value="COMPRA DE VIVIENDA 23 DE MARZO RIO SECO (FAVIA MAMANI)">COMPRA DE VIVIENDA "23 DE
                            MARZO RIO SECO" (FAVIA MAMANI)</option>
                        <option value="COMPRA DE VIVIENDA URBANIZACIÓN BELLA VISTA ELVIS CRUZ">COMPRA DE VIVIENDA
                            URBANIZACIÓN "BELLA VISTA" ELVIS CRUZ</option>
                        <option value="COMPRA DE VIVIENDA ZONA SANTIAGO DE LACAYA - EDGAR SIÑANI">COMPRA DE VIVIENDA
                            ZONA SANTIAGO DE LACAYA - EDGAR SIÑANI</option>
                        <option value="COMPRA DE VIVIENDA NUEVA JERUSALEM">COMPRA DE VIVIENDA "NUEVA JERUSALEM"</option>
                        <option value="COMPRA DE VIVIENDA URBANIZACIÓN CALUYO NESTOR DIORI MAMANI">COMPRA DE VIVIENDA
                            URBANIZACIÓN "CALUYO" NESTOR DIORI MAMANI</option>
                        <option value="URBANIZACIÓN SAN FELIPE DE SEQUE FERNANDO LLANQUE">URBANIZACIÓN "SAN FELIPE DE
                            SEQUE" FERNANDO LLANQUE</option>
                        <option value="SAN FELIPE DE SEQUE SR. EDGAR FLORES CONDORINA">SAN FELIPE DE SEQUE SR. EDGAR
                            FLORES CONDORINA</option>
                        <option value="COMPRA DE VIVIENDA ALPACOMA BAJO CEFERINO TORREZ">COMPRA DE VIVIENDA "ALPACOMA
                            BAJO" CEFERINO TORREZ</option>
                        <option value="URBANIZACIÓN SAN PABLO">URBANIZACIÓN "SAN PABLO"</option>
                        <option value="URB. MCAL. SANTA CRUZ">URB. MCAL. SANTA CRUZ</option>
                        <option value="URBANIZACIÓN COSMOS 79 VICTOR HUGO TOCORARI">URBANIZACIÓN COSMOS 79 VICTOR HUGO
                            TOCORARI</option>
                        <option value="URBANIZACIÓN SANTIAGO II - MOISES QUIROZ">URBANIZACIÓN SANTIAGO II - MOISES
                            QUIROZ</option>
                        <option value="DANIEL C. QUISPE SULLCANI">DANIEL C. QUISPE SULLCANI</option>
                        <option value="JUANA AZURDUY / RAQUEL ILARI VELASCO">JUANA AZURDUY / RAQUEL ILARI VELASCO
                        </option>
                        <option value="URBANIZACIÓN EN EL VERGEL CONTRUCCION DE 250 VIVIENDAS">URBANIZACIÓN EN EL VERGEL
                            CONTRUCCION DE 250 VIVIENDAS</option>
                        <option value="URBANIZACIÓN JARDIN - 34UH">URBANIZACIÓN JARDIN - 34UH</option>
                        <option value="URBANIZACIÓN JARDIN - 13UH">URBANIZACIÓN JARDIN - 13UH</option>
                        <option value="SEÑOR DE MAYO - 5UH">SEÑOR DE MAYO - 5UH</option>
                        <option value="COMPRA DE UNA VIVIENDA ALTO TACAGUA HADAAN AYLLON SEGALES">COMPRA DE UNA VIVIENDA
                            ALTO TACAGUA "HADAAN AYLLON SEGALES"</option>
                        <option value="SEÑOR DE MAYO - 4UH">SEÑOR DE MAYO - 4UH</option>
                        <option value="COMPRA VIVIENDA URBANIZACIÓN LOZA">COMPRA VIVIENDA "URBANIZACIÓN LOZA"</option>
                        <option
                            value="COMPRA DE 1 VIVIENDA URBANIZACIÓN RIO SECO (S2), LA PAZ MURILLO, EL ALTO, RIO SECO.">
                            COMPRA DE 1 VIVIENDA "URBANIZACIÓN RIO SECO" (S2), LA PAZ MURILLO, EL ALTO, RIO SECO.
                        </option>
                        <option value="CONSTRUCCIÓN 31 VIVIENDAS URBANIZACIÓN SEÑOR DE MAYO (PRIMAVERA)">CONSTRUCCIÓN 31
                            VIVIENDAS URBANIZACIÓN SEÑOR DE MAYO (PRIMAVERA)</option>
                        <option
                            value="COMPRA DE UNA VIVIENDA URBANIZACION COSMOS 79 SP2 LA PAZ MURILLO, EL ALTO, COSMOS 79">
                            COMPRA DE UNA VIVIENDA "URBANIZACION COSMOS 79" SP2 LA PAZ MURILLO, EL ALTO, COSMOS 79
                        </option>
                        <option value="CONSTRUCCIÓN DE 18 VIVIENDAS - SEÑOR DE MAYO I MARQUIVIRI">CONSTRUCCIÓN DE 18
                            VIVIENDAS - SEÑOR DE MAYO I MARQUIVIRI</option>
                        <option
                            value="COMPRA DE 23 (VEINTITRES) VIVIENDAS, URBANIZACIÓN SEÑOR DE MAYO, EL ALTO, LA PAZ.">
                            COMPRA DE 23 (VEINTITRES) VIVIENDAS, URBANIZACIÓN SEÑOR DE MAYO, EL ALTO, LA PAZ.</option>
                        <option value="COMPRA INDIVIDUAL URBANIZACIÓN GERMAN BUSCH 1-1-2 EL ALTO">COMPRA INDIVIDUAL
                            URBANIZACIÓN GERMAN BUSCH 1-1-2 EL ALTO</option>
                        <option value="CONTRUCCION 179 VIVIENDAS URBANIZACIÓN INTI RAYMI">CONTRUCCION 179 VIVIENDAS
                            "URBANIZACIÓN INTI RAYMI"</option>
                        <option value="COMPRA DE CINCO VIVIENDAS URBANIZACIÓN SEÑOR DE MAYO">COMPRA DE CINCO VIVIENDAS
                            "URBANIZACIÓN SEÑOR DE MAYO"</option>
                        <option value="COMPRA DE 12 VIVIENDAS (S3) URBANIZACIÓN TILATA II MUNICIPIO VIACHA, EL ALTO">
                            COMPRA DE 12 VIVIENDAS (S3) "URBANIZACIÓN TILATA II" MUNICIPIO VIACHA, EL ALTO</option>
                        <option
                            value="CONSTRUCCIÓN DE 168 VIVIENDAS (S2), DENTRO DEL PROGRAMA DE VIVIENDA SOCIAL Y SOLIDARIA (PVS) PROYECTO VIVIENDA SOCIAL BOLIVIA CAMBIA C.O.R. EL ALTO">
                            CONSTRUCCIÓN DE 168 VIVIENDAS (S2), DENTRO DEL PROGRAMA DE VIVIENDA SOCIAL Y SOLIDARIA (PVS)
                            PROYECTO "VIVIENDA SOCIAL BOLIVIA CAMBIA C.O.R. EL ALTO"</option>
                        <option
                            value="COMPRA DE 1 VIVIENDA URBANIZACIÓN VILLA EXALTACIÓN (S4), LA PAZ, MURILLO, EL ALTO, VILLA EXALTACIÓN">
                            COMPRA DE 1 VIVIENDA "URBANIZACIÓN VILLA EXALTACIÓN" (S4), LA PAZ, MURILLO, EL ALTO, VILLA
                            EXALTACIÓN</option>
                        <option value="COMPRA DE VIVIENDA URBANIZACIÓN MARISCAL SANTA CRUZ">COMPRA DE VIVIENDA
                            URBANIZACIÓN MARISCAL SANTA CRUZ</option>
                        <option value="CONSTRUCCIÓN DE 45 VIVIENDAS URBANIZACIÓN SEÑOR DE MAYO">CONSTRUCCIÓN DE 45
                            VIVIENDAS URBANIZACIÓN SEÑOR DE MAYO</option>
                        <option
                            value="CONSTRUCCIÓN DE 17 VIVIENDAS UBANIZACION SAN LUIS II (S2), MURILLO, EL ALTO, LA PAZ">
                            CONSTRUCCIÓN DE 17 VIVIENDAS "UBANIZACION SAN LUIS II" (S2), MURILLO, EL ALTO, LA PAZ
                        </option>
                        <option value="CONSTRUCCIÓN DE 209 VIVIENDAS URBANIZACIÓN SAN LUIS II">CONSTRUCCIÓN DE 209
                            VIVIENDAS "URBANIZACIÓN SAN LUIS II"</option>
                        <option value="CONSTRUCCIÓN DE 48 VIVIENDAS URBANIZACIÓN MARISCAL SANTA CRUZ I">CONSTRUCCIÓN DE
                            48 VIVIENDAS URBANIZACIÓN MARISCAL SANTA CRUZ I</option>
                        <option value="CONSTRUCCIÓN DE 48 VIVIENDAS URBANIZACIÓN MARISCAL SANTA CRUZ II">CONSTRUCCIÓN
                            DE 48 VIVIENDAS URBANIZACIÓN MARISCAL SANTA CRUZ II</option>
                        <option value="BOLIVARIANO PRESIDENTE EVO MORALES AYMA CONSTRUCCIÓN 200 VIVIENDAS">"BOLIVARIANO
                            PRESIDENTE EVO MORALES AYMA" CONSTRUCCIÓN 200 VIVIENDAS</option>
                        <option value="COMPRA DE 8 VIVIENDAS URBANIZACIÓN JARDIN">COMPRA DE 8 VIVIENDAS "URBANIZACIÓN
                            JARDIN"</option>
                        <option value="COMPRA DE 52 VIVIENDAS URBANIZACIÓN PALERMO Y JARDIN">COMPRA DE 52 VIVIENDAS
                            "URBANIZACIÓN PALERMO Y JARDIN"</option>
                        <option value="COMPRA DE 23 VIVIENDAS URBANIZACIÓN VIRGEN DEL SOCAVON 23 UH">COMPRA DE 23
                            VIVIENDAS "URBANIZACIÓN VIRGEN DEL SOCAVON" 23 UH</option>
                        <option value="URBANIZACIÓN RETAMAS III 27 U.H. Y URBANIZACIÓN EL CARMEN 1 U.H.">URBANIZACIÓN
                            RETAMAS III 27 U.H. Y URBANIZACIÓN EL CARMEN 1 U.H.</option>
                        <option value="CONSTRUCCIÓN 18 VIVIENDAS URBANIZACIÓN LAS PALMAS SENDA III - PVS - SP3">
                            CONSTRUCCIÓN 18 VIVIENDAS URBANIZACIÓN LAS PALMAS SENDA III - PVS - SP3</option>
                        <option value="PROYECTO VALLE ENCANTADO - LOMA LINDA">PROYECTO VALLE ENCANTADO - LOMA LINDA
                        </option>
                        <option value="COMPRA DE 60 VIVIENDAS - CONDOMINIO SANTA ROSA CBBA">COMPRA DE 60 VIVIENDAS -
                            CONDOMINIO SANTA ROSA CBBA</option>
                        <option
                            value="ONSTRUCCIÓN DE VIVIENDA INDIVIDUAL S4 - SR. JHONNY VARGAS Z. - EX FUNDO ORCOKALLPA">
                            CONSTRUCCIÓN DE VIVIENDA INDIVIDUAL S4 - SR. JHONNY VARGAS Z. - EX FUNDO ORCOKALLPA</option>
                        <option value="CONSTRUCCIÓN DE VIVIENDA INDIVIDUAL S3 - SR. DAMIAN MAMANI S. - SUMUMPAYA SUD">
                            CONSTRUCCIÓN DE VIVIENDA INDIVIDUAL S3 - SR. DAMIAN MAMANI S. - SUMUMPAYA SUD</option>
                        <option value="URB. PORVENIR">URB. PORVENIR</option>
                        <option value="PEDRO FERRARI SP3">PEDRO FERRARI SP3</option>
                        <option value="HUAJARA II SP3">HUAJARA II SP3</option>
                        <option value="HUAJARA II SP4">HUAJARA II SP4</option>
                        <option value="CONSTRUCCIÓN DE VIVIENDAS MILENIUM 332 UH - S3, MUNICIPIO DE ORURO">CONSTRUCCIÓN
                            DE VIVIENDAS MILENIUM 332 UH - S3, MUNICIPIO DE ORURO</option>
                        <option value="URBANIZACIÓN 2000 - MINEROS HUANUNI">URBANIZACIÓN 2000 - MINEROS HUANUNI
                        </option>
                        <option value="CONSTRUCCIÓN 56 VIVIENDAS ALTO CARACOLLO (S2),CARACOLLO,CERCADO,ORURO">
                            CONSTRUCCIÓN 56 VIVIENDAS "ALTO CARACOLLO" (S2),CARACOLLO,CERCADO,ORURO</option>
                        <option value="HABITACIONAL PUCKAPAMPA - CONSTRUCCIÓN DE 9 VIVIENDAS SP 3 TUPIZA, POTOSI">
                            HABITACIONAL PUCKAPAMPA - CONSTRUCCIÓN DE 9 VIVIENDAS SP 3 TUPIZA, POTOSI</option>
                        <option
                            value="CONSTRUCCIÓN DE 589 VIVIENDAS SOCIALES P.V.S EN LA CIUDAD DE YACUIBA - GRAN CHACO - BELLA VISTA I">
                            CONSTRUCCIÓN DE 589 VIVIENDAS SOCIALES P.V.S EN LA CIUDAD DE YACUIBA - GRAN CHACO - BELLA
                            VISTA I</option>
                        <option
                            value="CONSTRUCCION DE 589 VIVIENDAS SOCIALES P.V.S EN LA CIUDAD DE YACUIBA - GRAN CHACO - BELLA VISTA II">
                            CONSTRUCCION DE 589 VIVIENDAS SOCIALES P.V.S EN LA CIUDAD DE YACUIBA - GRAN CHACO - BELLA
                            VISTA II</option>
                        <option
                            value="CONSTRUCCIÓN DE 589 VIVIENDAS SOCIALES P.V.S EN LA CIUDAD DE YACUIBA - GRAN CHACO - CAMPO GRANDE VALENTINA">
                            CONSTRUCCIÓN DE 589 VIVIENDAS SOCIALES P.V.S EN LA CIUDAD DE YACUIBA - GRAN CHACO - CAMPO
                            GRANDE VALENTINA</option>
                        <option
                            value="CONSTRUCCIÓN 400 VIVIENDAS URBANIZACIÓN EL PORVENIR (S2) TARIJA, ARCE, BERMEJO, CERCADO">
                            CONSTRUCCIÓN 400 VIVIENDAS URBANIZACIÓN EL PORVENIR (S2) TARIJA, ARCE, BERMEJO, CERCADO
                        </option>
                        <option
                            value="CONSTRUCCION 125 VIVIENDAS ASOCIACION DE PERIODISTAS Y COMUNICADORES DE YACUIBA (S2) TARIJA, YACUIBA">
                            CONSTRUCCION 125 VIVIENDAS ASOCIACION DE PERIODISTAS Y COMUNICADORES DE YACUIBA (S2) TARIJA,
                            YACUIBA</option>
                        <option value="EL VALLECITO I">EL VALLECITO I</option>
                        <option value="EL VALLECITOS II">"EL VALLECITOS II"</option>
                        <option value="EL VALLECITOS III">"EL VALLECITOS III"</option>
                        <option value="TODOS SANTOS">TODOS SANTOS</option>
                        <option value="VILLA FATIMA CONCEPCION">VILLA FATIMA CONCEPCION</option>
                        <option value="URBANIZACION RESIDENCIAS DEL SUR">URBANIZACION RESIDENCIAS DEL SUR</option>
                        <option
                            value="CONSTRUCCION DE VIVIENDAS SOLIDARIAS PARA FAMILIAS POBRES EN EL AREA METROPOLITANA DE SANTA CRUZ EL TERRADO I">
                            CONSTRUCCION DE VIVIENDAS SOLIDARIAS PARA FAMILIAS POBRES EN EL AREA METROPOLITANA DE SANTA
                            CRUZ "EL TERRADO I "</option>
                        <option
                            value="CONSTRUCCION DE VIVIENDAS SOLIDARIAS PARA FAMILIAS POBRES EN EL AREA METROPOLITANA DE SANTA CRUZ EL TERRADO II">
                            CONSTRUCCION DE VIVIENDAS SOLIDARIAS PARA FAMILIAS POBRES EN EL AREA METROPOLITANA DE SANTA
                            CRUZ "EL TERRADO II"</option>
                        <option
                            value="CONSTRUCCION DE 97 VIVIENDAS PARA FAMILIAS POBRES EN EL AREA METROPOLITANA DE SANTA CRUZ DE LA SIERRA EL PIYO">
                            CONSTRUCCION DE 97 VIVIENDAS PARA FAMILIAS POBRES EN EL AREA METROPOLITANA DE SANTA CRUZ DE
                            LA SIERRA "EL PIYO"</option>
                        <option
                            value="CONSTRUCCION DE 203 VIVIENDAS SOLIDARIAS PARA FAMILIAS POBRES EN EL AREA METROPOLINA DE SANTA CRUZ DE LA SIERRA EL PIYO">
                            CONSTRUCCION DE 203 VIVIENDAS SOLIDARIAS PARA FAMILIAS POBRES EN EL AREA METROPOLINA DE
                            SANTA CRUZ DE LA SIERRA "EL PIYO"</option>
                        <option value="URBANIZACION PALMA REAL">URBANIZACION PALMA REAL</option>
                        <option
                            value="CONSTRUCCION DE 153 VIVIENDAS URBANIZACION VILLA EL JIPA 1 SUB PROGRAMA S2, S3, S4 DEPARTAMENTO SANTA CRUZ MUNICIPIO WARNES - 28UH">
                            CONSTRUCCION DE 153 VIVIENDAS URBANIZACION VILLA EL JIPA 1 SUB PROGRAMA S2, S3, S4
                            DEPARTAMENTO SANTA CRUZ MUNICIPIO WARNES - 28UH</option>
                        <option
                            value="CONSTRUCCION DE 153 VIVIENDAS URBANIZACION VILLA EL JIPA 1 SUB PROGRAMA S2, S3, S4 DEPARTAMENTO SANTA CRUZ MUNICIPIO WARNES - 118UH">
                            CONSTRUCCION DE 153 VIVIENDAS URBANIZACION VILLA EL JIPA 1 SUB PROGRAMA S2, S3, S4
                            DEPARTAMENTO SANTA CRUZ MUNICIPIO WARNES - 118UH</option>
                        <option
                            value="CONSTRUCCION DE 153 VIVIENDAS URBANIZACION VILLA EL JIPA 1 SUB PROGRAMA S2, S3, S4 DEPARTAMENTO SANTA CRUZ MUNICIPIO WARNES - 7UH">
                            CONSTRUCCION DE 153 VIVIENDAS URBANIZACION VILLA EL JIPA 1 SUB PROGRAMA S2, S3, S4
                            DEPARTAMENTO SANTA CRUZ MUNICIPIO WARNES - 7UH</option>
                        <option value="CONSTRUCCION DE 165 VIVIENDAS PROY. LOS PIYOS MADRE INDIA">CONSTRUCCION DE 165
                            VIVIENDAS PROY. "LOS PIYOS MADRE INDIA"</option>
                        <option value="URBANIZACION LAS BRISAS">URBANIZACION LAS BRISAS</option>
                        <option value="URBANIZACION LA SOLANA">URBANIZACION LA SOLANA</option>
                        <option value="PROYECTO SEVERINO MENESES">PROYECTO SEVERINO MENESES</option>
                        <option value="CONTRUCCION DE VIVIENDAS PROYECTO "SAN JULIAN" - 32UH">CONTRUCCION DE VIVIENDAS
                            PROYECTO "SAN JULIAN" - 32UH</option>
                        <option value="CONTRUCCION DE VIVIENDAS PROYECTO "SAN JULIAN" - 34UH">CONTRUCCION DE VIVIENDAS
                            PROYECTO "SAN JULIAN" - 34UH</option>
                        <option value="TRABAJADORES DE LA PRENSA - 48UH">TRABAJADORES DE LA PRENSA - 48UH</option>
                        <option value="TRABAJADORES DE LA PRENSA - 50UH">TRABAJADORES DE LA PRENSA - 50UH</option>
                        <option value="URBANIZACION SANTISIMA TRINIDAD - 7UH">URBANIZACION SANTISIMA TRINIDAD - 7UH
                        </option>
                        <option value="URBANIZACION SANTISIMA TRINIDAD - 11UH">URBANIZACION SANTISIMA TRINIDAD - 11UH
                        </option>
                        <option value="URBANIZACION SANTISIMA TRINIDAD - 18UH">URBANIZACION SANTISIMA TRINIDAD - 18UH
                        </option>
                        <option value="URBANIZACION SANTISIMA TRINIDAD - 76UH">URBANIZACION SANTISIMA TRINIDAD - 76UH
                        </option>
                        <option value="INTEGRACION DE LAS AMERICAS">INTEGRACION DE LAS AMERICAS</option>
                        <option value="VALLE AKUALAND 21 U.H.">VALLE AKUALAND 21 U.H.</option>
                        <option value="CONSTRUCCION DE 89 VIVIENDAS PROY. AKUALAND KM.16 CARRT.AL NORTE">CONSTRUCCION
                            DE 89 VIVIENDAS PROY. "AKUALAND KM.16 CARRT.AL NORTE"</option>
                        <option value="CONSTRUCCION DE 75 VIVIENDAS PROY. EL DORADO">CONSTRUCCION DE 75 VIVIENDAS PROY.
                            "EL DORADO"</option>
                        <option value="CONSTRUCCION DE 116 VIVIENDAS URBANIZACION VALLE AKUALAND">"CONSTRUCCION DE 116
                            VIVIENDAS URBANIZACION VALLE AKUALAND"</option>
                        <option value="CONSTRUCCION DE 38 VIVIENDAS EN URB EL DORADO CARRETERA SANTA CRUZ - COTOCA">
                            CONSTRUCCION DE 38 VIVIENDAS EN URB "EL DORADO" CARRETERA SANTA CRUZ - COTOCA</option>
                        <option value="PATUJU PLAN 3000 DEL SUBPROGRAMA 2">PATUJU PLAN 3000 DEL SUBPROGRAMA 2</option>
                        <option value="CONSTRUCCION DE 427 VIVIENDAS URB. PATUJU DEPTO SANTA CRUZ">CONSTRUCCION DE 427
                            VIVIENDAS URB. "PATUJU" DEPTO SANTA CRUZ</option>
                        <option value="URBANIZACION PAITITI">URBANIZACION PAITITI</option>
                        <option value="CONSTRUCCION DE 100 VIVIENDAS TURERE">CONSTRUCCION DE 100 VIVIENDAS "TURERE"
                        </option>
                        <option
                            value="CONSTRUCCION DE 220 VIVIENDAS, URBANIZACION 16 DE NOVIEMBRE. CONFEDERACION NACIONAL DE CHOFERES">
                            CONSTRUCCION DE 220 VIVIENDAS, URBANIZACION 16 DE NOVIEMBRE. CONFEDERACION NACIONAL DE
                            CHOFERES</option>
                        <option value="CONSTRUCCION DE 132 VIVIENDAS URBANIZACION EL PARAISO S2">CONSTRUCCION DE 132
                            VIVIENDAS URBANIZACION EL PARAISO "S2"</option>
                        <option value="CONSTRUCCION DE 360 VIVIENDAS URBANIZACION MAPAIZO">CONSTRUCCION DE 360
                            VIVIENDAS URBANIZACION MAPAIZO</option>
                        <option value="CONSTRUCCION DE 300 VIVIENDA LA PASCANA">CONSTRUCCION DE 300 VIVIENDA LA PASCANA
                        </option>
                        <option
                            value="CONSTRUCCION DE 261 VIVIENDAS EN LA URBANIZACION EL CARMEN DENOMINADO DIONICIO MORALES CHOQUE (S2)">
                            CONSTRUCCION DE 261 VIVIENDAS EN LA URBANIZACION EL CARMEN DENOMINADO DIONICIO MORALES
                            CHOQUE (S2)</option>
                        <option value="CONSTRUCCION 141 VIVIENDAS EN LA URBANIZACION LAS PALMAS">CONSTRUCCION 141
                            VIVIENDAS EN LA URBANIZACION LAS PALMAS</option>
                        <option value="URBANIZACION LAS PALMAS CONSTRUCCION DE 301 VIVIENDAS">URBANIZACION "LAS PALMAS"
                            CONSTRUCCION DE 301 VIVIENDAS</option>
                        <option value="CONSTRUCCION DE 84 VIVIENDAS URB. LOS TAJIBOS SAN BORJA">CONSTRUCCION DE 84
                            VIVIENDAS URB. LOS TAJIBOS SAN BORJA</option>
                        <option value="CONSTRUCCION DE 37 VIVIENDAS EN LA URB. LOS TAJIBOS SAN BORJA">CONSTRUCCION DE
                            37 VIVIENDAS EN LA URB. LOS TAJIBOS SAN BORJA</option>
                        <option
                            value="CONSTRUCCION DE 205 VIVIENDAS EN RIBERALTA-BENI-VILLA NORITA PLAN VIVIENDA SOCIAL">
                            CONSTRUCCION DE 205 VIVIENDAS EN RIBERALTA-BENI-VILLA NORITA PLAN VIVIENDA SOCIAL</option>
                        <option value="CONSTRUCCION DE 104 VIVIENDAS URB. DIONISIO MORALES RIBERALTA-BENI">CONSTRUCCION
                            DE 104 VIVIENDAS "URB. DIONISIO MORALES" RIBERALTA-BENI</option>
                        <option
                            value="CONSTRUCCION DE 176 VIVIENDAS (S2) NUEVO AMANECER AMAZONICO PROVINCIA VACA DIEZ, RIBERALTA, BENI">
                            CONSTRUCCION DE 176 VIVIENDAS (S2) "NUEVO AMANECER AMAZONICO" PROVINCIA VACA DIEZ,
                            RIBERALTA, BENI</option>
                        <option
                            value="CONSTRUCCION DE 148 VIVIENDAS (S2) NUEVO AMANECER EL TORITO PROVINCIA VACA DIEZ, RIBERALTA, BENI.">
                            CONSTRUCCION DE 148 VIVIENDAS (S2) "NUEVO AMANECER EL TORITO" PROVINCIA VACA DIEZ,
                            RIBERALTA, BENI.</option>
                        <option
                            value="CONSTRUCCION DE 185 VIVIENDAS BUEN DESTINO BENI, VACA DIEZ, VILLA LITORAL, PANAHUAYA, RIBERALTA">
                            CONSTRUCCION DE 185 VIVIENDAS "BUEN DESTINO" BENI, VACA DIEZ, VILLA LITORAL, PANAHUAYA,
                            RIBERALTA</option>
                        <option value="CONSTRUCCION 83 VIVIENDAS GRANJA FUNDACION (S2) VACA DIEZ, RIBERALTA, BENI">
                            CONSTRUCCION 83 VIVIENDAS GRANJA FUNDACION (S2) VACA DIEZ, RIBERALTA, BENI</option>
                        <option
                            value="CONSTRUCCION 280 VIVIENDAS URBANIZACION EL TRIUNFO (S2) GUAYARAMERIN, PROVINCIA VACA DIEZ">
                            CONSTRUCCION 280 VIVIENDAS URBANIZACION EL TRIUNFO (S2) GUAYARAMERIN, PROVINCIA VACA DIEZ
                        </option>
                        <option
                            value="CONSTRUCCION DE 133 UNIDADES HABITACIONALES EN LA URBANIZACION SAN ANTONIO S-2 SAN IGNACIO DE MOXOS">
                            CONSTRUCCION DE 133 UNIDADES HABITACIONALES EN LA URBANIZACION SAN ANTONIO S-2 SAN IGNACIO
                            DE MOXOS</option>
                        <option
                            value="CONSTRUCCION DE 133 UNIDADES HABITACIONALES EN LA URBANIZACION SAN ANTONIO S-2 SAN IGNACIO DE MOXOS">
                            URBANIZACION TUNARI</option>
                        <option
                            value="CONSTRUCCION DE 445 VIVIENDAS EN LA URB. NUEVA COBIJA II DE LA CIUDAD DE COBIJA">
                            CONSTRUCCION DE 445 VIVIENDAS EN LA URB. NUEVA COBIJA II DE LA CIUDAD DE COBIJA</option>

                    </select>
                </div>
            </div>

                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="manzano" class="form-label">Manzano</label>
                            <input type="text" class="form-control" id="manzano" name="manzano"
                                value="{{ $unidades->manzano }}" required>
                        </div>
                    </div>

                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="lote" class="form-label">Lote</label>
                            <input type="text" class="form-control" id="lote" name="lote"
                                value="{{ $unidades->lote }}" required>
                        </div>
                    </div>

                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="unidad_vecinal" class="form-label">Unidad Vecinal</label>
                            <input type="text" class="form-control" id="unidad_vecinal" name="unidad_vecinal"
                                value="{{ $unidades->unidad_vecinal }}" required>
                        </div>
                    </div>

                    <div class="col-3 col-md-3 col-lg-12">
                        <div class="form-group">
                            <label for="observaciones" class="form-label">Observaciones</label>
                            <textarea class="form-control" id="observaciones" name="observaciones" rows="1" cols="120"
                                placeholder="Escribe tus observaciones aquí" value="{{ $unidades->observaciones }}"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button button type="button" onclick="window.open('', '_self', ''); window.close();"
                    class="btn btn-danger">Cancelar</button>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <!-- Botón Anterior -->
                <a href="{{ route('unidades_hab.index') }}" class="btn btn-warning">
                    <i class="bi bi-arrow-left-circle"></i> Anterior
                </a>
                <!-- Botón Siguiente -->
                <a href="pagina_siguiente.html" class="btn btn-secondary">
                    Siguiente <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </form>

    </div>
@endsection
