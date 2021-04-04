<?php
include ("header.php");

$isNameValid = true;
$isEmailValid = true;
$isUserNameValid = true;
$isPasswordValid = true;
$isPasswordConfirmed = true;
$isBirthDateValid = true;
$isCityValid = true;
$isPostalCodeValid = true;
$isMobileNumberValid = true;
$isHomeNumberValid = true;
$isCreditCardValid = true;
$isExpiryDateValid = true;
$isSalaryValid = true;
$isURLValid = true;
$isGPAValid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    $confirmPassword = $_REQUEST["confirmPassword"];
    $birthDate = $_REQUEST["birthdate"];
    $city = $_REQUEST["city"];
    $postalCode = $_REQUEST["postalCode"];
    $mobileNumber = $_REQUEST["mobileNumber"];
    $homeNumber = $_REQUEST["homeNumber"];
    $creditCard = $_REQUEST["creditCard"];
    $expiryDate = $_REQUEST["expiryDate"];
    $monthlySalary = $_REQUEST["monthlySalary"];
    $websiteURL = $_REQUEST["websiteURL"];
    $gpa = $_REQUEST["gpa"];

    $isNameValid = strlen($name) >= 2;
    $isEmailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
    $isUserNameValid = strlen($username) >= 5;
    $isPasswordValid = strlen($password) >= 8;
    $isPasswordConfirmed = $password == $confirmPassword;
    $isBirthDateValid = preg_match('/\b(0?[1-9]|[12]\d|30|31)[^\w\d\r\n:](0?[1-9]|1[0-2])[^\w\d\r\n:](\d{4}|\d{2})\b/', $birthDate);
    $isPostalCodeValid = preg_match("^\d{6}(?:[-\s]\d{4})?$", $postalCode);
    $isCityValid = preg_match('/^[a-z][a-z \-]*[a-z]$/i', $city);
    $isMobileNumberValid = preg_match("/^[7-9]{2} [0-9]{7}$/", $mobileNumber);
    $isHomeNumberValid = preg_match("/^[7-9]{1}[0-9]{1} [0-9]{7}$/", $homeNumber);
    $isCreditCardValid = preg_match("/^([4]{1})([0-9]{12,15})$/", $creditCard);
    $isExpiryDateValid = preg_match('/\b(0?[1-9]|[12]\d|30|31)[^\w\d\r\n:](0?[1-9]|1[0-2])[^\w\d\r\n:](\d{4}|\d{2})\b/', $expiryDate);
    $monthlySalary = preg_match("/UZS [0-9,.]{2,}/");
    $isURLValid = filter_var($websiteURL, FILTER_VALIDATE_URL);
    $isGPAValid = preg_match("/^[0-4]\.\d\d$/", $gpa);

    $isValid = $isNameValid && $isEmailValid && $isUserNameValid && $isPasswordValid && $isPasswordConfirmed
        && $isBirthDateValid && $isPostalCodeValid && $isCityValid && $isMobileNumberValid && $isHomeNumberValid
        && $isCreditCardValid && $isExpiryDateValid && $monthlySalary && $isURLValid && $isGPAValid;
    if ($isValid) {
        header("Location: thanks.php", true, 301);
    }
}
?>
		<h1>Registration Form</h1>
		<p>
			This form validates user input and then displays "Thank You" page.
		</p>
		<hr />
		<h2>Please, fill below fields correctly</h2>
        <form action="index.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control <?=$isNameValid?'':'is-invalid'?>" id="name" placeholder="name">
                <div class="invalid-feedback"> Name must at least be 2 characters long</div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control <?=$isEmailValid?'':'is-invalid'?>" id="email" placeholder="email@example.com">
                <div class="invalid-feedback">Enter valid email address</div>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control <?=$isUserNameValid?'':'is-invalid'?>" id="username" placeholder="username">
                <div class="invalid-feedback">Username must at least be 5 characters long</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control <?=$isPasswordValid?'':'is-invalid'?>" id="password" placeholder="password">
                <div class="invalid-feedback">Password must at least be 8 characters long</div>
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" name="confirmPassword" class="form-control <?=$isPasswordConfirmed?'':'is-invalid'?>" id="confirmPassword" placeholder="password">
                <div class="invalid-feedback">Passwords don't match</div>
            </div>
            <div class="mb-3">
                <label for="birthdate" class="form-label">Date of Birth</label>
                <input type="text" name="birthdate" class="form-control <?=$isBirthDateValid?'':'is-invalid'?>" id="birthdate" placeholder="dd.MM.yyyy">
                <div class="invalid-feedback">Date must have format dd.MM.yyyy</div>
            </div>
            <div class="mb-3">
                <div class="form-label">Gender</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>
            <div class="mb-3">
                <div class="form-label">Marital Status</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="maritalStatus" id="single" value="single">
                    <label class="form-check-label" for="single">Single</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="maritalStatus" id="married" value="married">
                    <label class="form-check-label" for="married">Married</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="maritalStatus" id="divorced" value="divorced">
                    <label class="form-check-label" for="divorced">Divorced</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="maritalStatus" id="widowed" value="widowed">
                    <label class="form-check-label" for="widowed">Widowed</label>
                </div>
            </div>

            <div class="mb-3">
                <div class="form-label">Address</div>
                <div class="row g-3">
                    <div class="col-sm-fill">
                        <input type="text" name="address" class="form-control" placeholder="Street Address" aria-label="Address">
                    </div>
                    <div class="col-sm-7">
                        <input type="text" name="city" class="form-control <?=$isCityValid?'':'is-invalid'?>" placeholder="City" aria-label="City">
                        <div class="invalid-feedback">Enter valid city</div>
                    </div>
                    <div class="col-sm">
                        <input type="text" name="postalCode" class="form-control <?=$isPostalCodeValid?'':'is-invalid'?>" placeholder="Zip" aria-label="Zip">
                        <div class="invalid-feedback">Postal code must be 6 characters long</div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="homeNumber" class="form-label">Home Phone</label>
                <input type="text" name="homeNumber" class="form-control <?=$isHomeNumberValid?'':'is-invalid'?>" id="homeNumber" placeholder="7x xxx xx xx">
                <div class="invalid-feedback">Phone number be 9 characters long and have format xx xxxxxxx</div>
            </div>
            <div class="mb-3">
                <label for="mobileNumber" class="form-label">Mobile Phone</label>
                <input type="text" name="mobileNumber" class="form-control <?=$isMobileNumberValid?'':'is-invalid'?>" id="mobileNumber" placeholder="9x xxx xx xx">
                <div class="invalid-feedback">Phone number be 9 characters long and have format xx xxxxxxx</div>
            </div>
            <div class="mb-3">
                <label for="creditCard" class="form-label">Credit Card Number</label>
                <input type="text" name="creditCard" class="form-control <?=$isCreditCardValid?'':'is-invalid'?>" id="creditCard" placeholder="xxxx xxxx xxxx xxxx">
                <div class="invalid-feedback">Credit Card number must have format xxxx xxxx xxxx xxxx</div>
            </div>
            <div class="mb-3">
                <label for="expiryDate" class="form-label">Credit Card Expiry Date</label>
                <input type="text" name="expiryDate" class="form-control <?=$isExpiryDateValid?'':'is-invalid'?>" id="expiryDate" placeholder="dd.MM.yyyy">
                <div class="invalid-feedback">Date must have format dd.MM.yyyy</div>
            </div>
            <div class="mb-3">
                <label for="monthlySalary" class="form-label">Monthly Salary</label>
                <input type="text" name="monthlySalary" class="form-control <?=$isSalaryValid?'':'is-invalid'?>" id="monthlySalary" placeholder="UZS 200,000.00">
                <div class="invalid-feedback">Enter valid salary with format UZS xxx,xxx.xx</div>
            </div>
            <div class="mb-3">
                <label for="websiteURL" class="form-label">Website URL</label>
                <input type="text" name="websiteURL" class="form-control <?=$isURLValid?'':'is-invalid'?>" id="websiteURL" placeholder="salary">
                <div class="invalid-feedback">Enter valid URL</div>
            </div>
            <div class="mb-3">
                <label for="gpa" class="form-label">Overall GPA</label>
                <input type="text" name="gpa" class="form-control <?=$isGPAValid?'':'is-invalid'?>" id="gpa" placeholder="GPA">
                <div class="invalid-feedback">Enter valid GPA X.XX/4.50</div>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>

        </form>
<?php
include ("footer.php");
?>