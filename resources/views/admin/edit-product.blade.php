<!DOCTYPE html>
<html>

<head>
    <title>Update Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        /* Thêm kiểu cho hình ảnh được hiển thị */
        #imagePreview {
            max-width: 100%;
            max-height: 300px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <center>
        <h1 class="text-danger">Update Product</h1>
    </center>
    <div class="pt-5">
        <form action="{{ route('product.update', $product->id_sp) }}" method="post" enctype="multipart/form-data" class="col-7 m-auto">
            @csrf
            <p> Name: <input name="Name" class="form-control" value="{{ $product->ten_sp }}"> </p>
            <p> Price: <input name="Price" class="form-control" value="{{ $product->gia }}"> </p>
            <p> Image: </p>
            <input type="file" id="imageInput" name="urlHinh" accept="image/*">
            <div id="imagePreview"></div>
            <p> URL Image: <input type="text" name="imageUrl" class="form-control" value="{{ $product->hinh }}"> </p>
            <p> Category: <select name="id_loai" class="form-control">
                    @foreach ($category as $category)
                        <option value="{{ $category->id_loai }}" {{ $category->id_loai == $product->id_loai ? 'selected' : '' }}>
                            {{ $category->ten_loai }}
                        </option>
                    @endforeach
                </select>
            </p>
            <center>
                <p><button type="submit" class="bg-warning p-2">Cập nhật</button></p>
            </center>
        </form>
        
        

    </div>

    <script>
        // Lắng nghe sự kiện khi chọn tập tin
        document.getElementById('imageInput').addEventListener('change', function(event) {
            var file = event.target.files[0];
            var imageUrlInput = document.getElementById('imageUrl');
            var imagePreview = document.getElementById('imagePreview');

            if (file) {
                imageUrlInput.value = '';
                var reader = new FileReader();

                // Khi đọc xong tập tin, hiển thị hình ảnh
                reader.onload = function(e) {
                    var img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '100%';
                    img.style.maxHeight = '300px';
                    imagePreview.innerHTML = '';
                    imagePreview.appendChild(img);
                }

                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>
