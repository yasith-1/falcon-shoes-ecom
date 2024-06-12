// Loader--------------------------------------------------------------

var loader = document.getElementById("loader");

setTimeout(() => {
    loader.style.display = "none";
}, 2000);



// Loader--------------------------------------------------------------




// TOGGLE BUTTON--------------------------------------------------------

function changeView() {

    var signUpBox = document.getElementById("signUp_Box");
    var signInBox = document.getElementById("signIn_Box");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");


}

// TOGGLE BUTTON--------------------------------------------------------











// signup page password view------------------------------------
function showOne() {
    var textfield = document.getElementById("password");
    var button = document.getElementById("buttonone");

    if (textfield.type == "password") {
        textfield.type = "text";
        button.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
    } else {
        textfield.type = "password";
        button.innerHTML = '<i class="fa-regular fa-eye"></i>';
    }
}
// signup page password view------------------------------------











// signin page password view------------------------------------
function showTwo() {
    var textfield = document.getElementById("password2");
    var button = document.getElementById("buttontwo");

    if (textfield.type == "password") {
        textfield.type = "text";
        button.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
    } else {
        textfield.type = "password";
        button.innerHTML = '<i class="fa-regular fa-eye"></i>';
    }
}
// signin page password view------------------------------------













// USER SIGNUP ----------------------------------------------------------------------
/**
 * Handles the user sign up process.
 *
 * This function is called when the user submits the sign up form. It collects the user's
 * first name, last name, email, mobile number, username, and password, and sends them
 * to the server using an XMLHttpRequest. If the sign up is successful, a success message
 * is displayed to the user using Swal.fire(), and the page is reloaded. If there is an
 * error, an error message is displayed.
 */
function signup() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var username = document.getElementById("username");
    var password = document.getElementById("password");

    var form = new FormData();
    form.append("f", fname.value);
    form.append("l", lname.value);
    form.append("e", email.value);
    form.append("m", mobile.value);
    form.append("u", username.value);
    form.append("p", password.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;

            if (response == "Success") {
                Swal.fire({
                    title: "Sucessfully Registered",
                    text: "Good Job",
                    icon: "success",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });

                // fname.value = "";
                // lname.value = "";
                // email.value = "";
                // mobile.value = "";
                // username.value = "";
                // password.value = "";
            } else {
                Swal.fire({
                    title: response,
                    text: "oops",
                    icon: "error",
                });
            }
        }
    };

    request.open("POST", "signUpProcess.php", true);
    request.send(form);
}

// USER SIGNUP ----------------------------------------------------------------------














// USER SIGNIN ----------------------------------------------------------------------
function signin() {
    // var username = document.getElementById("un");
    var email = document.getElementById("useremail");
    var password = document.getElementById("password2");
    var rememberme = document.getElementById("rm");

    var form = new FormData();
    // form.append("u", username.value);
    form.append("e", email.value);
    form.append("p", password.value);
    form.append("r", rememberme.checked);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            if (response == "Success") {
                Swal.fire({
                    title: "Login Success",
                    text: response,
                    icon: "success"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location = "home.php";
                    }
                });


            } else {
                Swal.fire({
                    title: response,
                    text: "",
                    icon: "error"
                });
            }
        }
    };

    request.open("POST", "signinProcess.php", true);
    request.send(form);
}

// USER SIGNIN ----------------------------------------------------------------------









// LOAD USERS DATA ---------------------------------------------------------------------

function loadUser() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var r = request.responseText;
            document.getElementById("tb").innerHTML = r;
        }
    };

    request.open("POST", "loadUserProcess.php", true);
    request.send();


}


// LOAD USERS DATA -------------------------------------------------------------------





// Load Users in to a admin panel 

function loadUsersdata() {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            document.getElementById("tb").innerHTML = response;
        }
    };

    r.open("POST", "loadUserProcess.php", true);
    r.send();
}
// Load Users in to a admin panel 






//change user status
function updateUserStatus() {
    var userid = document.getElementById("uid");



    var f = new FormData();
    f.append("u", userid.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            if (response == "Deactivated") {


                Swal.fire({
                    title: "User Deactivated Sucessfull",
                    text: response,
                    icon: "success"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });


            } else if (response == "Ativated") {

                Swal.fire({
                    title: "User Ativated Sucessfull",
                    text: response,
                    icon: "success"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });

            } else {
                Swal.fire({
                    title: response,
                    text: "",
                    icon: "info"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });
            }

        }
    };

    r.open("POST", "updateUserStatusProcess.php", true);
    r.send(f);
}

