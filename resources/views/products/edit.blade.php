<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 700px;
        }

        .card {
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .title {
            text-align: center;
            margin-bottom: 30px;
        }

        .title h2 {
            color: #333;
            font-size: 32px;
            margin-bottom: 8px;
        }

        .title p {
            color: #777;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #444;
        }

        input,
        textarea {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            outline: none;
            transition: 0.3s;
            font-size: 15px;
        }

        input:focus,
        textarea:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.15);
        }

        textarea {
            resize: none;
            min-height: 120px;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .btn {
            width: 100%;
            border: none;
            padding: 15px;
            background: #4f46e5;
            color: white;
            font-size: 16px;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            background: #4338ca;
            transform: translateY(-2px);
        }

        @media(max-width:768px) {
            .row {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 25px;
            }

            .title h2 {
                font-size: 26px;
            }
        }

        .detail-btn {
            background-color: #2563eb;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: 0.3s;
            margin-bottton: 30px;
        }

        .detail-btn:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card">

            <div class="title">
                <h2>Product Detail</h2>

            </div>

            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}"
                            placeholder="Enter Product Name">
                        @error('name')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}"
                            placeholder="Enter Price">
                        @error('price')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="row">

                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}"
                            placeholder="Enter Stock Quantity">
                        @error('stock')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status">
                            <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>
                                Inactive
                            </option>
                        </select>
                        @error('status')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" placeholder="Enter Product Description">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <span style="color:red;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Product Image</label>
                    <input type="file" name="image">
                    @error('image')
                        <span style="color:red;">{{ $message }}</span>
                    @enderror

                    @if ($product->image)
                        <br>
                        <img src="{{ asset('storage/' . $product->image) }}" width="100">
                    @endif
                </div>

                <button type="submit" class="btn">
                    Update Product
                </button>

            </form>

        </div>
    </div>

</body>

</html>
