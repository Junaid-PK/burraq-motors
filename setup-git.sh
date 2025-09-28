#!/bin/bash

# Accept Xcode license
sudo xcodebuild -license accept

# Initialize git repository
git init

# Add remote origin
git remote add origin https://github.com/Junaid-PK/burraq-motors.git

# Add all files
git add .

# Create initial commit
git commit -m "Initial commit: Burraq Motors Manchester website

- Laravel 12 application with FilamentPHP admin panel
- Japanese car specialist website with modern design
- Car listings, search, comparison features
- Contact page with real business information
- Responsive design with Tailwind CSS
- WhatsApp integration
- Google Maps integration"

# Push to GitHub
git branch -M main
git push -u origin main

echo "Repository successfully pushed to GitHub!"