//change user status






// User detail search by name
function searchUserName() {

    var name = document.getElementById("uname");

    var f = new FormData();
    f.append("n", name.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;

            if (response == "Type User Name") {

                Swal.fire({
                    title: response,
                    text: "Enter user name",
                    icon: "warning"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });

            } if (response == "User name Should be 20 characters only") {

                Swal.fire({
                    title: response,
                    text: "Invalid",
                    icon: "warning"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });

            } if (response == "") {

                Swal.fire({
                    title: "Invalid Username",
                    text: response,
                    icon: "error"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });


            }

            else {
                document.getElementById("tb").innerHTML = response;
                name.value = "";
            }


        }
    };

    r.open("POST", "usernameSearchProcess.php", true);
    r.send(f);
}
// User detail search by name







// User detail search by email

function searchUserEmail() {

    var email = document.getElementById("email");

    var f = new FormData();
    f.append("e", email.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;

            if (response == "Type User Email") {
                Swal.fire({
                    title: response,
                    text: response,
                    icon: "warning"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });

            } if (response == "Email Address Must Contain Lower Than 100 characters") {

                Swal.fire({
                    title: response,
                    text: response,
                    icon: "warning"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });

            } if (response == "") {
                Swal.fire({
                    title: "Invalid Email Address",
                    text: response,
                    icon: "warning"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });


            }

            else {
                document.getElementById("tb").innerHTML = response;
                email.value = "";
            }


        }
    };

    r.open("POST", "useremailSearchProcess.php", true);
    r.send(f);
}

// User detail search by email






//Home sign Out

function signout() {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            var response = request.responseText;
            if (response == "success") {
                window.location.reload();
            }
        }
    }

    request.open("GET", "signOutProcess.php", true);
    request.send();

}
//Home sign Out








// brandRegister 

function brandRegister() {
    var brand = document.getElementById("brand");

    var form = new FormData();
    form.append("b", brand.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            // alert(response);

            if (response == "success") {

                Swal.fire({
                    title: "Brand Registerd Successfully",
                    text: response,
                    icon: "success"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });


            } else {

                Swal.fire({
                    title: response,
                    text: response,
                    icon: "warning"
                })

            }


        }
    };
    r.open("POST", "brandRegisterProcess.php", true);
    r.send(form);
}
// brandRegister 











// category Register 

function categoryReg() {
    var cat = document.getElementById("cat");

    var f = new FormData();
    f.append("c", cat.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            // alert(response);

            if (response == "success") {

                Swal.fire({
                    title: "Category Registerd Successfully",
                    text: response,
                    icon: "success"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });


            } else {

                Swal.fire({
                    title: response,
                    text: response,
                    icon: "warning"
                })
            }



        }
    };

    request.open("POST", "categoryRegisterProcess.php", true);
    request.send(f);
}

// category Register 









// colour Register 

function colorReg() {
    var color = document.getElementById("color");

    var f = new FormData();
    f.append("c", color.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            // alert(response);

            if (response == "success") {

                Swal.fire({
                    title: "Color Registerd Successfully",
                    text: response,
                    icon: "success"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });


            } else {

                Swal.fire({
                    title: response,
                    text: response,
                    icon: "warning"
                })
            }

        }
    };

    r.open("POST", "colorRegisterProcess.php", true);
    r.send(f);
}

// colour Register 







// size Register 

function sizeReg() {
    var size = document.getElementById("size");

    var f = new FormData();
    f.append("s", size.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            // alert(response);

            if (response == "success") {
                Swal.fire({
                    title: "Size Registerd Successfully",
                    text: response,
                    icon: "success"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });


            } else {

                Swal.fire({
                    title: response,
                    text: response,
                    icon: "warning"
                })
            }

        }
    };

    r.open("POST", "sizeRegisterProcess.php", true);
    r.send(f);
}

// size Register 









// ADMIN SIGNIN ----------------------------------------------------------------------

