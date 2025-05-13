@extends('backend.master')
@section('sidebar')
	@include('backend.sidebar')
@endsection
@section('navbar')
	@include('backend.navbar')
@endsection
@section('content')
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <div class="row mb-5">
                                <div class="col-auto me-auto mb-4 h4">Payment Method::index </div>
                                <div class="col-auto">
                                <a href="{{ route('Paymentmethod.create') }}" class="btn btn-primary m-2 justify-content-end">
                                    <i class="fab fa-cc-visa text-right me-2"></i> Add New Payment Method </a> 
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $no => $data)
                                        <tr>
                                            <th scope="row" >{{$no + 1 . "."}}</th>
                                            <td>{{$data['metode_pembayaran']}}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('Paymentmethod.edit', $data) }}" class="btn btn-warning">Edit</a>
                                                    <a href="{{ route('Paymentmethod.destroy', $data) }}" class="btn btn-danger" onclick= "hapus(event, this)">
                                                    <i class="fas fa-trash-alt me-2"></i>Delete</a>
                                                </div>
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
            <form action="" method="post" id="frmHapus">
                @method('delete')
                @csrf
            </form>
    
            <!-- <div id="status" class="invisible">@isset($status) {{$status}} @endisset</div> -->
            <div id="pesan"  class="invisible" >@isset($pesan) {{$pesan}} @endisset</div>

            <script>
                const body = document.getElementById('body')
                const status = document.getElementById('status')
                const pesan = document.getElementById('pesan')
                const form = document.getElementById('frmHapus')

                function tampil_pesan(){
                    if(pesan.innerHTML.trim() !== ''){
                    swal('Good Job', pesan.innerHTML, 'success')
                }
                }
                
                function hapus(event, el){
                    event.preventDefault()
                    swal({
                        title: "Are you sure?",
                        text: "Your will delete the Payment Method data permanently!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText:   "Yes, delete it!",
                        closeOnConfirm: false
                        },
                function(){
                    form.setAttribute('action', el.getAttribute('href'))
                    form.submit()
                    });
                
                }

                body.onload = function(){
                    tampil_pesan()
                }

            </script>

            

@endsection