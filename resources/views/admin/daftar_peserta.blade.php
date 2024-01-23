@extends('admin.template.template')

@section('content')
    @livewire('wire-elements-modal')

    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Daftar Peserta
        </h2>
        <div class="px-6 py-6 relative overflow-x-auto bg-white shadow-md sm:rounded-lg">
            <div class="overflow-x-hidden overflow-y-hidden">
                <livewire:pendaftaran-table />
            </div>
        </div>
    </div>
@endsection
