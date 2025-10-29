@extends('layouts.app')

@section('content')
<div class="container" style="max-width:520px;">
    <div class="card" style="border-radius:20px;box-shadow:0 2px 12px rgba(0,0,0,0.07);padding:32px 28px;">
        <h2 style="font-size:2rem;font-weight:700;margin-bottom:24px;">Add Category</h2>
        <form action="{{ route('categories.store') }}" method="POST" style="display:grid;gap:18px;">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required value="{{ old('name') }}">
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
                    <!-- Plus Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" style="height:18px;width:18px;vertical-align:middle;margin-right:6px;" fill="none" viewBox="0 0 24 24" stroke="white">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add Category
                </button>
            </div>
        </form>
    </div>
</div>
@endsection