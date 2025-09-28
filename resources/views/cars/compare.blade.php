@extends('layouts.app')

@section('title', 'Compare Cars - Burraq Motors Manchester')
@section('description', 'Compare up to 3 cars side by side to find the perfect vehicle for your needs.')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="container-custom relative z-10">
        <div class="text-center">
            <h1 class="text-5xl md:text-6xl font-bold mb-6 text-shadow-lg">Compare Cars</h1>
            <p class="text-xl md:text-2xl text-primary-100 max-w-3xl mx-auto">
                Compare up to 3 cars side by side to make the best decision for your next vehicle
            </p>
        </div>
    </div>
    
    <!-- Decorative elements -->
    <div class="absolute top-10 left-10 w-20 h-20 bg-white/10 rounded-full blur-xl"></div>
    <div class="absolute bottom-10 right-10 w-32 h-32 bg-white/5 rounded-full blur-2xl"></div>
</section>

<!-- Comparison Section -->
<section class="section-padding">
    <div class="container-custom">
        @if($cars->count() > 0)
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                            <tr>
                                <th class="px-8 py-6 text-left text-lg font-bold text-gray-900 border-r border-gray-200">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                        </svg>
                                        <span>Specification</span>
                                    </div>
                                </th>
                                @foreach($cars as $car)
                                    <th class="px-6 py-6 text-center min-w-80 border-r border-gray-200 last:border-r-0">
                                        <div class="flex flex-col items-center space-y-3">
                                            <div class="relative group">
                                                <img src="{{ $car->main_image ?? 'https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}" 
                                                     alt="{{ $car->make }} {{ $car->model }}" 
                                                     class="w-40 h-24 object-cover rounded-xl shadow-lg group-hover:scale-105 transition-transform duration-300">
                                                <div class="absolute inset-0 bg-black/20 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                            </div>
                                            <div class="text-center">
                                                <h3 class="font-bold text-xl text-gray-900 mb-1">{{ $car->make }} {{ $car->model }}</h3>
                                                <p class="text-2xl font-bold text-primary-600 mb-2">{{ $car->formatted_price }}</p>
                                                <a href="{{ route('cars.show', $car) }}" class="inline-flex items-center text-sm text-primary-600 hover:text-primary-700 font-medium transition-colors duration-200">
                                                    <span>View Details</span>
                                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <!-- Year -->
                            <tr class="hover:bg-gray-50/50 transition-colors duration-200">
                                <td class="px-8 py-4 text-sm font-semibold text-gray-900 border-r border-gray-200">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>Year</span>
                                    </div>
                                </td>
                                @foreach($cars as $car)
                                    <td class="px-6 py-4 text-center border-r border-gray-200 last:border-r-0">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                            {{ $car->year }}
                                        </span>
                                    </td>
                                @endforeach
                            </tr>
                            
                            <!-- Mileage -->
                            <tr class="hover:bg-gray-50/50 transition-colors duration-200">
                                <td class="px-8 py-4 text-sm font-semibold text-gray-900 border-r border-gray-200">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                        </svg>
                                        <span>Mileage</span>
                                    </div>
                                </td>
                                @foreach($cars as $car)
                                    <td class="px-6 py-4 text-center border-r border-gray-200 last:border-r-0">
                                        <span class="text-sm font-medium text-gray-700">{{ $car->formatted_mileage }}</span>
                                    </td>
                                @endforeach
                            </tr>
                            
                            <!-- Price -->
                            <tr class="hover:bg-gray-50/50 transition-colors duration-200 bg-primary-50/30">
                                <td class="px-8 py-4 text-sm font-semibold text-gray-900 border-r border-gray-200">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                        </svg>
                                        <span>Price</span>
                                    </div>
                                </td>
                                @foreach($cars as $car)
                                    <td class="px-6 py-4 text-center border-r border-gray-200 last:border-r-0">
                                        <span class="text-xl font-bold text-primary-600">{{ $car->formatted_price }}</span>
                                    </td>
                                @endforeach
                            </tr>
                            
                            <!-- Fuel Type -->
                            <tr class="hover:bg-gray-50/50 transition-colors duration-200">
                                <td class="px-8 py-4 text-sm font-semibold text-gray-900 border-r border-gray-200">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path>
                                        </svg>
                                        <span>Fuel Type</span>
                                    </div>
                                </td>
                                @foreach($cars as $car)
                                    <td class="px-6 py-4 text-center border-r border-gray-200 last:border-r-0">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            {{ $car->fuel_type ?? 'N/A' }}
                                        </span>
                                    </td>
                                @endforeach
                            </tr>
                            
                            <!-- Transmission -->
                            <tr class="hover:bg-gray-50/50 transition-colors duration-200">
                                <td class="px-8 py-4 text-sm font-semibold text-gray-900 border-r border-gray-200">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span>Transmission</span>
                                    </div>
                                </td>
                                @foreach($cars as $car)
                                    <td class="px-6 py-4 text-center border-r border-gray-200 last:border-r-0">
                                        <span class="text-sm font-medium text-gray-700">{{ $car->transmission ?? 'N/A' }}</span>
                                    </td>
                                @endforeach
                            </tr>
                            
                            <!-- Body Type -->
                            <tr class="hover:bg-gray-50/50 transition-colors duration-200">
                                <td class="px-8 py-4 text-sm font-semibold text-gray-900 border-r border-gray-200">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                        <span>Body Type</span>
                                    </div>
                                </td>
                                @foreach($cars as $car)
                                    <td class="px-6 py-4 text-center border-r border-gray-200 last:border-r-0">
                                        <span class="text-sm font-medium text-gray-700">{{ $car->body_type ?? 'N/A' }}</span>
                                    </td>
                                @endforeach
                            </tr>
                            
                            <!-- Color -->
                            <tr class="hover:bg-gray-50/50 transition-colors duration-200">
                                <td class="px-8 py-4 text-sm font-semibold text-gray-900 border-r border-gray-200">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                                        </svg>
                                        <span>Color</span>
                                    </div>
                                </td>
                                @foreach($cars as $car)
                                    <td class="px-6 py-4 text-center border-r border-gray-200 last:border-r-0">
                                        <span class="text-sm font-medium text-gray-700">{{ $car->color ?? 'N/A' }}</span>
                                    </td>
                                @endforeach
                            </tr>
                            
                            <!-- Engine Size -->
                            <tr class="hover:bg-gray-50/50 transition-colors duration-200">
                                <td class="px-8 py-4 text-sm font-semibold text-gray-900 border-r border-gray-200">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                        </svg>
                                        <span>Engine Size</span>
                                    </div>
                                </td>
                                @foreach($cars as $car)
                                    <td class="px-6 py-4 text-center border-r border-gray-200 last:border-r-0">
                                        <span class="text-sm font-medium text-gray-700">{{ $car->engine_size ? $car->engine_size . 'L' : 'N/A' }}</span>
                                    </td>
                                @endforeach
                            </tr>
                            
                            <!-- Contact -->
                            <tr class="hover:bg-gray-50/50 transition-colors duration-200 bg-gray-50/30">
                                <td class="px-8 py-4 text-sm font-semibold text-gray-900 border-r border-gray-200">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                        <span>Contact</span>
                                    </div>
                                </td>
                                @foreach($cars as $car)
                                    <td class="px-6 py-4 text-center border-r border-gray-200 last:border-r-0">
                                        <div class="space-y-2">
                                            <a href="tel:{{ $car->contact_phone }}" class="block text-sm text-primary-600 hover:text-primary-700 font-medium transition-colors duration-200">
                                                {{ $car->contact_phone }}
                                            </a>
                                            <a href="mailto:{{ $car->contact_email }}" class="block text-sm text-primary-600 hover:text-primary-700 font-medium transition-colors duration-200">
                                                {{ $car->contact_email }}
                                            </a>
                                        </div>
                                    </td>
                                @endforeach
                            </tr>
                            
                            <!-- Actions -->
                            <tr class="hover:bg-gray-50/50 transition-colors duration-200">
                                <td class="px-8 py-4 text-sm font-semibold text-gray-900 border-r border-gray-200">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span>Actions</span>
                                    </div>
                                </td>
                                @foreach($cars as $car)
                                    <td class="px-6 py-4 text-center border-r border-gray-200 last:border-r-0">
                                        <div class="space-y-3">
                                            <a href="{{ route('cars.show', $car) }}" class="btn-primary text-sm px-4 py-2 inline-block w-full">
                                                View Details
                                            </a>
                                            <form method="POST" action="{{ route('cars.removeFromCompare', $car) }}" class="inline w-full">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-secondary text-sm px-4 py-2 w-full">
                                                    Remove
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                </table>
            </div>
            
                </div>
            </div>
            
            <!-- Actions -->
            <div class="mt-12 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('cars.index') }}" class="btn-primary text-lg px-8 py-4">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Browse More Cars
                </a>
                <a href="{{ route('home') }}" class="btn-secondary text-lg px-8 py-4">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Back to Home
                </a>
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20">
                <div class="max-w-md mx-auto">
                    <div class="w-32 h-32 mx-auto mb-8 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full flex items-center justify-center">
                        <svg class="w-16 h-16 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">No Cars to Compare</h3>
                    <p class="text-lg text-gray-600 mb-8 max-w-sm mx-auto">
                        Add cars to your comparison list to see them side by side and make the best decision.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('cars.index') }}" class="btn-primary text-lg px-8 py-4">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Browse Cars
                        </a>
                        <a href="{{ route('home') }}" class="btn-secondary text-lg px-8 py-4">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Back to Home
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
