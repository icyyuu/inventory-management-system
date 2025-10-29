@extends('layouts.app')

@section('content')
<div class="container" style="max-width:520px;">
    <div class="card" style="border-radius:20px;box-shadow:0 2px 12px rgba(0,0,0,0.07);padding:32px 28px;">
        <h2 style="font-size:2rem;font-weight:700;margin-bottom:24px;">Edit Category</h2>
        <form action="{{ route('categories.update', $category->id) }}" method="POST" style="display:grid;gap:18px;">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required value="{{ old('name', $category->name) }}">
            </div>
            <div style="display:flex;justify-content:flex-end;gap:12px;">
                <a href="{{ route('categories.index') }}"
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
                    Update Category
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
