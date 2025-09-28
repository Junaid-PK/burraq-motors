@extends('layouts.app')

@section('title', $car->make . ' ' . $car->model . ' - Burraq Motors Manchester')
@section('description', 'View details for ' . $car->make . ' ' . $car->model . ' at Burraq Motors Manchester. ' . $car->formatted_price . ' - ' . $car->year . ' - ' . $car->formatted_mileage)

@section('content')
<!-- Breadcrumb -->
<section class="bg-gray-100 py-4">
    <div class="container-custom">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary-600">Home</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('cars.index') }}" class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2">Cars</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-gray-500 md:ml-2">{{ $car->make }} {{ $car->model }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</section>

<!-- Car Details -->
<section class="section-padding">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Car Images -->
            <div>
                <div class="mb-4">
                    <img id="mainImage" src="{{ $car->images[0]->images ?? 'https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}" 
                         alt="{{ $car->make }} {{ $car->model }}" 
                         class="w-full h-96 object-cover rounded-lg shadow-lg">
                </div>
                
                @if($car->images && count($car->images) > 1)
                    <div class="grid grid-cols-4 gap-2">
                        @foreach($car->images as $index => $image)
                            <img src="{{ $image }}" 
                                 alt="{{ $car->make }} {{ $car->model }} - Image {{ $index + 1 }}"
                                 class="w-full h-20 object-cover rounded cursor-pointer hover:opacity-75 transition-opacity duration-300"
                                 onclick="changeMainImage('{{ $image }}')">
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Car Information -->
            <div>
                <div class="mb-6">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $car->make }} {{ $car->model }}</h1>
                    <div class="flex items-center space-x-4 text-lg text-gray-600">
                        <span>{{ $car->year }}</span>
                        <span>•</span>
                        <span>{{ $car->formatted_mileage }}</span>
                        <span>•</span>
                        <span>{{ $car->fuel_type ?? 'N/A' }}</span>
                    </div>
                </div>

                <!-- Price -->
                <div class="mb-6">
                    <div class="text-4xl font-bold text-primary-600 mb-2">{{ $car->formatted_price }}</div>
                    <p class="text-gray-600">Competitive pricing with no hidden fees</p>
                </div>

                <!-- Key Features -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold mb-4">Key Features</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700">Year: {{ $car->year }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700">Mileage: {{ $car->formatted_mileage }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700">Fuel: {{ $car->fuel_type ?? 'N/A' }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700">Transmission: {{ $car->transmission ?? 'N/A' }}</span>
                        </div>
                        @if($car->body_type)
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700">Body: {{ $car->body_type }}</span>
                        </div>
                        @endif
                        @if($car->color)
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700">Color: {{ $car->color }}</span>
                        </div>
                        @endif
                        @if($car->engine_size)
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700">Engine: {{ $car->engine_size }}L</span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Description -->
                @if($car->description)
                <div class="mb-8">
                    <h3 class="text-xl font-semibold mb-4">Description</h3>
                    <p class="text-gray-700 leading-relaxed">{{ $car->description }}</p>
                </div>
                @endif

                <!-- Action Buttons -->
                <div class="space-y-4">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="tel:{{ $car->contact_phone }}" class="btn-primary flex-1 text-center">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            Call Now
                        </a>
                        <button onclick="addToCompare({{ $car->id }})" class="btn-secondary flex-1">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Add to Compare
                        </button>
                    </div>
                    
                    <a href="mailto:{{ $car->contact_email }}" class="btn-secondary w-full text-center">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Send Email
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Cars -->
@if($relatedCars->count() > 0)
<section class="section-padding bg-gray-50">
    <div class="container-custom">
        <h2 class="text-3xl font-bold text-center mb-12">Similar Cars</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($relatedCars as $relatedCar)
                <div class="card group">
                    <div class="relative overflow-hidden rounded-t-xl">
                        <img src="{{ $relatedCar->images[0]->images ?? 'https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}" 
                             alt="{{ $relatedCar->make }} {{ $relatedCar->model }}" 
                             class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm text-gray-900 px-2 py-1 rounded-full text-sm font-bold">
                            {{ $relatedCar->formatted_price }}
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2">{{ $relatedCar->make }} {{ $relatedCar->model }}</h3>
                        <div class="text-sm text-gray-600 mb-4">
                            <div>{{ $relatedCar->year }} • {{ $relatedCar->formatted_mileage }}</div>
                            <div>{{ $relatedCar->fuel_type ?? 'N/A' }} • {{ $relatedCar->transmission ?? 'N/A' }}</div>
                        </div>
                        <a href="{{ route('cars.show', $relatedCar) }}" class="btn-primary w-full text-center text-sm">
                            View Details
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection

@section('scripts')
<script>
function changeMainImage(imageSrc) {
    document.getElementById('mainImage').src = imageSrc;
}

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
            showNotification(data.message, 'success');
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
    const notification = document.createElement('div');
    notification.className = `fixed top-20 right-4 z-50 p-4 rounded-lg shadow-lg ${
        type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
    }`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 3000);
}
</script>
@endsection
