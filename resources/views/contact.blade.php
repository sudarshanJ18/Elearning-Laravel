<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | E-Learning-Laravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-poppins bg-gradient-to-b from-indigo-600 to-indigo-800 min-h-screen flex flex-col items-center p-6">

    <!-- Navigation Bar -->
    <nav class="w-full bg-white bg-opacity-80 shadow-md py-4 mb-10">
        <ul class="flex justify-center space-x-12">
            <li><a href="{{ route('home') }}" class="text-gray-800 hover:text-indigo-600 font-semibold text-lg">Home</a></li>
            <li><a href="{{ route('login') }}" class="text-gray-800 hover:text-indigo-600 font-semibold text-lg">Login</a></li>
            <li><a href="{{ route('register') }}" class="text-gray-800 hover:text-indigo-600 font-semibold text-lg">Register</a></li>
            <li><a href="{{ route('contact') }}" class="text-gray-800 hover:text-indigo-600 font-semibold text-lg">Contact</a></li>
        </ul>
    </nav>

    <!-- Contact Section -->
    <div class="flex flex-col lg:flex-row w-full max-w-screen-2xl bg-white shadow-xl rounded-xl p-6 space-y-8 lg:space-y-0 lg:space-x-12">

        <!-- Left Column: Map and Address -->
        <div class="lg:w-1/2">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Find Us</h2>
            <div class="w-full h-72 mb-6">
                <iframe
                    class="w-full h-full rounded-xl"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3410.7482400044983!2d75.70229287546226!3d31.255392074336367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a5f5e9c489cf3%3A0x4049a5409d53c300!2sLovely%20Professional%20University!5e0!3m2!1sen!2sin!4v1731601022975!5m2!1sen!2sin"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <div class="text-gray-800">
                <h3 class="text-xl font-semibold mb-2">Location</h3>
                <p>Lovely Professional University,</p>
                <p>Grand Trunk Road, Kapurthala</p>
                <p>Phone: <span class="font-semibold">9392479356</span></p>
                <p>Email: <a href="mailto:info@lpu.com" class="text-indigo-600 hover:underline">info@lpu.com</a></p>
            </div>
        </div>

        <!-- Right Column: Contact Form -->
        <div class="lg:w-1/2 bg-gray-50 rounded-xl p-8 shadow-lg">
            <h2 class="text-3xl font-semibold text-gray-800 mb-6">Get In Touch</h2>
            <form method="POST" action="{{ route('send.contact') }}" class="space-y-6">
                @csrf
                <div class="flex flex-col">
                    <label for="name" class="text-lg text-gray-700">Name</label>
                    <input type="text" id="name" name="userName" placeholder="Enter your name"
                        class="w-full p-4 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 transition ease-in-out duration-200" required>
                </div>
                <div class="flex flex-col">
                    <label for="email" class="text-lg text-gray-700">Email Address</label>
                    <input type="email" id="email" name="userEmail" placeholder="Enter your email"
                        class="w-full p-4 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 transition ease-in-out duration-200" required>
                </div>
                <div class="flex flex-col">
                    <label for="phone" class="text-lg text-gray-700">Mobile Number</label>
                    <input type="tel" id="phone" name="userPhone" placeholder="Enter your phone number"
                        class="w-full p-4 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 transition ease-in-out duration-200">
                </div>
                <div class="flex flex-col">
                    <label for="message" class="text-lg text-gray-700">Your Message</label>
                    <textarea id="message" name="userMsg" placeholder="Write your message here..."
                        class="w-full p-4 border-2 border-gray-300 rounded-lg h-36 focus:outline-none focus:ring-2 focus:ring-indigo-600 transition ease-in-out duration-200" required></textarea>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 transition duration-300">Send Message</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
