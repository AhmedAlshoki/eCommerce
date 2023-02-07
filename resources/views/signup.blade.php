@extends('master')
@section('content')
    <section class="vh-100 bg-image"
        style="background-image: url('https://as2.ftcdn.net/v2/jpg/05/67/31/17/1000_F_567311706_Mo714WHtU7pG8JsdVAgMOvE0v0IfFCgM.jpg'); background-size:cover;">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100" >
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6" style="badding-left: 30px">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body-p-5">
                                <h2 class="text-uppercase text-center mb-5" style="color:rgb(0, 0, 0)">Create an account</h2>

                                <form method="POST" action="signup">
                                    @csrf
                                    <div class="profile-mr-3" style="padding-left: 40%">
                                        <img src="{{asset('storage/avatars/default.jpg')}}"
                                            alt="..." id="avatar-pic" width="130" height="130" class="rounded-mb-2-img-thumbnail">
                                            <br>
                                        <input type="file" accept="image/gif, image/jpeg, image/png , image/jpg"
                                            onchange="loadFile(event)" name="avatar" id="avatar" style="display: none;">
                                        <p><label  for="avatar">Upload Image</label></p>
                                    </div>
                                    <div class="profile-mr-3">
                                        <input type="text" id="form3Example1cg" class="form-control form-control-lg"
                                            name="name" />
                                        <label class="form-label" for="form3Example1cg">Your Name</label>
                                    </div>

                                    <div class="profile-mr-3">
                                        <input type="email" id="form3Example3cg" class="form-control form-control-lg"
                                            name="email" />
                                        <label class="form-label" for="form3Example3cg">Your <span style="color:rgb(249, 249, 249)">Email</span></label>
                                    </div>

                                    <div class="profile-mr-3">
                                        <input type="password" id="form3Example4cg" class="form-control form-control-lg"
                                            name="password" />
                                        <label class="form-label" for="form3Example4cg">
                                            <bold>Password
                                        </label>
                                    </div>

                                    <div class="profile-mr-3">
                                        <input type="password" id="form3Example4cdg" class="form-control form-control-lg"
                                            name="password2" />
                                        <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                                    </div>
                                    <div class="profile-mr-3">
                                        <input type="text" id="form3Example9cg" class="form-control form-control-lg"
                                            name="phone_number" />
                                        <label class="form-label" for="form3Example9cg">Phone Number</label>
                                    </div>
                                    <div class="profile-mr-3">
                                        <input type="number" id="credit" class="form-control form-control-lg"
                                            name="credit" />
                                        <label class="form-label" for="credit">Your Credit</label>
                                    </div>
                                    <div class="profile-mr-3">
                                        <label for="countries">Your Location</label>
                                        @php
                                            $countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla",
                                            "Antigua &amp; Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan",
                                            "Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda",
                                            "Bhutan","Bolivia","Bosnia &amp; Herzegovina","Botswana","Brazil","British Virgin Islands",
                                            "Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Cape Verde",
                                            "Cayman Islands","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica",
                                            "Cote D Ivoire","Croatia","Cruise Ship","Cuba","Cyprus","Czech Republic","Denmark","Djibouti",
                                            "Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Estonia",
                                            "Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia",
                                            "French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece",
                                            "Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana",
                                            "Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq",
                                            "Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan",
                                            "Kenya","Kuwait","Kyrgyz Republic","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya",
                                            "Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia",
                                            "Maldives","Mali","Malta","Mauritania","Mauritius","Mexico","Moldova","Monaco","Mongolia",
                                            "Montenegro","Montserrat","Morocco","Mozambique","Namibia","Nepal","Netherlands","Netherlands Antilles",
                                            "New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","Norway","Oman","Pakistan","Palestine","Panama",
                                            "Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania",
                                            "Russia","Rwanda","Saint Pierre &amp; Miquelon","Samoa","San Marino","Satellite","Saudi Arabia","Senegal","Serbia",
                                            "Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","South Africa","South Korea","Spain","Sri Lanka",
                                            "St Kitts &amp; Nevis","St Lucia","St Vincent","St. Lucia","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria",
                                            "Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad &amp; Tobago","Tunisia","Turkey",
                                            "Turkmenistan","Turks &amp; Caicos","Uganda","Ukraine","United Arab Emirates","United Kingdom","Uruguay","Uzbekistan",
                                            "Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
                                        @endphp
                                        <select name="location"  id ="countries" class="form-control form-control-lg" style="font-weight: bold;">
                                        @foreach ($countries as $country)
                                            <option value={{$country}} for ="countries" style="font-weight: bold;">{{$country}}</option>
                                        @endforeach
                                    </div>
                                    <div class="profile-mr-3">
                                        <input class="form-check-input-me-2" type="checkbox" value=""
                                            id="form2Example3cg" />
                                        <label class="form-check-label" for="form2Example3g">
                                            I agree all statements in <a href="#!" class="text-body"><u><span style="color:rgb(209, 98, 67)">Terms</span> of
                                                    service</u></a>
                                        </label>
                                    </div>

                                    <div class="profile-mr-3">
                                        <button type="submit"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                    </div>



                                </form>
                                <p class="text-center text-muted mt-5 mb-0" style="color:rgb(0, 0, 0)">Have already an account? <a
                                        href="/login" class="fw-bold text-body"><u>Login here</u></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var loadFile = function(event) {
                var image = document.getElementById('avatar_pic');
                image.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
        <style>
            #avatar{
                display: none;
            }
            #avatar-pic{
                border: 5px rgb(209, 98, 67) double;
            }
            label{
                color: rgb(0, 0, 0);
                font-family:Arial, Helvetica, sans-serif;
                letter-spacing: 3px;
            }
            .card-body-p-5 div{
                border: 5px rgb(239, 189, 82) solid;
            }
            .card-body-p-5 input{
                background-color: rgb(215, 214, 117);
                color:black ;
                font-weight: bold;
                position: relative;
                
            }
            #countries{
                background:rgb(215, 214, 117)
            }
            a{
                color:rgb(215, 214, 117)
            }
            a:hover{
                color:rgb(215, 214, 117);
            }
            .profile-mr-3{
                margin: 10px;
            }
            input[type=checkbox]:checked{
                accent-color:rgb(215, 214, 117);
            }
        </style>
    </section>
@endsection
