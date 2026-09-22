

@extends('admin.layouts.admin')
@section('content')


<form action="" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label class="form-label">Blog Title</label>
        <input type="text" name="title" class="form-control" placeholder="Enter blog title">
    </div>

    <div class="mb-3">
        <label class="form-label">Featured Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Category</label>
        <select name="category" class="form-select">
            <option value="">Select Category</option>
            <option value="coffee">Coffee</option>
            <option value="food">Food</option>
            <option value="cafe">Cafe</option>
            <option value="lifestyle">Lifestyle</option>
            <option value="tips">Tips</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Short Description</label>
        <textarea name="short_description"
                  class="form-control"
                  rows="3"
                  placeholder="Enter short description"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Blog Content</label>
        <textarea name="content"
                  class="form-control"
                  rows="8"
                  placeholder="Write your blog content"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Author</label>
        <input type="text" name="author" class="form-control" placeholder="Enter author name">
    </div>

    <div class="mb-3">
        <label class="form-label">Publish Date</label>
        <input type="date" name="published_at" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">
        Publish Blog
    </button>

</form>


@endsection