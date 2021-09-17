@extends('template.index')


@section('head')
<meta name="_token" content="{{csrf_token()}}" />
<link href="{{ asset('theme/admin/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />

<link href="{{ asset('theme/admin/assets/css/modals/component.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('theme/admin/assets/css/ui-kit/custom-modal.css')}}" rel="stylesheet" type="text/css" />

<link href="{{ asset('css/formcustom.css')}}" rel="stylesheet" type="text/css" />


<style>
    .md-content button {
        display: unset;
        margin: 0 .5rem;
    }

    .table td,
    .table th {
        border-top: 1px solid #f1f3f1;
    }

    .table-controls>li>a i {
        color: #d3d3d3;
    }

    .md-show~.md-overlay {
        opacity: 1;
        visibility: visible;
    }
</style>
@endsection

@section('content')
@section('pageIndex')
<li class="active"><a href="javscript:void(0);">การชำระเงิน</a></li>
@endsection

<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="page-title text-left">
            <h3>ช่องทางการชำระเงิน</h3>
        </div>
        <div>
            <button class="btn-material btn-material-primary md-trigger" data-modal="modal-1">
                <i class="flaticon-plus-1 mr-1"></i>
                เพิ่มช่องทางการชำระเงิน
            </button>

        </div>
    </div>

    <div class="row layout-spacing">
        <div class="col-lg-8">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-12">
                            @if(Session::has('message'))
                            <div class="alert alert-light-{{Session::get('alert-class')}} mb-4" role="alert">
                                <i class="flaticon-cancel-12 close" data-dismiss="alert"></i>
                                {{ Session::get('message') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-4">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>ชื่อธนาคาร</th>
                                            <th>เลขที่บัญชี</th>
                                            <th>ชื่อบัญชี</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $key => $value)
                                        <tr>
                                            <td class="text-center">{{$key+1}}</td>
                                            <td class="text-primary">{{$value->bank_name}}</td>
                                            <td>{{$value->account_number}}</td>
                                            <td>{{$value->account_name}}</td>
                                            <td class="text-center text-danger">
                                                <i class="flaticon-delete-fill icon" onclick="deleteItem('{{$value->bank_name}}',this)"></i>
                                                <form action="{{route('payment.delete',['id'=>$value->id])}}" method="post" class="d-none">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="md-overlay"></div>
    <div class="md-modal md-effect-1" id="modal-1">
        <div class="md-content">
            <h3 class="pt-4">เพิ่มช่องทางการจัดส่ง</h3>
            <button class="d-none md-close" id="close_modal"></button>
            <div>
                <form method="post" action="{{route('payment.store')}}" id="create">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput">ธนาคาร</label>
                        <input type="text" class="form-control" name="bank_name" id="formGroupExampleInput" placeholder="กรุณาระบุธนาคาร">
                    </div>
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">เลขที่บัญชี</label>
                        <input type="text" class="form-control" name="account_number" id="formGroupExampleInput2" placeholder="กรุณาระบุเลขที่บัญชี">
                    </div>
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput3">ชื่อบัญชี</label>
                        <input type="text" class="form-control" name="account_name" id="formGroupExampleInput3" placeholder="กรุณาระบุชื่อบัญชี">
                    </div>
                    <div class="d-flex  justify-content-between">
                        <div class="w-100 text-left">
                            <p class="text-danger f900 text-left d-none" id="alt-msg">กรุณากรอกข้อมูลให้ครบถ้วน !</p>
                        </div>
                        <div class="w-100 text-right">
                            <button class="btn-material btn-material-default " onclick="colseModal();return false">ยกเลิก</button>
                            <button class="btn-material btn-material-primary" id="btn-save">บันทึก</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="md-overlay"></div>
</div>
@endsection


@section('script')

<script src="{{ asset('theme/admin/assets/js/modal/classie.js')}}"></script>
<script src="{{ asset('theme/admin/assets/js/modal/modalEffects.js')}}"></script>


<script>
    function colseModal() {
        $("button#close_modal").click();
    }

    function deleteItem(name, e) {
        var jquery_object = jQuery(e);
        swal({
            title: 'ต้องการลบ ' + name,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ปิด',
            padding: '2em'
        }).then(function(result) {
            if (result.value) {
                setTimeout(() => {
                    jquery_object.closest('td').find('form').submit()
                }, 300)

            }
        })
    }
    $("#btn-save").click(function(e) {
        e.preventDefault()
        let formvalid = true
        $("form#create input[name]").each(function(index) {
            if ($(this).val() == "") formvalid = false
        })

        if (!formvalid) {
            $("#alt-msg").removeClass('d-none').addClass("d-block")

            setTimeout(() => {
                $("#alt-msg").removeClass('d-block').addClass("d-none")
            }, 2000)

            return
        }

        colseModal()

        setTimeout(() => {
            $("form").submit();
        }, 500)

    })

   
</script>
@endsection