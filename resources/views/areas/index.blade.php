@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="card">
            <div class="card-header">
                <h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Manzano</th>
                                <th>Lote</th>
                                <th>Unidad Vecinal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $beneficiario->manzano }}</td>
                                <td>{{ $beneficiario->lote }}</td>
                                <td>{{ $beneficiario->unidad_vecinal }}</td>
                            </tr>
                        </tbody>
                    </table>
                </h2>
                <h4>
                    <table class="table table-bordered">

                        <head>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </head>
                        <tbody>
                            <tr>
                                <td>Beneficiario Inicial:</td>
                                <th>{{ $beneficiario->nombre_titular }}</th>
                            </tr>
                            <tr>
                                <td>Beneficiario Final:</td>
                                <th>{{ $beneficiario->nombre_beneficiario_final }}</th>
                            </tr>
                            <tr>
                                <td>Departamento:</td>
                                <td>{{ $beneficiario->departamento }}</td>
                            </tr>
                            <tr>
                                <td>Proyecto:</td>
                                <td>{{ $beneficiario->nombre_proyecto }}</td>
                            </tr>
                        </tbody>
                    </table>
                </h4>
                </p>
            </div>

            {{-- PREVIEW --}}

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="card" id="card-social">
                            <div class="card-header">
                                <span>
                                    <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-51.2 -51.2 614.40 614.40"
                                        xml:space="preserve" width="32px" height="32px" fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <style type="text/css">
                                                .st0 {
                                                    fill: #000000;
                                                }
                                            </style>
                                            <g>
                                                <path class="st0"
                                                    d="M47.294,422.846c-10.908-10.924-17.615-25.87-17.633-42.462v-61.795H0v61.795 c0.017,49.545,40.23,89.739,89.765,89.774h40.532v-29.67H89.765C73.164,440.48,58.236,433.771,47.294,422.846z">
                                                </path>
                                                <path class="st0"
                                                    d="M85.931,235.914c21.636,0,39.144-17.508,39.144-39.154c0-21.609-17.507-39.153-39.144-39.153 c-21.619,0-39.154,17.544-39.154,39.153C46.777,218.406,64.312,235.914,85.931,235.914z">
                                                </path>
                                                <path class="st0"
                                                    d="M179.165,369.308h-54.927v-81.758c0-21.165-17.134-38.318-38.308-38.318 c-21.147,0-38.299,17.152-38.299,38.318v93.146c0,21.155,17.143,38.308,38.299,38.308c2.873,0,70.024-0.195,70.024-0.195 l3.674,56.688c0.258,11.61,9.884,20.818,21.494,20.568c11.628-0.258,20.826-9.884,20.56-21.494l2.233-80.512 C203.915,380.375,192.839,369.308,179.165,369.308z">
                                                </path>
                                                <path class="st0"
                                                    d="M482.339,318.589v61.795c-0.017,16.592-6.725,31.538-17.632,42.462 c-10.943,10.925-25.871,17.634-42.462,17.642h-40.541v29.67h40.541c49.526-0.036,89.73-40.23,89.756-89.774v-61.795H482.339z">
                                                </path>
                                                <path class="st0"
                                                    d="M426.069,235.914c21.618,0,39.153-17.508,39.153-39.154c0-21.609-17.535-39.153-39.153-39.153 c-21.636,0-39.145,17.544-39.145,39.153C386.924,218.406,404.433,235.914,426.069,235.914z">
                                                </path>
                                                <path class="st0"
                                                    d="M464.378,380.695v-93.146c0-21.165-17.17-38.318-38.308-38.318c-21.173,0-38.308,17.152-38.308,38.318v81.758 h-54.927c-13.674,0-24.75,11.067-24.75,24.75l2.233,80.512c-0.267,11.61,8.932,21.236,20.56,21.494 c11.61,0.25,21.235-8.959,21.493-20.568l3.675-56.688c0,0,67.151,0.195,70.024,0.195 C447.224,419.003,464.378,401.851,464.378,380.695z">
                                                </path>
                                                <rect x="153.651" y="318.963" class="st0" width="212.384"
                                                    height="36.146"></rect>
                                                <rect x="244.047" y="374.511" class="st0" width="24.714" height="87.497">
                                                </rect>
                                                <path class="st0"
                                                    d="M359.59,159.404c0,7.286-2.353,14.137-6.677,20.294c-4.319,6.165-10.671,11.556-18.464,15.56l-5.686,2.918 l7.376,16.486c-22.37-3.87-43.13-11.148-53.615-15.222l-0.208-0.089l-0.222-0.062c-14.061-4.422-25.048-13.086-30.626-23.335 l-11.85,6.486c7.575,13.753,21.32,24.198,38.028,29.554v0.018c12.976,5.026,40.252,14.581,68.908,17.802l11.712,1.29 l-12.108-27.081c7.109-4.475,13.211-10.026,17.793-16.557c5.743-8.149,9.146-17.792,9.133-28.06 c0.013-12.775-5.266-24.554-13.772-33.77c-8.514-9.252-20.249-16.138-33.713-19.822l-3.555,13.015 c11.254,3.052,20.782,8.781,27.33,15.934C355.956,141.949,359.59,150.339,359.59,159.404z">
                                                </path>
                                                <path class="st0"
                                                    d="M161.724,156.362l-16.228,36.28l11.722-1.299c40.461-4.52,79.209-18.078,97.602-25.204 c17.478-5.596,32.561-15.142,43.419-27.552c10.952-12.49,17.579-28.015,17.571-44.803c0.008-10.978-2.834-21.458-7.865-30.862 c-7.548-14.118-19.968-25.844-35.337-34.046c-15.356-8.211-33.713-12.944-53.428-12.944c-26.258,0.018-50.153,8.389-67.742,22.286 c-8.786,6.948-15.987,15.293-21.031,24.705c-5.022,9.404-7.851,19.884-7.851,30.862c-0.014,14.003,4.626,27.162,12.499,38.38 C141.813,141.753,150.96,149.956,161.724,156.362z M142.316,69.283c6.081-11.406,16.464-21.396,29.799-28.522 c13.318-7.117,29.536-11.352,47.067-11.334c23.372-0.018,44.411,7.508,59.384,19.358c7.477,5.925,13.429,12.891,17.486,20.498 c4.066,7.615,6.268,15.844,6.268,24.5c-0.014,13.194-5.115,25.497-14.225,35.924c-9.097,10.409-22.206,18.825-37.748,23.709 l-0.196,0.063l-0.208,0.088c-15.929,6.175-48.139,17.437-82.368,22.758l11.605-25.934l-5.698-2.918 c-11.498-5.89-20.911-13.87-27.379-23.087c-6.476-9.226-10.053-19.572-10.066-30.604C136.048,85.127,138.238,76.899,142.316,69.283 z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                </span>
                                <span class="fw-bold">Social</span>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody class="text-start">
                                        <tr>
                                            <td>Estado Social:</td>
                                            <td>{{ $beneficiario->estado_social_benef_final }}</td>
                                            <td class="">
                                                @switch($beneficiario->estado_social_benef_final)
                                                    @case('CANCELADO')
                                                        {{-- PASS --}}
                                                        <svg height="64px" width="64px" version="1.1" id="_x32_"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="-51.2 -51.2 614.40 614.40" xml:space="preserve" fill="#000000">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <style type="text/css">
                                                                    .st1 {
                                                                        fill: #54c520;
                                                                    }
                                                                </style>
                                                                <g>
                                                                    <path class="st1"
                                                                        d="M101.723,233.634H0v44.741h101.723c9.87,36.784,43.344,63.904,83.248,63.904h62.31V169.722h-62.31 C145.066,169.722,111.584,196.842,101.723,233.634z">
                                                                    </path>
                                                                    <path class="st1"
                                                                        d="M512,233.634H410.269c-9.862-36.792-43.336-63.912-83.24-63.912H264.72v172.557h62.309 c39.896,0,73.369-27.12,83.24-63.904H512V233.634z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    @break

                                                    @case('NO CUMPLE LA FUNCION SOCIAL')
                                                        {{-- NO PASS --}}
                                                        <svg height="64px" width="64px" version="1.1" id="_x32_"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="-51.2 -51.2 614.40 614.40" xml:space="preserve" fill="#000000">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <style type="text/css">
                                                                    .st0 {
                                                                        fill: #cf1717;
                                                                    }
                                                                </style>
                                                                <g>
                                                                    <path class="st0"
                                                                        d="M153.225,256.568h57.062V98.544h-57.062c-36.544,0-67.206,24.836-76.241,58.53H0v40.973h76.988 C86.027,231.732,116.685,256.568,153.225,256.568z">
                                                                    </path>
                                                                    <path class="st0"
                                                                        d="M512,157.074h-76.991c-9.032-33.694-39.69-58.53-76.234-58.53h-57.062v158.024h57.062 c36.54,0,67.194-24.836,76.23-58.522H512V157.074z">
                                                                    </path>
                                                                    <polygon class="st0"
                                                                        points="151.441,348.564 89.272,348.564 89.272,366.262 89.272,383.962 151.441,383.962 151.441,413.456 218.754,366.262 151.441,319.07 ">
                                                                    </polygon>
                                                                    <polygon class="st0"
                                                                        points="360.555,319.07 293.242,366.262 360.555,413.456 360.555,383.962 422.724,383.962 422.724,366.262 422.724,348.564 360.555,348.564 ">
                                                                    </polygon>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    @break

                                                    @case('PENDIENTE DE REASIGNACION')
                                                        {{-- NO PASS --}}
                                                        <svg height="64px" width="64px" version="1.1" id="_x32_"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="-51.2 -51.2 614.40 614.40" xml:space="preserve" fill="#000000">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <style type="text/css">
                                                                    .st0 {
                                                                        fill: #cf1717;
                                                                    }
                                                                </style>
                                                                <g>
                                                                    <path class="st0"
                                                                        d="M153.225,256.568h57.062V98.544h-57.062c-36.544,0-67.206,24.836-76.241,58.53H0v40.973h76.988 C86.027,231.732,116.685,256.568,153.225,256.568z">
                                                                    </path>
                                                                    <path class="st0"
                                                                        d="M512,157.074h-76.991c-9.032-33.694-39.69-58.53-76.234-58.53h-57.062v158.024h57.062 c36.54,0,67.194-24.836,76.23-58.522H512V157.074z">
                                                                    </path>
                                                                    <polygon class="st0"
                                                                        points="151.441,348.564 89.272,348.564 89.272,366.262 89.272,383.962 151.441,383.962 151.441,413.456 218.754,366.262 151.441,319.07 ">
                                                                    </polygon>
                                                                    <polygon class="st0"
                                                                        points="360.555,319.07 293.242,366.262 360.555,413.456 360.555,383.962 422.724,383.962 422.724,366.262 422.724,348.564 360.555,348.564 ">
                                                                    </polygon>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    @break

                                                    @case('NO APLICA')
                                                        {{-- PASS --}}
                                                        <svg height="64px" width="64px" version="1.1" id="_x32_"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="-51.2 -51.2 614.40 614.40" xml:space="preserve"
                                                            fill="#000000">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <style type="text/css">
                                                                    .st1 {
                                                                        fill: #54c520;
                                                                    }
                                                                </style>
                                                                <g>
                                                                    <path class="st1"
                                                                        d="M101.723,233.634H0v44.741h101.723c9.87,36.784,43.344,63.904,83.248,63.904h62.31V169.722h-62.31 C145.066,169.722,111.584,196.842,101.723,233.634z">
                                                                    </path>
                                                                    <path class="st1"
                                                                        d="M512,233.634H410.269c-9.862-36.792-43.336-63.912-83.24-63.912H264.72v172.557h62.309 c39.896,0,73.369-27.12,83.24-63.904H512V233.634z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    @break

                                                    @case('CUMPLE LA FUNCION SOCIAL')
                                                        {{-- PASS --}}
                                                        <svg height="64px" width="64px" version="1.1" id="_x32_"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="-51.2 -51.2 614.40 614.40" xml:space="preserve"
                                                            fill="#000000">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <style type="text/css">
                                                                    .st1 {
                                                                        fill: #54c520;
                                                                    }
                                                                </style>
                                                                <g>
                                                                    <path class="st1"
                                                                        d="M101.723,233.634H0v44.741h101.723c9.87,36.784,43.344,63.904,83.248,63.904h62.31V169.722h-62.31 C145.066,169.722,111.584,196.842,101.723,233.634z">
                                                                    </path>
                                                                    <path class="st1"
                                                                        d="M512,233.634H410.269c-9.862-36.792-43.336-63.912-83.24-63.912H264.72v172.557h62.309 c39.896,0,73.369-27.12,83.24-63.904H512V233.634z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    @break

                                                    @case('TERRENO SIN CONSTRUCCION')
                                                        {{-- PASS --}}
                                                        <svg height="64px" width="64px" version="1.1" id="_x32_"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="-51.2 -51.2 614.40 614.40" xml:space="preserve"
                                                            fill="#000000">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <style type="text/css">
                                                                    .st1 {
                                                                        fill: #54c520;
                                                                    }
                                                                </style>
                                                                <g>
                                                                    <path class="st1"
                                                                        d="M101.723,233.634H0v44.741h101.723c9.87,36.784,43.344,63.904,83.248,63.904h62.31V169.722h-62.31 C145.066,169.722,111.584,196.842,101.723,233.634z">
                                                                    </path>
                                                                    <path class="st1"
                                                                        d="M512,233.634H410.269c-9.862-36.792-43.336-63.912-83.24-63.912H264.72v172.557h62.309 c39.896,0,73.369-27.12,83.24-63.904H512V233.634z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Proceso Estado:</td>
                                            <td>{{ $beneficiario->proceso_estado_benef_final }}</td>
                                            <td>
                                                @switch($beneficiario->proceso_estado_benef_final)
                                                    @case('EN PROCESO DE REASIGNACION')
                                                        {{-- NO PASS --}}
                                                        <svg height="64px" width="64px" version="1.1" id="_x32_"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="-51.2 -51.2 614.40 614.40" xml:space="preserve"
                                                            fill="#000000">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <style type="text/css">
                                                                    .st0 {
                                                                        fill: #cf1717;
                                                                    }
                                                                </style>
                                                                <g>
                                                                    <path class="st0"
                                                                        d="M153.225,256.568h57.062V98.544h-57.062c-36.544,0-67.206,24.836-76.241,58.53H0v40.973h76.988 C86.027,231.732,116.685,256.568,153.225,256.568z">
                                                                    </path>
                                                                    <path class="st0"
                                                                        d="M512,157.074h-76.991c-9.032-33.694-39.69-58.53-76.234-58.53h-57.062v158.024h57.062 c36.54,0,67.194-24.836,76.23-58.522H512V157.074z">
                                                                    </path>
                                                                    <polygon class="st0"
                                                                        points="151.441,348.564 89.272,348.564 89.272,366.262 89.272,383.962 151.441,383.962 151.441,413.456 218.754,366.262 151.441,319.07 ">
                                                                    </polygon>
                                                                    <polygon class="st0"
                                                                        points="360.555,319.07 293.242,366.262 360.555,413.456 360.555,383.962 422.724,383.962 422.724,366.262 422.724,348.564 360.555,348.564 ">
                                                                    </polygon>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    @break

                                                    @case('EXCEPCIONALIDAD')
                                                        {{-- PASS --}}
                                                        <svg height="64px" width="64px" version="1.1" id="_x32_"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="-51.2 -51.2 614.40 614.40" xml:space="preserve"
                                                            fill="#000000">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <style type="text/css">
                                                                    .st1 {
                                                                        fill: #54c520;
                                                                    }
                                                                </style>
                                                                <g>
                                                                    <path class="st1"
                                                                        d="M101.723,233.634H0v44.741h101.723c9.87,36.784,43.344,63.904,83.248,63.904h62.31V169.722h-62.31 C145.066,169.722,111.584,196.842,101.723,233.634z">
                                                                    </path>
                                                                    <path class="st1"
                                                                        d="M512,233.634H410.269c-9.862-36.792-43.336-63.912-83.24-63.912H264.72v172.557h62.309 c39.896,0,73.369-27.12,83.24-63.904H512V233.634z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    @break

                                                    @case('BENEFICIARIO INICIAL')
                                                        {{-- PASS --}}
                                                        <svg height="64px" width="64px" version="1.1" id="_x32_"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="-51.2 -51.2 614.40 614.40" xml:space="preserve"
                                                            fill="#000000">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <style type="text/css">
                                                                    .st1 {
                                                                        fill: #54c520;
                                                                    }
                                                                </style>
                                                                <g>
                                                                    <path class="st1"
                                                                        d="M101.723,233.634H0v44.741h101.723c9.87,36.784,43.344,63.904,83.248,63.904h62.31V169.722h-62.31 C145.066,169.722,111.584,196.842,101.723,233.634z">
                                                                    </path>
                                                                    <path class="st1"
                                                                        d="M512,233.634H410.269c-9.862-36.792-43.336-63.912-83.24-63.912H264.72v172.557h62.309 c39.896,0,73.369-27.12,83.24-63.904H512V233.634z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    @break

                                                    @case('AEVIVIENDA')
                                                        {{-- VIEW --}}
                                                        <svg fill="#eefd26" width="64px" height="64px"
                                                            viewBox="-3.2 -3.2 38.40 38.40" version="1.1"
                                                            xmlns="http://www.w3.org/2000/svg" stroke="#eefd26">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <path
                                                                    d="M30 3.183l-28 0c-1.105 0-2 0.895-2 2v18c0 1.105 0.895 2 2 2h5c0.641 0 1-0.823 1-1v-0c0-0.182-0.34-1.013-1-1.013h-3.78c-0.668 0-1.21-0.542-1.21-1.21v-15.522c0-0.668 0.542-1.21 1.21-1.21l25.571-0.032c0.668 0 1.21 0.542 1.21 1.21v15.553c0 0.668-0.542 1.21-1.21 1.21h-12.599l2.375-2.154c0.292-0.279 0.387-0.732 0.095-1.011l-0.171-0.252c-0.293-0.279-0.765-0.279-1.058 0l-4.054 3.701c-0.006 0.005-0.011 0.007-0.017 0.012l-0.265 0.253c-0.146 0.139-0.219 0.323-0.218 0.507-0.001 0.184 0.072 0.368 0.218 0.509l0.265 0.253c0.005 0.005 0.011 0.006 0.017 0.011l3.992 3.61c0.292 0.279 0.765 0.279 1.058 0l0.171-0.252c0.292-0.279 0.197-0.733-0.095-1.012l-2.41-2.162h13.906c1.105 0 2-0.895 2-2v-18c0-1.104-0.895-2-2-2z">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    @break

                                                    @case('CAMBIO DE TITULAR')
                                                        {{-- VIEW --}}
                                                        <svg fill="#eefd26" width="64px" height="64px"
                                                            viewBox="-3.2 -3.2 38.40 38.40" version="1.1"
                                                            xmlns="http://www.w3.org/2000/svg" stroke="#eefd26">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <path
                                                                    d="M30 3.183l-28 0c-1.105 0-2 0.895-2 2v18c0 1.105 0.895 2 2 2h5c0.641 0 1-0.823 1-1v-0c0-0.182-0.34-1.013-1-1.013h-3.78c-0.668 0-1.21-0.542-1.21-1.21v-15.522c0-0.668 0.542-1.21 1.21-1.21l25.571-0.032c0.668 0 1.21 0.542 1.21 1.21v15.553c0 0.668-0.542 1.21-1.21 1.21h-12.599l2.375-2.154c0.292-0.279 0.387-0.732 0.095-1.011l-0.171-0.252c-0.293-0.279-0.765-0.279-1.058 0l-4.054 3.701c-0.006 0.005-0.011 0.007-0.017 0.012l-0.265 0.253c-0.146 0.139-0.219 0.323-0.218 0.507-0.001 0.184 0.072 0.368 0.218 0.509l0.265 0.253c0.005 0.005 0.011 0.006 0.017 0.011l3.992 3.61c0.292 0.279 0.765 0.279 1.058 0l0.171-0.252c0.292-0.279 0.197-0.733-0.095-1.012l-2.41-2.162h13.906c1.105 0 2-0.895 2-2v-18c0-1.104-0.895-2-2-2z">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    @break

                                                    @case('REASIGNACION')
                                                        {{-- NO PASS --}}
                                                        <svg height="64px" width="64px" version="1.1" id="_x32_"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="-51.2 -51.2 614.40 614.40" xml:space="preserve"
                                                            fill="#000000">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <style type="text/css">
                                                                    .st0 {
                                                                        fill: #cf1717;
                                                                    }
                                                                </style>
                                                                <g>
                                                                    <path class="st0"
                                                                        d="M153.225,256.568h57.062V98.544h-57.062c-36.544,0-67.206,24.836-76.241,58.53H0v40.973h76.988 C86.027,231.732,116.685,256.568,153.225,256.568z">
                                                                    </path>
                                                                    <path class="st0"
                                                                        d="M512,157.074h-76.991c-9.032-33.694-39.69-58.53-76.234-58.53h-57.062v158.024h57.062 c36.54,0,67.194-24.836,76.23-58.522H512V157.074z">
                                                                    </path>
                                                                    <polygon class="st0"
                                                                        points="151.441,348.564 89.272,348.564 89.272,366.262 89.272,383.962 151.441,383.962 151.441,413.456 218.754,366.262 151.441,319.07 ">
                                                                    </polygon>
                                                                    <polygon class="st0"
                                                                        points="360.555,319.07 293.242,366.262 360.555,413.456 360.555,383.962 422.724,383.962 422.724,366.262 422.724,348.564 360.555,348.564 ">
                                                                    </polygon>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    @break

                                                    @case('PENDIENTE DE REASIGNACION')
                                                        {{-- VIEW --}}
                                                        <svg fill="#eefd26" width="64px" height="64px"
                                                            viewBox="-3.2 -3.2 38.40 38.40" version="1.1"
                                                            xmlns="http://www.w3.org/2000/svg" stroke="#eefd26">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <path
                                                                    d="M30 3.183l-28 0c-1.105 0-2 0.895-2 2v18c0 1.105 0.895 2 2 2h5c0.641 0 1-0.823 1-1v-0c0-0.182-0.34-1.013-1-1.013h-3.78c-0.668 0-1.21-0.542-1.21-1.21v-15.522c0-0.668 0.542-1.21 1.21-1.21l25.571-0.032c0.668 0 1.21 0.542 1.21 1.21v15.553c0 0.668-0.542 1.21-1.21 1.21h-12.599l2.375-2.154c0.292-0.279 0.387-0.732 0.095-1.011l-0.171-0.252c-0.293-0.279-0.765-0.279-1.058 0l-4.054 3.701c-0.006 0.005-0.011 0.007-0.017 0.012l-0.265 0.253c-0.146 0.139-0.219 0.323-0.218 0.507-0.001 0.184 0.072 0.368 0.218 0.509l0.265 0.253c0.005 0.005 0.011 0.006 0.017 0.011l3.992 3.61c0.292 0.279 0.765 0.279 1.058 0l0.171-0.252c0.292-0.279 0.197-0.733-0.095-1.012l-2.41-2.162h13.906c1.105 0 2-0.895 2-2v-18c0-1.104-0.895-2-2-2z">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    @break

                                                    @case('EN PROCESO DE SUSTITUCION')
                                                        {{-- VIEW --}}
                                                        <svg fill="#eefd26" width="64px" height="64px"
                                                            viewBox="-3.2 -3.2 38.40 38.40" version="1.1"
                                                            xmlns="http://www.w3.org/2000/svg" stroke="#eefd26">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <path
                                                                    d="M30 3.183l-28 0c-1.105 0-2 0.895-2 2v18c0 1.105 0.895 2 2 2h5c0.641 0 1-0.823 1-1v-0c0-0.182-0.34-1.013-1-1.013h-3.78c-0.668 0-1.21-0.542-1.21-1.21v-15.522c0-0.668 0.542-1.21 1.21-1.21l25.571-0.032c0.668 0 1.21 0.542 1.21 1.21v15.553c0 0.668-0.542 1.21-1.21 1.21h-12.599l2.375-2.154c0.292-0.279 0.387-0.732 0.095-1.011l-0.171-0.252c-0.293-0.279-0.765-0.279-1.058 0l-4.054 3.701c-0.006 0.005-0.011 0.007-0.017 0.012l-0.265 0.253c-0.146 0.139-0.219 0.323-0.218 0.507-0.001 0.184 0.072 0.368 0.218 0.509l0.265 0.253c0.005 0.005 0.011 0.006 0.017 0.011l3.992 3.61c0.292 0.279 0.765 0.279 1.058 0l0.171-0.252c0.292-0.279 0.197-0.733-0.095-1.012l-2.41-2.162h13.906c1.105 0 2-0.895 2-2v-18c0-1.104-0.895-2-2-2z">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    @break

                                                    @case('BENEFICIARIO SEGUN FOLIO REAL')
                                                        {{-- PASS --}}
                                                        <svg height="64px" width="64px" version="1.1" id="_x32_"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="-51.2 -51.2 614.40 614.40" xml:space="preserve"
                                                            fill="#000000">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <style type="text/css">
                                                                    .st1 {
                                                                        fill: #54c520;
                                                                    }
                                                                </style>
                                                                <g>
                                                                    <path class="st1"
                                                                        d="M101.723,233.634H0v44.741h101.723c9.87,36.784,43.344,63.904,83.248,63.904h62.31V169.722h-62.31 C145.066,169.722,111.584,196.842,101.723,233.634z">
                                                                    </path>
                                                                    <path class="st1"
                                                                        d="M512,233.634H410.269c-9.862-36.792-43.336-63.912-83.24-63.912H264.72v172.557h62.309 c39.896,0,73.369-27.12,83.24-63.904H512V233.634z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    @break

                                                    @case('SUSTITUCION')
                                                        {{-- VIEW --}}
                                                        <svg fill="#eefd26" width="64px" height="64px"
                                                            viewBox="-3.2 -3.2 38.40 38.40" version="1.1"
                                                            xmlns="http://www.w3.org/2000/svg" stroke="#eefd26">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <path
                                                                    d="M30 3.183l-28 0c-1.105 0-2 0.895-2 2v18c0 1.105 0.895 2 2 2h5c0.641 0 1-0.823 1-1v-0c0-0.182-0.34-1.013-1-1.013h-3.78c-0.668 0-1.21-0.542-1.21-1.21v-15.522c0-0.668 0.542-1.21 1.21-1.21l25.571-0.032c0.668 0 1.21 0.542 1.21 1.21v15.553c0 0.668-0.542 1.21-1.21 1.21h-12.599l2.375-2.154c0.292-0.279 0.387-0.732 0.095-1.011l-0.171-0.252c-0.293-0.279-0.765-0.279-1.058 0l-4.054 3.701c-0.006 0.005-0.011 0.007-0.017 0.012l-0.265 0.253c-0.146 0.139-0.219 0.323-0.218 0.507-0.001 0.184 0.072 0.368 0.218 0.509l0.265 0.253c0.005 0.005 0.011 0.006 0.017 0.011l3.992 3.61c0.292 0.279 0.765 0.279 1.058 0l0.171-0.252c0.292-0.279 0.197-0.733-0.095-1.012l-2.41-2.162h13.906c1.105 0 2-0.895 2-2v-18c0-1.104-0.895-2-2-2z">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    @break

                                                    @case('CANCELADO')
                                                        {{-- PASS --}}
                                                        <svg height="64px" width="64px" version="1.1" id="_x32_"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="-51.2 -51.2 614.40 614.40" xml:space="preserve"
                                                            fill="#000000">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <style type="text/css">
                                                                    .st1 {
                                                                        fill: #54c520;
                                                                    }
                                                                </style>
                                                                <g>
                                                                    <path class="st1"
                                                                        d="M101.723,233.634H0v44.741h101.723c9.87,36.784,43.344,63.904,83.248,63.904h62.31V169.722h-62.31 C145.066,169.722,111.584,196.842,101.723,233.634z">
                                                                    </path>
                                                                    <path class="st1"
                                                                        d="M512,233.634H410.269c-9.862-36.792-43.336-63.912-83.24-63.912H264.72v172.557h62.309 c39.896,0,73.369-27.12,83.24-63.904H512V233.634z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    @break

                                                    @case('PENDIENTE DE APLICACION DE LA LEY 850')
                                                        {{-- NO PASS --}}
                                                        <svg height="64px" width="64px" version="1.1" id="_x32_"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="-51.2 -51.2 614.40 614.40" xml:space="preserve"
                                                            fill="#000000">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <style type="text/css">
                                                                    .st0 {
                                                                        fill: #cf1717;
                                                                    }
                                                                </style>
                                                                <g>
                                                                    <path class="st0"
                                                                        d="M153.225,256.568h57.062V98.544h-57.062c-36.544,0-67.206,24.836-76.241,58.53H0v40.973h76.988 C86.027,231.732,116.685,256.568,153.225,256.568z">
                                                                    </path>
                                                                    <path class="st0"
                                                                        d="M512,157.074h-76.991c-9.032-33.694-39.69-58.53-76.234-58.53h-57.062v158.024h57.062 c36.54,0,67.194-24.836,76.23-58.522H512V157.074z">
                                                                    </path>
                                                                    <polygon class="st0"
                                                                        points="151.441,348.564 89.272,348.564 89.272,366.262 89.272,383.962 151.441,383.962 151.441,413.456 218.754,366.262 151.441,319.07 ">
                                                                    </polygon>
                                                                    <polygon class="st0"
                                                                        points="360.555,319.07 293.242,366.262 360.555,413.456 360.555,383.962 422.724,383.962 422.724,366.262 422.724,348.564 360.555,348.564 ">
                                                                    </polygon>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer text-muted">
                                <a target="_blank" class="btn btn-primary"
                                    href="{{ route('socials.edit', $beneficiario->unid_hab_id) }}">
                                    Editar Perfil Social
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" id="card-legal">
                            <div class="card-header">
                                <span>
                                    <svg width="32px" height="32px" viewBox="-1.6 -1.6 19.20 19.20"
                                        xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M14.63 7L13 3h1V2H9V1H8v1H3v1h1L2.38 7H2v1h.15c.156.498.473.93.9 1.23a2.47 2.47 0 0 0 2.9 0A2.44 2.44 0 0 0 6.86 8H7V7h-.45L4.88 3H8v8H6l-.39.18-2 2.51.39.81h9l.39-.81-2-2.51L11 11H9V3h3.13l-1.67 4H10v1h.15a2.48 2.48 0 0 0 4.71 0H15V7h-.37zM5.22 8.51a1.52 1.52 0 0 1-.72.19 1.45 1.45 0 0 1-.71-.19A1.47 1.47 0 0 1 3.25 8h2.5a1.52 1.52 0 0 1-.53.51zM5.47 7h-2l1-2.4 1 2.4zm5.29 5L12 13.5H5L6.24 12h4.52zm1.78-7.38l1 2.4h-2l1-2.4zm.68 3.91a1.41 1.41 0 0 1-.72.19 1.35 1.35 0 0 1-.71-.19 1.55 1.55 0 0 1-.54-.53h2.5a1.37 1.37 0 0 1-.53.53z">
                                            </path>
                                        </g>
                                    </svg>
                                </span>
                                <span class="fw-bold">Legal</span>
                            </div>
                            <div class="card-body">
                                @if ($beneficiario->legal)
                                    <table class="table table-bordered">
                                        <tbody class="text-start">
                                            <tr>
                                                <td>Folio Real:</td>
                                                <td>{{ $beneficiario->legal->nro_folio_real }}</td>
                                            </tr>
                                            <tr>
                                                <td>Titulacion:</td>
                                                <td>{{ $beneficiario->legal->titulacion }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tiene observaciones:</td>
                                                <td>{{ $beneficiario->legal->observaciones1 }}</td>
                                            </tr>
                                            @if ($beneficiario->manzano != $beneficiario->legal->manzano)
                                                <tr>
                                                    <td>Manzano:</td>
                                                    <td>{{ $beneficiario->legal->manzano }}</td>
                                                </tr>
                                            @endif
                                            @if ($beneficiario->lote != $beneficiario->legal->lote)
                                                <tr>
                                                    <td>Lote:</td>
                                                    <td>{{ $beneficiario->legal->lote }}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td>Lote:</td>
                                                <td>{{ $beneficiario->legal->lote }}</td>
                                            </tr>
                                            <tr>
                                                <td>Levantamiento Grav. Dev. Documentos:</td>
                                                <td>{{ $beneficiario->legal->levantam_grav_dev_documentos }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @else
                                    Asuntos legales pendientes.
                                @endif
                            </div>
                            <div class="card-footer text-muted">
                                <a target="_blank" class="btn btn-primary"
                                    href="{{ route('legals.edit', $beneficiario->unid_hab_id) }}">
                                    Editar Perfil Legal
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <span>
                                    <svg width="32px" height="32px" viewBox="-2.4 -2.4 28.80 28.80" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M11.7255 17.1019C11.6265 16.8844 11.4215 16.7257 11.1734 16.6975C10.9633 16.6735 10.7576 16.6285 10.562 16.5636C10.4743 16.5341 10.392 16.5019 10.3158 16.4674L10.4424 16.1223C10.5318 16.1622 10.6239 16.1987 10.7182 16.2317L10.7221 16.2331L10.7261 16.2344C11.0287 16.3344 11.3265 16.3851 11.611 16.3851C11.8967 16.3851 12.1038 16.3468 12.2629 16.2647L12.2724 16.2598L12.2817 16.2544C12.5227 16.1161 12.661 15.8784 12.661 15.6021C12.661 15.2955 12.4956 15.041 12.2071 14.9035C12.062 14.8329 11.8559 14.7655 11.559 14.6917C11.2545 14.6147 10.9987 14.533 10.8003 14.4493C10.6553 14.3837 10.5295 14.279 10.4161 14.1293C10.3185 13.9957 10.2691 13.7948 10.2691 13.5319C10.2691 13.2147 10.3584 12.9529 10.5422 12.7315C10.7058 12.5375 10.9381 12.4057 11.2499 12.3318C11.4812 12.277 11.6616 12.1119 11.7427 11.8987C11.8344 12.1148 12.0295 12.2755 12.2723 12.3142C12.4751 12.3465 12.6613 12.398 12.8287 12.4677L12.7122 12.8059C12.3961 12.679 12.085 12.6149 11.7841 12.6149C10.7848 12.6149 10.7342 13.3043 10.7342 13.4425C10.7342 13.7421 10.896 13.9933 11.1781 14.1318L11.186 14.1357L11.194 14.1393C11.3365 14.2029 11.5387 14.2642 11.8305 14.3322C12.1322 14.4004 12.3838 14.4785 12.5815 14.5651L12.5856 14.5669L12.5897 14.5686C12.7365 14.6297 12.8624 14.7317 12.9746 14.8805L12.9764 14.8828L12.9782 14.8852C13.0763 15.012 13.1261 15.2081 13.1261 15.4681C13.1261 15.7682 13.0392 16.0222 12.8604 16.2447C12.7053 16.4377 12.4888 16.5713 12.1983 16.6531C11.974 16.7163 11.8 16.8878 11.7255 17.1019Z"
                                                fill="#000000"></path>
                                            <path
                                                d="M11.9785 18H11.497C11.3893 18 11.302 17.9105 11.302 17.8V17.3985C11.302 17.2929 11.2219 17.2061 11.1195 17.1944C10.8757 17.1667 10.6399 17.115 10.412 17.0394C10.1906 16.9648 9.99879 16.8764 9.83657 16.7739C9.76202 16.7268 9.7349 16.6312 9.76572 16.5472L10.096 15.6466C10.1405 15.5254 10.284 15.479 10.3945 15.5417C10.5437 15.6262 10.7041 15.6985 10.8755 15.7585C11.131 15.8429 11.3762 15.8851 11.611 15.8851C11.8129 15.8851 11.9572 15.8628 12.0437 15.8181C12.1302 15.7684 12.1735 15.6964 12.1735 15.6021C12.1735 15.4929 12.1158 15.411 12.0004 15.3564C11.8892 15.3018 11.7037 15.2422 11.4442 15.1777C11.1104 15.0933 10.8323 15.0039 10.6098 14.9096C10.3873 14.8103 10.1936 14.6514 10.0288 14.433C9.86396 14.2096 9.78156 13.9092 9.78156 13.5319C9.78156 13.095 9.91136 12.7202 10.1709 12.4074C10.4049 12.13 10.7279 11.9424 11.1401 11.8447C11.2329 11.8227 11.302 11.7401 11.302 11.6425V11.2C11.302 11.0895 11.3893 11 11.497 11H11.9785C12.0862 11 12.1735 11.0895 12.1735 11.2V11.6172C12.1735 11.7194 12.2487 11.8045 12.3471 11.8202C12.7082 11.8777 13.0255 11.9866 13.2989 12.1469C13.3765 12.1924 13.4073 12.2892 13.3775 12.3756L13.0684 13.2725C13.0275 13.3914 12.891 13.4417 12.7812 13.3849C12.433 13.2049 12.1007 13.1149 11.7841 13.1149C11.4091 13.1149 11.2216 13.2241 11.2216 13.4425C11.2216 13.5468 11.2773 13.6262 11.3885 13.6809C11.4998 13.7305 11.6831 13.7851 11.9386 13.8447C12.2682 13.9192 12.5464 14.006 12.773 14.1053C12.9996 14.1996 13.1953 14.356 13.3602 14.5745C13.5291 14.7929 13.6136 15.0908 13.6136 15.4681C13.6136 15.8851 13.4879 16.25 13.2365 16.5628C13.0176 16.8354 12.7145 17.0262 12.3274 17.1353C12.2384 17.1604 12.1735 17.2412 12.1735 17.3358V17.8C12.1735 17.9105 12.0862 18 11.9785 18Z"
                                                fill="#000000"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9.59235 5H13.8141C14.8954 5 14.3016 6.664 13.8638 7.679L13.3656 8.843L13.2983 9C13.7702 8.97651 14.2369 9.11054 14.6282 9.382C16.0921 10.7558 17.2802 12.4098 18.1256 14.251C18.455 14.9318 18.5857 15.6958 18.5019 16.451C18.4013 18.3759 16.8956 19.9098 15.0182 20H8.38823C6.51033 19.9125 5.0024 18.3802 4.89968 16.455C4.81587 15.6998 4.94656 14.9358 5.27603 14.255C6.12242 12.412 7.31216 10.7565 8.77823 9.382C9.1696 9.11054 9.63622 8.97651 10.1081 9L10.0301 8.819L9.54263 7.679C9.1068 6.664 8.5101 5 9.59235 5Z"
                                                stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M13.2983 9.75C13.7125 9.75 14.0483 9.41421 14.0483 9C14.0483 8.58579 13.7125 8.25 13.2983 8.25V9.75ZM10.1081 8.25C9.69391 8.25 9.35812 8.58579 9.35812 9C9.35812 9.41421 9.69391 9.75 10.1081 9.75V8.25ZM15.9776 8.64988C16.3365 8.44312 16.4599 7.98455 16.2531 7.62563C16.0463 7.26671 15.5878 7.14336 15.2289 7.35012L15.9776 8.64988ZM13.3656 8.843L13.5103 9.57891L13.5125 9.57848L13.3656 8.843ZM10.0301 8.819L10.1854 8.08521L10.1786 8.08383L10.0301 8.819ZM8.166 7.34357C7.80346 7.14322 7.34715 7.27469 7.1468 7.63722C6.94644 7.99976 7.07791 8.45607 7.44045 8.65643L8.166 7.34357ZM13.2983 8.25H10.1081V9.75H13.2983V8.25ZM15.2289 7.35012C14.6019 7.71128 13.9233 7.96683 13.2187 8.10752L13.5125 9.57848C14.3778 9.40568 15.2101 9.09203 15.9776 8.64988L15.2289 7.35012ZM13.2209 8.10709C12.2175 8.30441 11.1861 8.29699 10.1854 8.08525L9.87486 9.55275C11.0732 9.80631 12.3086 9.81521 13.5103 9.57891L13.2209 8.10709ZM10.1786 8.08383C9.47587 7.94196 8.79745 7.69255 8.166 7.34357L7.44045 8.65643C8.20526 9.0791 9.02818 9.38184 9.88169 9.55417L10.1786 8.08383Z"
                                                fill="#000000"></path>
                                        </g>
                                    </svg>
                                </span>
                                <span class="fw-bold">Cartera</span>
                            </div>
                            <div class="card-body">
                                @if ($beneficiario->credit)
                                    <table class="table table-bordered">
                                        <tbody class="text-start">
                                            <tr>
                                                <td>EIF</td>
                                                <td>{{ $beneficiario->credit->entidad_financiera }}</td>
                                            </tr>
                                            <tr>
                                                <td>Telefono / Celular</td>
                                                <td>{{ $beneficiario->credit->fono }}</td>
                                            </tr>
                                            <tr>
                                                <td>Estado Cartera:</td>
                                                <td>{{ $beneficiario->credit->estado_cartera }}</td>
                                            </tr>
                                            <tr>
                                                <td>Activado:</td>
                                                <td>Bs. {{ number_format($beneficiario->credit->total_activado, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Restructuracion:</td>
                                                <td>
                                                    @if ($beneficiario->credit->fecha_restructuracion != null)
                                                        {{ $beneficiario->credit->fecha_restructuracion }}
                                                    @else
                                                        {{ $beneficiario->credit->reestructurados }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Saldo:</td>
                                                <td>{{ number_format($beneficiario->credit->saldo_a_fecha, 2) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @else
                                    <span>ACTIVACION PENDIENTE</span>
                                @endif
                            </div>
                            <div class="card-footer text-muted">
                                <a target="_blank" class="btn btn-primary"
                                    href="{{ route('credits.edit', $beneficiario->unid_hab_id) }}">
                                    Editar Perfil Crediticio
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <button button type="button" onclick="window.open('', '_self', ''); window.close();"
                    class="btn btn-secondary">Cancelar</button>
            </div>
        </div>
    </div>
@endsection
