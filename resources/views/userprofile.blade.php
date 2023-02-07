@extends('master', ['request' => $request])
@section('content')
    <div class="contanier" style="background-image: linear-gradient(to left, rgb(209, 98, 67) , rgb(215, 214, 117))">
        <div class="box profile-header">
            <img src=" {{ $request->session()->get('user')->avatar }} " alt="..." id="avatar" width="130"
                class="mb-2 img-thumbnail">
            <input type="file" class="mb-2" accept="image/gif, image/jpeg, image/png" onchange="loadFile(event)"
                name="image" id="file" style="display: none;">
            <p class="mb-2 upload-image"><label for="file" style="cursor: pointer;">Upload Image</label> </p>
        </div>
        <div class="box users-attributes">
            <p class="user-info"><label> {{ $request->session()->get('user')->name }}</label></p>
            <p class="user-info"><label> {{ $request->session()->get('user')->email }}</label></p>
            <p class="user-info"><label> {{ $request->session()->get('user')->location }}</label></p>
            <p class="user-info"><label> {{ $request->session()->get('user')->phone_number }}</label></p>
            </p>
        </div>
        <div class="box users-products">3</div>
    </div>
    <style>
        .contanier {
            display: grid;
            grid-template-columns: 50% 50%;
            grid-auto-rows: minmax(200px, auto);
        }

        .box {
            text-align: center;
            position: relative;
        }

        .mb-2 {
            position: absolute;
            top: 25%
        }

        .upload-image {
            border: 5px rgb(166, 75, 50) double;
            padding-left: 3px;
            padding-right: 3px;
            color: rgb(166, 75, 50);
        }

        .users-attributes {
            padding: auto;
            display: inline-block;
        }

        .users-products {
            grid-column-start: 1;
            grid-column-end: 3;
            display: grid
        }
        .user-info label{
            color:rgb(226, 224, 152)
        }
    </style>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('avatar');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
{{-- <img src=" {{ $request->session()->get('user')->avatar }} " alt="..."
                                id="avatar" width="130" class="rounded mb-2 img-thumbnail">
                            <input type="file" accept="image/gif, image/jpeg, image/png" onchange="loadFile(event)"
                                name="image" id="file" style="display: none;">
                            <p><label for="file" style="cursor: pointer;">Upload Image</label></p>
 --}}
