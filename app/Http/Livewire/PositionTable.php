<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Position;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\Traits\Exportable;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

final class PositionTable extends PowerGridComponent
{
    use ActionButton;

    //Messages informing success/error data is updated.
    public bool $showUpdateMessages = true;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): void
    {
        $this->showCheckBox()
            ->showPerPage()
            ->showSearchInput()
            ->showExportOption('download', ['excel', 'csv']);
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */
    public function datasource(): ?Builder
    {
        return Position::query()
            ->leftJoin('users', function ($users) {
                $users->on('positions.user_id', '=', 'users.id');
            })
            ->select([
                'positions.*',
                'users.name as user_name',
            ]);        ;
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): ?PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('name')
            ->addColumn('alias')
            ->addColumn('user_id')
            ->addColumn('group_id')
            ->addColumn('grade')
            ->addColumn('hierarchy')
            ->addColumn('type')
            ->addColumn('unit')
            ->addColumn('headunit')
            ->addColumn('active');
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        $canEdit = true;
        return [
            Column::add()
                ->title('ID POSITION')
                ->field('id')
                ->sortable()
                ->searchable()
                ->editOnClick($canEdit),

            Column::add()
                ->title('NAMA JABATAN')
                ->field('name')
                ->searchable()
                ->sortable()
                ->editOnClick($canEdit),

            Column::add()
                ->title('ALIAS')
                ->field('alias')
                ->sortable()
                ->searchable()
                ->editOnClick($canEdit),

            Column::add()
                ->title(__('Category'))
                ->field('user_name', 'users.name')
                ->searchable()
                // ->makeInputMultiSelect(User::all(), 'name', 'user_id')
                ->sortable()
                ->editOnClick($canEdit),

            Column::add()
                ->title('NIP')
                ->field('user_id')
                ->sortable()
                ->searchable()
                ->editOnClick($canEdit),

            Column::add()
                ->title('GROUP')
                ->field('group_id')
                ->sortable()
                ->editOnClick($canEdit),

            Column::add()
                ->title('GRADE')
                ->field('grade')
                ->sortable()
                ->searchable()
                ->editOnClick($canEdit),

            Column::add()
                ->title('HIRARKI')
                ->field('hierarchy')
                ->sortable()
                ->searchable()
                ->editOnClick($canEdit),

            Column::add()
                ->title('TIPE USER/GROUP')
                ->field('type')
                ->sortable()
                ->searchable()
                ->editOnClick($canEdit),

            Column::add()
                ->title('UNIT')
                ->field('unit')
                ->sortable()
                ->searchable()
                ->editOnClick($canEdit),

            Column::add()
                ->title('KEPALA UNIT')
                ->field('head_unit')
                ->sortable()
                ->searchable()
                ->editOnClick($canEdit),

            Column::add()
                ->title('AKTIF')
                ->field('active')
                ->sortable()
                ->editOnClick($canEdit),
        ]
;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable this section only when you have defined routes for these actions.
    |
    */

     /**
     * PowerGrid Position action buttons.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Button>
     */


    public function actions(): array
    {
       return [
           Button::add('edit')
               ->caption('Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('mutation', ['position_id' => 'id']),

        //    Button::add('destroy')
        //        ->caption('Delete')
        //        ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
        //        ->route('position.destroy', ['position' => 'id'])
        //        ->method('delete')
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Edit Method
    |--------------------------------------------------------------------------
    | Enable this section to use editOnClick() or toggleable() methods.
    | Data must be validated and treated (see "Update Data" in PowerGrid doc).
    |
    */

     /**
     * PowerGrid Position Update.
     *
     * @param array<string,string> $data
     */


    public function update(array $data ): bool
    {
       try {
           $updated = Position::query()->findOrFail($data['id'])
                ->update([
                    $data['field'] => $data['value'],
                ]);
       } catch (QueryException $exception) {
           $updated = false;
       }
       return $updated;
    }

    public function updateMessages(string $status = 'error', string $field = '_default_message'): string
    {
        $updateMessages = [
            'success'   => [
                '_default_message' => __('Data has been updated successfully!'),
                //'custom_field'   => __('Custom Field updated successfully!'),
            ],
            'error' => [
                '_default_message' => __('Error updating the data.'),
                //'custom_field'   => __('Error updating custom field.'),
            ]
        ];

        $message = ($updateMessages[$status][$field] ?? $updateMessages[$status]['_default_message']);

        return (is_string($message)) ? $message : 'Error!';
    }



}