function adminSignin() {

    var un = document.getElementById("aun");
    var pw = document.getElementById("apw");
    var rm = document.getElementById("arm");

    var form = new FormData();
    form.append("u", un.value);
    form.append("p", pw.value);
    form.append("r", rm.checked);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            if (response == "success") {

                Swal.fire({
                    title: "Login Success",
                    text: response,
                    icon: "success"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location = "adminDashboard.php";
                    }
                });



            } else {
                Swal.fire({
                    title: response,
                    text: "sorry",
                    icon: "error"
                })
            }
        }
    }

    request.open("POST", "adminSigninProcess.php", true);
    request.send(form);
}


// ADMIN SIGNIN ----------------------------------------------------------------------





// Admin logout process 

function adminLogout() {
    // alert("ok");
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;

            if (response == "success") {
                Swal.fire({
                    title: "Successfully Loged Out",
                    text: response,
                    icon: "success"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location = "adminSignin.php";
                    }
                });
            } else {
                Swal.fire({
                    title: response,
                    text: "",
                    icon: "warning"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location = "adminSignin.php";
                    }
                });
            }
        }
    };

    r.open("POST", "adminLogoutProcess.php", true);
    r.send();
}

// Admin logout process 








// Product Register

function regProduct() {

    // alert("ok");

    var pname = document.getElementById("pname");
    var brand = document.getElementById("brand");
    var cat = document.getElementById("cat");
    var color = document.getElementById("color");
    var size = document.getElementById("size");
    var desc = document.getElementById("desc");
    var file = document.getElementById("file");

    var form = new FormData();
    form.append("pname", pname.value);
    form.append("brand", brand.value);
    form.append("cat", cat.value);
    form.append("color", color.value);
    form.append("size", size.value);
    form.append("desc", desc.value);
    form.append("image", file.files[0]);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            if (response == "success") {
                Swal.fire({
                    title: "Product Registered Sucessfully",
                    text: response,
                    icon: "success"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });
            } else {
                Swal.fire({
                    title: response,
                    text: "",
                    icon: "warning"
                });
            }
        }
    }
    r.open("POST", "productRegProcess.php", true);
    r.send(form);

}

// Product Register





// Stock Update

function updateStock() {

    var pname = document.getElementById("selectProduct");
    var qty = document.getElementById("qty");
    // var color = document.getElementById("color");
    var price = document.getElementById("uprice");

    // alert(pname.value)

    var f = new FormData();
    f.append("p", pname.value);
    f.append("q", qty.value);
    f.append("c", color.value);
    f.append("up", price.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            if (response == "success") {
                Swal.fire({
                    title: "Stock Updated Sucessfully",
                    text: response,
                    icon: "success"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });
            } else if (response == "New Stock Added Successfully") {
                Swal.fire({
                    title: response,
                    text: "Success",
                    icon: "success"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });
            } else {
                Swal.fire({
                    title: response,
                    text: "",
                    icon: "warning"
                });
            }
        }
    }

    request.open("POST", "updateStockProcess.php", true);
    request.send(f);

}

// Stock Update











// PDF downloader

function downloadProductReport() {
    var file = document.getElementById("download")

    file.addEventListener("click", () => {
        const invoice = this.document.getElementById("productinvoice");
        console.log(invoice);
        console.log(window);
        var opt = {
            margin: 0.5,
            filename: 'Product_Report.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'landscape' }

        };
        html2pdf().from(invoice).set(opt).save();
    })
}



function downloadStockReport() {
    var file = document.getElementById("download")

    file.addEventListener("click", () => {
        const invoice = this.document.getElementById("stockinvoice");
        console.log(invoice);
        console.log(window);
        var opt = {
            margin: 0.5,
            filename: 'Stock_Report.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'landscape' }

        };
        html2pdf().from(invoice).set(opt).save();
    })
}



function downloadUserReport() {
    var file = document.getElementById("download")

    file.addEventListener("click", () => {
        const invoice = this.document.getElementById("userinvoice");
        console.log(invoice);
        console.log(window);
        var opt = {
            margin: 0.5,
            filename: 'User.pdf',
            image: { type: 'jpeg', quality: 1 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'cm', format: 'A4', orientation: 'landscape' }

        };
        html2pdf().from(invoice).set(opt).save();
    })
}

// PDF downloader




// print reports  

