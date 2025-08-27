@extends('layouts.main')

@section('header')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">Products</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Product Code</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th style="width: 40px">Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>Product 1</td>
                                <td>This is product 1</td>
                                <td>PROD001</td>
                                <td>Category A</td>
                                <td>$10.00</td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Product 2</td>
                                <td>This is product 2</td>
                                <td>PROD002</td>
                                <td>Category B</td>
                                <td>$20.00</td>
                                <td>50</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Product 3</td>
                                <td>This is product 3</td>
                                <td>PROD003</td>
                                <td>Category A</td>
                                <td>$15.00</td>
                                <td>75</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
