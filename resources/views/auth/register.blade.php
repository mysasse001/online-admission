@extends('layouts.auth')

@section('auth')
@include('partials.welcome.nav')

<div class="container justify-content-center">
    <h3 class="text-center">Create an Account</h3>
    <div class="row">
        <div class="col-sm-12 col-md-12" style="margin-top:35px;">
            <form autocomplete="off" action="{{route('register')}}" method="post">
                @csrf
                <div class="row" id="updateStatus"></div>
                <!--  form inputs -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="APPAPPLICANTUSER_SURNAME">Surname <span class="text-red">*</span></label><input
                            class="form-control @error('surname') is-invalid @enderror" name="surname" type="text"
                            maxlength="100" />
                        @error('surname')
                        <span class="text-red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="APPAPPLICANTUSER_OTHER_NAME">Firstname | Middlename
                            <span class="text-red">*</span></label><input
                            class="form-control @error('name') is-invalid @enderror" name="name" type="text"
                            maxlength="100" />
                        @error('name')
                        <span class="text-red">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="APPAPPLICANTUSER_COUNTRY_CODE">Country <span
                                    class="text-red">*</span></label><select
                                class="form-control  @error('country_code') is-invalid @enderror" data-live-search="1"
                                data-style="btn-success" name="country_code">
                                <option value="93">Afghanistan (+93)</option>
                                <option value="358">Finland (+358)</option>
                                <option value="355">Albania (+355)</option>
                                <option value="213">Algeria (+213)</option>
                                <option value="1684">American Samoa (+1684)</option>
                                <option value="376">Andorra (+376)</option>
                                <option value="244">Angola (+244)</option>
                                <option value="1264">Anguilla (+1264)</option>
                                <option value="1268">Antigua and Barbuda (+1268)</option>
                                <option value="54">Argentina (+54)</option>
                                <option value="374">Armenia (+374)</option>
                                <option value="297">Aruba (+297)</option>
                                <option value="61">Cocos (Keeling) Islands (+61)</option>
                                <option value="43">Austria (+43)</option>
                                <option value="994">Azerbaijan (+994)</option>
                                <option value="1242">The Bahamas (+1242)</option>
                                <option value="973">Bahrain (+973)</option>
                                <option value="880">Bangladesh (+880)</option>
                                <option value="1246">Barbados (+1246)</option>
                                <option value="375">Belarus (+375)</option>
                                <option value="32">Belgium (+32)</option>
                                <option value="501">Belize (+501)</option>
                                <option value="229">Benin (+229)</option>
                                <option value="1441">Bermuda (+1441)</option>
                                <option value="975">Bhutan (+975)</option>
                                <option value="591">Bolivia (+591)</option>
                                <option value="5997">Bonaire (+5997)</option>
                                <option value="387">Bosnia and Herzegovina (+387)</option>
                                <option value="267">Botswana (+267)</option>
                                <option value="55">Brazil (+55)</option>
                                <option value="246">British Indian Ocean Territory (+246)</option>
                                <option value="1284">British Virgin Islands (+1284)</option>
                                <option value="673">Brunei (+673)</option>
                                <option value="359">Bulgaria (+359)</option>
                                <option value="226">Burkina Faso (+226)</option>
                                <option value="257">Burundi (+257)</option>
                                <option value="855">Cambodia (+855)</option>
                                <option value="237">Cameroon (+237)</option>
                                <option value="1">Canada&amp;United States (+1)</option>
                                <option value="238">Cape Verde (+238)</option>
                                <option value="1345">Cayman Islands (+1345)</option>
                                <option value="236">Central African Republic (+236)</option>
                                <option value="235">Chad (+235)</option>
                                <option value="56">Chile (+56)</option>
                                <option value="86">China (+86)</option>
                                <option value="57">Colombia (+57)</option>
                                <option value="269">Comoros (+269)</option>
                                <option value="242">Republic of the Congo (+242)</option>
                                <option value="243">Democratic Republic of the Congo (+243)</option>
                                <option value="682">Cook Islands (+682)</option>
                                <option value="506">Costa Rica (+506)</option>
                                <option value="385">Croatia (+385)</option>
                                <option value="53">Cuba (+53)</option>
                                <option value="5999">Cura?ao (+5999)</option>
                                <option value="357">Cyprus (+357)</option>
                                <option value="420">Czech Republic (+420)</option>
                                <option value="45">Denmark (+45)</option>
                                <option value="253">Djibouti (+253)</option>
                                <option value="1767">Dominica (+1767)</option>
                                <option value="1809">Dominican Republic (+1809)</option>
                                <option value="593">Ecuador (+593)</option>
                                <option value="20">Egypt (+20)</option>
                                <option value="503">El Salvador (+503)</option>
                                <option value="240">Equatorial Guinea (+240)</option>
                                <option value="291">Eritrea (+291)</option>
                                <option value="372">Estonia (+372)</option>
                                <option value="251">Ethiopia (+251)</option>
                                <option value="500">South Georgia (+500)</option>
                                <option value="298">Faroe Islands (+298)</option>
                                <option value="679">Fiji (+679)</option>
                                <option value="33">France (+33)</option>
                                <option value="594">French Guiana (+594)</option>
                                <option value="689">French Polynesia (+689)</option>
                                <option value="241">Gabon (+241)</option>
                                <option value="220">The Gambia (+220)</option>
                                <option value="995">Georgia (+995)</option>
                                <option value="49">Germany (+49)</option>
                                <option value="233">Ghana (+233)</option>
                                <option value="350">Gibraltar (+350)</option>
                                <option value="30">Greece (+30)</option>
                                <option value="299">Greenland (+299)</option>
                                <option value="1473">Grenada (+1473)</option>
                                <option value="590">Saint Martin (+590)</option>
                                <option value="1671">Guam (+1671)</option>
                                <option value="502">Guatemala (+502)</option>
                                <option value="44">United Kingdom (+44)</option>
                                <option value="224">Guinea (+224)</option>
                                <option value="245">Guinea-Bissau (+245)</option>
                                <option value="592">Guyana (+592)</option>
                                <option value="509">Haiti (+509)</option>
                                <option value="504">Honduras (+504)</option>
                                <option value="852">Hong Kong (+852)</option>
                                <option value="36">Hungary (+36)</option>
                                <option value="354">Iceland (+354)</option>
                                <option value="91">India (+91)</option>
                                <option value="62">Indonesia (+62)</option>
                                <option value="225">Ivory Coast (+225)</option>
                                <option value="98">Iran (+98)</option>
                                <option value="964">Iraq (+964)</option>
                                <option value="353">Republic of Ireland (+353)</option>
                                <option value="972">Israel (+972)</option>
                                <option value="39">Italy (+39)</option>
                                <option value="1876">Jamaica (+1876)</option>
                                <option value="81">Japan (+81)</option>
                                <option value="962">Jordan (+962)</option>
                                <option value="76">Kazakhstan (+76)</option>
                                <option value="254" selected="selected">Kenya (+254)</option>
                                <option value="686">Kiribati (+686)</option>
                                <option value="965">Kuwait (+965)</option>
                                <option value="996">Kyrgyzstan (+996)</option>
                                <option value="856">Laos (+856)</option>
                                <option value="371">Latvia (+371)</option>
                                <option value="961">Lebanon (+961)</option>
                                <option value="266">Lesotho (+266)</option>
                                <option value="231">Liberia (+231)</option>
                                <option value="218">Libya (+218)</option>
                                <option value="423">Liechtenstein (+423)</option>
                                <option value="370">Lithuania (+370)</option>
                                <option value="352">Luxembourg (+352)</option>
                                <option value="853">Macau (+853)</option>
                                <option value="389">Republic of Macedonia (+389)</option>
                                <option value="261">Madagascar (+261)</option>
                                <option value="265">Malawi (+265)</option>
                                <option value="60">Malaysia (+60)</option>
                                <option value="960">Maldives (+960)</option>
                                <option value="223">Mali (+223)</option>
                                <option value="356">Malta (+356)</option>
                                <option value="692">Marshall Islands (+692)</option>
                                <option value="596">Martinique (+596)</option>
                                <option value="222">Mauritania (+222)</option>
                                <option value="230">Mauritius (+230)</option>
                                <option value="262">R?union (+262)</option>
                                <option value="52">Mexico (+52)</option>
                                <option value="691">Federated States of Micronesia (+691)</option>
                                <option value="373">Moldova (+373)</option>
                                <option value="377">Monaco (+377)</option>
                                <option value="976">Mongolia (+976)</option>
                                <option value="382">Montenegro (+382)</option>
                                <option value="1664">Montserrat (+1664)</option>
                                <option value="212">Western Sahara (+212)</option>
                                <option value="258">Mozambique (+258)</option>
                                <option value="95">Myanmar (+95)</option>
                                <option value="264">Namibia (+264)</option>
                                <option value="674">Nauru (+674)</option>
                                <option value="977">Nepal (+977)</option>
                                <option value="31">Netherlands (+31)</option>
                                <option value="687">New Caledonia (+687)</option>
                                <option value="64">Pitcairn Islands (+64)</option>
                                <option value="505">Nicaragua (+505)</option>
                                <option value="227">Niger (+227)</option>
                                <option value="234">Nigeria (+234)</option>
                                <option value="683">Niue (+683)</option>
                                <option value="672">Norfolk Island (+672)</option>
                                <option value="850">North Korea (+850)</option>
                                <option value="1670">Northern Mariana Islands (+1670)</option>
                                <option value="47">Norway (+47)</option>
                                <option value="968">Oman (+968)</option>
                                <option value="92">Pakistan (+92)</option>
                                <option value="680">Palau (+680)</option>
                                <option value="970">Palestine (+970)</option>
                                <option value="507">Panama (+507)</option>
                                <option value="675">Papua New Guinea (+675)</option>
                                <option value="595">Paraguay (+595)</option>
                                <option value="51">Peru (+51)</option>
                                <option value="63">Philippines (+63)</option>
                                <option value="48">Poland (+48)</option>
                                <option value="351">Portugal (+351)</option>
                                <option value="1787">Puerto Rico (+1787)</option>
                                <option value="974">Qatar (+974)</option>
                                <option value="383">Republic of Kosovo (+383)</option>
                                <option value="40">Romania (+40)</option>
                                <option value="7">Russia (+7)</option>
                                <option value="250">Rwanda (+250)</option>
                                <option value="290">Saint Helena (+290)</option>
                                <option value="1869">Saint Kitts and Nevis (+1869)</option>
                                <option value="1758">Saint Lucia (+1758)</option>
                                <option value="508">Saint Pierre and Miquelon (+508)</option>
                                <option value="1784">Saint Vincent and the Grenadines (+1784)</option>
                                <option value="685">Samoa (+685)</option>
                                <option value="378">San Marino (+378)</option>
                                <option value="239">S?o Tom? and Pr?ncipe (+239)</option>
                                <option value="966">Saudi Arabia (+966)</option>
                                <option value="221">Senegal (+221)</option>
                                <option value="381">Serbia (+381)</option>
                                <option value="248">Seychelles (+248)</option>
                                <option value="232">Sierra Leone (+232)</option>
                                <option value="65">Singapore (+65)</option>
                                <option value="1721">Sint Maarten (+1721)</option>
                                <option value="421">Slovakia (+421)</option>
                                <option value="386">Slovenia (+386)</option>
                                <option value="677">Solomon Islands (+677)</option>
                                <option value="252">Somalia (+252)</option>
                                <option value="27">South Africa (+27)</option>
                                <option value="82">South Korea (+82)</option>
                                <option value="211">South Sudan (+211)</option>
                                <option value="34">Spain (+34)</option>
                                <option value="94">Sri Lanka (+94)</option>
                                <option value="249">Sudan (+249)</option>
                                <option value="597">Suriname (+597)</option>
                                <option value="4779">Svalbard and Jan Mayen (+4779)</option>
                                <option value="268">Swaziland (+268)</option>
                                <option value="46">Sweden (+46)</option>
                                <option value="41">Switzerland (+41)</option>
                                <option value="963">Syria (+963)</option>
                                <option value="886">Taiwan (+886)</option>
                                <option value="992">Tajikistan (+992)</option>
                                <option value="255">Tanzania (+255)</option>
                                <option value="66">Thailand (+66)</option>
                                <option value="670">East Timor (+670)</option>
                                <option value="228">Togo (+228)</option>
                                <option value="690">Tokelau (+690)</option>
                                <option value="676">Tonga (+676)</option>
                                <option value="1868">Trinidad and Tobago (+1868)</option>
                                <option value="216">Tunisia (+216)</option>
                                <option value="90">Turkey (+90)</option>
                                <option value="993">Turkmenistan (+993)</option>
                                <option value="1649">Turks and Caicos Islands (+1649)</option>
                                <option value="688">Tuvalu (+688)</option>
                                <option value="256">Uganda (+256)</option>
                                <option value="380">Ukraine (+380)</option>
                                <option value="971">United Arab Emirates (+971)</option>
                                <option value="598">Uruguay (+598)</option>
                                <option value="998">Uzbekistan (+998)</option>
                                <option value="678">Vanuatu (+678)</option>
                                <option value="58">Venezuela (+58)</option>
                                <option value="84">Vietnam (+84)</option>
                                <option value="681">Wallis and Futuna (+681)</option>
                                <option value="967">Yemen (+967)</option>
                                <option value="260">Zambia (+260)</option>
                                <option value="263">Zimbabwe (+263)</option>
                            </select>
                            @error('country_code')
                            <span class="text-red">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="APPAPPLICANTUSER_MOBILE_NO">Mobile No <span
                                    class="text-red">*</span></label><input
                                class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                                type="number" maxlength="30" />
                            @error('telephone')
                            <span class="text-red">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- this section will apply on registration -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="APPAPPLICANTUSER_EMAIL_ADDRESS">Email Address <span
                                    class="text-red">*</span></label><input
                                class="form-control nopaste @error('email') is-invalid @enderror" name="email"
                                type="email" maxlength="100" />
                            @error('email')
                            <span class="text-red">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

        </div>
        <!-- the normal password fields -->
        <div class="col-md-12">
            <div class="form-group">
                <label for="APPAPPLICANTUSER_PASSWORD">Password <span class="text-red">*</span></label><input
                    class="form-control @error('password') is-invalid @enderror" id="typepass" name="password"
                    type="password" />
                @error('password')
                <span class="text-red">{{$message}}</span>
                @enderror
                <input type="checkbox" onclick="Toggle()">
                <b>Show Password</b>

                <script>
                    // Change the type of input to password or text
                    function Toggle() {
                        var temp = document.getElementById("typepass");
                        if (temp.type === "password") {
                            temp.type = "text";
                        } else {
                            temp.type = "password";
                        }
                    }
                </script>
            </div>
        </div>
        <!-- terms and conditions section -->
        <div class="col-md-12">
            <input id="ytAPPAPPLICANTUSER_AGREE" type="hidden" value="0" name="APPAPPLICANTUSER[AGREE]" /><input
                value="1" class="css-checkbox" name="APPAPPLICANTUSER[AGREE]" id="APPAPPLICANTUSER_AGREE"
                type="checkbox" /><label class="css-label" for="APPAPPLICANTUSER_AGREE">I Agree
                to the <a href="/terms_and_conditions.pdf">Terms and conditions</a></label>
        </div>
        <hr />
        <!-- end of registration section -->

        <!-- This section will apply on update only -->

        <!-- End of update section -->

        <!-- buttons -->

        <!-- Registration controls here -->

        <div class="col-md-6">
            <a class="btn btn-default btn-block btn-raised" href="{{route('login')}}">Sign
                in</a> </div>
        <div class="col-md-6">
            <button class="btn btn-success btn-block btn-raised" type="submit">Register</button> </div>
        </form>
        <br>
        <br>
        <div class="col-md-12 mt-3">
            <a href="/how_to_apply.pdf" class="btn btn-primary btn-sm btn-block icon-wrench"
                title="Download a help guide on how to apply">How it Works</a>
        </div>
    </div>
</div>
<!-- end content here-->
</div>
@include('partials.footer')


@endsection
