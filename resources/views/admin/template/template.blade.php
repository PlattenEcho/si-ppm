@extends('admin.template.admin_main')

@section('body')
    <div class="z-30">
    </div>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900">

        <!-- Desktop sidebar -->
        @include('admin.template.sidebar')

        {{-- <!-- Mobile sidebar -->
        @include('admin.template.small_sidebar') --}}

        <div class="flex flex-col flex-1 w-full">
            @include('admin.template.header')
            <main class="h-full overflow-y-auto">
                @yield('content')
            </main>
        </div>
    </div>
@endsection
