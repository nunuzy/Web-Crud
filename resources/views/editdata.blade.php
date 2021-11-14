@extends('layout.admin')

@section('content')

    <body>
        <div class="container mb-5">
            <br>
            <br>
            <div class="row justify-content-center mt-5">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="/updatedata/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <legend>Edit Buku</legend>
                                    <label for="exampleInputEmail1" class="form-label">Judul</label>
                                    <input type="text" name="judul" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->judul }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Pengarang</label>
                                    <input type="text" name="pengarang" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->pengarang }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Penerbit</label>
                                    <input type="text" name="penerbit" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->penerbit }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Persediaan</label>
                                    <input type="text" name="persediaan" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $data->persediaan }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Gambar</label>
                                    <input type="file" name="gambar" class="form-control"
                                        value="{{ asset('/public/gambarbuku/' . $data->gambar) }}" required />
                                </div>
                                <button type=" submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>



        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
                                                                                        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
                                                                                                                                                                                crossorigin="anonymous">
                                                                                        </script>
                                                                                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
                                                                                                                                                                                crossorigin="anonymous">
                                                                                        </script>
                                                                                        -->
    </body>
@endsection
