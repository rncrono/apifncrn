@extends('layout.main')
@section('style')
    <style type="text/css">
        header.masthead .background {
            background-image: url('<?=$config['banner_inicial']['valor']?>') !important;
        }
    </style>
@endsection