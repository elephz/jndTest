@extends('template.index')


@section('head')
@endsection

@section('content')
@section('pageIndex')
<li class="active"><a href="javscript:void(0);">การจัดส่ง</a></li>
@endsection

<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="page-title text-left">
            <h3>ช่องทางการจัดส่ง</h3>
        </div>
        <div>
        <button class="btn-material btn-material-primary">
            <i class="flaticon-plus-1 mr-1"></i>
            เพิ่มช่องทางการจัดส่ง
        </button>

        </div>
    </div>

    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-lg-12">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection


@section('script')
@endsection