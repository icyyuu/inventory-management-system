@extends('layouts.app')

@section('content')
<div class="container">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px;">
        <h2 style="font-size:2rem;font-weight:700;margin:0;">Categories</h2>
        <a href="{{ route('categories.create') }}"
           class="button"
           style="background:#33443;border-radius:16px;padding:12px 22px;box-shadow:0 2px 8px rgba(51,68,67,0.08);display:flex;align-items:center;gap:10px;font-size:1rem;">
            <!-- Plus Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" style="height:20px;width:20px;" fill="none" viewBox="0 0 24 24" stroke="white">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add Category
        </a>
    </div>
    <div class="card" style="border-radius:20px;box-shadow:0 2px 12px rgba(0,0,0,0.07);padding:0;">
        <table class="table" style="width:100%;border-radius:20px;overflow:hidden;">
            <thead>
                <tr>
                    <th style="font-size:1rem;">Name</th>
                    <th style="width:170px;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr style="transition:background 0.2s;">
                    <td>{{ $category->name }}</td>
                    <td>
                        <div class="row" style="gap:8px;">
                            <a href="{{ route('categories.edit', $category->id) }}"
                               class="button"
                               style="background:#111827;border-radius:12px;padding:10px 18px;display:flex;align-items:center;gap:6px;font-size:0.95rem;"
                               onmouseover="this.style.background='#374151'" onmouseout="this.style.background='#111827'">
                                <!-- Pencil Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" style="height:18px;width:18px;" fill="none" viewBox="0 0 24 24" stroke="white">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828a2 2 0 01-2.828 0L9 13zm0 0V17h4"/>
                                </svg>
                                Edit
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="button danger"
                                        style="border-radius:12px;padding:10px 18px;display:flex;align-items:center;gap:6px;background:#dc2626;font-size:0.95rem;"
                                        onmouseover="this.style.background='#b91c1c'" onmouseout="this.style.background='#dc2626'">
                                    <!-- Trash Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" style="height:18px;width:18px;" fill="none" viewBox="0 0 24 24" stroke="white">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3"/>
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
