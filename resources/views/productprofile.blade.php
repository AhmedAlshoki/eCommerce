@extends('master', ['product' => $product, 'owner' => $owner, 'request' => $request])
@section('content')
    <div class="contanier" style="background-image: linear-gradient(to left, rgb(209, 98, 67) , rgb(215, 214, 117))">
        <div class="box profile-header">
            <img src=" {{ $product->gallery }} " alt="..." id="avatar" width="160" class="mb-2 img-thumbnail">
            <input type="file" class="mb-2" accept="image/gif, image/jpeg, image/png" onchange="loadFile(event)"
                name="image" id="file" style="display: none;">
            <p class="mb-2 upload-image"><label for="file" style="cursor: pointer;">Upload Image</label> </p>
        </div>
        <div class="box product-attributes">
            <p class="product-info"><label> {{ $product->name }}</label></p>
            <p class="product-info"><label> {{ $product->price }}</label></p>
            <p class="product-info"><label> {{ $product->description }}</label></p>
            <p class="product-info"><a href="#" style="color:rgb(226, 224, 152"> {{ $owner->name }}</label></p>
            <p class="product-info"><label> {{ $owner->location }}</label></p>
            </p>
        </div>
        <div class="box product-layout">
            @if ($request->has('user'))
                @if ($owner->id == $request->get('user')->id)
                    <button style="background-color:rgb(166, 75, 50)"> Edit </button>
                @else
                    <a style="color:rgb(215, 214, 117)"
                        href="/order/{{ $request->get('user')->id }}/{{ $product->id }}"><button
                            style="background-color:rgb(166, 75, 50)"> Order </button></a>
                @endif
            @endif
        </div>
    </div>
    <style>
        .contanier {
            display: grid;
            grid-template-columns: 30% 70%;
            grid-auto-rows: minmax(50px, auto);
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

        .product-attributes {
            padding: auto;
            display: inline-block;
        }

        .product-layout {
            grid-column-start: 1;
            grid-column-end: 2;
        }

        .product-info label {
            color: rgb(226, 224, 152)
        }
    </style>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('avatar');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
