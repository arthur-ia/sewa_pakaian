@extends('backend.master')
@section('navbar')
	@include('backend.navbar')
@endsection
@section('sidebar')
	@include('backend.sidebar')
@endsection
@section('content')
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12 ">
                        <div class="bg-light rounded h-100 p-4">
                        <div class="col-auto me-auto mb-4 h4">Clothes::Create </div>

                        <form action="{{ route('Clothes.store') }}" method="POST" id="frmClothes" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_pakaian" class="form-label">Clothes Name</label>
                            <input class="form-control" name="nama_pakaian" id="nama_pakaian" maxlength="100" type="text"
                                aria-label="default input example"
                                value="{{old('nama_pakaian')}}">
                            <div id="clothesHelp" class="form-text text-warning">
                               Clothes name must be filled in and maximal 100 character
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jenis" class="form-label">Type</label>
                            <input class="form-control" name="jenis" id="jenis" maxlength="100" type="text"
                                aria-label="default input example"
                                value="{{old('jenis')}}">
                            <div id="clothesHelp" class="form-text text-warning">
                                Type Must be filled in and maximal 100 caracters
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="model" class="form-label">Model</label>
                            <input class="form-control" name="model" id="model" maxlength="100" type="text"
                                aria-label="default input example"
                                value="{{old('model')}}">
                            <div id="clothesHelp" class="form-text text-warning">
                                Model Must be filled in and maximal 100 caracters
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="warna" class="form-label">Colour</label>
                            <input class="form-control" name="warna" id="warna" maxlength="50" type="text"
                                aria-label="default input example"
                                value="{{old('warna')}}">
                            <div id="clothesHelp" class="form-text text-warning">
                                Colour Must be filled in and maximal 50 caracters
                            </div>
                        </div>
                                <div class="mb-3">
                                    <label for="ukuran" class="form-label">Size</label>
                                    <select class="form-control" name="ukuran" id="ukuran" aria-label="default input example">
                                    <option selected>Open this select menu</option>
                                    <option value="S" @if(old('ukuran') === 'S') selected @endif>S</option>
                                    <option value="M" @if(old('ukuran') === 'M') selected @endif>M</option>
                                    <option value="L" @if(old('ukuran') === 'L') selected @endif>L</option>
                                    <option value="XL" @if(old('ukuran') === 'XL') selected @endif>XL</option>
                                    <option value="2XL" @if(old('ukuran') === '2XL') selected @endif>2XL</option>
                                    <option value="3XL" @if(old('ukuran') === '3XL') selected @endif>3XL</option>
                                    <option value="4XL" @if(old('ukuran') === '4XL') selected @endif>4XL</option>
                                    <option value="5XL" @if(old('ukuran') === '5XL') selected @endif>5XL</option>
                                    <option value="ALL SIZE" @if(old('ukuran') === 'ALL SIZE') selected @endif>All Size</option>
                                    </select>
                                    <div id="clothesHelp" class="form-text text-warning">
                                        Size Must be selected.
                                    </div>
                                </div>
                                <div class="mb-3">
                            <label for="bahan" class="form-label">Material</label>
                            <input class="form-control" name="bahan" id="bahan" maxlength="50" type="text"
                                aria-label="default input example"
                                value="{{old('bahan')}}">
                            <div id="clothesHelp" class="form-text text-warning">
                                Material Must be filled in and maximal 50 caracters
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="deskripsi" id="description" rows="7"></textarea>
                            <div id="clothesHelp" class="form-text text-warning">
                                Description can be left blank if not necessary
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="foto1" class="form-label">1<sup>st</sup> Image</label>
                            <input class="form-control" name="foto1" type="file" id="foto1">
                            <div id="clothesHelp" class="form-text text-warning">
                                1<sup>st</sup> Image can be left blank if not necessary
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="foto2" class="form-label">2<sup>nd</sup> Image</label>
                            <input class="form-control" name="foto2" type="file" id="foto2">
                            <div id="clothesHelp" class="form-text text-warning">
                                2<sup>nd</sup> Image can be left blank if not necessary
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="foto3" class="form-label">3<sup>rd</sup> Image</label>
                            <input class="form-control" name="foto3" type="file" id="foto3">
                            <div id="clothesHelp" class="form-text text-warning">
                                3<sup>rd</sup> Image can be left blank if not necessary
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="stok" class="form-label">Stock</label>
                            <input class="form-control text-end" name="stok" id="stok" type="text"
                                aria-label="default input example"
                                value="{{old('stok') ?? '0' }}" placeholder="0" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required>
                            <div id="clothesHelp" class="form-text text-warning">
                                Stock Must be filled in minimal 0
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="harga_sewa" class="form-label">Rental's Price</label>
                            <input class="form-control text-end" name="harga_sewa" id="harga_sewa" type="text"
                                aria-label="default input example"
                                value="{{old('harga_sewa') ?? '0' }}" placeholder="0" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                            <div id="clothesHelp" class="form-text text-warning">
                                Rental's Price Must be filled in minimal 0
                            </div>
                        </div>
                        <div class="text-end">
                                <a href="{{route('Clothes.index')}}" class="btn btn-secondary">
                                    <i class="fas fa-window-close me-2"></i>Cancel</a>
                                <button type="button" class="btn btn-primary" id="save"><i class="fas fa-save me-2">
                                    </i>Save New Clothes</button>
                        </div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>

        <!-- <div id="status" class="invisible" >@isset($status) {{$status}} @endisset</div> -->
        <div id="pesan" class="invisible">@isset($pesan) {{$pesan}} @endisset</div>

