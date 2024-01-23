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
            ->addColumn('status_pendaftaran_label', fn($model) => Pendaftaran::statusCodes()->firstWhere('status_pendaftaran', $model->status_pendaftaran)['label'])
            ->addColumn('divisi_label', fn($model) => Pendaftaran::codes()->firstWhere('divisi', $model->divisi)['label'])
            ->addColumn('divisi')
            ->addColumn('scan_ktm')
            ->addColumn('surat_pengantar')
            ->addColumn('created_at_formatted', fn(Pendaftaran $model) => Carbon::parse($model->created_at)->format('d/m/Y'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id pendaftaran', 'id_pendaftaran')
                ->sortable()
                ->searchable(),
            Column::make('Id user', 'id_user'),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),
            Column::make('Universitas', 'universitas')
                ->sortable()
                ->searchable(),
            Column::add()
                ->title('Divisi')
                ->field('divisi_label', 'divisi'),
            Column::add()
                ->title('Status Pendaftaran')
                ->field('status_pendaftaran_label', 'status_pendaftaran'),
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
            Filter::select('universitas', 'universitas')
                ->dataSource(Pendaftaran::select('universitas')->distinct()->get()->toArray())
                ->optionValue('universitas')
                ->optionLabel('universitas'),
            Filter::select('divisi', 'divisi')
                ->dataSource(Pendaftaran::codes())
                ->optionValue('divisi')
                ->optionLabel('label'),
            Filter::inputText('email')->operators(['contains']),
            Filter::inputText('no_telp')->operators(['contains']),
            Filter::select('status_pendaftaran', 'status_pendaftaran')
                ->dataSource(Pendaftaran::statusCodes())
                ->optionValue('status_pendaftaran')
                ->optionLabel('label'),
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
                ->openModal('detail-pendaftaran', ['pendaftaranId' => $row->id_pendaftaran]),
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
