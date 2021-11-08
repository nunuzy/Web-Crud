<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>CRUD LARAVEL</title>
</head>

<body>
    <h1 class="text-center mb-4 mt-4">Data Buku</h1>

    <div class="container">
        <a href="/tambahbuku" class="btn btn-success">Tambah Buku</a>

        <div class="row g-3 align-items-center mt-2 mb-2">
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">Search</label>
            </div>
            <div class="col-auto">
                <form action="/buku" method="GET">
                    <input type="search" id="inputPassword" name="search" class="form-control"
                        aria-describedby="passwordHelpInline">
                </form>
            </div>
        </div>

        <div class="row">
            {{-- @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif --}}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Persediaan</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $index => $row)
                        <tr>
                            <th scope="row">{{ $index + $data->firstItem() }}</th>
                            <td>{{ $row->judul }}</td>
                            <td>{{ $row->pengarang }}</td>
                            <td>{{ $row->penerbit }}</td>
                            <td>{{ $row->persediaan }}</td>
                            <td>
                                <img src="{{ asset('gambarbuku/' . $row->gambar) }}" alt="" style="width: 40px;">
                            </td>
                            <td>{{ $row->created_at->format('d, M Y') }}</td>
                            <td>
                                <a href="/editdata/{{ $row->id }}" class="btn btn-info">Edit</a>
                                <a href="#" class=" btn btn-danger delete" data-id="{{ $row->id }}"
                                    data-judul="{{ $row->judul }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    -->
</body>
<script>
    $('.delete').click(function() {
        var bukuid = $(this).attr('data-id');
        var judul = $(this).attr('data-judul');
        swal({
                title: "Yakin?",
                text: "Anda akan menghapus data buku " + judul + "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/delete/" + bukuid + "",
                        swal("Data buku berhasil dihapus!", {
                            icon: "success",
                        });
                } else {
                    swal("Data buku tidak jadi dihapus");
                }
            });
    });
</script>

<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
</script>

</html>
