<?php

namespace App\Http\Livewire;

use App\Models\UserAddress;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

final class UserAddressTable extends PowerGridComponent
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
        return UserAddress::query()
        ->join('employees','user_addresses.nip','employees.user_id')
        ->select('user_addresses.*','employees.name');
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
            ->addColumn('nip')
            ->addColumn('name')
            ->addColumn('address')
            ->addColumn('provinces')
            ->addColumn('regencies')
            ->addColumn('districts')
            ->addColumn('villages')
            ->addColumn('phone')
            ->addColumn('approved')
            ->addColumn('created_at_formatted', function(UserAddress $model) {
                return Carbon::parse($model->created_at)->format('d/m/Y H:i:s');
            })
            ->addColumn('updated_at_formatted', function(UserAddress $model) {
                return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            });
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
        return [
            Column::add()
                ->title('ID')
                ->field('id')
                ->makeInputRange(),

            Column::add()
                ->title('NIP')
                ->field('nip')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('NAMA')
                ->field('name')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('ADDRESS')
                ->field('address')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title('PROVINCES')
                ->field('provinces')
                ->makeInputRange(),

            Column::add()
                ->title('REGENCIES')
                ->field('regencies')
                ->makeInputRange(),

            Column::add()
                ->title('DISTRICTS')
                ->field('districts')
                ->makeInputRange(),

            Column::add()
                ->title('VILLAGES')
                ->field('villages')
                ->makeInputRange(),

            Column::add()
                ->title('PHONE')
                ->field('phone')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('APPROVED')
                ->field('approved')
                ->toggleable(),
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
     * PowerGrid UserAddress action buttons.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::add('edit')
               ->caption('Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('user-address.edit', ['user-address' => 'id']),

           Button::add('destroy')
               ->caption('Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('user-address.destroy', ['user-address' => 'id'])
               ->method('delete')
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Edit Method
    |--------------------------------------------------------------------------
    | Enable this section to use editOnClick() or toggleable() methods.
    | Data must be validated and treated (see "Update Data" in PowerGrid doc).
    |
    */

     /**
     * PowerGrid UserAddress Update.
     *
     * @param array<string,string> $data
     */

    /*
    public function update(array $data ): bool
    {
       try {
           $updated = UserAddress::query()->findOrFail($data['id'])
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
    */
}
