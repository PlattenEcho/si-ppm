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

final class DefaultTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();

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

    public function datasource(): Builder
    {
        return Pendaftaran::query();
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
            ->addColumn('name_lower', fn (Pendaftaran $model) => strtolower(e($model->name)))

            ->addColumn('nim')
            ->addColumn('alamat')
            ->addColumn('jenjang')
            ->addColumn('universitas')
            ->addColumn('email')
            ->addColumn('no_telp')
            ->addColumn('motivasi')
            ->addColumn('rencana_kegiatan')
            ->addColumn('status_pendaftaran')
            ->addColumn('divisi')
            ->addColumn('scan_ktm')
            ->addColumn('surat_pengantar')
            ->addColumn('created_at_formatted', fn (Pendaftaran $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id pendaftaran', 'id_pendaftaran'),
            Column::make('Id user', 'id_user'),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Nim', 'nim')
                ->sortable()
                ->searchable(),

            Column::make('Alamat', 'alamat')
                ->sortable()
                ->searchable(),

            Column::make('Jenjang', 'jenjang')
                ->sortable()
                ->searchable(),

            Column::make('Universitas', 'universitas')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('No telp', 'no_telp')
                ->sortable()
                ->searchable(),

            Column::make('Motivasi', 'motivasi')
                ->sortable()
                ->searchable(),

            Column::make('Rencana kegiatan', 'rencana_kegiatan')
                ->sortable()
                ->searchable(),

            Column::make('Status pendaftaran', 'status_pendaftaran')
                ->toggleable(),

            Column::make('Divisi', 'divisi'),
            Column::make('Scan ktm', 'scan_ktm')
                ->sortable()
                ->searchable(),

            Column::make('Surat pengantar', 'surat_pengantar')
                ->sortable()
                ->searchable(),

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
            Filter::inputText('universitas')->operators(['contains']),
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
        $this->js('alert('.$rowId.')');
    }

    public function actions(\App\Models\Pendaftaran $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: '.$row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
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
