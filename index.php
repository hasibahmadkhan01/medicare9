
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare+ Hospital Management System</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .tab-content { display: none; }
        .tab-content.active { display: block; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col">

    <!-- Top Emergency Bar -->
    <div class="bg-cyan-900 text-cyan-100 text-xs py-2 px-4">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
            <div class="flex items-center gap-4">
                <span><i class="fas fa-phone-alt text-cyan-400 mr-1.5"></i> Emergency Helpline: <strong>+1 (800) 555-MEDICARE</strong></span>
                <span class="hidden md:inline"><i class="fas fa-clock text-cyan-400 mr-1.5"></i> 24/7 Emergency & Trauma Care Available</span>
            </div>
            <div class="flex items-center gap-3">
                <button onclick="switchTab('patient-login')" class="hover:text-white transition">Patient Portal</button>
                <span>|</span>
                <button onclick="switchTab('doctor-login')" class="hover:text-white transition">Doctor Portal</button>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <!-- Logo -->
                <div class="flex items-center gap-3 cursor-pointer" onclick="switchTab('home')">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-cyan-600 to-teal-500 flex items-center justify-center text-white shadow-md shadow-cyan-500/20">
                        <i class="fas fa-hospital-user text-2xl"></i>
                    </div>
                    <div>
                        <span class="text-2xl font-extrabold tracking-tight text-slate-900">Medi<span class="text-cyan-600">Care+</span></span>
                        <span class="block text-[10px] uppercase tracking-widest text-slate-400 font-semibold">Advanced Hospital System <br> made by Hasib Ahmad khan </span>
                    </div>
                </div>

                <!-- Navigation Links -->
                <nav class="hidden md:flex items-center gap-1 lg:gap-2">
                    <button onclick="switchTab('home')" class="nav-btn px-4 py-2 rounded-lg font-medium text-slate-600 hover:text-cyan-600 hover:bg-cyan-50 transition active" data-target="home">Home</button>
                    <button onclick="switchTab('doctors')" class="nav-btn px-4 py-2 rounded-lg font-medium text-slate-600 hover:text-cyan-600 hover:bg-cyan-50 transition" data-target="doctors">Doctors Directory</button>
                    <button onclick="switchTab('appointment')" class="nav-btn px-4 py-2 rounded-lg font-medium text-slate-600 hover:text-cyan-600 hover:bg-cyan-50 transition" data-target="appointment">Book Appointment</button>
                    <button onclick="switchTab('history')" class="nav-btn px-4 py-2 rounded-lg font-medium text-slate-600 hover:text-cyan-600 hover:bg-cyan-50 transition" data-target="history">Patient History</button>
                </nav>

                <!-- Action Buttons -->
                <div class="hidden sm:flex items-center gap-3">
                    <button onclick="switchTab('patient-login')" class="px-4 py-2.5 rounded-xl border border-slate-200 text-slate-700 font-semibold text-sm hover:bg-slate-50 transition">
                        <i class="fas fa-user-circle mr-1.5 text-cyan-600"></i> Login
                    </button>
                    <button onclick="switchTab('appointment')" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-cyan-600 to-teal-600 text-white font-semibold text-sm shadow-md shadow-cyan-600/20 hover:shadow-lg hover:shadow-cyan-600/30 transition">
                        Book Now
                    </button>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button onclick="toggleMobileMenu()" class="p-2 text-slate-600 hover:text-cyan-600 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-b border-slate-200 px-4 pt-2 pb-4 space-y-1">
            <button onclick="switchTab('home'); toggleMobileMenu();" class="block w-full text-left px-3 py-2 rounded-lg font-medium text-slate-700 hover:bg-cyan-50 hover:text-cyan-600">Home</button>
            <button onclick="switchTab('doctors'); toggleMobileMenu();" class="block w-full text-left px-3 py-2 rounded-lg font-medium text-slate-700 hover:bg-cyan-50 hover:text-cyan-600">Doctors Directory</button>
            <button onclick="switchTab('appointment'); toggleMobileMenu();" class="block w-full text-left px-3 py-2 rounded-lg font-medium text-slate-700 hover:bg-cyan-50 hover:text-cyan-600">Book Appointment</button>
            <button onclick="switchTab('history'); toggleMobileMenu();" class="block w-full text-left px-3 py-2 rounded-lg font-medium text-slate-700 hover:bg-cyan-50 hover:text-cyan-600">Patient History</button>
            <div class="pt-2 border-t border-slate-100 flex gap-2">
                <button onclick="switchTab('patient-login'); toggleMobileMenu();" class="flex-1 py-2 text-center border border-slate-200 rounded-lg text-sm font-semibold">Login</button>
                <button onclick="switchTab('appointment'); toggleMobileMenu();" class="flex-1 py-2 text-center bg-cyan-600 text-white rounded-lg text-sm font-semibold">Book</button>
            </div>
        </div>
    </header>

    <!-- Main Container -->
    <main class="flex-grow">

        <!-- ================= PAGE 1: HOME ================= -->
        <div id="home" class="tab-content active">
            <!-- Hero Section -->
            <section class="relative bg-gradient-to-br from-cyan-900 via-cyan-800 to-teal-900 text-white py-20 lg:py-28 overflow-hidden">
                <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                        <div class="lg:col-span-7 space-y-6">
                            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full bg-cyan-800/80 border border-cyan-700 text-cyan-200 text-xs font-semibold uppercase tracking-wider">
                                <i class="fas fa-shield-alt text-cyan-400"></i> Leading Healthcare Provider
                            </span>
                            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight">
                                Your Health Is Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-teal-200">Top Priority</span>
                            </h1>
                            <p class="text-lg text-cyan-100/90 font-light max-w-xl">
                                Experience world-class medical care with state-of-the-art facilities, expert doctors, and personalized patient management designed around you.
                            </p>
                            <div class="flex flex-wrap gap-4 pt-4">
                                <button onclick="switchTab('appointment')" class="px-8 py-4 bg-white text-cyan-900 font-bold rounded-xl shadow-xl hover:bg-cyan-50 transition transform hover:-translate-y-0.5">
                                    <i class="fas fa-calendar-check mr-2 text-cyan-600"></i> Book Appointment
                                </button>
                                <button onclick="switchTab('doctors')" class="px-8 py-4 bg-cyan-800/60 border border-cyan-600/50 text-white font-bold rounded-xl hover:bg-cyan-800 transition">
                                    <i class="fas fa-user-md mr-2 text-cyan-300"></i> Meet Our Doctors
                                </button>
                            </div>
                            <!-- Quick Stats -->
                            <div class="grid grid-cols-3 gap-6 pt-8 border-t border-cyan-800/80 mt-8">
                                <div>
                                    <p class="text-3xl font-extrabold text-white">50+</p>
                                    <p class="text-xs text-cyan-200 uppercase tracking-wider mt-1">Expert Doctors</p>
                                </div>
                                <div>
                                    <p class="text-3xl font-extrabold text-white">15k+</p>
                                    <p class="text-xs text-cyan-200 uppercase tracking-wider mt-1">Happy Patients</p>
                                </div>
                                <div>
                                    <p class="text-3xl font-extrabold text-white">24/7</p>
                                    <p class="text-xs text-cyan-200 uppercase tracking-wider mt-1">Emergency Care</p>
                                </div>
                            </div>
                        </div>
                        <div class="lg:col-span-5 relative">
                            <div class="relative mx-auto max-w-md lg:max-w-none">
                                <div class="bg-white/10 backdrop-blur-md p-6 rounded-3xl border border-white/20 shadow-2xl space-y-6">
                                    <div class="flex items-center justify-between pb-4 border-b border-white/10">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-cyan-500 flex items-center justify-center text-white font-bold">
                                                <i class="fas fa-stethoscope"></i>
                                            </div>
                                            <div>
                                                <h4 class="font-bold text-sm">Quick Consultation</h4>
                                                <p class="text-xs text-cyan-200">Available Today</p>
                                            </div>
                                        </div>
                                        <span class="inline-block w-3 h-3 bg-emerald-400 rounded-full animate-pulse"></span>
                                    </div>
                                    <div class="space-y-3">
                                        <div class="p-3 bg-white/5 rounded-xl border border-white/10 flex justify-between items-center">
                                            <span class="text-sm">Cardiology Department</span>
                                            <button onclick="selectDepartmentAndBook('Cardiology')" class="text-xs bg-cyan-600 px-3 py-1.5 rounded-lg font-semibold hover:bg-cyan-500 transition">Book</button>
                                        </div>
                                        <div class="p-3 bg-white/5 rounded-xl border border-white/10 flex justify-between items-center">
                                            <span class="text-sm">Neurology Department</span>
                                            <button onclick="selectDepartmentAndBook('Neurology')" class="text-xs bg-cyan-600 px-3 py-1.5 rounded-lg font-semibold hover:bg-cyan-500 transition">Book</button>
                                        </div>
                                        <div class="p-3 bg-white/5 rounded-xl border border-white/10 flex justify-between items-center">
                                            <span class="text-sm">Pediatrics Department</span>
                                            <button onclick="selectDepartmentAndBook('Pediatrics')" class="text-xs bg-cyan-600 px-3 py-1.5 rounded-lg font-semibold hover:bg-cyan-500 transition">Book</button>
                                        </div>
                                    </div>
                                    <button onclick="switchTab('appointment')" class="w-full py-3 bg-cyan-500 hover:bg-cyan-400 text-cyan-950 font-bold rounded-xl transition text-sm">
                                        View All Departments & Doctors
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Departments Section -->
            <section class="py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
                    <span class="text-cyan-600 font-bold text-xs uppercase tracking-widest bg-cyan-50 px-3 py-1 rounded-full border border-cyan-100">Centers of Excellence</span>
                    <h2 class="text-3xl font-extrabold text-slate-900">Our Medical Departments</h2>
                    <p class="text-slate-500 text-sm">We offer specialized medical treatments and diagnostics delivered by leading specialists in the field.</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Dept 1 -->
                    <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:border-cyan-200 transition group">
                        <div class="w-14 h-14 rounded-2xl bg-cyan-50 text-cyan-600 flex items-center justify-center text-2xl mb-6 group-hover:bg-cyan-600 group-hover:text-white transition">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Cardiology</h3>
                        <p class="text-slate-500 text-sm mb-6">Comprehensive heart care, preventive diagnostics, ECG, echocardiography, and surgical interventions.</p>
                        <button onclick="selectDepartmentAndBook('Cardiology')" class="text-cyan-600 font-semibold text-sm flex items-center gap-1.5 group-hover:gap-2.5 transition">
                            Book Consultation <i class="fas fa-arrow-right text-xs"></i>
                        </button>
                    </div>
                    <!-- Dept 2 -->
                    <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:border-cyan-200 transition group">
                        <div class="w-14 h-14 rounded-2xl bg-cyan-50 text-cyan-600 flex items-center justify-center text-2xl mb-6 group-hover:bg-cyan-600 group-hover:text-white transition">
                            <i class="fas fa-brain"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Neurology</h3>
                        <p class="text-slate-500 text-sm mb-6">Expert care for neurological disorders, stroke management, headaches, spine care, and brain diagnostics.</p>
                        <button onclick="selectDepartmentAndBook('Neurology')" class="text-cyan-600 font-semibold text-sm flex items-center gap-1.5 group-hover:gap-2.5 transition">
                            Book Consultation <i class="fas fa-arrow-right text-xs"></i>
                        </button>
                    </div>
                    <!-- Dept 3 -->
                    <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:border-cyan-200 transition group">
                        <div class="w-14 h-14 rounded-2xl bg-cyan-50 text-cyan-600 flex items-center justify-center text-2xl mb-6 group-hover:bg-cyan-600 group-hover:text-white transition">
                            <i class="fas fa-bone"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Orthopedics</h3>
                        <p class="text-slate-500 text-sm mb-6">Joint replacement, sports injuries, fracture care, spinal surgery, and physical rehabilitation.</p>
                        <button onclick="selectDepartmentAndBook('Orthopedics')" class="text-cyan-600 font-semibold text-sm flex items-center gap-1.5 group-hover:gap-2.5 transition">
                            Book Consultation <i class="fas fa-arrow-right text-xs"></i>
                        </button>
                    </div>
                    <!-- Dept 4 -->
                    <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:border-cyan-200 transition group">
                        <div class="w-14 h-14 rounded-2xl bg-cyan-50 text-cyan-600 flex items-center justify-center text-2xl mb-6 group-hover:bg-cyan-600 group-hover:text-white transition">
                            <i class="fas fa-child"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Pediatrics</h3>
                        <p class="text-slate-500 text-sm mb-6">Dedicated healthcare for infants, children, and adolescents with vaccination and growth monitoring.</p>
                        <button onclick="selectDepartmentAndBook('Pediatrics')" class="text-cyan-600 font-semibold text-sm flex items-center gap-1.5 group-hover:gap-2.5 transition">
                            Book Consultation <i class="fas fa-arrow-right text-xs"></i>
                        </button>
                    </div>
                    <!-- Dept 5 -->
                    <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:border-cyan-200 transition group">
                        <div class="w-14 h-14 rounded-2xl bg-cyan-50 text-cyan-600 flex items-center justify-center text-2xl mb-6 group-hover:bg-cyan-600 group-hover:text-white transition">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Ophthalmology</h3>
                        <p class="text-slate-500 text-sm mb-6">Advanced eye testing, cataract surgery, LASIK laser vision correction, and glaucoma treatment.</p>
                        <button onclick="selectDepartmentAndBook('Ophthalmology')" class="text-cyan-600 font-semibold text-sm flex items-center gap-1.5 group-hover:gap-2.5 transition">
                            Book Consultation <i class="fas fa-arrow-right text-xs"></i>
                        </button>
                    </div>
                    <!-- Dept 6 -->
                    <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:border-cyan-200 transition group">
                        <div class="w-14 h-14 rounded-2xl bg-cyan-50 text-cyan-600 flex items-center justify-center text-2xl mb-6 group-hover:bg-cyan-600 group-hover:text-white transition">
                            <i class="fas fa-tooth"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Dental Surgery</h3>
                        <p class="text-slate-500 text-sm mb-6">Cosmetic dentistry, root canals, dental implants, orthodontics, and painless oral surgery.</p>
                        <button onclick="selectDepartmentAndBook('Dental Surgery')" class="text-cyan-600 font-semibold text-sm flex items-center gap-1.5 group-hover:gap-2.5 transition">
                            Book Consultation <i class="fas fa-arrow-right text-xs"></i>
                        </button>
                    </div>
                </div>
            </section>
        </div>

        <!-- ================= PAGE 2: DOCTORS DIRECTORY & PROFILE ================= -->
        <div id="doctors" class="tab-content">
            <section class="py-12 bg-slate-100 border-b border-slate-200">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                        <div>
                            <h1 class="text-3xl font-extrabold text-slate-900">Find a Doctor</h1>
                            <p class="text-slate-500 text-sm mt-1">Browse our verified medical specialists and book your consultation instantly.</p>
                        </div>
                        <div class="flex flex-wrap gap-3 w-full md:w-auto">
                            <input type="text" id="doctor-search" oninput="filterDoctors()" placeholder="Search by name or specialty..." class="px-4 py-2.5 bg-white border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 w-full md:w-72">
                            <select id="department-filter" onchange="filterDoctors()" class="px-4 py-2.5 bg-white border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                                <option value="">All Departments</option>
                                <option value="Cardiology">Cardiology</option>
                                <option value="Neurology">Neurology</option>
                                <option value="Orthopedics">Orthopedics</option>
                                <option value="Pediatrics">Pediatrics</option>
                                <option value="Ophthalmology">Ophthalmology</option>
                                <option value="Dental Surgery">Dental Surgery</option>
                            </select>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div id="doctors-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Populated by JS -->
                </div>
            </section>
        </div>

        <!-- Doctor Profile Detail View (Sub-view or modal simulation) -->
        <div id="doctor-profile-modal" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
            <div class="bg-white rounded-3xl max-w-2xl w-full p-8 shadow-2xl relative max-h-[90vh] overflow-y-auto">
                <button onclick="closeDoctorProfile()" class="absolute top-6 right-6 w-10 h-10 bg-slate-100 hover:bg-slate-200 rounded-full flex items-center justify-center text-slate-600 transition">
                    <i class="fas fa-times"></i>
                </button>
                <div id="doctor-profile-content">
                    <!-- Populated dynamically -->
                </div>
            </div>
        </div>

        <!-- ================= PAGE 3: APPOINTMENT RESERVATION ================= -->
        <div id="appointment" class="tab-content">
            <section class="py-16 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-3xl border border-slate-200 shadow-xl overflow-hidden">
                    <div class="bg-gradient-to-r from-cyan-900 to-teal-900 p-8 text-white">
                        <span class="text-cyan-300 text-xs font-semibold uppercase tracking-widest bg-cyan-800/80 px-3 py-1 rounded-full">Easy Scheduling</span>
                        <h1 class="text-3xl font-extrabold mt-3">Book an Appointment</h1>
                        <p class="text-cyan-100 text-sm mt-1">Select your preferred department, doctor, date, and time slot.</p>
                    </div>

                    <form id="appointment-form" onsubmit="handleAppointmentSubmit(event)" class="p-8 space-y-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Select Department *</label>
                                <select id="app-dept" onchange="updateDoctorsDropdown()" required class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                                    <option value="">-- Choose Department --</option>
                                    <option value="Cardiology">Cardiology</option>
                                    <option value="Neurology">Neurology</option>
                                    <option value="Orthopedics">Orthopedics</option>
                                    <option value="Pediatrics">Pediatrics</option>
                                    <option value="Ophthalmology">Ophthalmology</option>
                                    <option value="Dental Surgery">Dental Surgery</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Select Doctor *</label>
                                <select id="app-doctor" required class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                                    <option value="">-- Choose Doctor --</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Preferred Date *</label>
                                <input type="date" id="app-date" required class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Time Slot *</label>
                                <select id="app-time" required class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                                    <option value="">-- Choose Time Slot --</option>
                                    <option value="09:00 AM - 10:00 AM">09:00 AM - 10:00 AM</option>
                                    <option value="10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
                                    <option value="11:30 AM - 12:30 PM">11:30 AM - 12:30 PM</option>
                                    <option value="02:00 PM - 03:00 PM">02:00 PM - 03:00 PM</option>
                                    <option value="03:30 PM - 04:30 PM">03:30 PM - 04:30 PM</option>
                                    <option value="05:00 PM - 06:00 PM">05:00 PM - 06:00 PM</option>
                                </select>
                            </div>
                        </div>

                        <div class="border-t border-slate-200 pt-6">
                            <h3 class="font-bold text-slate-900 mb-4 text-base">Patient Information</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Full Name *</label>
                                    <input type="text" id="app-name" placeholder="John Doe" required class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Phone Number *</label>
                                    <input type="tel" id="app-phone" placeholder="+1 (555) 000-0000" required class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Email Address *</label>
                                    <input type="email" id="app-email" placeholder="john@example.com" required class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Age / Gender *</label>
                                    <input type="text" id="app-age-gender" placeholder="e.g. 32 / Male" required class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                                </div>
                            </div>
                            <div class="mt-6">
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Symptoms or Chief Complaint</label>
                                <textarea id="app-symptoms" rows="3" placeholder="Briefly describe your symptoms or reason for visit..." class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"></textarea>
                            </div>
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="w-full py-4 bg-gradient-to-r from-cyan-600 to-teal-600 text-white font-bold rounded-xl shadow-lg shadow-cyan-600/30 hover:shadow-xl transition">
                                Confirm & Book Appointment
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        </div>

        <!-- ================= PAGE 4: PATIENT HISTORY ================= -->
        <div id="history" class="tab-content">
            <section class="py-16 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-3xl border border-slate-200 shadow-xl overflow-hidden p-8">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 pb-6 border-b border-slate-200 mb-8">
                        <div>
                            <span class="text-cyan-600 font-semibold text-xs uppercase tracking-widest bg-cyan-50 px-3 py-1 rounded-full">Medical Records</span>
                            <h1 class="text-3xl font-extrabold text-slate-900 mt-2">Patient Consultation & Visit History</h1>
                            <p class="text-slate-500 text-sm mt-1">Review your prior diagnoses, prescribed medications, and appointment status.</p>
                        </div>
                        <div class="flex items-center gap-3 w-full md:w-auto">
                            <input type="text" id="history-search" oninput="filterHistory()" placeholder="Search by patient name..." class="px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 w-full md:w-64">
                            <button onclick="switchTab('appointment')" class="px-4 py-2.5 bg-cyan-600 text-white font-semibold text-sm rounded-xl hover:bg-cyan-500 transition whitespace-nowrap">
                                <i class="fas fa-plus mr-1"></i> New Booking
                            </button>
                        </div>
                    </div>

                    <!-- History Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 border-b border-slate-200 text-xs font-bold uppercase tracking-wider text-slate-500">
                                    <th class="p-4 rounded-l-xl">Patient Name</th>
                                    <th class="p-4">Doctor & Dept</th>
                                    <th class="p-4">Date & Time</th>
                                    <th class="p-4">Diagnosis / Notes</th>
                                    <th class="p-4">Status</th>
                                    <th class="p-4 rounded-r-xl text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="history-table-body" class="divide-y divide-slate-100 text-sm">
                                <!-- Populated dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>

        <!-- ================= PAGE 5: PATIENT LOGIN & REGISTRATION ================= -->
        <div id="patient-login" class="tab-content">
            <section class="py-20 max-w-md mx-auto px-4">
                <div class="bg-white rounded-3xl border border-slate-200 shadow-xl p-8">
                    <div class="text-center mb-8">
                        <div class="w-14 h-14 bg-cyan-50 text-cyan-600 rounded-2xl mx-auto flex items-center justify-center text-2xl mb-3 shadow-inner">
                            <i class="fas fa-user-injured"></i>
                        </div>
                        <h1 class="text-2xl font-extrabold text-slate-900">Patient Portal Login</h1>
                        <p class="text-slate-500 text-sm mt-1">Access your medical records and bookings</p>
                    </div>

                    <form onsubmit="handlePatientLogin(event)" class="space-y-5">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Email Address</label>
                            <input type="email" id="pat-email" placeholder="patient@example.com" required class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Password</label>
                            <input type="password" id="pat-pass" placeholder="••••••••" required class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                        </div>
                        <button type="submit" class="w-full py-3.5 bg-cyan-600 hover:bg-cyan-500 text-white font-bold rounded-xl shadow-lg shadow-cyan-600/30 transition text-sm">
                            Sign In to Portal
                        </button>
                    </form>

                    <div class="mt-6 text-center text-sm text-slate-500 border-t border-slate-100 pt-6">
                        Don't have an account? 
                        <button onclick="switchTab('appointment')" class="text-cyan-600 font-semibold hover:underline">Book an appointment to register</button>
                    </div>
                </div>
            </section>
        </div>

        <!-- ================= PAGE 6: DOCTOR LOGIN & DASHBOARD ================= -->
        <div id="doctor-login" class="tab-content">
            <section class="py-20 max-w-md mx-auto px-4" id="doctor-login-card">
                <div class="bg-white rounded-3xl border border-slate-200 shadow-xl p-8">
                    <div class="text-center mb-8">
                        <div class="w-14 h-14 bg-teal-50 text-teal-600 rounded-2xl mx-auto flex items-center justify-center text-2xl mb-3 shadow-inner">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <h1 class="text-2xl font-extrabold text-slate-900">Doctor Portal Login</h1>
                        <p class="text-slate-500 text-sm mt-1">Manage appointments & patient diagnostics</p>
                    </div>

                    <form onsubmit="handleDoctorLogin(event)" class="space-y-5">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Doctor Email / ID</label>
                            <input type="email" id="doc-email" value="dr.sarah@medicare.com" required class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-500">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Password</label>
                            <input type="password" id="doc-pass" value="password" required class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-500">
                        </div>
                        <button type="submit" class="w-full py-3.5 bg-teal-600 hover:bg-teal-500 text-white font-bold rounded-xl shadow-lg shadow-teal-600/30 transition text-sm">
                            Doctor Sign In
                        </button>
                    </form>
                    <div class="mt-4 p-3 bg-slate-50 rounded-xl text-xs text-slate-500 text-center">
                        Demo Login: <strong class="text-slate-700">dr.sarah@medicare.com</strong> / password
                    </div>
                </div>
            </section>

            <!-- Doctor Dashboard (Hidden until login) -->
            <section id="doctor-dashboard" class="hidden py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-3xl border border-slate-200 shadow-xl p-8">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 pb-6 border-b border-slate-200 mb-8">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-2xl bg-teal-600 text-white flex items-center justify-center text-3xl font-bold">
                                <i class="fas fa-user-md"></i>
                            </div>
                            <div>
                                <span class="text-teal-600 font-semibold text-xs uppercase tracking-widest bg-teal-50 px-3 py-1 rounded-full">Doctor Workspace</span>
                                <h1 id="doc-dash-name" class="text-2xl font-extrabold text-slate-900 mt-1">Dr. Sarah Jenkins</h1>
                                <p id="doc-dash-spec" class="text-slate-500 text-sm">Cardiologist (MBBS, MD - Cardiology)</p>
                            </div>
                        </div>
                        <button onclick="handleDoctorLogout()" class="px-4 py-2 border border-red-200 text-red-600 hover:bg-red-50 font-semibold text-sm rounded-xl transition">
                            <i class="fas fa-sign-out-alt mr-1.5"></i> Logout
                        </button>
                    </div>

                    <!-- Dashboard Stats Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
                        <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200">
                            <p class="text-slate-400 text-xs font-bold uppercase tracking-wider">Total Appointments</p>
                            <p id="doc-stat-total" class="text-3xl font-extrabold text-slate-900 mt-2">0</p>
                        </div>
                        <div class="bg-cyan-50 p-6 rounded-2xl border border-cyan-100">
                            <p class="text-cyan-600 text-xs font-bold uppercase tracking-wider">Pending Review</p>
                            <p id="doc-stat-pending" class="text-3xl font-extrabold text-cyan-900 mt-2">0</p>
                        </div>
                        <div class="bg-emerald-50 p-6 rounded-2xl border border-emerald-100">
                            <p class="text-emerald-600 text-xs font-bold uppercase tracking-wider">Completed / Approved</p>
                            <p id="doc-stat-completed" class="text-3xl font-extrabold text-emerald-900 mt-2">0</p>
                        </div>
                    </div>

                    <!-- Appointment Requests Table -->
                    <h3 class="font-bold text-lg text-slate-900 mb-4">Patient Appointments Queue</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 border-b border-slate-200 text-xs font-bold uppercase tracking-wider text-slate-500">
                                    <th class="p-4 rounded-l-xl">Patient Details</th>
                                    <th class="p-4">Contact Info</th>
                                    <th class="p-4">Date & Time</th>
                                    <th class="p-4">Symptoms</th>
                                    <th class="p-4">Status</th>
                                    <th class="p-4 rounded-r-xl text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="doc-appointments-body" class="divide-y divide-slate-100 text-sm">
                                <!-- Populated dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>

    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-400 py-16 border-t border-slate-800 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-cyan-600 flex items-center justify-center text-white font-bold">
                            <i class="fas fa-hospital-user"></i>
                        </div>
                        <span class="text-xl font-extrabold text-white">Medi<span class="text-cyan-400">Care+</span></span>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed">
                        Providing exceptional healthcare services with advanced medical technology and compassionate professionals 24/7.
                    </p>
                </div>
                <div>
                    <h4 class="text-white font-bold text-sm uppercase tracking-wider mb-4">Quick Links</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><button onclick="switchTab('home')" class="hover:text-cyan-400 transition">Home</button></li>
                        <li><button onclick="switchTab('doctors')" class="hover:text-cyan-400 transition">Doctors Directory</button></li>
                        <li><button onclick="switchTab('appointment')" class="hover:text-cyan-400 transition">Book Appointment</button></li>
                        <li><button onclick="switchTab('history')" class="hover:text-cyan-400 transition">Patient History</button></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold text-sm uppercase tracking-wider mb-4">Departments</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><button onclick="selectDepartmentAndBook('Cardiology')" class="hover:text-cyan-400 transition">Cardiology</button></li>
                        <li><button onclick="selectDepartmentAndBook('Neurology')" class="hover:text-cyan-400 transition">Neurology</button></li>
                        <li><button onclick="selectDepartmentAndBook('Orthopedics')" class="hover:text-cyan-400 transition">Orthopedics</button></li>
                        <li><button onclick="selectDepartmentAndBook('Pediatrics')" class="hover:text-cyan-400 transition">Pediatrics</button></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold text-sm uppercase tracking-wider mb-4">Emergency Contact</h4>
                    <p class="text-sm text-slate-300 font-semibold mb-2"><i class="fas fa-phone-alt text-cyan-400 mr-2"></i> +1 (800) 555-MEDICARE</p>
                    <p class="text-sm text-slate-400 mb-4"><i class="fas fa-envelope text-cyan-400 mr-2"></i> hasibahmad@medicare.com</p>
                    <p class="text-xs text-slate-500">104 Medical Avenue, Health City, NY 10001</p>
                </div>
            </div>
            <div class="border-t border-slate-800 pt-8 flex flex-col sm:flex-row justify-between items-center text-xs">
                <p>&copy; 2026 MediCare+ Hospital Management System. All rights reserved. made by hasib Ahmad khan </p>
                <div class="flex gap-4 mt-4 sm:mt-0">
                    <a href="#" class="hover:text-white transition">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript Data & Logic Connected to PHP Backend -->
    <script>
        let doctorsData = [];
        let appointmentsList = [];

        async function fetchDoctors() {
            try {
                const res = await fetch('api.php?action=get_doctors');
                doctorsData = await res.json();
            } catch (err) { console.error("Error fetching doctors:", err); }
        }

        async function fetchAppointments() {
            try {
                const res = await fetch('api.php?action=get_appointments');
                appointmentsList = await res.json();
            } catch (err) { console.error("Error fetching appointments:", err); }
        }

        async function initData() {
            await fetchDoctors();
            await fetchAppointments();
        }
        initData();

        // Tab Switching Logic
        function switchTab(tabId) {
            document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
            const target = document.getElementById(tabId);
            if (target) target.classList.add('active');

            document.querySelectorAll('.nav-btn').forEach(btn => {
                if (btn.getAttribute('data-target') === tabId) {
                    btn.classList.add('text-cyan-600', 'bg-cyan-50');
                } else {
                    btn.classList.remove('text-cyan-600', 'bg-cyan-50');
                }
            });

            window.scrollTo({ top: 0, behavior: 'smooth' });
            if (tabId === 'doctors') renderDoctors(doctorsData);
            if (tabId === 'history') renderHistoryTable();
            if (tabId === 'appointment') populateAppDoctorsDropdown();
        }

        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        // Render Doctors Directory
        function renderDoctors(list) {
            const grid = document.getElementById('doctors-grid');
            grid.innerHTML = '';
            if (list.length === 0) {
                grid.innerHTML = `<div class="col-span-full text-center py-12 text-slate-400">No doctors found matching your criteria.</div>`;
                return;
            }
            list.forEach(doc => {
                grid.innerHTML += `
                    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl transition flex flex-col">
                        <div class="relative h-64 bg-slate-200 overflow-hidden">
                            <img src="${doc.image}" alt="${doc.name}" class="w-full h-full object-cover object-top hover:scale-105 transition duration-500">
                            <span class="absolute top-4 right-4 bg-white/90 backdrop-blur-xs text-slate-900 text-xs font-bold px-3 py-1 rounded-full shadow-sm">
                                <i class="fas fa-star text-amber-400 mr-1"></i> ${doc.rating} (${doc.reviews_count || doc.reviewsCount})
                            </span>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <span class="text-xs font-bold text-cyan-600 uppercase tracking-widest bg-cyan-50 px-2.5 py-1 rounded-md self-start mb-2">${doc.department}</span>
                            <h3 class="text-xl font-bold text-slate-900">${doc.name}</h3>
                            <p class="text-slate-500 text-xs mt-0.5">${doc.specialty} • ${doc.experience}</p>
                            <p class="text-slate-600 text-xs mt-3 line-clamp-2">${doc.bio}</p>
                            <div class="mt-auto pt-6 flex items-center gap-3 border-t border-slate-100">
                                <button onclick="openDoctorProfile(${doc.id})" class="flex-1 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs rounded-xl transition">
                                    View Profile
                                </button>
                                <button onclick="bookWithDoctor('${doc.department}', '${doc.name}')" class="flex-1 py-2.5 bg-cyan-600 hover:bg-cyan-500 text-white font-semibold text-xs rounded-xl shadow-md shadow-cyan-600/20 transition">
                                    Book Visit
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            });
        }

        function filterDoctors() {
            const query = document.getElementById('doctor-search').value.toLowerCase();
            const dept = document.getElementById('department-filter').value;
            const filtered = doctorsData.filter(doc => {
                const matchesQuery = doc.name.toLowerCase().includes(query) || doc.specialty.toLowerCase().includes(query);
                const matchesDept = dept === "" || doc.department === dept;
                return matchesQuery && matchesDept;
            });
            renderDoctors(filtered);
        }

        // Doctor Profile Modal
        function openDoctorProfile(id) {
            const doc = doctorsData.find(d => d.id == id);
            if (!doc) return;
            const content = document.getElementById('doctor-profile-content');
            content.innerHTML = `
                <div class="flex flex-col sm:flex-row gap-6 items-center sm:items-start pb-6 border-b border-slate-200">
                    <img src="${doc.image}" alt="${doc.name}" class="w-32 h-32 rounded-2xl object-cover shadow-md">
                    <div class="text-center sm:text-left">
                        <span class="text-xs font-bold text-cyan-600 uppercase tracking-widest bg-cyan-50 px-2.5 py-1 rounded-md">${doc.department}</span>
                        <h2 class="text-2xl font-extrabold text-slate-900 mt-2">${doc.name}</h2>
                        <p class="text-slate-600 text-sm">${doc.specialty}</p>
                        <p class="text-slate-400 text-xs mt-1"><i class="fas fa-clock mr-1 text-cyan-500"></i> ${doc.schedule}</p>
                        <div class="flex items-center justify-center sm:justify-start gap-2 mt-3">
                            <span class="text-amber-500 text-sm"><i class="fas fa-star"></i> <strong>${doc.rating}</strong>/5.0</span>
                            <span class="text-slate-400 text-xs">(${doc.reviews_count || doc.reviewsCount} patient reviews)</span>
                        </div>
                    </div>
                </div>
                <div class="py-6 space-y-4">
                    <div>
                        <h4 class="font-bold text-slate-900 text-sm uppercase tracking-wider mb-2">About Doctor</h4>
                        <p class="text-slate-600 text-sm leading-relaxed">${doc.bio}</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 text-sm uppercase tracking-wider mb-2">Experience & Credentials</h4>
                        <p class="text-slate-600 text-sm">${doc.experience} at top accredited hospitals with board certification.</p>
                    </div>
                </div>
                <div class="pt-4 border-t border-slate-200 flex gap-4">
                    <button onclick="closeDoctorProfile()" class="px-6 py-3 border border-slate-200 text-slate-700 font-semibold text-sm rounded-xl hover:bg-slate-50 transition flex-1">
                        Close
                    </button>
                    <button onclick="closeDoctorProfile(); bookWithDoctor('${doc.department}', '${doc.name}');" class="px-6 py-3 bg-cyan-600 text-white font-semibold text-sm rounded-xl hover:bg-cyan-500 transition flex-1 shadow-md shadow-cyan-600/20">
                        Book Appointment
                    </button>
                </div>
            `;
            document.getElementById('doctor-profile-modal').classList.remove('hidden');
        }

        function closeDoctorProfile() {
            document.getElementById('doctor-profile-modal').classList.add('hidden');
        }

        // Appointment Booking Helpers
        function selectDepartmentAndBook(dept) {
            switchTab('appointment');
            document.getElementById('app-dept').value = dept;
            updateDoctorsDropdown();
        }

        function bookWithDoctor(dept, doctorName) {
            switchTab('appointment');
            document.getElementById('app-dept').value = dept;
            updateDoctorsDropdown();
            document.getElementById('app-doctor').value = doctorName;
        }

        function updateDoctorsDropdown() {
            const dept = document.getElementById('app-dept').value;
            const docSelect = document.getElementById('app-doctor');
            docSelect.innerHTML = '<option value="">-- Choose Doctor --</option>';
            const filtered = doctorsData.filter(d => d.department === dept);
            filtered.forEach(d => {
                docSelect.innerHTML += `<option value="${d.name}">${d.name} (${d.specialty})</option>`;
            });
        }

        function populateAppDoctorsDropdown() {
            const deptSelect = document.getElementById('app-dept');
            if (deptSelect.value) {
                updateDoctorsDropdown();
            }
        }

        async function handleAppointmentSubmit(event) {
            event.preventDefault();
            const payload = {
                patientName: document.getElementById('app-name').value,
                phone: document.getElementById('app-phone').value,
                email: document.getElementById('app-email').value,
                ageGender: document.getElementById('app-age-gender').value,
                department: document.getElementById('app-dept').value,
                doctor: document.getElementById('app-doctor').value,
                date: document.getElementById('app-date').value,
                time: document.getElementById('app-time').value,
                symptoms: document.getElementById('app-symptoms').value || "General Checkup"
            };

            try {
                const response = await fetch('api.php?action=book_appointment', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(payload)
                });
                const result = await response.json();
                if (result.success) {
                    alert("Appointment successfully booked! Your Booking ID is " + result.id);
                    document.getElementById('appointment-form').reset();
                    await fetchAppointments();
                    switchTab('history');
                } else {
                    alert("Failed to book appointment. Please try again.");
                }
            } catch (err) {
                console.error("Booking error:", err);
            }
        }

        // Render Patient History Table
        function renderHistoryTable() {
            const tbody = document.getElementById('history-table-body');
            tbody.innerHTML = '';
            appointmentsList.forEach(app => {
                let badgeClass = "bg-amber-100 text-amber-800";
                if (app.status === "Approved") badgeClass = "bg-cyan-100 text-cyan-800";
                if (app.status === "Completed") badgeClass = "bg-emerald-100 text-emerald-800";
                if (app.status === "Cancelled") badgeClass = "bg-red-100 text-red-800";

                tbody.innerHTML += `
                    <tr class="hover:bg-slate-50 transition border-b border-slate-100">
                        <td class="p-4 font-bold text-slate-900">
                            ${app.patient_name || app.patientName}
                            <span class="block text-xs font-normal text-slate-400">${app.age_gender || app.ageGender} • ${app.phone}</span>
                        </td>
                        <td class="p-4">
                            <span class="font-semibold text-slate-800">${app.doctor}</span>
                            <span class="block text-xs text-cyan-600">${app.department}</span>
                        </td>
                        <td class="p-4 text-slate-600">
                            ${app.appointment_date || app.date}
                            <span class="block text-xs text-slate-400">${app.time_slot || app.time}</span>
                        </td>
                        <td class="p-4 text-slate-600 max-w-xs">
                            <p class="font-medium text-xs text-slate-700">Complaint: ${app.symptoms}</p>
                            <p class="text-xs text-slate-500 mt-1">Diagnosis: ${app.diagnosis}</p>
                        </td>
                        <td class="p-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold ${badgeClass}">${app.status}</span>
                        </td>
                        <td class="p-4 text-right">
                            <button onclick="viewReceipt('${app.id}')" class="px-3 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs rounded-lg transition">
                                <i class="fas fa-file-invoice mr-1"></i> Details
                            </button>
                        </td>
                    </tr>
                `;
            });
        }

        function filterHistory() {
            const query = document.getElementById('history-search').value.toLowerCase();
            const filtered = appointmentsList.filter(app => (app.patient_name || app.patientName).toLowerCase().includes(query) || app.id.toLowerCase().includes(query));
            const tbody = document.getElementById('history-table-body');
            tbody.innerHTML = '';
            filtered.forEach(app => {
                let badgeClass = "bg-amber-100 text-amber-800";
                if (app.status === "Approved") badgeClass = "bg-cyan-100 text-cyan-800";
                if (app.status === "Completed") badgeClass = "bg-emerald-100 text-emerald-800";

                tbody.innerHTML += `
                    <tr class="hover:bg-slate-50 transition border-b border-slate-100">
                        <td class="p-4 font-bold text-slate-900">
                            ${app.patient_name || app.patientName}
                            <span class="block text-xs font-normal text-slate-400">${app.age_gender || app.ageGender} • ${app.phone}</span>
                        </td>
                        <td class="p-4">
                            <span class="font-semibold text-slate-800">${app.doctor}</span>
                            <span class="block text-xs text-cyan-600">${app.department}</span>
                        </td>
                        <td class="p-4 text-slate-600">
                            ${app.appointment_date || app.date}
                            <span class="block text-xs text-slate-400">${app.time_slot || app.time}</span>
                        </td>
                        <td class="p-4 text-slate-600 max-w-xs">
                            <p class="font-medium text-xs text-slate-700">Complaint: ${app.symptoms}</p>
                            <p class="text-xs text-slate-500 mt-1">Diagnosis: ${app.diagnosis}</p>
                        </td>
                        <td class="p-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold ${badgeClass}">${app.status}</span>
                        </td>
                        <td class="p-4 text-right">
                            <button onclick="viewReceipt('${app.id}')" class="px-3 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs rounded-lg transition">
                                Details
                            </button>
                        </td>
                    </tr>
                `;
            });
        }

        function viewReceipt(id) {
            const app = appointmentsList.find(a => a.id === id);
            if (!app) return;
            alert(`=== MEDICARE+ APPOINTMENT SLIP ===\n\nBooking ID: ${app.id}\nPatient: ${app.patient_name || app.patientName} (${app.age_gender || app.ageGender})\nDoctor: ${app.doctor} (${app.department})\nDate & Time: ${app.appointment_date || app.date} | ${app.time_slot || app.time}\nSymptoms: ${app.symptoms}\nDiagnosis: ${app.diagnosis}\nStatus: ${app.status}`);
        }

        // Patient Login
        function handlePatientLogin(event) {
            event.preventDefault();
            alert("Login successful! Welcome to your MediCare+ patient portal.");
            switchTab('history');
        }

        // Doctor Login & Dashboard
        async function handleDoctorLogin(event) {
            event.preventDefault();
            document.getElementById('doctor-login-card').classList.add('hidden');
            document.getElementById('doctor-dashboard').classList.remove('hidden');
            await fetchAppointments();
            renderDoctorDashboard();
        }

        function handleDoctorLogout() {
            document.getElementById('doctor-dashboard').classList.add('hidden');
            document.getElementById('doctor-login-card').classList.remove('hidden');
        }

        function renderDoctorDashboard() {
            const total = appointmentsList.length;
            const pending = appointmentsList.filter(a => a.status === 'Pending').length;
            const completed = appointmentsList.filter(a => a.status === 'Approved' || a.status === 'Completed').length;

            document.getElementById('doc-stat-total').innerText = total;
            document.getElementById('doc-stat-pending').innerText = pending;
            document.getElementById('doc-stat-completed').innerText = completed;

            const tbody = document.getElementById('doc-appointments-body');
            tbody.innerHTML = '';
            appointmentsList.forEach(app => {
                tbody.innerHTML += `
                    <tr class="hover:bg-slate-50 transition border-b border-slate-100">
                        <td class="p-4 font-bold text-slate-900">
                            ${app.patient_name || app.patientName}
                            <span class="block text-xs font-normal text-slate-400">${app.age_gender || app.ageGender}</span>
                        </td>
                        <td class="p-4 text-slate-600 text-xs">
                            ${app.phone}<br>${app.email}
                        </td>
                        <td class="p-4 text-slate-600">
                            ${app.appointment_date || app.date}<br><span class="text-xs text-slate-400">${app.time_slot || app.time}</span>
                        </td>
                        <td class="p-4 text-slate-600 text-xs">
                            ${app.symptoms}
                        </td>
                        <td class="p-4">
                            <span class="px-2.5 py-1 rounded-full text-xs font-semibold ${app.status === 'Pending' ? 'bg-amber-100 text-amber-800' : 'bg-emerald-100 text-emerald-800'}">${app.status}</span>
                        </td>
                        <td class="p-4 text-right space-x-1">
                            <button onclick="updateAppStatus('${app.id}', 'Approved')" class="px-3 py-1.5 bg-teal-600 text-white font-semibold text-xs rounded-lg hover:bg-teal-500 transition">Approve</button>
                            <button onclick="updateAppStatus('${app.id}', 'Completed')" class="px-3 py-1.5 bg-slate-200 text-slate-700 font-semibold text-xs rounded-lg hover:bg-slate-300 transition">Complete</button>
                        </td>
                    </tr>
                `;
            });
        }

        async function updateAppStatus(id, newStatus) {
            try {
                await fetch('api.php?action=update_status', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ id, status: newStatus })
                });
                await fetchAppointments();
                renderDoctorDashboard();
                alert(`Appointment ${id} status updated to ${newStatus}`);
            } catch (err) {
                console.error("Status update error:", err);
            }
        }
    </script>
</body>
</html>

```