function printproductreport() {
    document.getElementById("productwatermark").className = "d-block";
    var originalcontent = document.body.innerHTML;
    var printarea = document.getElementById("productinvoice").innerHTML;



    document.body.innerHTML = printarea;
    window.print();
    document.body.innerHTML = originalcontent;
}



function printstockreport() {
    document.getElementById("productwatermark").className = "d-block";
    var originalcontent = document.body.innerHTML;
    var printarea = document.getElementById("stockinvoice").innerHTML;

    document.body.innerHTML = printarea;
    window.print();
    document.body.innerHTML = originalcontent;
}



function printuserreport() {
    document.getElementById("productwatermark").className = "d-block";
    var originalcontent = document.body.innerHTML;
    var printarea = document.getElementById("userinvoice").innerHTML;

    document.body.innerHTML = printarea;
    window.print();
    document.body.innerHTML = originalcontent;
}


// print reports  








// Load home Product
function loadhomeproduct(x) {



    var page = x;
    // alert(page);

    var f = new FormData();
    f.append("p", page);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 & r.status == 200) {
            var response = r.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;

        }
    };

    r.open("POST", "loadHomeProductProcess.php", true);
    r.send(f);
}
// Load home Product





// Home product search

function searchproduct(x) {
    var page = x;
    var product = document.getElementById("product");

    // alert(page);
    // alert(product.value);

    var f = new FormData();
    f.append("p", product.value);
    f.append("pg", page);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 & r.status == 200) {
            var response = r.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;
        }
    };

    r.open("POST", "searchproductprocess.php", true);
    r.send(f);
}

// Home product search




// view filter
function viewFilter() {
    var filter = document.getElementById("filterId");

    filter.classList.toggle("d-none");
}
// view filter






// advance search 
function advSearchProduct(x) {
    // alert("ok");
    var page = x;
    var color = document.getElementById("color");
    var cat = document.getElementById("cat");
    var brand = document.getElementById("brand");
    var size = document.getElementById("size");
    var min = document.getElementById("min");
    var max = document.getElementById("max");

    var f = new FormData();
    f.append("pg", page);
    f.append("co", color.value);
    f.append("cat", cat.value);
    f.append("b", brand.value);
    f.append("s", size.value);
    f.append("min", min.value);
    f.append("max", max.value);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 & r.status == 200) {
            var response = r.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;

            color.value = "0";
            cat.value = "0";
            brand.value = "0";
            size.value = "0";
            min.value = "";
            max.value = "";
        }
    };

    r.open("POST", "advSearchProductProcess.php", true);
    r.send(f);
}
// advance search 



// // Signle product view

// const imgs = document.querySelectorAll('.img-select a');
// const imgBtns = [...imgs];
// let imgId = 1;

// imgBtns.forEach((imgItem) => {
//     imgItem.addEventListener('click', (event) => {
//         event.preventDefault();
//         imgId = imgItem.dataset.id;
//         slideImage();
//     });
// });

// function slideImage() {
//     const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

//     document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
// }

// window.addEventListener('resize', slideImage);


// // Signle product view




// update profile image 

function uploadimg() {

    var img = document.getElementById("imageuploader");

    var f = new FormData();
    f.append("i", img.files[0]);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            if (response == "empty") {
                Swal.fire({
                    title: "sorry , Plese select Image First",
                    text: "sorry",
                    icon: "warning"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });
            } else {
                document.getElementById("i").src = response;
                Swal.fire({
                    title: "Your Profile Picture Uploaded !",
                    text: "success",
                    icon: "success"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });

            }
        }
    };

    request.open("POST", "profileImageUploadProcess.php", true);
    request.send(f);

}



// update user data 

function updateUserData() {
    //   alert("ok");

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var pw = document.getElementById("pw");
    var no = document.getElementById("no");
    var line1 = document.getElementById("line2");
    var line2 = document.getElementById("line1");
    var city = document.getElementById("city");


    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("p", pw.value);
    f.append("no", no.value);
    f.append("l1", line1.value);
    f.append("l2", line2.value);
    f.append("city", city.value);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 & r.status == 200) {
            var response = r.responseText;
            // alert(response);

            if (response = "Success") {

                Swal.fire({
                    title: response,
                    text: "Success",
                    icon: "success"
                });
            } else {
                Swal.fire({
                    title: response,
                    text: "sorry",
                    icon: "warning"
                });
            }



        }
    };

    r.open("POST", "UpdateUserDataProcess.php", true);
    r.send(f);

}





