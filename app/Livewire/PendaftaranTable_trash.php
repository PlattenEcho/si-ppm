<?php

namespace App\Livewire;

use App\Models\Pendaftaran;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class PendaftaranTable extends PowerGridComponent
{
    use WithExport;

    public function getDivisiName($divisiCode)
    {
        return ($divisiCode == 1) ? 'Informatika' : (($divisiCode == 2) ? 'Media' : 'Unknown');
    }

    protected function getDistinctUniversities()
    {
        return Pendaftaran::distinct('universitas')->pluck('universitas')->toArray();
    }



    public function setUp(): array
    {
        $this->showCheckBox('id_pendaftaran');
        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public string $primaryKey = 'pendaftaran.id_pendaftaran';
    public string $sortField = 'pendaftaran.id_pendaftaran';

    public function datasource(): Builder
    {
        return Pendaftaran::query()->select('pendaftaran.*', 'pendaftaran.id_pendaftaran as unique_key');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id_pendaftaran')
            ->addColumn('id_user')
            ->addColumn('name')

            /** Example of custom column using a closure **/
            ->addColumn('name_lower', fn(Pendaftaran $model) => strtolower(e($model->name)))

            ->addColumn('nim')
            ->addColumn('alamat')
            ->addColumn('jenjang')
            ->addColumn('universitas')
            ->addColumn('email')
            ->addColumn('no_telp')
            ->addColumn('motivasi')
            ->addColumn('rencana_kegiatan')
            ->addColumn('status_pendaftaran')
            ->addColumn('divisi', fn(Pendaftaran $model) => $this->getDivisiName($model->divisi))
            ->addColumn('scan_ktm')
            ->addColumn('surat_pengantar')
            ->addColumn('created_at_formatted', fn(Pendaftaran $model) => Carbon::parse($model->created_at)->format('d/m/Y'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id pendaftaran', 'id_pendaftaran'),
            Column::make('Id user', 'id_user'),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),
            Column::make('Universitas', 'universitas')
                ->sortable()
                ->searchable(),
            Column::make('Divisi', 'divisi'),
            Column::make('Status pendaftaran', 'status_pendaftaran')
                ->toggleable(),
            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),
            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('name')->operators(['contains']),
            Filter::inputText('nim')->operators(['contains']),
            Filter::inputText('alamat')->operators(['contains']),
            Filter::inputText('jenjang')->operators(['contains']),
            // Filter::select('divisi', 'divisi')
            //     ->dataSource(Pendaftaran::)
            //     ->optionValue('id') // Use 'id' or 'value' based on your data structure
            //     ->optionLabel('label'),
            Filter::select('universitas', 'universitas')
                ->dataSource(Pendaftaran::select('universitas')->distinct()->get())
                ->optionValue('universitas')
                ->optionLabel('universitas'),
            Filter::inputText('email')->operators(['contains']),
            Filter::inputText('no_telp')->operators(['contains']),
            Filter::boolean('status_pendaftaran'),
            Filter::inputText('scan_ktm')->operators(['contains']),
            Filter::inputText('surat_pengantar')->operators(['contains']),
            Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(\App\Models\Pendaftaran $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->class('text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800')
                ->dispatch('edit', ['rowId' => $row->id_pendaftaran]),
            Button::add('delete')
                ->slot('Delete')
                ->id()
                ->class('focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900')
                ->dispatch('edit', ['rowId' => $row->id_pendaftaran]),
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
