<?php

namespace App\Livewire;

use App\Models\Social;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class BeneficiaryTable extends PowerGridComponent
{
    public string $tableName = 'extrasocial';
    public string $primaryKey = 'id_soc';
    public string $sortField = 'id_soc';

    public function setUp(): array
    {
        return [
            PowerGrid::header()
                ->showSearchInput(),

            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Social::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id_soc')
            ->add('departamento')
            ->add('nombre_proyecto')
            ->add('manzano')
            ->add('lote')
            ->add('nombre_titular')
            ->add('ci_titular')
            ->add('nombre_conyugue')
            ->add('ci_conyugue')
            ->add('aplic_ley850_estado_social_fuente')
            ->add('fuente_excepcionalidad')
            ->add('nombre_benef_excepcionalidad')
            ->add('ci_benef_excepcionalidad')
            ->add('estado_social_excepcionalidad')
            ->add('fuente_reasignacion')
            ->add('nombre_benef_reasignacion')
            ->add('ci_benef_reasignacion')
            ->add('estado_social_reasignacion')
            ->add('fuente_sustitucion')
            ->add('nombre_sustitucion')
            ->add('ci_benf_sustitucion')
            ->add('estado_social_sustitucion')
            ->add('nombre_beneficiario_final')
            ->add('ci_beneficiario_final')
            ->add('nom_cony_benef_final')
            ->add('ci_conyu_benef_final')
            ->add('proceso_estado_benef_final')
            ->add('observacion_benef_final')
            ->add('user_id')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id soc', 'id_soc')
                ->sortable(),

            Column::make('Departamento', 'departamento')
                ->sortable()
                ->searchable(),

            Column::make('Nombre proyecto', 'nombre_proyecto')
                ->sortable()
                ->searchable(),

            Column::make('Manzano', 'manzano')
                ->sortable()
                ->searchable(),

            Column::make('Lote', 'lote')
                ->sortable()
                ->searchable(),

            Column::make('Nombre titular', 'nombre_titular')
                ->sortable()
                ->searchable(),

            Column::make('Ci titular', 'ci_titular')
                ->sortable()
                ->searchable(),

            Column::make('Nombre conyugue', 'nombre_conyugue')
                ->sortable()
                ->searchable(),

            Column::make('Ci conyugue', 'ci_conyugue')
                ->sortable()
                ->searchable(),

            Column::make('Aplic ley850 estado social fuente', 'aplic_ley850_estado_social_fuente')
                ->sortable()
                ->searchable(),

            Column::make('Fuente excepcionalidad', 'fuente_excepcionalidad')
                ->sortable()
                ->searchable(),

            Column::make('Nombre benef excepcionalidad', 'nombre_benef_excepcionalidad')
                ->sortable()
                ->searchable(),

            Column::make('Ci benef excepcionalidad', 'ci_benef_excepcionalidad')
                ->sortable()
                ->searchable(),

            Column::make('Estado social excepcionalidad', 'estado_social_excepcionalidad')
                ->sortable()
                ->searchable(),

            Column::make('Fuente reasignacion', 'fuente_reasignacion')
                ->sortable()
                ->searchable(),

            Column::make('Nombre benef reasignacion', 'nombre_benef_reasignacion')
                ->sortable()
                ->searchable(),

            Column::make('Ci benef reasignacion', 'ci_benef_reasignacion')
                ->sortable()
                ->searchable(),

            Column::make('Estado social reasignacion', 'estado_social_reasignacion')
                ->sortable()
                ->searchable(),

            Column::make('Fuente sustitucion', 'fuente_sustitucion')
                ->sortable()
                ->searchable(),

            Column::make('Nombre sustitucion', 'nombre_sustitucion')
                ->sortable()
                ->searchable(),

            Column::make('Ci benf sustitucion', 'ci_benf_sustitucion')
                ->sortable()
                ->searchable(),

            Column::make('Estado social sustitucion', 'estado_social_sustitucion')
                ->sortable()
                ->searchable(),

            Column::make('Nombre beneficiario final', 'nombre_beneficiario_final')
                ->sortable()
                ->searchable(),

            Column::make('Ci beneficiario final', 'ci_beneficiario_final')
                ->sortable()
                ->searchable(),

            Column::make('Nom cony benef final', 'nom_cony_benef_final')
                ->sortable()
                ->searchable(),

            Column::make('Ci conyu benef final', 'ci_conyu_benef_final')
                ->sortable()
                ->searchable(),

            Column::make('Proceso estado benef final', 'proceso_estado_benef_final')
                ->sortable()
                ->searchable(),

            Column::make('Observacion benef final', 'observacion_benef_final')
                ->sortable()
                ->searchable(),

            Column::action('Opciones')
        ];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions($row): array
    {
        return [
            Button::add('show')
            ->slot(__('<svg width="32px" height="32px" viewBox="-3.6 -3.6 31.20 31.20" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#000000" stroke-width="0.00024000000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.048"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M9.29289 1.29289C9.48043 1.10536 9.73478 1 10 1H18C19.6569 1 21 2.34315 21 4V8C21 8.55228 20.5523 9 20 9C19.4477 9 19 8.55228 19 8V4C19 3.44772 18.5523 3 18 3H11V8C11 8.55228 10.5523 9 10 9H5V20C5 20.5523 5.44772 21 6 21H9C9.55228 21 10 21.4477 10 22C10 22.5523 9.55228 23 9 23H6C4.34315 23 3 21.6569 3 20V8C3 7.73478 3.10536 7.48043 3.29289 7.29289L9.29289 1.29289ZM6.41421 7H9V4.41421L6.41421 7ZM18 19C15.2951 19 14 20.6758 14 22C14 22.5523 13.5523 23 13 23C12.4477 23 12 22.5523 12 22C12 20.1742 13.1429 18.5122 14.9952 17.6404C14.3757 16.936 14 16.0119 14 15C14 12.7909 15.7909 11 18 11C20.2091 11 22 12.7909 22 15C22 16.0119 21.6243 16.936 21.0048 17.6404C22.8571 18.5122 24 20.1742 24 22C24 22.5523 23.5523 23 23 23C22.4477 23 22 22.5523 22 22C22 20.6758 20.7049 19 18 19ZM18 17C19.1046 17 20 16.1046 20 15C20 13.8954 19.1046 13 18 13C16.8954 13 16 13.8954 16 15C16 16.1046 16.8954 17 18 17Z" fill="#000000"></path> </g></svg>'))
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
