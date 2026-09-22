
@extends('admin.layouts.admin')
@section('content')


<form action="#"  enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label class="form-label">Menu Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter menu name">
    </div>

    <div class="mb-3">
        <label class="form-label">Photo</label>
        <input type="file" name="photo" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" name="price" class="form-control" placeholder="Enter price">
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="4"
            placeholder="Enter description"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Category</label>

        <select name="category" class="form-select">

            <option value="">Select Category</option>
            <option value="coffee">Coffee</option>
            <option value="burger">Burger</option>
            <option value="tea">Tea</option>
            <option value="pizza">Pizza</option>
            <option value="dessert">Dessert</option>

        </select>
    </div>

    <button type="submit" class="btn btn-primary">
        Upload Menu
    </button>

</form>

@endsection