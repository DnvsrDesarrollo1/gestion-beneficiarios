@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table.custom-table {
            border: 0px solid #4CAF50;
            /* Borde general de la tabla */
            border-radius: 8px;
            /* Bordes redondeados */
            overflow: hidden;
            /* Evita que los bordes sobresalgan */
        }

        table.custom-table thead th {
            background-color: #4CAF50;
            /* Color del encabezado */
            color: white;
            border: 1px solid #3e8e41;
            /* Borde del encabezado */
            text-align: center;
        }

        table.custom-table tbody td {
            border: 0px solid #ddd;
            /* Bordes de las celdas */
            padding: 0px;
            text-align: center;
        }

        table.custom-table tbody tr:hover {
            background-color: #f1f1f1;
            /* Color al pasar el mouse */
        }

        /* Bordes más finos y mejor contraste */
        table.custom-table th,
        table.custom-table td {
            border-width: 0px;
            border-color: #ccc;
        }

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


            /* Espacio debajo de cada input */
            flex: 1;/* Hace que los inputs se expandan para ocupar el espacio restante */

        }

    </style>
@endsection

<div>

    <div class="custom-container mt-2 p-2 bg-light border rounded shadow-md">
        <div class="text-center mb-4">
            <h5 class="fw-bold text-uppercase">BUSQUEDA BENEFICIARIO</h5>
        </div>
        <div class="row g-3">
            <!--Busqueda por nombre del beneficiario -->
            <div class="col-4 col-md-4 col-lg-3 mb-4">
                <div class="input-group">
                    <div class="form-floating flex-grow-0" style="width: 250px;">
                        <input wire:model.live.debounce.300ms="nombre" type="text" class="form-control"
                            id="nombreInput" placeholder="Buscar por nombre" style="width: 100%;">
                        <label for="nombreInput">Ingrese el nombre beneficiario</label>
                    </div>
                </div>
            </div>
            <!--Busqueda por carnet de identidad del beneficiario-->
            <div class="col-4 col-md-4 col-lg-3 mb-4">
                <div class="input-group">
                    <div class="form-floating flex-grow-0" style="width: 250px;">
                        <input wire:model.live.debounce.300ms="cedula" type="text" class="form-control"
                            id="cedulaInput" placeholder="Buscar por C.I." style="width: 100%;">
                        <label for="cedulaInput">Ingrese el numero de C.I.</label>
                    </div>
                </div>
            </div>
            <!--Busqueda por nombre conyugue-->
            <div class="col-3 col-md-4 col-lg-3 mb-4">
                <div class="input-group">
                    <div class="form-floating flex-grow-0" style="width: 250px;">
                        <input wire:model.live.debounce.300ms="nom_conyugue" type="text" class="form-control"
                            id="nombre_conyugueInput" placeholder="Buscar Nombre Conyugue" style="width: 100%;">
                        <label for="nom_conyugueInput">Nombre Conyugue</label>
                    </div>
                </div>
            </div>

            <!--Busqueda por cedula conyugue-->
            <div class="col-3 col-md-3 col-lg-3 mb-4">
                <div class="input-group">
                    <div class="form-floating flex-grow-0" style="width: 250px;">
                        <input wire:model.live.debounce.300ms="cedula_cony" type="text" class="form-control"
                            id="cedula_conyInput" placeholder="Buscar por C.I. conyugue" style="width: 100%;">
                        <label for="cedula_conyInput">Ingrese el C.I. conyugue</label>
                    </div>
                </div>
            </div>

        </div>

        <div class="row g-3">
            <!--Busqueda por codigo beneficiario-->
            <div class="col-3 col-md-3 col-lg-3 mb-4">
                <div class="input-group">
                    <div class="form-floating flex-grow-0" style="width: 250px;">
                        <input wire:model.live.debounce.300ms="benefi_cod" type="text" class="form-control"
                            id="benefi_codInput" placeholder="Buscar por codigo beneficiario" style="width: 100%;">
                        <label for="benefi_codInput">Ingrese el codigo beneficiario</label>
                    </div>
                </div>
            </div>


            <!--Busqueda por fecha nacimiento-->
            <div class="col-3 col-md-3 col-lg-3 mb-4">
                <div class="input-group">
                    <div class="form-floating flex-grow-0" style="width: 250px;">
                        <input wire:model.live.debounce.300ms="fecha_na" type="date" class="form-control"
                            id="fecha_naInput" placeholder="Buscar por fecha de nacimiento" style="width: 100%;">
                        <label for="fecha_naInput">Ingrese la fecha de nacimiento</label>
                    </div>
                </div>
            </div>

            <!--Busqueda por manzano-->
            <div class="col-3 col-md-3 col-lg-3 mb-4">
                <div class="input-group">
                    <div class="form-floating flex-grow-0" style="width: 250px;">
                        <input wire:model.live.debounce.300ms="manzano" type="text" class="form-control"
                            id="manzanoInput" placeholder="Buscar por manzano" style="width: 100%;">
                        <label for="manzanoInput">Ingrese el manzano</label>
                    </div>
                </div>
            </div>

            <!--Busqueda por lote-->
            <div class="col-3 col-md-3 col-lg-3 mb-4">
                <div class="input-group">
                    <div class="form-floating flex-grow-0" style="width: 250px;">
                        <input wire:model.live.debounce.300ms="lote" type="text" class="form-control" id="loteInput"
                            placeholder="Buscar por lote" style="width: 100%;">
                        <label for="loteInput">Ingrese el lote</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3">
        <!--Busqueda por unidad habitacional-->
            <div class="col-3 col-md-3 col-lg-3 mb-4">
                <div class="input-group">
                    <div class="form-floating flex-grow-0" style="width: 250px;">
                        <input wire:model.live.debounce.300ms="unidad_habitacional" type="text" class="form-control"
                        id="unidad_habitacionalInput" placeholder="Buscar por unidad habitacional"
                        style="width: 100%;">
                        <label for="unidad_habitacionalInput">Ingrese la unidad habitacional</label>
                    </div>
                </div>
            </div>

        <!--Busqueda por departamento-->
            <div class="col-3 col-md-3 col-lg-3 mb-4">
                <div class="form-group">
                    <label for="departamento">Buscar por Departamento:</label>
                    <select wire:model="departamento" id="departamento" class="form-control">
                        <option value="">-- Seleccione un Departamento --</option>
                        <option value="CHUQUISACA">CHUQUISACA</option>
                        <option value="LA PAZ">LA PAZ</option>
                        <option value="COCHABAMBA">COCHABAMBA</option>
                        <option value="ORURO">ORURO</option>
                        <option value="POTOSÍ">POTOSÍ</option>
                        <option value="TARIJA">TARIJA</option>
                        <option value="SANTA CRUZ">SANTA CRUZ</option>
                        <option value="BENI">BENI</option>
                        <option value="PANDO">PANDO</option>
                    </select>
                </div>
            </div>
        <!--Busqueda por proyecto-->
            <div class="col-3 col-md-3 col-lg-3">
                <div class="form-group">
                  <label for="proyecto" class="form-label">Proyecto:</label>
                  <select class="form-input" id="proyecto" name="proyecto">
                    <option value="1">CONSTRUCCION DE 72 VIVIENDAS TIPO PROYECTO "EL PORVENIR"</option>
                    <option value="1">URBANIZACION "SANTA ISABEL"</option>
                    <option value="1">CONSTRUCCION DE 72 VIVIENDAS DE VIVIENDA SOCIAL Y SOLIDARIA DEL SUBPROGRAMA 3</option>
                    <option value="1">CONTRUCCIÓN DE VIVIENDAS EN SECTORES DISPERSOS</option>
                    <option value="2">URBANIZACION SENOR DE MAYO - 7UH</option>
                    <option value="2">URBANIZACION SENOR DE MAYO - 1UH</option>
                    <option value="2">CUMPLIMIENTO DE CONTRATO DE LA CONSTRUCCION DE VIVIENDAS SOLIDARIAS DE LA URBANIZACION AMACHUMA</option>
                    <option value="2">PROYECTO DE LA CIUDAD DE EL ALTO DE LA URBANIZACION TADEO</option>
                    <option value="2">URBANIZACION CHARAPAQUI I</option>
                    <option value="2">CONSTRUCCION "URBANIZACION SAN CARLOS"  - 25UH</option>
                    <option value="2">CONSTRUCCION "URBANIZACION SAN CARLOS"  - 2UH</option>
                    <option value="2">PURA PURA</option>
                    <option value="2">CONSTRUCCION DE VIVIENDAS SOLIDARIAS URBANIZACION MERCEDARIO</option>
                    <option value="2">URBANIZACIÓN "JARDIN" - 39UH</option>
                    <option value="2">URBANIZACIÓN "JARDIN" -9UH</option>
                    <option value="2">TECHOS BOLIVIANOS</option>
                    <option value="2">CONSTRUCCIÓN DE 90 VIVIENDAS PROYECTO EL SALVADOR CIUDAD DE EL ALTO</option>
                    <option value="2">URBANIZACIÓN RETAMAS III MARIA CAMA ANCALLE</option>
                    <option value="2">URBANIZACIÓN RETAMAS III - 10UH</option>
                    <option value="2">URBANIZACIÓN RETAMAS III - 12UH</option>
                    <option value="2">URBANIZACIÓN SAN ISIDRO</option>
                    <option value="2">URBANIZACIÓN TILATA - SECTOR "B" - 3UH</option>
                    <option value="2">URBANIZACIÓN TILATA - SECTOR "B" - 1UH</option>
                    <option value="2">CONSTRUCCIÓN PROYECTO URBANIZACIÓN CRISTAL (625 VIVIENDAS)</option>
                    <option value="2">COMPRA DE VIVIENDAS Y TERRENOS URBANIZACIÓN "VILLA MERCEDES" EL ALTO LA PAZ</option>
                    <option value="2">URBANIZACIÓN VILLA MERCEDES - SECTOR "E"</option>
                    <option value="2">COMPRA DE VIVIENDA "ALTO LIMA TERCERA SECCION"</option>
                    <option value="2">COMPRA DE VIVIENDA "RETAMAS III"</option>
                    <option value="2">COMPRA DE VIVIENDA ZONA 6 DE JUNIO</option>
                    <option value="2">HUGO CHAVEZ FRIAS</option>
                    <option value="2">COMPRA DE VIVIENDA "CIUDAD SATELITE"</option>
                    <option value="2">COMPRA DE VIVIENDA "URBANIZACION VILLA MERCEDES"</option>
                    <option value="2">COMPRA DE VIVIENDA ALTO SAN PEDRO</option>
                    <option value="2">COMPRA DE VIVIENDA "COSMOS 79"</option>
                    <option value="2">COMPRA DE VIVIENDA ZONA NORTE</option>
                    <option value="2">COMPRA DE VIVIENDA "23 DE MARZO RIO SECO" (FAVIA MAMANI)</option>
                    <option value="2">COMPRA DE VIVIENDA URBANIZACIÓN "BELLA VISTA" ELVIS CRUZ</option>
                    <option value="2">COMPRA DE VIVIENDA ZONA SANTIAGO DE LACAYA - EDGAR SIÑANI </option>
                    <option value="2">COMPRA DE VIVIENDA "NUEVA JERUSALEM"</option>
                    <option value="2">COMPRA DE VIVIENDA URBANIZACIÓN "CALUYO" NESTOR DIORI MAMANI</option>
                    <option value="2">URBANIZACIÓN "SAN FELIPE DE SEQUE" FERNANDO LLANQUE</option>
                    <option value="2">SAN FELIPE DE SEQUE SR. EDGAR FLORES CONDORINA</option>
                    <option value="2">COMPRA DE VIVIENDA "ALPACOMA BAJO" CEFERINO TORREZ</option>
                    <option value="2">URBANIZACIÓN "SAN PABLO"</option>
                    <option value="2">URB. MCAL. SANTA CRUZ</option>
                    <option value="2">URBANIZACIÓN COSMOS 79 VICTOR HUGO TOCORARI</option>
                    <option value="2">URBANIZACIÓN SANTIAGO II - MOISES QUIROZ</option>
                    <option value="2">DANIEL C. QUISPE SULLCANI</option>
                    <option value="2">JUANA AZURDUY / RAQUEL ILARI VELASCO</option>
                    <option value="2">URBANIZACIÓN EN EL VERGEL CONTRUCCION DE 250 VIVIENDAS</option>
                    <option value="2">URBANIZACIÓN JARDIN - 34UH</option>
                    <option value="2">URBANIZACIÓN JARDIN - 13UH</option>
                    <option value="2">SEÑOR DE MAYO - 5UH</option>
                    <option value="2">COMPRA DE UNA VIVIENDA ALTO TACAGUA "HADAAN AYLLON SEGALES"</option>
                    <option value="2">SEÑOR DE MAYO - 4UH</option>
                    <option value="2">COMPRA VIVIENDA "URBANIZACIÓN LOZA"</option>
                    <option value="2">COMPRA DE 1 VIVIENDA "URBANIZACIÓN RIO SECO" (S2), LA PAZ MURILLO, EL ALTO, RIO SECO.</option>
                    <option value="2">CONSTRUCCIÓN 31 VIVIENDAS URBANIZACIÓN SEÑOR DE MAYO (PRIMAVERA)</option>
                    <option value="2">COMPRA DE UNA VIVIENDA "URBANIZACION COSMOS 79" SP2 LA PAZ MURILLO, EL ALTO, COSMOS 79</option>
                    <option value="2">CONSTRUCCIÓN DE 18 VIVIENDAS - SEÑOR DE MAYO I MARQUIVIRI</option>
                    <option value="2">COMPRA DE 23 (VEINTITRES) VIVIENDAS, URBANIZACIÓN SEÑOR DE MAYO, EL ALTO, LA PAZ.</option>
                    <option value="2">COMPRA INDIVIDUAL URBANIZACIÓN GERMAN BUSCH 1-1-2 EL ALTO</option>
                    <option value="2">CONTRUCCION 179 VIVIENDAS "URBANIZACIÓN INTI RAYMI"</option>
                    <option value="2">COMPRA DE CINCO VIVIENDAS "URBANIZACIÓN SEÑOR DE MAYO"</option>
                    <option value="2">COMPRA DE 12 VIVIENDAS (S3) "URBANIZACIÓN TILATA II" MUNICIPIO VIACHA, EL ALTO</option>
                    <option value="2">CONSTRUCCIÓN DE 168 VIVIENDAS (S2), DENTRO DEL PROGRAMA DE VIVIENDA SOCIAL Y SOLIDARIA (PVS) PROYECTO "VIVIENDA SOCIAL BOLIVIA CAMBIA C.O.R. EL ALTO"</option>
                    <option value="2">COMPRA DE 1 VIVIENDA "URBANIZACIÓN VILLA EXALTACIÓN" (S4), LA PAZ, MURILLO, EL ALTO, VILLA EXALTACIÓN</option>
                    <option value="2">COMPRA DE VIVIENDA URBANIZACIÓN MARISCAL SANTA CRUZ</option>
                    <option value="2">CONSTRUCCIÓN DE 45 VIVIENDAS URBANIZACIÓN SEÑOR DE MAYO</option>
                    <option value="2">CONSTRUCCIÓN DE 17 VIVIENDAS "UBANIZACION SAN LUIS II" (S2), MURILLO, EL ALTO, LA PAZ</option>
                    <option value="2">CONSTRUCCIÓN DE 209 VIVIENDAS "URBANIZACIÓN SAN LUIS II"</option>
                    <option value="2">CONSTRUCCIÓN DE 48 VIVIENDAS URBANIZACIÓN MARISCAL SANTA CRUZ I</option>
                    <option value="2">CONSTRUCCIÓN DE 48 VIVIENDAS URBANIZACIÓN MARISCAL SANTA CRUZ II</option>
                    <option value="2">"BOLIVARIANO PRESIDENTE EVO MORALES AYMA" CONSTRUCCIÓN 200 VIVIENDAS</option>
                    <option value="2">COMPRA DE 8 VIVIENDAS "URBANIZACIÓN JARDIN"</option>
                    <option value="2">COMPRA DE 52 VIVIENDAS "URBANIZACIÓN PALERMO Y JARDIN"</option>
                    <option value="2">COMPRA DE 23 VIVIENDAS "URBANIZACIÓN VIRGEN DEL SOCAVON" 23 UH</option>
                    <option value="2">URBANIZACIÓN RETAMAS III 27 U.H. Y URBANIZACIÓN EL CARMEN 1 U.H.</option>
                    <option value="3">CONSTRUCCIÓN 18 VIVIENDAS URBANIZACIÓN LAS PALMAS SENDA III - PVS - SP3</option>
                    <option value="3">PROYECTO VALLE ENCANTADO - LOMA LINDA</option>
                    <option value="3">COMPRA DE 60 VIVIENDAS - CONDOMINIO SANTA ROSA CBBA</option>
                    <option value="3">CONSTRUCCIÓN DE VIVIENDA INDIVIDUAL S4 - SR. JHONNY VARGAS Z. - EX FUNDO ORCOKALLPA</option>
                    <option value="3">CONSTRUCCIÓN DE VIVIENDA INDIVIDUAL S3 - SR. DAMIAN MAMANI S. - SUMUMPAYA SUD</option>
                    <option value="4">URB. PORVENIR</option>
                    <option value="4">PEDRO FERRARI SP3</option>
                    <option value="4">HUAJARA II SP3</option>
                    <option value="4">HUAJARA II SP4</option>
                    <option value="4">CONSTRUCCIÓN DE VIVIENDAS MILENIUM 332 UH - S3, MUNICIPIO DE ORURO</option>
                    <option value="4">URBANIZACIÓN 2000 - MINEROS HUANUNI</option>
                    <option value="4">CONSTRUCCIÓN 56 VIVIENDAS "ALTO CARACOLLO" (S2),CARACOLLO,CERCADO,ORURO</option>
                    <option value="5">HABITACIONAL PUCKAPAMPA - CONSTRUCCIÓN DE 9 VIVIENDAS SP 3 TUPIZA, POTOSI</option>
                    <option value="6">CONSTRUCCIÓN DE 589 VIVIENDAS SOCIALES P.V.S EN LA CIUDAD DE YACUIBA - GRAN CHACO - BELLA VISTA I</option>
                    <option value="6">CONSTRUCCION DE 589 VIVIENDAS SOCIALES P.V.S EN LA CIUDAD DE YACUIBA - GRAN CHACO - BELLA VISTA II</option>
                    <option value="6">CONSTRUCCIÓN DE 589 VIVIENDAS SOCIALES P.V.S EN LA CIUDAD DE YACUIBA - GRAN CHACO - CAMPO GRANDE VALENTINA</option>
                    <option value="6">CONSTRUCCIÓN 400 VIVIENDAS URBANIZACIÓN EL PORVENIR (S2) TARIJA, ARCE, BERMEJO, CERCADO</option>
                    <option value="6">CONSTRUCCION 125 VIVIENDAS ASOCIACION DE PERIODISTAS Y COMUNICADORES DE YACUIBA (S2) TARIJA, YACUIBA</option>
                    <option value="7">EL VALLECITO I</option>
                    <option value="7">"EL VALLECITOS II"</option>
                    <option value="7">"EL VALLECITOS III"</option>
                    <option value="7">TODOS SANTOS</option>
                    <option value="7">VILLA FATIMA CONCEPCION</option>
                    <option value="7">URBANIZACION RESIDENCIAS DEL SUR</option>
                    <option value="7">CONSTRUCCION DE VIVIENDAS SOLIDARIAS PARA FAMILIAS POBRES EN EL AREA METROPOLITANA DE SANTA CRUZ "EL TERRADO I "</option>
                    <option value="7">CONSTRUCCION DE VIVIENDAS SOLIDARIAS PARA FAMILIAS POBRES EN EL AREA METROPOLITANA DE SANTA CRUZ "EL TERRADO II"</option>
                    <option value="7">CONSTRUCCION DE 97 VIVIENDAS PARA FAMILIAS POBRES EN EL AREA METROPOLITANA DE SANTA CRUZ DE LA SIERRA "EL PIYO"</option>
                    <option value="7">CONSTRUCCION DE 203 VIVIENDAS SOLIDARIAS PARA FAMILIAS POBRES EN EL AREA METROPOLINA DE SANTA CRUZ DE LA SIERRA "EL PIYO"</option>
                    <option value="7">URBANIZACION PALMA REAL</option>
                    <option value="7">CONSTRUCCION DE 153 VIVIENDAS URBANIZACION VILLA EL JIPA 1 SUB PROGRAMA S2, S3, S4 DEPARTAMENTO SANTA CRUZ MUNICIPIO WARNES - 28UH</option>
                    <option value="7">CONSTRUCCION DE 153 VIVIENDAS URBANIZACION VILLA EL JIPA 1 SUB PROGRAMA S2, S3, S4 DEPARTAMENTO SANTA CRUZ MUNICIPIO WARNES - 118UH</option>
                    <option value="7">CONSTRUCCION DE 153 VIVIENDAS URBANIZACION VILLA EL JIPA 1 SUB PROGRAMA S2, S3, S4 DEPARTAMENTO SANTA CRUZ MUNICIPIO WARNES - 7UH</option>
                    <option value="7">CONSTRUCCION DE 165 VIVIENDAS PROY. "LOS PIYOS MADRE INDIA"</option>
                    <option value="7">URBANIZACION LAS BRISAS</option>
                    <option value="7">URBANIZACION LA SOLANA</option>
                    <option value="7">PROYECTO SEVERINO MENESES</option>
                    <option value="7">CONTRUCCION DE VIVIENDAS PROYECTO "SAN JULIAN" - 32UH</option>
                    <option value="7">CONTRUCCION DE VIVIENDAS PROYECTO "SAN JULIAN" - 34UH</option>
                    <option value="7">TRABAJADORES DE LA PRENSA - 48UH</option>
                    <option value="7">TRABAJADORES DE LA PRENSA - 50UH</option>
                    <option value="7">URBANIZACION SANTISIMA TRINIDAD - 7UH</option>
                    <option value="7">URBANIZACION SANTISIMA TRINIDAD - 11UH</option>
                    <option value="7">URBANIZACION SANTISIMA TRINIDAD - 18UH</option>
                    <option value="7">URBANIZACION SANTISIMA TRINIDAD - 76UH</option>
                    <option value="7">INTEGRACION DE LAS AMERICAS</option>
                    <option value="7">VALLE AKUALAND 21 U.H.</option>
                    <option value="7">CONSTRUCCION DE 89 VIVIENDAS PROY. "AKUALAND KM.16 CARRT.AL NORTE"</option>
                    <option value="7">CONSTRUCCION DE 75 VIVIENDAS PROY. "EL DORADO"</option>
                    <option value="7">"CONSTRUCCION DE 116 VIVIENDAS URBANIZACION VALLE AKUALAND"</option>
                    <option value="7">CONSTRUCCION DE 38 VIVIENDAS EN URB "EL DORADO" CARRETERA SANTA CRUZ - COTOCA</option>
                    <option value="7">PATUJU PLAN 3000 DEL SUBPROGRAMA 2</option>
                    <option value="7">CONSTRUCCION DE 427 VIVIENDAS URB. "PATUJU" DEPTO SANTA CRUZ</option>
                    <option value="7">URBANIZACION PAITITI</option>
                    <option value="7">CONSTRUCCION DE 100 VIVIENDAS "TURERE" </option>
                    <option value="7">CONSTRUCCION DE 220 VIVIENDAS, URBANIZACION 16 DE NOVIEMBRE. CONFEDERACION NACIONAL DE CHOFERES</option>
                    <option value="7">CONSTRUCCION DE 132 VIVIENDAS URBANIZACION EL PARAISO "S2"</option>
                    <option value="7">CONSTRUCCION DE 360 VIVIENDAS URBANIZACION MAPAIZO</option>
                    <option value="7">CONSTRUCCION DE 300 VIVIENDA LA PASCANA</option>
                    <option value="7">CONSTRUCCION DE 261 VIVIENDAS EN LA URBANIZACION EL CARMEN DENOMINADO DIONICIO MORALES CHOQUE (S2)</option>
                    <option value="8">CONSTRUCCION 141 VIVIENDAS EN LA URBANIZACION LAS PALMAS</option>
                    <option value="8">URBANIZACION "LAS PALMAS" CONSTRUCCION DE 301 VIVIENDAS</option>
                    <option value="8">CONSTRUCCION DE 84 VIVIENDAS URB. LOS TAJIBOS SAN BORJA</option>
                    <option value="8">CONSTRUCCION DE 37 VIVIENDAS EN LA URB. LOS TAJIBOS SAN BORJA</option>
                    <option value="8">CONSTRUCCION DE 205 VIVIENDAS EN RIBERALTA-BENI-VILLA NORITA PLAN VIVIENDA SOCIAL</option>
                    <option value="8">CONSTRUCCION DE 104 VIVIENDAS "URB. DIONISIO MORALES" RIBERALTA-BENI</option>
                    <option value="8">CONSTRUCCION DE 176 VIVIENDAS (S2) "NUEVO AMANECER AMAZONICO" PROVINCIA VACA DIEZ, RIBERALTA, BENI</option>
                    <option value="8">CONSTRUCCION DE 148 VIVIENDAS (S2) "NUEVO AMANECER EL TORITO" PROVINCIA VACA DIEZ, RIBERALTA, BENI.</option>
                    <option value="8">CONSTRUCCION DE 185 VIVIENDAS "BUEN DESTINO" BENI, VACA DIEZ, VILLA LITORAL, PANAHUAYA, RIBERALTA</option>
                    <option value="8">CONSTRUCCION 83 VIVIENDAS GRANJA FUNDACION (S2) VACA DIEZ, RIBERALTA, BENI</option>
                    <option value="8">CONSTRUCCION 280 VIVIENDAS URBANIZACION EL TRIUNFO (S2) GUAYARAMERIN, PROVINCIA VACA DIEZ</option>
                    <option value="8">CONSTRUCCION DE 133 UNIDADES HABITACIONALES EN LA URBANIZACION SAN ANTONIO S-2 SAN IGNACIO DE MOXOS</option>
                    <option value="9">URBANIZACION TUNARI</option>
                    <option value="9">CONSTRUCCION DE 445 VIVIENDAS EN LA URB. NUEVA COBIJA II DE LA CIUDAD DE COBIJA</option>

                  </select>
                </div>
              </div>


        </div>

        <button wire:click="buscar" class="btn btn-primary">
            <i class="fas fa-search"></i> Buscar
        </button>

        <!-- Mostrar la paginación -->
        @if ($beneficiarios instanceof \Illuminate\Pagination\LengthAwarePaginator)
            {{ $beneficiarios->links() }}
        @else
            <p>No se encontraron datos paginados.</p>
        @endif


        <div class="table-responsive-sm custom-container">
            <table class="table table-bordered table-striped custom-table w-90">

                <thead class="table-danger">
                    <tr>
                        <th>Beneficiario</th>
                        <th>C.I.</th>
                        <th>Conyugue</th>
                        <th>C.I.Conyugue</th>
                        <!--<th>Beneficiario Cod</th>
                        <th>Fecha Nacimiento</th>-->
                        <th>Departamento</th>
                        <th>Proyecto</th>
                        <th>Unidad Habitacional:</th>
                        <th>Manzano</th>
                        <th>Lote</th>
                        <!--<th>Unidad Vecinal</th>-->
                        <th>Estado Social</th>
                        <th>Folio Real</th>
                        <th>Codigo Prestamo</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($beneficiarios as $beneficiarios)
                        <tr>
                            <td>{{ $beneficiarios->nombres_beneficiario ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->cedula_benef ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->nombres_conyugue ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->cedula_conyugue ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->departamento ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->proyecto ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->unidad_habitacional_id ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->manzano ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->lote ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->unidad_habitacional_id ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->beneficiario_cod ?? 'N/A' }}</td>
                            <td>{{ $beneficiarios->fecha_nacimiento ?? 'N/A' }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>
@section('js')
@endsection
