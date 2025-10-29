@extends('layouts.app')

@section('content')
<div class="container" style="max-width:520px;">
    <div class="card" style="border-radius:20px;box-shadow:0 2px 12px rgba(0,0,0,0.07);padding:32px 28px;">
        <h2 style="font-size:2rem;font-weight:700;margin-bottom:24px;">Edit Item</h2>
        <form action="{{ route('items.update', $item->id) }}" method="POST" style="display:grid;gap:18px;">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required value="{{ old('name', $item->name) }}">
            </div>
            <div>
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if(old('category_id', $item->category_id) == $category->id) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" min="0" required value="{{ old('quantity', $item->quantity) }}">
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" name="price" id="price" min="0" step="0.01" required value="{{ old('price', $item->price) }}">
            </div>
            <div style="display:flex;justify-content:flex-end;gap:12px;">
                <a href="{{ route('items.index') }}"
                   class="btn secondary"
                   style="border-radius:12px;padding:10px 18px;font-size:1rem;">
                    Cancel
                </a>
                <button type="submit"
                        class="button"
                        style="background:#33443;border-radius:16px;padding:10px 22px;box-shadow:0 2px 8px rgba(51,68,67,0.08);font-size:1rem;">
                    <!-- Pencil Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" style="height:18px;width:18px;vertical-align:middle;margin-right:6px;" fill="none" viewBox="0 0 24 24" stroke="white">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828a2 2 0 01-2.828 0L9 13zm0 0V17h4"/>
                    </svg>
                    Update Item
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
