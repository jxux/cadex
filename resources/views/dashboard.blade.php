@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop
@section('plugins.Select2', true)
@section('plugins.Datatables', true)

@section('content')
    {{-- Minimal --}}
    <x-adminlte-select2 name="sel2Basic">
        <option>Option 1</option>
        <option disabled>Option 2</option>
        <option selected>Option 3</option>
    </x-adminlte-select2>
    
    {{-- Disabled --}}
    <x-adminlte-select2 name="sel2Disabled" disabled>
        <option>Option 1</option>
        <option>Option 2</option>
    </x-adminlte-select2>

    {{-- With prepend slot, label and data-placeholder config --}}
    <x-adminlte-select2 name="sel2Vehicle" label="Vehicle" label-class="text-lightblue"
        igroup-size="lg" data-placeholder="Select an option...">
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-info">
                <i class="fas fa-car-side"></i>
            </div>
        </x-slot>
        <option/>
        <option>Vehicle 1</option>
        <option>Vehicle 2</option>
    </x-adminlte-select2>

    {{-- With multiple slots, and plugin config parameter --}}
    @php
        $config = [
            "placeholder" => "Select multiple options...",
            "allowClear" => true,
        ];
    @endphp
    <x-adminlte-select2 id="sel2Category" name="sel2Category[]" label="Categories"
        label-class="text-danger" igroup-size="sm" :config="$config" multiple>
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-red">
                <i class="fas fa-tag"></i>
            </div>
        </x-slot>
        <x-slot name="appendSlot">
            <x-adminlte-button theme="outline-dark" label="Clear" icon="fas fa-lg fa-ban text-danger"/>
        </x-slot>
        <option>Sports</option>
        <option>News</option>
        <option>Games</option>
        <option>Science</option>
        <option>Maths</option>
    </x-adminlte-select2>

    {{-- Custom --}}
    <x-adminlte-modal id="modalCustom" title="Account Policy" size="lg" theme="teal"
    icon="fas fa-bell" v-centered static-backdrop scrollable>
    <div style="height:800px;">Read the account policies...</div>
    <x-slot name="footerSlot">
        <x-adminlte-button class="mr-auto" theme="success" label="Accept"/>
        <x-adminlte-button theme="danger" label="Dismiss" data-dismiss="modal"/>
    </x-slot>
    </x-adminlte-modal>
    {{-- Example button to open modal --}}
    <x-adminlte-button label="Open Modal" data-toggle="modal" data-target="#modalCustom" class="bg-teal"/>


    {{-- Setup data for datatables --}}
    @php
    $heads = [
        'ID',
        'Name',
        ['label' => 'Phone', 'width' => 40],
        ['label' => 'Actions', 'no-export' => true, 'width' => 5],
    ];

    $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                    <i class="fa fa-lg fa-fw fa-pen"></i>
                </button>';
    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                    <i class="fa fa-lg fa-fw fa-trash"></i>
                </button>';
    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                    <i class="fa fa-lg fa-fw fa-eye"></i>
                </button>';

    $config = [
        'data' => [
            [22, 'John Bender', '+02 (123) 123456789', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
            [19, 'Sophia Clemens', '+99 (987) 987654321', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
            [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
        ],
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];
    @endphp

    {{-- Minimal example / fill data using the component slot --}}
    <x-adminlte-datatable id="table1" :heads="$heads">
        @foreach($config['data'] as $row)
            <tr>
                @foreach($row as $cell)
                    <td>{!! $cell !!}</td>
                @endforeach
            </tr>
        @endforeach
    </x-adminlte-datatable>

    {{-- Compressed with style options / fill data using the plugin config --}}
    <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config"
        striped hoverable bordered compressed/>
@stop


@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop