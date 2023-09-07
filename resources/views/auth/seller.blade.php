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

        .step {
            display: none;
        }
    </style>

    <div class="max-w-md w-full space-y-8">

        <form id="signUpForm" class=" w-full h-screen grid items-center justify-center" method="POST"
            action="{{ route('register') }}">
            @csrf
            <div class="text-center items-start">
                <div class="block">
                    <h2 class="text-3xl font-bold text-gray-900">
                        Welcome
                    </h2>
                    <p class="text-sm text-gray-500 mt-2">Please sign in to your account</p>
                </div>
                <!-- start step indicators -->
                <div class="form-header mt-8 flex text-xs text-center">
                    <span class="stepIndicator flex-1 pb-8 relative">Account Setup</span>
                    <span class="stepIndicator flex-1 pb-8 relative">Profil Image</span>
                    <span class="stepIndicator flex-1 pb-8 relative">Personal Details</span>
                    <span class="stepIndicator flex-1 pb-8 relative">Personal Details</span>
                    <span class="stepIndicator flex-1 pb-8 relative">Personal Details</span>
                </div>
            </div>
            <div class="grid items-center">
                <div class="step">
                    <div class="grid w-full gap-6 md:grid-cols-2">
                        <div>
                            <input type="radio" id="person" name="type" value="person" class="hidden peer">
                            <label for="person"
                                class="inline-flex items-center justify-center w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-green-600 peer-checked:text-green-600 hover:text-green-600">
                                <div class="flex items-center ">
                                    <i class="fa-regular fa-user mr-4 text-2xl"></i>
                                    <div class="w-full text-lg font-semibold">Person</div>
                                </div>
                            </label>
                        </div>
                        <div>
                            <input type="radio" id="company" name="type" value="company" class="hidden peer">
                            <label for="company"
                                class="inline-flex items-center justify-center w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-green-600 peer-checked:text-green-600 hover:text-green-600">
                                <div class="flex items-center ">
                                    <i class="fa-regular fa-building mr-4 text-2xl"></i>
                                    <div class="w-full text-lg font-semibold">Company</div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="step grid">
                    <div class="text-center">
                        <div class="mx-auto w-32 h-32 border rounded-full relative bg-gray-100 mb-4 shadow-inset">
                            <img id="selectedImage" class="object-cover w-full h-32 rounded-full"
                                style="display: none;" />
                        </div>
                        <div class="">
                            <label for="imageInput"
                                class="cursor-pointer inline-flex justify-between items-center focus:outline-none border py-2 px-4 rounded-lg shadow-sm text-left text-gray-600 bg-white hover:bg-gray-100 font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="inline-flex flex-shrink-0 w-6 h-6 -mt-1 mr-1" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect x="0" y="0" width="24" height="24" stroke="none">
                                    </rect>
                                    <path
                                        d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                                    <circle cx="12" cy="13" r="3" />
                                </svg>
                                Browse Photo
                            </label>
                        </div>
                        <div class="mx-auto w-48 text-gray-500 text-xs text-center mt-1">
                            Click to add profile picture
                        </div>
                        <input name="photo" id="imageInput" accept="image/*" onchange="displayImage()" class="hidden"
                            hidden type="file">
                    </div>
                    <!-- username -->
                    <div class="content-center mt-1">
                        <label for="username" :value="__('Username')"
                            class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Username</label>
                        <input
                            class="w-full mt-1 text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-green-200"
                            id="username" type="text" name="username" :value="old('username')" required autofocus
                            autocomplete="username" />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                </div>
                <div class="step">
                    <!-- photo -->
                    <div class="content-center mt-2 w-full">
                        <label for="card_id" :value="__('card_id')"
                            class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Card Id</label>
                        <div class="mt-1">
                            <label for="imageInput"
                                class="cursor-pointer w-full inline-flex justify-between items-center focus:outline-none border border-gray-300 rounded-2xl shadow-sm text-left text-gray-600 bg-white font-medium">
                                <div
                                    class="flex items-center justify-center p-3 hover:bg-gray-300 bg-gray-100 rounded-l-2xl border-r">
                                    <i class="fa-regular fa-image"></i>
                                </div>
                                <input type="file" id="imageInput" accept="image/*" class="hidden"
                                    onchange="updateImageName(this)">
                                <!-- Add an id to the "Card Id" input field -->
                                <input type="text" id="cardIdInput" placeholder="Card Id"
                                    class="w-full text-base px-4 py-2 border-none border-gray-50 rounded-r-2xl focus:outline-none focus:border-green-200"
                                    readonly>
                            </label>
                        </div>
                        <x-input-error :messages="$errors->get('card_id')" class="mt-2" />

                        <script>
                            function updateImageName(input) {
                                // Get the selected file
                                const selectedFile = input.files[0];

                                if (selectedFile) {
                                    // Set the value of the "Card Id" input field to the name of the selected file
                                    const cardIdInput = document.getElementById('cardIdInput');
                                    cardIdInput.value = selectedFile.name;
                                }
                            }
                        </script>
                    </div>

                                        
                    <!-- phone -->
                    <div class="content-center  mt-2">
                        <label for="phone" :value="__('phone')"
                            class="ml-3 text-sm font-bold text-gray-700 tracking-wide">phone</label>
                        <input
                            class="w-full mt-1 text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-green-200"
                            id="phone" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                            maxlength="10" name="phone" :value="old('phone')" required autofocus
                            autocomplete="phone" placeholder="07 39 53 23 69 " />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>
                    <!-- city -->
                    <div class="content-center  mt-2">
                        <label for="city" :value="__('city')"
                            class="ml-3 text-sm font-bold text-gray-700 tracking-wide">city</label>
                        <input
                            class="w-full mt-1 text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-green-200"
                            id="city" type="text" name="city" :value="old('city')" required autofocus
                            autocomplete="city" />
                        <x-input-error :messages="$errors->get('city')" class="mt-2" />
                    </div>
                    <!-- address -->
                    <div class="content-center mt-2">
                        <label for="address" :value="__('address')"
                            class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Address</label>
                        <input
                            class="w-full mt-1 text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-green-200"
                            id="address" type="text" name="address" :value="old('address')" required
                            autocomplete="address" />
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>
                    <!-- Bio -->
                    <div class="content-center mt-2">
                        <label for="username" :value="__('Bio')"
                            class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Bio</label>
                        <textarea
                            class="w-full mt-1 text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-green-200"
                            id="username" type="text" name="username" :value="old('username')" required autofocus
                            autocomplete="username"> </textarea>
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>
                </div>
                <div class="step">
                    <!-- Commercial Register -->
                    <div class="content-center mt-2">
                        <label for="commercial_register" :value="__('commercial_register')"
                            class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Commercial Register</label>
                        <textarea
                            class="w-full mt-1 text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-green-200"
                            id="commercial_register" type="text" name="commercial_register" :value="old('commercial_register')" required
                            autofocus autocomplete="commercial_register"> </textarea>
                        <x-input-error :messages="$errors->get('commercial_register')" class="mt-2" />
                    </div>
                </div>
                <div class="step">
                    <!-- Email -->
                    <div class="content-center">
                        <label for="email" :value="__('email')"
                            class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Email</label>
                        <input
                            class="w-full mt-1 text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-green-200"
                            type="email" name="email" id="email" required>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <!-- Password -->
                    <div class="grid gap-3 py-4 mt2">
                        <div class="grid">
                            <label for="password" :value="__('password')"
                                class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Password</label>
                            <div class="relative">
                                <input type="password" id="passwordInput"
                                    class="w-full mt-1 text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-green-200"name="password"
                                    required>
                                <div class="absolute right-0 bottom-0 top-0 px-3 py-3 cursor-pointer"
                                    id="togglePasswordButton">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current text-gray-500"
                                        viewBox="0 0 24 24" id="eyeIcon">
                                        <path
                                            d="M12 19c.946 0 1.81-.103 2.598-.281l-1.757-1.757C12.568 16.983 12.291 17 12 17c-5.351 0-7.424-3.846-7.926-5 .204-.47.674-1.381 1.508-2.297L4.184 8.305c-1.538 1.667-2.121 3.346-2.132 3.379-.069.205-.069.428 0 .633C2.073 12.383 4.367 19 12 19zM12 5c-1.837 0-3.346.396-4.604.981L3.707 2.293 2.293 3.707l18 18 1.414-1.414-3.319-3.319c2.614-1.951 3.547-4.615 3.561-4.657.069-.205.069-.428 0-.633C21.927 11.617 19.633 5 12 5zM16.972 15.558l-2.28-2.28C14.882 12.888 15 12.459 15 12c0-1.641-1.359-3-3-3-.459 0-.888.118-1.277.309L8.915 7.501C9.796 7.193 10.814 7 12 7c5.351 0 7.424 3.846 7.926 5C19.624 12.692 18.76 14.342 16.972 15.558z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center h-3">
                            <div class="w-full grid grid-cols-3 gap-3 justify-between h-2">
                                <div id="passwordStrengthIndicator1" class="h-2 rounded-full bg-gray-100">
                                </div>
                                <div id="passwordStrengthIndicator2" class="h-2 rounded-full bg-gray-100">
                                </div>
                                <div id="passwordStrengthIndicator3" class="h-2 rounded-full bg-gray-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-footer flex gap-3 items-end">
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
            var x, y, i, valid = true;
            x = document.getElementsByClassName("step");
            y = x[currentTab].getElementsByTagName("input");
            var radioButtons = document.querySelectorAll("input[name='type']");
            var checkedCount = 0;



            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                if (y[i].type === "radio" && y[i].name === "type") {
                    // Check if at least one radio button is checked
                    for (var i = 0; i < radioButtons.length; i++) {
                        if (radioButtons[i].checked) {
                            checkedCount++;
                        }
                    }
                    if (checkedCount !== 1) {
                        return false;
                    }
                    return true;

                    if (!isChecked) {
                        valid = false;
                    }
                } else if (y[i].value == "") {
                    y[i].className += " border-red-300";
                    valid = false;
                }
            }
            var bioTextarea = document.getElementById("username");
            if (!bioTextarea.value.trim()) {
                valid = false;
            }
            if (valid) {
                document.getElementsByClassName("stepIndicator")[currentTab].className += " finish";
            }
            return valid;
        }

        function fixStepIndicator(n) {
            var i, x = document.getElementsByClassName("stepIndicator");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            x[n].className += " active";
        }
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
    </script>

    <script>
        const passwordInput = document.getElementById('passwordInput');
        const togglePasswordButton = document.getElementById('togglePasswordButton');
        const eyeIcon = document.getElementById('eyeIcon');
        const passwordStrengthIndicator1 = document.getElementById('passwordStrengthIndicator1');
        const passwordStrengthIndicator2 = document.getElementById('passwordStrengthIndicator2');
        const passwordStrengthIndicator3 = document.getElementById('passwordStrengthIndicator3');


        // Function to check password strength
        function checkPasswordStrength() {
            var strongRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
            var mediumRegex = /^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})/;
            let value = passwordInput.value;

            if (strongRegex.test(value)) {
                passwordStrengthIndicator1.style.backgroundColor = "#4CAF50"; // Green
                passwordStrengthIndicator2.style.backgroundColor = "#4CAF50"; // Green
                passwordStrengthIndicator3.style.backgroundColor = "#4CAF50"; // Green
            } else if (mediumRegex.test(value)) {
                passwordStrengthIndicator1.style.backgroundColor = "#FFC107"; // Orange
                passwordStrengthIndicator2.style.backgroundColor = "#FFC107"; // Orange
                passwordStrengthIndicator3.className = "bg-gray-100 rounded-lg"; // Gray
            } else {
                passwordStrengthIndicator1.style.backgroundColor = "#F44336"; // Red
                passwordStrengthIndicator2.className = "bg-gray-100 rounded-full"; // Gray
                passwordStrengthIndicator3.className = "bg-gray-100 rounded-full"; // Gray
            }
        }

        // Add an event listener to check password strength on input
        passwordInput.addEventListener('input', checkPasswordStrength);

        // Toggle password visibility
        let isPasswordVisible = false;
        togglePasswordButton.addEventListener('click', function() {
            isPasswordVisible = !isPasswordVisible;
            passwordInput.type = isPasswordVisible ? 'text' : 'password';

            // Change the SVG icon based on password visibility
            if (isPasswordVisible) {
                eyeIcon.innerHTML =
                    ` <path d="M12 19c.946 0 1.81-.103 2.598-.281l-1.757-1.757C12.568 16.983 12.291 17 12 17c-5.351 0-7.424-3.846-7.926-5 .204-.47.674-1.381 1.508-2.297L4.184 8.305c-1.538 1.667-2.121 3.346-2.132 3.379-.069.205-.069.428 0 .633C2.073 12.383 4.367 19 12 19zM12 5c-1.837 0-3.346.396-4.604.981L3.707 2.293 2.293 3.707l18 18 1.414-1.414-3.319-3.319c2.614-1.951 3.547-4.615 3.561-4.657.069-.205.069-.428 0-.633C21.927 11.617 19.633 5 12 5zM16.972 15.558l-2.28-2.28C14.882 12.888 15 12.459 15 12c0-1.641-1.359-3-3-3-.459 0-.888.118-1.277.309L8.915 7.501C9.796 7.193 10.814 7 12 7c5.351 0 7.424 3.846 7.926 5C19.624 12.692 18.76 14.342 16.972 15.558z" />`;
            } else {
                eyeIcon.innerHTML =
                    `<path d="M12,9c-1.642,0-3,1.359-3,3c0,1.642,1.358,3,3,3c1.641,0,3-1.358,3-3C15,10.359,13.641,9,12,9z" /> <path d="M12,5c-7.633,0-9.927,6.617-9.948,6.684L1.946,12l0.105,0.316C2.073,12.383,4.367,19,12,19s9.927-6.617,9.948-6.684 L22.054,12l-0.105-0.316C21.927,11.617,19.633,5,12,5z M12,17c-5.351,0-7.424-3.846-7.926-5C4.578,10.842,6.652,7,12,7 c5.351,0,7.424,3.846,7.926,5C19.422,13.158,17.348,17,12,17z" />`;
            }
        });
    </script>



</x-guest-layout>