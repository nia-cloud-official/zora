<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zora Database Testing Pot Dashboard</title>
    <link href="./tailwind.min.css" rel="stylesheet">
    <style>
        .bg-dashboard {
            background: linear-gradient(135deg, #e0e7ff 0%, #eef2ff 100%);
        }
    </style>
</head>
<body class="bg-dashboard min-h-screen flex items-center justify-center">
    <div class="w-full max-w-6xl p-6 bg-white rounded-lg shadow-lg">
        <header class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold">Good morning, Mike!</h1>
                <p class="text-gray-500"></p>
            </div>
            <button class="px-4 py-2 bg-black text-white rounded">Add Task</button>
        </header>
        
        <main class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- My activity section -->
            <section class="col-span-2 bg-gray-100 p-4 rounded-lg">
                <h2 class="font-semibold mb-4">My activity</h2>
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <!-- Timeline or activity details here -->
                    <div class="flex items-center justify-between mb-4">
                        <span>Project onboarding</span>
                        <span class="bg-yellow-300 px-2 py-1 rounded">Google Hangouts</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span>Design research</span>
                        <span class="bg-blue-300 px-2 py-1 rounded">In Progress</span>
                    </div>
                </div>
            </section>
            
            <!-- Task sections -->
            <section class="bg-gray-100 p-4 rounded-lg">
                <h2 class="font-semibold mb-4">Terminal</h2>
                <ul>
                    <li class="bg-white p-2 rounded-lg mb-2 shadow-md">
                        <span>Client Review & Feedback</span>
                        <span class="block text-sm text-gray-500">Today 10:00 AM - 11:00 AM</span>
                    </li>
                </ul>
            </section>
            
            <!-- Summary section -->
            <section class="col-span-1 md:col-span-2 bg-gray-100 p-4 rounded-lg">
                <h2 class="font-semibold mb-4">Summary</h2>
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <!-- Summary details or charts here -->
                    <div class="flex items-center justify-between mb-4">
                        <span>Total Done</span>
                        <span class="font-bold">2,543</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span>Hours Saved</span>
                        <span class="font-bold">82%</span>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>