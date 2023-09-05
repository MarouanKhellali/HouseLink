@section('title', 'Register Seller')


<x-guest-layout>



    <style>
        .form-header .stepIndicator.active {
            font-weight: 600;
        }

        .form-header .stepIndicator.finish {
            font-weight: 600;
            color: #5a67d8;
        }

        .form-header .stepIndicator::before {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            z-index: 9;
            width: 20px;
            height: 20px;
            background-color: #c3dafe;
            border-radius: 50%;
            border: 3px solid #ebf4ff;
        }

        .form-header .stepIndicator.active::before {
            background-color: #a3bffa;
            border: 3px solid #c3dafe;
        }

        .form-header .stepIndicator.finish::before {
            background-color: #5a67d8;
            border: 3px solid #c3dafe;
        }

        .form-header .stepIndicator::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 8px;
            width: 100%;
            height: 3px;
            background-color: #f3f3f3;
        }

        .form-header .stepIndicator.active::after {
            background-color: #a3bffa;
        }

        .form-header .stepIndicator.finish::after {
            background-color: #5a67d8;
        }

        .form-header .stepIndicator:last-child:after {
            display: none;
        }

        input.invalid {
            border: 2px solid #ffaba5;
        }

        .step {
            display: none;
        }
    </style>


    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <h2 class="mt-6 text-3xl font-bold text-gray-900">
                Welcome
            </h2>
            <p class="mt-2 text-sm text-gray-500">Please sign in to your account</p>
        </div>

        <form id="signUpForm" class="space-y-6" method="POST" action="{{ route('register') }}">
            @csrf
            <!-- start step indicators -->
            <div class="form-header flex gap-3 mb-4 text-xs text-center">
                <span class="stepIndicator flex-1 pb-8 relative">Account Setup</span>
                <span class="stepIndicator flex-1 pb-8 relative">Social Profiles</span>
                <span class="stepIndicator flex-1 pb-8 relative">Personal Details</span>
            </div>
            <div class="step">
                <ul class="grid w-full gap-6 md:grid-cols-2">
                    <li>
                        <input type="radio" id="person" name="type" value="person" class="hidden peer" required>
                        <label for="person"
                            class="inline-flex items-center justify-center w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-green-600 peer-checked:text-green-600 hover:text-green-600">
                            <div class="flex items-center ">
                                <i class="fa-regular fa-user mr-4 text-2xl"></i>
                                <div class="w-full text-lg font-semibold">Person</div>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="company" name="type" value="company" class="hidden peer"
                            required>
                        <label for="company"
                            class="inline-flex items-center justify-center w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-green-600 peer-checked:text-green-600 hover:text-green-600">
                            <div class="flex items-center ">
                                <i class="fa-regular fa-building mr-4 text-2xl"></i>
                                <div class="w-full text-lg font-semibold">Company</div>
                            </div>
                        </label>
                    </li>
                </ul>
            </div>
            <div class="step">
                <div class="mb-5 text-center">
                    <div class="mx-auto w-32 h-32 mb-2 border rounded-full relative bg-gray-100 mb-4 shadow-inset">
                        <img id="selectedImage" class="object-cover w-full h-32 rounded-full" style="display: none;" />
                    </div>
                    <label for="imageInput"
                        class="cursor-pointer inline-flex justify-between items-center focus:outline-none border py-2 px-4 rounded-lg shadow-sm text-left text-gray-600 bg-white hover:bg-gray-100 font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-flex flex-shrink-0 w-6 h-6 -mt-1 mr-1"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <rect x="0" y="0" width="24" height="24" stroke="none">
                            </rect>
                            <path
                                d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                            <circle cx="12" cy="13" r="3" />
                        </svg>
                        Browse Photo
                    </label>
                    <div class="mx-auto w-48 text-gray-500 text-xs text-center mt-1">
                        Click to add profile picture
                    </div>
                    <input name="photo" id="imageInput" accept="image/*" onchange="displayImage()" class="hidden"
                        type="file">
                </div>
            </div>


            <div class="step">
                <p class="text-md text-gray-700 leading-tight text-center mt-8 mb-5">Create your account</p>
                <div class="mb-6">
                    <input type="email" placeholder="Email Address" name="email"
                        class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                        oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                </div>
                <div class="mb-6">
                    <input type="password" placeholder="Password" name="password"
                        class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                        oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                </div>
                <div class="mb-6">
                    <input type="password" placeholder="Confirm Password" name="password"
                        class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                        oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                </div>
            </div> <!-- step two -->
            <div class="step">
                <p class="text-md text-gray-700 leading-tight text-center mt-8 mb-5">Your presence on the social
                    network
                </p>
                <div class="mb-6">
                    <input type="text" placeholder="Linked In" name="linkedin"
                        class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                        oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                </div>
                <div class="mb-6">
                    <input type="text" placeholder="Twitter" name="twitter"
                        class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                        oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                </div>
                <div class="mb-6">
                    <input type="text" placeholder="Facebook" name="facebook"
                        class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                        oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                </div>
            </div> <!-- step three -->
            <div class="step">
                <p class="text-md text-gray-700 leading-tight text-center mt-8 mb-5">We will never sell it</p>
                <div class="mb-6">
                    <input type="text" placeholder="Full name" name="fullname"
                        class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                        oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                </div>
                <div class="mb-6">
                    <input type="text" placeholder="Mobile" name="mobile"
                        class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                        oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                </div>
                <div class="mb-6">
                    <input type="text" placeholder="Address" name="address"
                        class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                        oninput="this.className = 'w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200'" />
                </div>
            </div>
            <div class="form-footer flex gap-3">
                <button type="button" id="prevBtn"
                    class="flex-1 focus:outline-none border border-gray-300 py-2 px-5 rounded-lg shadow-sm text-center text-gray-700 bg-white hover:bg-gray-100 text-lg"
                    onclick="nextPrev(-1)">
                    Previous
                </button>
                <button type="button" id="nextBtn"
                    class="flex-1 border border-transparent focus:outline-none p-3 rounded-md text-center text-white bg-indigo-600 hover:bg-indigo-700 text-lg"
                    onclick="nextPrev(1)">
                    Next
                </button>
            </div>
        </form>
    </div>

    <script>
        var currentTab = 0;

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("step");
            x[n].style.display = "block";

            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }

            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n);
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("step");

            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;

            // Hide the current tab:
            x[currentTab].style.display = "none";

            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;

            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("signUpForm").submit();
                return false;
            }

            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("step");
            y = x[currentTab].getElementsByTagName("input");

            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }

            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("stepIndicator")[currentTab].className += " finish";
            }

            return valid;
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("stepIndicator");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }

            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }

        // Initialize by showing the first tab
        showTab(currentTab);
    </script>

    <script>
        function displayImage() {
            const imageInput = document.getElementById('imageInput');
            const selectedImage = document.getElementById('selectedImage');

            if (imageInput.files && imageInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    selectedImage.src = e.target.result;
                    selectedImage.style.display = 'block';
                };

                reader.readAsDataURL(imageInput.files[0]);
            }
        }

        function app() {
            return {

                checkPasswordStrength() {
                    var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
                    var mediumRegex = new RegExp(
                        "^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");

                    let value = this.password;

                    if (strongRegex.test(value)) {
                        this.passwordStrengthText = "Strong password";
                    } else if (mediumRegex.test(value)) {
                        this.passwordStrengthText = "Could be stronger";
                    } else {
                        this.passwordStrengthText = "Too weak";
                    }
                }
            }
        }
    </script>



</x-guest-layout>