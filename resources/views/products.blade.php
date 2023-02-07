@extends('master', ['request' => $request])
@section('content')
    <div class="global" style="background-image: linear-gradient(to right, rgb(209, 98, 67) , rgb(215, 214, 117))">
        <h1 style="text-align: center">{{ __('products.header') }}</h1>
        <p style="text-align: center">{{ __('products.welcome') }} </p>

        <table border="3" style="width:100%" style="border-collapse: collapse;">
            <tr>
                <td>
                    <p style=" margin-left:40%; font-weight:bold; color:rgb(215, 214, 117)">Name</p>
                </td>
                <td>
                    <p style=" margin-left:40%; font-weight:bold; color:rgb(215, 214, 117) ">Price</p>
                </td>
                <td>
                    <p style=" margin-left:40%; font-weight:bold; color:rgb(166, 75, 50)">Category</p>
                </td>
                <td>
                    <p style=" margin-left:40%; font-weight:bold; color:rgb(187, 87, 59)">Gallery</p>
                </td>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td style="width: 25%; ">
                        <a href="#" style="color:rgb(215, 214, 117)">
                            <p style=" margin-left:40%">{{ $product['name'] }}</p>
                        </a>
                    </td>
                    <td style="width: 25%; color:rgb(215, 214, 117)">
                        <p style=" margin-left:40%">{{ $product['price'] }}</p>
                    </td>
                    <td style="width: 25%; color:rgb(166, 75, 50)">
                        <p style=" margin-left:40%">{{ $product['category'] }}</p>
                    </td>
                    <td style="width: 150px; color:rgb(187, 87, 59)"><img src={{ $product['gallery'] }} height="150"
                            class="img"></td>
                </tr>
                </a>
            @endforeach
        </table>
        <nav aria-label="Page navigation" >
            <ul class="pagination">
                <li>
                    <a class="Paging" href={{ $products->previousPageUrl() }} aria-label="Previous" 
                        style="background-color: rgb(215, 214, 117); color: #713b2c;">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li><a class="Paging" href="#" style="background-color: #713b2c ;color:rgb(215, 214, 117);">
                    {{ $products->currentPage() }}</a></li>
                <li>
                    <a class="Paging" href={{ $products->nextPageUrl() }} aria-label="Next" 
                        style="background-color: rgb(215, 214, 117); color: #713b2c;">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav> 

{{--         <span>
            {{ $products->links() }}
        </span> --}}
    </div>
    @if ($request->has('user'))
        <a href="/logout">Logout</a>
    @endif
    {{-- {{ $products->links('pagination::bootstrap-4') }} --}}

    <style>
        .img {
            border: 1px solid rgb(209, 98, 67);
            border-radius: 4px;
            padding: 5px;
            width: 150px;
            margin-left: 25%;
        }

        table,
        td {
            border: 2px rgb(209, 98, 67) double;
        }
    </style>
@endsection
