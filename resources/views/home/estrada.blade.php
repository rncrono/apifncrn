@extends('layout.main')
@section('style')
    <style type="text/css">
        header.masthead .background {
            background-image: url('<?=$config['banner_inicial']?>') !important;
        }
    </style>
@endsection
@section('content')
    <section class="page-section">
        <div id="container">
            <img width="100%" src="<?=asset('assets/img/estrada/banner.jpg')?>"/>
        </div>
    </section>
@endsection