<script>
    

        const btnSimpan = document.getElementById('save')
        const jenis = document.getElementById('jenis')
        const model = document.getElementById('model')
        const warna = document.getElementById('warna')
        const ukuran = document.getElementById('ukuran')
        const bahan = document.getElementById('bahan')
        const stok = document.getElementById('stok')
        const harga_sewa = document.getElementById('harga_sewa')
        const form = document.getElementById('frmClothes')
        // const status = document.getElementById('status')
        const pesan = document.getElementById('pesan')
        const body = document.getElementById('body')


        function tampil_pesan() {
            if (pesan.innerHTML.trim() !== '') {
                swal('Data Duplication', pesan.innerHTML, 'error')
            }
        }

        function simpan() {
            if (nama_pakaian.value === '') {
                nama_pakaian.focus()
                swal("Invalid Data!", "Clothes Name is required!", "error")
            } else if (jenis.value === '') {
                jenis.focus()
                swal("Invalid Data!", "Type is required!", "error")
            } else if(model.value === ''){
                model.focus()
                swal("Invalid Data!", "Model is required!", "error")
            } else if(warna.value === ''){
                warna.focus()
                swal("Invalid Data!", "Colour is required!", "error")
            } else if(ukuran.value === 'Open this select menu'){
                ukuran.focus()
                swal("Invalid Data!", "The size must be selected first!", "error")
            } else if(bahan.value === ''){
                bahan.focus()
                swal("Invalid Data!", "Material is required!", "error")
            }
            else {
                form.submit()
            }

        }

        stok.onfocus = function(){
            if(stok.value === '0') stok.value = ''
        }
        stok.onblur = function(){
            if(stok.value === ' ') stok.value = '0'
        }
        stok.onkeydown = function(){
           angka(event)
        }
        
        harga_sewa.onfocus = function(){
            if(harga_sewa.value === '0') harga_sewa.value = ''
        }
        harga_sewa.onblur = function(){
            if(harga_sewa.value === ' ') harga_sewa.value = '0'
        }
        stok.onkeydown = function(){
           angka(event)
        }

        body.onload = function() {
            tampil_pesan()
        }

        btnSimpan.onclick = function() {
            simpan()
        }   
</script>
@endsection