// clear User data 

function clearUserData() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var pw = document.getElementById("pw");
    var no = document.getElementById("no");
    var line1 = document.getElementById("line2");
    var line2 = document.getElementById("line1");
    var city = document.getElementById("city");
    var pcode = document.getElementById("pcode");

    fname.value = "";
    lname.value = "";
    email.value = "";
    mobile.value = "";
    pw.value = "";
    no.value = "";
    line1.value = "";
    line2.value = "";
    city.value = "";
    pcode.value = "";
}
// clear User data 





// user profile password show hide option 


function userpassword() {
    var textfield = document.getElementById("pw");
    var button = document.getElementById("btn3");

    if (textfield.type == "password") {
        textfield.type = "text";
        button.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
    } else {
        textfield.type = "password";
        button.innerHTML = '<i class="fa-regular fa-eye"></i>';
    }
}


// user profile password show hide option 





// Delete Profile Image
function deleteimg() {
    // alert("ok");

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);

            if (response == "success") {

                Swal.fire({
                    title: "Profile Image Deleted Sucessfully !",
                    text: "success",
                    icon: "success"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });
            } else {
                Swal.fire({
                    title: "Can't Complete This Action",
                    text: "oops",
                    icon: "warning"
                })

            }



        }
    };

    request.open("POST", "profileImageDeleteProcess.php", true);
    request.send();

}

// Delete Profile Image 






// Add to cart
function addtoCart(x) {
    // alert(x);

    var stockId = x;
    var qty = document.getElementById("qty");
    // var size = document.getElementById("size");

    if (qty.value >= 1) {
        // alert("OK");

        var f = new FormData();
        f.append("s", stockId);
        f.append("q", qty.value);
        // f.append("si", size.value);


        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4 & r.status == 200) {
                var response = r.responseText;
                // alert(response);
                if (response == "Stock Quantity has been exceeded !") {
                    Swal.fire({
                        title: response,
                        text: "sorry",
                        icon: "warning"
                    }).then((result) => {

                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });


                } else {
                    Swal.fire({
                        title: response,
                        text: "success",
                        icon: "success"
                    }).then((result) => {

                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                }

            }
        };

        r.open("POST", "addtoCartProcess.php", true);
        r.send(f);

    } else {
        // alert("Please Enter Your Quantity");
        Swal.fire({
            title: "Please Enter Your Valid Quantity",
            text: "can't be empty this field",
            icon: "warning"
        }).then((result) => {

            if (result.isConfirmed) {
                window.location.reload();
            }
        });
    }
}
// Add to cart




// Load cart

function loadCart() {
    // alert("done");
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 & r.status == 200) {
            var response = r.responseText;
            // alert(response);
            document.getElementById("cartBody").innerHTML = response;
        }
    };

    r.open("POST", "loadCartProcess.php", true);
    r.send();
}



// increment cart qty 

function incrementCartQty(z) {

    var cartId = z;
    var qty = document.getElementById("qty" + cartId).value;
    var newQty = parseInt(qty) + 1;

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 & r.status == 200) {
            var response = r.responseText;
            // alert(response); 
            if (response == "success") {
                qty.value = parseInt(qty) + 1;
                loadCart();
            } else {
                Swal.fire({
                    title: response,
                    text: "sorry",
                    icon: "warning"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });
            }

        }
    };
    r.open("POST", "updateCartQtyProcess.php", true);
    r.send(f);

}

// increment cart qty 




// Decrement cart qty

function decrementCartQty(y) {
    // alert(y);

    var cartId = y;
    var qty = document.getElementById("qty" + cartId).value;
    var newQty = parseInt(qty) - 1;

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    if (newQty > 0) {
        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4 & r.status == 200) {
                var response = r.responseText;
                // alert(response); 
                if (response == "success") {
                    qty.value = parseInt(qty) + 1;
                    loadCart();
                } else {
                    Swal.fire({
                        title: response,
                        text: "sorry",
                        icon: "warning"
                    }).then((result) => {

                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                }

            }
        };
        r.open("POST", "updateCartQtyProcess.php", true);
        r.send(f);
    }
}
// Decrement cart qty 




// "Are you sure deleting this item ?"
// function removeCart(a) {

