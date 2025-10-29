@extends('layouts.app')

@section('content')
<div class="container">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px;">
        <h2 style="font-size:2rem;font-weight:700;margin:0;">Items</h2>
        <a href="{{ route('items.create') }}"
           class="button"
           style="background:#33443;border-radius:16px;padding:12px 22px;box-shadow:0 2px 8px rgba(51,68,67,0.08);display:flex;align-items:center;gap:10px;font-size:1rem;">
            <!-- Plus Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" style="height:20px;width:20px;" fill="none" viewBox="0 0 24 24" stroke="white">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add Item
        </a>
    </div>
    <div class="card" style="border-radius:20px;box-shadow:0 2px 12px rgba(0,0,0,0.07);padding:0;">
        <table class="table" style="width:100%;border-radius:20px;overflow:hidden;">
            <thead>
                <tr>
                    <th style="font-size:1rem;">Name</th>
                    <th style="font-size:1rem;">Category</th>
                    <th style="font-size:1rem;">Quantity</th>
                    <th style="font-size:1rem;">Price</th>
                    <th style="width:210px;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr style="transition:background 0.2s;">
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name ?? '-' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <div class="row" style="gap:8px;">
                            <!-- View Button -->
                            <button type="button"
                                onclick="showItemModal({{ $item->id }})"
                                class="button"
                                style="background:#33443;border-radius:12px;padding:10px 18px;display:flex;align-items:center;gap:6px;font-size:0.95rem;color:#fff;">
                                <!-- Eye Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" style="height:18px;width:18px;" fill="none" viewBox="0 0 24 24" stroke="white">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm-9 0c0 5 9 5 9 0s-9-5-9 0z"/>
                                </svg>
                                View
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div id="itemModal" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(51,68,67,0.18);z-index:1000;align-items:center;justify-content:center;">
        <div style="background:#fff;border-radius:20px;box-shadow:0 2px 16px rgba(0,0,0,0.12);padding:32px 28px;min-width:340px;max-width:90vw;">
            <h3 id="modalTitle" style="font-size:1.5rem;font-weight:700;margin-bottom:18px;">Item Details</h3>
            <div id="modalContent" style="margin-bottom:24px;">
            -->
            </div>
            <div style="display:flex;justify-content:flex-end;gap:12px;">
                <a id="modalEditBtn" href="#" class="button" style="background:#111827;border-radius:12px;padding:10px 18px;color:#fff;display:flex;align-items:center;gap:6px;">
                 
                    <svg xmlns="http://www.w3.org/2000/svg" style="height:18px;width:18px;" fill="none" viewBox="0 0 24 24" stroke="white">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828a2 2 0 01-2.828 0L9 13zm0 0V17h4"/>
                    </svg>
                    Edit
                </a>
                <form id="modalDeleteForm" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button danger" style="border-radius:12px;padding:10px 18px;background:#dc2626;color:#fff;display:flex;align-items:center;gap:6px;">
              
                        <svg xmlns="http://www.w3.org/2000/svg" style="height:18px;width:18px;" fill="none" viewBox="0 0 24 24" stroke="white">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3"/>
                        </svg>
                        Delete
                    </button>
                </form>
                <button type="button" onclick="closeItemModal()" class="btn secondary" style="border-radius:12px;padding:10px 18px;font-size:1rem;">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Items data for modal (pass from controller as JSON)
    const items = @json($items);

    function showItemModal(id) {
        const item = items.find(i => i.id === id);
        if (!item) return;

        document.getElementById('modalTitle').textContent = item.name + ' Details';
        document.getElementById('modalContent').innerHTML = `
            <div style="margin-bottom:10px;"><strong>Category:</strong> ${item.category ? item.category.name : '-'}</div>
            <div style="margin-bottom:10px;"><strong>Quantity:</strong> ${item.quantity}</div>
            <div style="margin-bottom:10px;"><strong>Price:</strong> ${item.price}</div>
        `;
        document.getElementById('modalEditBtn').href = '/items/' + item.id + '/edit';
        document.getElementById('modalDeleteForm').action = '/items/' + item.id;

        document.getElementById('itemModal').style.display = 'flex';
    }

    function closeItemModal() {
        document.getElementById('itemModal').style.display = 'none';
    }
</script>
@endsection
