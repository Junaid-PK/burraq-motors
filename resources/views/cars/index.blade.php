@extends('layouts.app')

@section('title', 'Browse Cars - Burraq Motors Manchester')
@section('description', 'Browse our extensive collection of premium used cars. Find your perfect vehicle with our advanced search and filter options.')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-primary-600 to-primary-800 text-white py-16">
    <div class="container-custom">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Browse Our Cars</h1>
            <p class="text-xl text-primary-100">Find your perfect vehicle from our premium collection</p>
        </div>
    </div>
</section>

<!-- Search and Filter Section -->
<section class="py-8 bg-gray-50">
    <div class="container-custom">
        <form method="GET" action="{{ route('cars.index') }}" class="bg-white rounded-lg shadow-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                <!-- Search -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="Make, model, or description..." 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500">
                </div>

                <!-- Make Filter -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Make</label>
                    <select name="make" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <option value="">All Makes</option>
                        @foreach($makes as $make)
                            <option value="{{ $make }}" {{ request('make') == $make ? 'selected' : '' }}>{{ $make }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Min Price -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Min Price</label>
                    <input type="number" name="min_price" value="{{ request('min_price') }}" 
                           placeholder="£0" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500">
                </div>

                <!-- Max Price -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Max Price</label>
                    <input type="number" name="max_price" value="{{ request('max_price') }}" 
                           placeholder="£100,000" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <!-- Min Year -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Min Year</label>
                    <input type="number" name="min_year" value="{{ request('min_year') }}" 
                           placeholder="2000" min="1990" max="{{ date('Y') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500">
                </div>

                <!-- Max Year -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Max Year</label>
                    <input type="number" name="max_year" value="{{ request('max_year') }}" 
                           placeholder="{{ date('Y') }}" min="1990" max="{{ date('Y') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500">
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4">
                <button type="submit" class="btn-primary flex-1 sm:flex-none">
                    Search Cars
                </button>
                <a href="{{ route('cars.index') }}" class="btn-secondary text-center">
                    Clear Filters
                </a>
            </div>
        </form>
    </div>
</section>

<!-- Results Section -->
<section class="section-padding">
    <div class="container-custom">
        <!-- Results Header -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">
                    {{ $cars->total() }} Cars Found
                </h2>
                @if(request()->hasAny(['search', 'make', 'min_price', 'max_price', 'min_year', 'max_year']))
                    <p class="text-gray-600 mt-1">Filtered results</p>
                @endif
            </div>
            
            <div class="mt-4 md:mt-0">
                <a href="{{ route('cars.compare') }}" class="btn-secondary">
                    Compare Cars ({{ count(session('compare_cars', [])) }})
                </a>
            </div>
        </div>

        <!-- Cars Grid -->
        @if($cars->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($cars as $car)
                    <div class="card group">
                        <div class="relative overflow-hidden rounded-t-xl">
                            <img src="{{ Storage::url($car->images[0]) }}" 
                                 alt="{{ $car->make }} {{ $car->model }}" 
                                 class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                            
                            @if($car->is_featured)
                                <div class="absolute top-3 left-3 bg-primary-600 text-white px-2 py-1 rounded-full text-xs font-semibold">
                                    Featured
                                </div>
                            @endif
                            
                            <div class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm text-gray-900 px-2 py-1 rounded-full text-sm font-bold">
                                {{ $car->formatted_price }}
                            </div>

                            <!-- Compare Button -->
                            <div class="absolute bottom-3 right-3">
                                <button onclick="addToCompare({{ $car->id }})" 
                                        class="bg-white/90 backdrop-blur-sm text-primary-600 p-2 rounded-full hover:bg-white transition-colors duration-300"
                                        title="Add to Compare">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        
                        <div class="p-4">
                            <h3 class="text-lg font-bold mb-2">{{ $car->make }} {{ $car->model }}</h3>
                            
                            <div class="grid grid-cols-2 gap-2 mb-4 text-sm text-gray-600">
                                <div>
                                    <span class="font-semibold">Year:</span> {{ $car->year }}
                                </div>
                                <div>
                                    <span class="font-semibold">Mileage:</span> {{ $car->formatted_mileage }}
                                </div>
                                <div>
                                    <span class="font-semibold">Fuel:</span> {{ $car->fuel_type ?? 'N/A' }}
                                </div>
                                <div>
                                    <span class="font-semibold">Trans:</span> {{ $car->transmission ?? 'N/A' }}
                                </div>
                            </div>
                            
                            <div class="flex gap-2">
                                <a href="{{ route('cars.show', $car) }}" class="btn-primary flex-1 text-center text-sm">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $cars->appends(request()->query())->links() }}
            </div>
        @else
            <!-- No Results -->
            <div class="text-center py-16">
                <div class="text-6xl mb-4">🔍</div>
                <h3 class="text-2xl font-bold mb-2">No Cars Found</h3>
                <p class="text-gray-600 mb-6">Try adjusting your search criteria or browse all cars.</p>
                <a href="{{ route('cars.index') }}" class="btn-primary">
                    View All Cars
                </a>
            </div>
        @endif
    </div>
</section>
@endsection

@section('scripts')
<script>
function addToCompare(carId) {
    fetch('{{ route("cars.addToCompare") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            car_id: carId
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Show success message
            showNotification(data.message, 'success');
            // Update compare button count
            updateCompareCount(data.count);
        } else {
            showNotification(data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Something went wrong. Please try again.', 'error');
    });
}

function showNotification(message, type) {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `fixed top-20 right-4 z-50 p-4 rounded-lg shadow-lg ${
        type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
    }`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    // Remove notification after 3 seconds
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

function updateCompareCount(count) {
    const compareButton = document.querySelector('a[href="{{ route("cars.compare") }}"]');
    if (compareButton) {
        compareButton.textContent = `Compare Cars (${count})`;
    }
}
</script>
@endsection
