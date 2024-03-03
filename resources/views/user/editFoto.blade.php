@extends('layouts.app')
@section('content')
<div class="container" style="margin-top: 10%">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="px-4 py-3 border-bottom">
                    <h5 class="card-title fw-semibold mb-0">Foto</h5>
                </div>
                <div class="card-body p-4">
                    <img src="{{ asset('storage/' . $foto->foto) }}" class="img-fluid mb-3" alt="Foto Preview" id="fotoPreview">
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body p-4">
                    <form action="{{ route('foto.update', $foto->slug) }}" id="deleteForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    
                        <div class="mb-4">
                            <label for="judul" class="form-label fw-semibold">Judul</label>
                            <div class="input-group border rounded-1">
                                <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1"><i class="ti ti-user fs-6"></i></span>
                                <input type="text" class="form-control border-0 ps-2" id="judul" name="judul" value="{{ $foto->judul }}" placeholder="Judul">
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                            <div class="input-group border rounded-1">
                                <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon2"><i class="ti ti-building-arch fs-6"></i></span>
                                <input type="text" class="form-control border-0 ps-2" id="deskripsi" name="deskripsi" value="{{ $foto->deskripsi }}" placeholder="Deskripsi">
                            </div>
                        </div>
                    
                        <div class="mb-4">
                            <label for="foto" class="form-label fw-semibold">Foto Anda</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*" onchange="previewFoto()">
                        </div>
                        
                        <div class="delete-btn">
                            <form id="deleteForm" data-route="{{ route('foto.delete', $foto->slug) }}" method="POST" class="delete-form mr-2">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-primary delete-btn" onclick="confirmDelete()">Delete</button>
                            </form>
                            <button type="submit" class="btn btn-warning">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function previewFoto() {
        var fotoInput = document.getElementById('foto');
        var fotoPreview = document.getElementById('fotoPreview');

        if (fotoInput.files && fotoInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                fotoPreview.src = e.target.result;
            };

            reader.readAsDataURL(fotoInput.files[0]);
        }
    }

    function confirmDelete() {
        console.log("Trying to find form");
        var deleteForm = document.getElementById('deleteForm');

        if (deleteForm) {
            console.log("Form found, submitting");
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log("Confirmed, submitting form");
                    deleteForm.submit();
                }
            });
        } else {
            console.log("Form not found");
        }
    }
</script>
@endsection
