@extends('layout.main')
@section('style')
    <style type="text/css">
        header.masthead .background {
            background-image: url('<?=$config['banner_inicial']['valor']?>') !important;
        }
    </style>
@endsection
@section('content')
    <section class="page-section">
        <div id="container" class="text-center">
            <img width="60%" src="<?=asset('assets/img/estrada/banner.jpg')?>"/>
        </div>
    </section>
@endsection