//     if (confirm("Are you sure deleting this item ?")) {
//         var f = new FormData();
//         f.append("c", a);

//         var r = new XMLHttpRequest();
//         r.onreadystatechange = function () {
//             if (r.readyState == 4 & r.status == 200) {
//                 var response = r.responseText;
//                 // alert(response);
//                 Swal.fire({
//                     title: response,
//                     text: "success",
//                     icon: "success"
//                 }).then((result) => {

//                     if (result.isConfirmed) {
//                         window.location.reload();
//                     }
//                 });
//             }
//         }

//         r.open("POST", "removeCartProcess.php", true);
//         r.send(f);
//     }
// }



// Remove cart items
function removeCart(a) {

    Swal.fire({
        title: "Are you sure deleting this item ?",
        text: "Is this action confirm ?",
        icon: "warning"
    }).then((result) => {

        if (result.isConfirmed) {
            var f = new FormData();
            f.append("c", a);

            var r = new XMLHttpRequest();
            r.onreadystatechange = function () {
                if (r.readyState == 4 & r.status == 200) {
                    var response = r.responseText;
                    // alert(response);
                    Swal.fire({
                        title: response,
                        text: "success",
                        icon: "success"
                    }).then((result) => {

                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                }
            }

            r.open("POST", "removeCartProcess.php", true);
            r.send(f);
        }
    });


}

// Remove cart items






// Check out
function checkOut() {
    // alert("ok");

    var f = new FormData();
    f.append("cart", true);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 & r.status == 200) {
            var response = r.responseText;
            // alert(response);
            var payment = JSON.parse(response);
            doCheckout(payment, "checkoutProcess.php");
        }
    };

    r.open("POST", "paymentProcess.php", true);
    r.send(f);
}
// Check out


// Do chechout 
function doCheckout(payment, path) {


    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        // window.location.reload();
        // Note: validate the payment and show success or failure page to the customer


        var f = new FormData();
        f.append("payment", JSON.stringify(payment));

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                // alert(response);

                var order = JSON.parse(response);
                if (order.resp == "Success") {
                    // window.Location.reload();
                    window.location = "invoice.php?orderId=" + order.order_id;
                } else {
                    alert(response);
                    window.Location.reload();
                }
            }
        }


        request.open("POST", path, true);
        request.send(f);
    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:" + error);
    };

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    // document.getElementById('payhere-payment').onclick = function (e) {
    payhere.startPayment(payment);
    // };
}

// Do chechout 






// Buy now single product view


function buyNow(stockId) {

    var qty = document.getElementById("qty");

    if (qty.value > 0) {

        var f = new FormData();
        f.append("cart", false);
        f.append("stockId", stockId);
        f.append("qty", qty.value);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4 & r.status == 200) {
                var response = r.responseText;
                // alert(response);
                var payment = JSON.parse(response);
                payment.stock_id = stockId;
                payment.qty = qty.value;
                doCheckout(payment, "buynowProcess.php");


            }
        };

        r.open("POST", "paymentProcess.php", true);
        r.send(f);


    } else {
        Swal.fire({
            title: "Please Enter valid quantity",
            text: "oops",
            icon: "warning"
        })
    }
}
// Buy now single product view




// Forget Password 
var forgotPasswordModal;

function forgotPassword() {

    // alert("ok");
    var email = document.getElementById("useremail");

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            var response = request.responseText;

            if (response == "success") {
                // alert("Verification code has sent successfully. Please check your Email.");
                Swal.fire({
                    title: "Verification code has sent successfully. Please check your Email",
                    text: "Done",
                    icon: "success"
                });
                var modal = document.getElementById("fpmodal");
                forgotPasswordModal = new bootstrap.Modal(modal);
                forgotPasswordModal.show();
            } else {
                Swal.fire({
                    title: response,
                    text: "sorry",
                    icon: "warning"
                })
            }

        }
    }

    request.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    request.send();

}


function showPassword1() {

    var textfield = document.getElementById("np");
    var button = document.getElementById("npb");

    if (textfield.type == "password") {
        textfield.type = "text";
        button.innerHTML = '<i class="bi bi-eye-slash-fill text-white"></i>';
    } else {
        textfield.type = "password";
        button.innerHTML = '<i class="bi bi-eye-fill text-white"></i>';
    }

}

