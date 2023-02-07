@extends('master')
@section('content')
    <section class="vh-100-bg-image"
        style="background-image: url('https://png.pngtree.com/thumb_back/fh260/background/20210630/pngtree-red-yellow-orange-background-photos-and-premium-high-res-victors-image_733772.jpg');">
        <div class="global">
            <form action="AddNewProduct" method="POST">
                <div class="form-group">
                    @csrf
                    <label for="exampleInputName">Product Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName">
                </div>
                <div class="form-group">
                    <label for="exampleInputPrice">Price</label>
                    <input type="number" name="price" class="form-control" id="exampleInputPrice">
                </div>
                <div class="form-group">
                    <label for="exampleInputCategory">Category</label>
                    <input type="text" name="category" class="form-control" id="exampleInputCategory">
                </div>
                <div class="form-group">
                    <label for="exampleInputDescription">Description</label>
                    <input type="text" name="description" class="form-control" id="exampleInputDescription">
                </div>
                <div class="form-group">
                    <label for="exampleInputgallery">Gallery</label>
                    <input type="url" name="gallery" class="form-control" id="exampleInputgallery">
                </div>

                <button type="submit" class="btn-btn-default">Add</button>
            </form>
        </div>
        <style>
            .global{
                width: 50%;
                padding: 10px;
            }
            .global input{
                background-color: rgb(215, 214, 117);
                color:black;
            }
            .global div{
                border: 5px rgb(239, 189, 82) solid;
            }
            .vh-100-bg-image{
                background-size: 100% 100%;
            }
            .btn-btn-default{
                color:rgb(141, 82, 9)
            }
        </style>
    </section>
@endsection
