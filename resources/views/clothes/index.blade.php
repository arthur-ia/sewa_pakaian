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
                                <div class="col-auto me-auto mb-4 h4">Clothes::index </div>
                                <div class="col-auto">
                                <a href="{{ route('Clothes.create') }}" class="btn btn-primary m-2 justify-content-end">
                                    <i class="fab fa-cc-visa text-right me-2"></i> Add New Clothes </a> 
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="text" id="searchInput" class="form-control" placeholder="Search Clothes...">
                            </div>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Action</th>
                                            <th scope="col">No</th>
                                            <th scope="col">Clothes Name</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Model</th>
                                            <th scope="col">Color</th>
                                            <th scope="col">Size</th>
                                            <th scope="col">Material</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">1<sup>st</sup> Images</th>
                                            <th scope="col">2<sup>nd</sup> Images</th>
                                            <th scope="col">3<sup>rd</sup> Images</th>
                                            <th scope="col">Stock</th>
                                            <th scope="col">Rental's Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $no => $data)
                                        <tr>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('Clothes.edit', $data) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>
                                                    Edit</a>
                                                    <a href="{{ route('Clothes.destroy', $data) }}" class="btn btn-danger btn-sm" onclick="hapus(event, this)">
                                                        <i class="fas fa-trash-alt me-2"></i>Delete
                                                    </a>
                                                </div>
                                            </td>
                                            <th scope="row">{{ $no + 1 . "." }}</th>

                                            @if(strlen($data['nama_pakaian']) > 10)
                                            <td  data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title= "{{ $data['nama_pakaian']}}">
                                                 {{substr($data['nama_pakaian'], 0, 10) . ' ....'}}
                                            </td>
                                            @else
                                            <td>{{ $data['nama_pakaian'] }}</td>
                                            @endif

                                            @if(strlen($data['jenis']) > 10)
                                            <td  data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title= "{{ $data['jenis']}}">
                                                 {{substr($data['jenis'], 0, 10) . ' ....'}}
                                            </td>
                                            @else
                                            <td>{{ $data['jenis'] }}</td>
                                             @endif

                                            @if(strlen($data['model']) > 10)
                                            <td  data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title= "{{ $data['model']}}">
                                                 {{substr($data['model'], 0, 10) . ' ....'}}
                                            </td>
                                            @else
                                            <td>{{ $data['model'] }}</td>
                                            @endif
                                            @if(strlen($data['warna']) > 10)
                                            <td  data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title= "{{ $data['warna']}}">
                                                 {{substr($data['warna'], 0, 10) . ' ....'}}
                                            </td>
                                            @else
                                            <td>{{ $data['warna'] }}</td>
                                            @endif
                                            @if(strlen($data['ukuran']) > 10)
                                            <td  data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title= "{{ $data['ukuran']}}">
                                                 {{substr($data['ukuran'], 0, 10) . ' ....'}}
                                            </td>
                                            @else
                                            <td>{{ $data['ukuran'] }}</td>
                                            @endif
                                            @if(strlen($data['bahan']) > 10)
                                            <td  data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title= "{{ $data['bahan']}}">
                                                 {{substr($data['bahan'], 0, 10) . ' ....'}}
                                            </td>
                                            @else
                                            <td>{{ $data['bahan'] }}</td>
                                            @endif
                                            @if(strlen($data['deskripsi']) > 10)
                                            <td  data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title= "{{ $data['deskripsi']}}">
                                                 {{substr($data['deskripsi'], 0, 10) . ' ....'}}
                                            </td>
                                            @else
                                            <td>{{ $data['deskripsi'] }}</td>
                                            @endif
                                            <td>
                                                @if($data['foto1'] !== '')
                                                <img src="storage/{{$data['foto1']}}" alt="" class="w-100 img-thumbnail cur-pointer"
                                                data-bs-toggle="modal" data-bs-target="#foto1_{{$data->id}}">
                                                @endif
                                            </td>
                                            <td>
                                                @if($data['foto2'] !== '')
                                                <img src="storage/{{$data['foto2']}}" alt="" class="w-100 img-thumbnail cur-pointer"
                                                data-bs-toggle="modal" data-bs-target="#foto2_{{$data->id}}">
                                                @endif
                                            </td>
                                            <td>
                                                @if($data['foto3'] !== '')
                                                <img src="storage/{{$data['foto3']}}" alt="" class="w-100 img-thumbnail cur-pointer"
                                                data-bs-toggle="modal" data-bs-target="#foto3_{{$data->id}}">
                                                @endif
                                            </td>
                                            <!-- <td>
                                                <img src="{{ asset('storage/' . $data['foto2']) }}" alt="Image 2"  class="img-thumbnail cur-pointer" style="width: 100px; height: auto;" onclick="openModal(this.src)">
                                            </td>
                                            <td>
                                                <img src="{{ asset('storage/' . $data['foto3']) }}" alt="Image 3"  class="img-thumbnail cur-pointer" style="width: 100px; height: auto;" onclick="openModal(this.src)">
                                            </td> -->
                                            <td>{{ $data['stok'] }}</td>
                                            <td>{{ $data['harga_sewa'] }}</td>
                                        </tr>

                                        <!-- Modal Foto1-->
                                        <div class="modal fade" id="foto1_{{$data->id}}" tabindex="-1" aria-labelledby="foto1_{{$data->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="foto1_{{$data->id}}Label">
                                                    @if(strlen($data->nama_pakaian) > 40)
                                                        {{substr($data->nama_pakaian, 0, 40) . '...'}}
                                                    @else
                                                        {{$data->nama_pakaian}}
                                                    @endif
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" 
                                                aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="storage/{{$data['foto1']}}" alt="" class="w-100">
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                        <!-- Modal Foto2-->
                                        <div class="modal fade" id="foto2_{{$data->id}}" tabindex="-1" aria-labelledby="foto3_{{$data->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="foto2_{{$data->id}}Label">
                                                    @if(strlen($data->nama_pakaian) > 40)
                                                        {{substr($data->nama_pakaian, 0, 40) . '...'}}
                                                    @else
                                                        {{$data->nama_pakaian}}
                                                    @endif
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" 
                                                aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="storage/{{$data['foto2']}}" alt="" class="w-100">
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                        <!-- Modal Foto3-->
                                        <div class="modal fade" id="foto3_{{$data->id}}" tabindex="-1" aria-labelledby="foto3_{{$data->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="foto3_{{$data->id}}Label">
                                                    @if(strlen($data->nama_pakaian) > 40)
                                                        {{substr($data->nama_pakaian, 0, 40) . '...'}}
                                                    @else
                                                        {{$data->nama_pakaian}}
                                                    @endif
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" 
                                                aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="storage/{{$data['foto3']}}" alt="" class="w-100">
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Image Modal with Close Button
            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="imageModalLabel">Zoomed Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img id="modalImage" src="" class="img-fluid" alt="Zoomed Image">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div> -->


            
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
                    let pesan = "{{session('pesan')}}"
                    // alert(tampil_pesan)
                    if(pesan.trim() !== ''){
                    swal('Good Job', pesan.trim(), 'success')
                }
                }
                
                function hapus(event, el){
                    event.preventDefault()
                    swal({
                        title: "Are you sure?",
                        text: "Your will delete the Cothe data permanently!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                        },
                function(){
                    form.setAttribute('action', el.getAttribute('href'))
                    form.submit()
                    });
                
                }
                // function openModal(imageSrc) {
                //     const modalImage = document.getElementById('modalImage');
                //     modalImage.src = imageSrc;
                //     const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
                //     imageModal.show();
                // }


                body.onload = function(){
                    tampil_pesan()
                }

            </script>
            <script>
                document.getElementById('searchInput').addEventListener('keyup', function() {
                    var input = this.value.toLowerCase();
                    var rows = document.querySelectorAll('table tbody tr');
                    
                    rows.forEach(function(row) {
                        var cells = row.getElementsByTagName('td');
                        var found = false;
                        
                        for (var i = 0; i < cells.length; i++) {
                            if (cells[i].textContent.toLowerCase().includes(input)) {
                                found = true;
                                break;
                            }
                        }
                        
                        row.style.display = found ? '' : 'none';
                    });
                });
            </script>


    

@endsection