@extends('layouts.app')

@section('title', 'About Us - Burraq Motors Manchester')
@section('description', 'Learn about Burraq Motors Manchester - your trusted partner for premium used cars with over 15 years of experience in the automotive industry.')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-primary-600 to-primary-800 text-white py-16">
    <div class="container-custom">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">About Burraq Motors</h1>
            <p class="text-xl text-primary-100">Your trusted partner for premium used cars in Manchester</p>
        </div>
    </div>
</section>

<!-- About Content -->
<section class="section-padding">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
            <div>
                <h2 class="text-3xl font-bold mb-6">Our Story</h2>
                <p class="text-lg text-gray-700 mb-6">
                    Founded in 2008, Burraq Motors Manchester has been serving the Greater Manchester area with 
                    exceptional Japanese car sales and service. What started as a small family business has grown 
                    into one of the most trusted names in the local automotive industry, specializing in quality Japanese vehicles.
                </p>
                <p class="text-lg text-gray-700 mb-6">
                    Our commitment to quality, transparency, and customer satisfaction has earned us a reputation 
                    for excellence. We believe that buying a used car should be a positive experience, which is 
                    why we go above and beyond to ensure every customer drives away happy with their perfect Japanese car.
                </p>
                <div class="grid grid-cols-2 gap-6">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-primary-600 mb-2">500+</div>
                        <div class="text-gray-600">Happy Customers</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-primary-600 mb-2">15+</div>
                        <div class="text-gray-600">Years Experience</div>
                    </div>
                </div>
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                     alt="Burraq Motors founding story - family business" 
                     class="w-full h-96 object-cover rounded-lg shadow-lg">
            </div>
        </div>

        <!-- Our Values -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-center mb-12">Our Values</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-20 h-20 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Quality Assurance</h3>
                    <p class="text-gray-600">
                        Every vehicle undergoes rigorous inspection to ensure it meets our high standards 
                        of quality and reliability.
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-20 h-20 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Fair Pricing</h3>
                    <p class="text-gray-600">
                        We offer competitive prices with transparent pricing and no hidden fees. 
                        What you see is what you pay.
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-20 h-20 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Customer Care</h3>
                    <p class="text-gray-600">
                        Our experienced team provides personalized service and ongoing support 
                        to ensure your complete satisfaction.
                    </p>
                </div>
            </div>
        </div>

        <!-- Our Team -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-center mb-12">Meet Our Team</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         alt="Ahmed Hassan" 
                         class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="text-xl font-bold mb-2">Ahmed Hassan</h3>
                    <p class="text-primary-600 font-semibold mb-2">Founder & CEO</p>
                    <p class="text-gray-600">
                        With over 20 years in the automotive industry, Ahmed founded Burraq Motors 
                        with a vision to provide exceptional service and quality vehicles.
                    </p>
                </div>
                
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         alt="Sarah Johnson" 
                         class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="text-xl font-bold mb-2">Sarah Johnson</h3>
                    <p class="text-primary-600 font-semibold mb-2">Sales Manager</p>
                    <p class="text-gray-600">
                        Sarah leads our sales team with expertise in customer relations and 
                        helping clients find their perfect vehicle.
                    </p>
                </div>
                
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         alt="Mike Thompson" 
                         class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="text-xl font-bold mb-2">Mike Thompson</h3>
                    <p class="text-primary-600 font-semibold mb-2">Service Manager</p>
                    <p class="text-gray-600">
                        Mike ensures every vehicle meets our quality standards through 
                        comprehensive inspection and maintenance.
                    </p>
                </div>
            </div>
        </div>

        <!-- Why Choose Us -->
        <div class="bg-gray-50 rounded-lg p-8">
            <h2 class="text-3xl font-bold text-center mb-8">Why Choose Burraq Motors?</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-primary-600 mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Comprehensive vehicle inspection and quality assurance</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-primary-600 mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Transparent pricing with no hidden fees</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-primary-600 mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Expert advice and personalized service</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-primary-600 mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Wide selection of quality used vehicles</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-primary-600 mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Flexible financing options available</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-primary-600 mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">After-sales support and service</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-primary-600 mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Local Manchester business with community focus</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-primary-600 mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">15+ years of trusted experience</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding bg-primary-600 text-white">
    <div class="container-custom text-center">
        <h2 class="text-3xl font-bold mb-4">Ready to Find Your Perfect Car?</h2>
        <p class="text-xl mb-8 text-primary-100">
            Browse our extensive collection of quality used vehicles and experience the Burraq Motors difference.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('cars.index') }}" class="btn-primary bg-white text-primary-600 hover:bg-gray-100">
                Browse Our Cars
            </a>
            <a href="{{ route('contact') }}" class="btn-secondary border-white text-white hover:bg-white hover:text-primary-600 text-refined bg-primary-600">
                Contact Us
            </a>
        </div>
    </div>
</section>
@endsection