function showPassword2() {

    var textfield = document.getElementById("rnp");
    var button = document.getElementById("rnpb");

    if (textfield.type == "password") {
        textfield.type = "text";
        button.innerHTML = '<i class="bi bi-eye-slash-fill text-white"></i>';
    } else {
        textfield.type = "password";
        button.innerHTML = '<i class="bi bi-eye-fill text-white"></i>';
    }

}


// Forget Password 


// Reset Password
function resetPassword() {

    var email = document.getElementById("useremail");
    var newPassword = document.getElementById("np");
    var retypePassword = document.getElementById("rnp");
    var verification = document.getElementById("vcode");

    var form = new FormData();
    form.append("e", email.value);
    form.append("n", newPassword.value);
    form.append("r", retypePassword.value);
    form.append("v", verification.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            var response = request.responseText;
            if (response == "success") {
                // alert("Password updated successfully.");
                Swal.fire({
                    title: "Password updated successfully",
                    text: "success",
                    icon: "success"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });

                forgotPasswordModal.hide();
            } else {
                // alert(response);
                Swal.fire({
                    title: response,
                    text: "sorry",
                    icon: "error"
                })
            }
        }
    }

    request.open("POST", "resetPasswordProcess.php", true);
    request.send(form);

}
// Reset Password



// print Order Invoice 

function orderInvoicePrint() {
    var originalcontent = document.body.innerHTML;
    var printarea = document.getElementById("orderInvoice").innerHTML;



    document.body.innerHTML = printarea;
    window.print();
    document.body.innerHTML = originalcontent;
}




// contact btn 

function contactbtn() {
    // alert("ok");

    var name = document.getElementById("name");
    var email = document.getElementById("email");
    var sub = document.getElementById("sub");
    var msg = document.getElementById("msg");

    var form = new FormData();
    form.append("n", name.value);
    form.append("e", email.value);
    form.append("s", sub.value);
    form.append("m", msg.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 & r.readyState == 4) {
            var response = r.responseText;

            if (response == "success") {

                Swal.fire({
                    title: "Message Sent Succesfully",
                    text: "Thank You",
                    icon: "success"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });
            } if (response == "Update") {
                Swal.fire({
                    title: "Successfully Updated Your Message",
                    text: "Got it",
                    icon: "success"
                }).then((result) => {

                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });
            }

        }
    }

    r.open("POST", "cutomerContactProcess.php", true);
    r.send(form);
}





// function countItemPerpage() {
//     // alert("ok");

//     var option = document.getElementById("itemcount");

//     var f =new FormData();
//     f.append("o",option.value);

//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function () {
//         if (r.status == 200 & r.readyState == 4) {
//             var response = r.responseText;
//             alert(response);
//         }
//     }

//     r.open("POST", "loadHomeProductProcess.php", true);
//     r.send(f);
// }


function cartalertnavbar() {
    // alert("ok");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 & r.status == 200) {
            var response = r.responseText;
            // alert(response);
            if (response != "nouser") {
                var alert = document.getElementById("alertnavbar");
                alert.innerHTML = response;
            } else {
                var alert = document.getElementById("alertnavbar");
                alert.innerHTML = "0";
            }





        }
    };

    r.open("POST", "cartCountNumProcess.php", true);
    r.send();

}



//   Load chart 1

function loadChart1() {
    // alert("ok");
    var ctx = document.getElementById('myChart1');

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            var data = JSON.parse(response);

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: '# of Votes',
                        data: data.data,
                        borderWidth: 1

                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });


        }

    };


    request.open("POST", "loadChartProcess.php", true);
    request.send();
}


//  Load chart 2

function loadchart2() {
    // alert("ok");
    var ctx = document.getElementById('myChart2');

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            var data = JSON.parse(response);

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: '# of Votes',
                        data: data.data,
                        borderWidth: 1

                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });


        }

    };


    request.open("POST", "loadChartProcess.php", true);
    request.send();
}



//  Load chart 3

function loadchart3() {
    // alert("ok");
    var ctx = document.getElementById('myChart3');

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            var data = JSON.parse(response);

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.label1,
                    datasets: [{
                        label: '# of Votes',
                        data: data.data1,
                        borderWidth: 1

                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });


        }

    };


    request.open("POST", "loadChartProcess2.php", true);
    request.send();
}
