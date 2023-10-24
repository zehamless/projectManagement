@extends('template.index')

@section('content')

<style>
    .btn-approval {
        background-color: #FF3E3E;
        color: white;
        font-size: 10px;
    }

    .btn-success {
        font-size: 10px;
    }

</style>

{{-- halaman baru --}}
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <iframe id="document-view" src="{{ asset('images/test.pdf') }}" height="700" width="100%" title="Embedded View"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('pageScript')
@endsection