@extends('layouts.app')

@section('title', 'Create Fre Account')

@push('styles')
<link rel='stylesheet' href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="{{ asset('default/assets/css/theme.min.css') }}" rel="stylesheet">
<style>
    input[type="file"] {
        display: block;
    }

    .imageThumb {
        max-height: 75px;
        border: 2px solid;
        padding: 1px;
        cursor: pointer;
    }

    .pip {
        display: inline-block;
        margin: 10px 10px 0 0;
    }

    .remove {
        display: block;
        background: #444;
        border: 1px solid black;
        color: white;
        text-align: center;
        cursor: pointer;
    }

    .remove:hover {
        background: white;
        color: black;
    }
</style>
<style>
    #progressbar .active {
        color: #3b5998
    }

    #progressbar #location-information:before {
        font-family: FontAwesome;
        content: "STEP 1"
    }

    #progressbar #critical-details:before {
        font-family: FontAwesome;
        content: "\f05a"
    }

    #progressbar #units:before {
        font-family: FontAwesome;
        content: "\f00b"
    }

    #progressbar #features:before {
        font-family: FontAwesome;
        content: "\f53f"
    }

    #progressbar #media-information:before {
        font-family: FontAwesome;
        content: "\f87c"
    }

    #progressbar #confirm:before {
        font-family: FontAwesome;
        content: "\f00c"
    }

    #progressbar li:before {
        width: 48px;
        height: 48px;
        line-height: 45px;
        display: block;
        font-size: 20px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px
    }

    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #3b5998
    }

    .progress {
        height: 1rem;
    }

    .progress-bar {
        background-color: #3b5998
    }
</style>
@endpush

@section('content')
<div class="">
    <h4 class="text-center">Update Your Information</h4>
    @if ($errors->any())

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <ul>

            @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- progressbar -->
    <div class="d-none d-lg-block">
        @include('partials.applicant.profile.nav')
    </div>

    <div class="progress mt-3 d-none">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0"
            aria-valuemax="100"></div>
    </div>
    <div class="mt-3">
        <H3>Academic Referee</H3>


    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
        <i class="fa fa-plus" aria-hidden="true"></i> Referee Contact
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <form action="{{route('step8.store')}}" method="POST" id="file-form" class="modal-dialog" role="document">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Referee Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label for="">Title</label>
                                  <select class="form-control" name="title_id" id="">
                                    <option value="">--select  Title--</option>
                                    @foreach($titles as $title)
                                    <option value="{{$title->id}}">{{$title->name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Full Names</label>
                                    <input type="text" name="name" id="" 
                                        class="form-control @error('name') is-invalid @enderror" placeholder=""
                                        aria-describedby="helpId">
                                    @error('name')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="APPAPPLICANTUSER_COUNTRY_CODE">Country <span
                                            class="text-red">*</span></label><select
                                        class="form-control  @error('country_code') is-invalid @enderror"
                                        data-live-search="1" data-style="btn-success" name="country_code">
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
                        <div class="row">
                            <div class="col-md-6">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="PostalAddress">Postal Address <span
                                            class="text-red">*</span></label><input
                                        class="form-control nopaste @error('postal_address') is-invalid @enderror"
                                        name="postal_address" type="text" maxlength="100" />
                                    @error('postal_address')
                                    <span class="text-red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postalCode">Postal Code <span class="text-red">*</span></label><input
                                        class="form-control nopaste @error('postal_code') is-invalid @enderror"
                                        name="postal_code" type="text" maxlength="100" />
                                    @error('postal_code')
                                    <span class="text-red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="PostalAddress">Town <span class="text-red">*</span></label><input
                                        class="form-control nopaste @error('town') is-invalid @enderror" name="town"
                                        type="text" maxlength="100" />
                                    @error('town')
                                    <span class="text-red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="PostalAddress">Nationality <span class="text-red">*</span></label><input
                                        class="form-control nopaste @error('nationality') is-invalid @enderror"
                                        name="nationality" type="text" maxlength="100" />
                                    @error('nationality')
                                    <span class="text-red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label for="">Gender</label>
                                  <select class="form-control" name="gender" id="">
                                    <option value="">--select gender--</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                  </select>
                                </div>
                            </div>
                        </div>

                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="button" id="file-button"
                                class="btn btn-outline-primary btn-sm">
                                <div class="d-inline-flex">
                                    <span id="spinner" class="d-none">
                                        please wait...
                                        <div class="spinner-grow text-success" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                               
                                    </span>
                                    <span id="ms-2">Save</span>
                                </div>
                            </button>
                </div>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Name</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Postal Address</th>
                    <th>Postal Code</th>
                    <th>Town</th>
                    <th>Nationality</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach(auth()->user()->refereeContacts as $refereeContact)
                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$refereeContact->title->name}}</td>
                    <td>{{$refereeContact->name}}</td>
                    <td>{{$refereeContact->telephone}}</td>
                    <td>{{$refereeContact->email}}</td>
                    <td>{{$refereeContact->postal_address}}</td>
                    <td>{{$refereeContact->postal_code}}</td>
                    <td>{{$refereeContact->town}}</td>
                    <td>{{$refereeContact->nationality}}</td>
                    <td>{{$refereeContact->gender}}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#edit{{$refereeContact->id}}">
                            <i class="fas fa-edit    "></i>
                        </button>
    
                        <!-- Modal -->
                        <div class="modal fade" id="edit{{$refereeContact->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="modelTitleId" aria-hidden="true">
                            <form action="{{route('step8.update',$refereeContact)}}" method="POST" class="modal-dialog" role="document">
                                @csrf
                                @method('PATCH')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                      <label for="">Title</label>
                                                      <select class="form-control" name="title_id" id="">
                                                          @if($refereeContact->title_id)
                                                          <option value="{{$refereeContact->id}}">{{$refereeContact->title->name}}</option>
                                                          @else
                                                        <option value="">--select  Title--</option>
                                                        @endif
                                                        @foreach($titles as $title)
                                                        <option value="{{$title->id}}">{{$title->name}}</option>
                                                        @endforeach
                                                      </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="">Full Names</label>
                                                        <input type="text" name="name" id="" value="{{$refereeContact->name}}"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            placeholder="" aria-describedby="helpId">
                                                        @error('name')
                                                        <span style="color:red">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
    
                                                    <div class="form-group">
                                                        <label for="APPAPPLICANTUSER_COUNTRY_CODE">Country <span
                                                                class="text-red">*</span></label><select
                                                            class="form-control  @error('country_code') is-invalid @enderror"
                                                            data-live-search="1" data-style="btn-success"
                                                            name="country_code">
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
                                                            <option value="246">British Indian Ocean Territory (+246)
                                                            </option>
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
                                                            <option value="243">Democratic Republic of the Congo (+243)
                                                            </option>
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
                                                            <option value="691">Federated States of Micronesia (+691)
                                                            </option>
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
                                                            <option value="1784">Saint Vincent and the Grenadines (+1784)
                                                            </option>
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
                                                            class="form-control @error('telephone') is-invalid @enderror"
                                                            value="{{$refereeContact->telephone}}" name="telephone"
                                                            type="number" maxlength="30" />
                                                        @error('telephone')
                                                        <span class="text-red">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="APPAPPLICANTUSER_EMAIL_ADDRESS">Email Address <span
                                                                class="text-red">*</span></label><input
                                                            class="form-control nopaste @error('email') is-invalid @enderror"
                                                            value="{{$refereeContact->email}}" name="email" type="email"
                                                            maxlength="100" />
                                                        @error('email')
                                                        <span class="text-red">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="PostalAddress">Postal Address <span
                                                                class="text-red">*</span></label><input
                                                            class="form-control nopaste @error('postal_address') is-invalid @enderror"
                                                            value="{{$refereeContact->postal_address}}"
                                                            name="postal_address" type="text" maxlength="100" />
                                                        @error('postal_address')
                                                        <span class="text-red">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="postalCode">Postal Code <span
                                                                class="text-red">*</span></label><input
                                                            class="form-control nopaste @error('postal_code') is-invalid @enderror"
                                                            value="{{$refereeContact->postal_code}}" name="postal_code"
                                                            type="text" maxlength="100" />
                                                        @error('postal_code')
                                                        <span class="text-red">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="PostalAddress">Town <span
                                                                class="text-red">*</span></label><input
                                                            class="form-control nopaste @error('town') is-invalid @enderror"
                                                            value="{{$refereeContact->town}}" name="town" type="text"
                                                            maxlength="100" />
                                                        @error('town')
                                                        <span class="text-red">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="PostalAddress">Nationality <span
                                                                class="text-red">*</span></label><input
                                                            class="form-control nopaste @error('nationality') is-invalid @enderror"
                                                            value="{{$refereeContact->nationality}}" name="nationality"
                                                            type="text" maxlength="100" />
                                                        @error('nationality')
                                                        <span class="text-red">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label for="">Gender</label>
                                                      <select class="form-control" name="gender" id="">
                                                        @if($refereeContact->gender)
                                                        <option value="{{$refereeContact->gender}}">{{$refereeContact->gender}}</option>
                                                        @else
                                                        <option value="">--select gender--</option>
                                                        @endif
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                      </select>
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
    
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#del{{$refereeContact->id}}">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
    
                        <!-- Modal -->
                        <div class="modal fade" id="del{{$refereeContact->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="modelTitleId" aria-hidden="true">
                            <form action="{{route('step8.delete',$refereeContact)}}" method="POST" class="modal-dialog"
                                role="document">
                                @CSRF
                                @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete,<b>{{$refereeContact->name}}</b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger btn-sm">Confirm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex align-items-center justify-content-between py-3 mt-5">
        <a href="{{route('step7')}}" class="btn btn-secondary ">Previous</a>
        <a href="{{route('step9')}}" class="btn btn-primary  ms-2">Next</a>
    </div>
</div>
<script>
    const momentButton = document.getElementById('file-button')
    const momentForm = document.getElementById('file-form')
    const spinner = document.getElementById('spinner')
    const ms2 = document.getElementById('ms-2')


    if (momentButton) {
        momentButton.addEventListener('click', event => {
            spinner.classList.remove('d-none')
            ms2.classList.add('d-none')

            setTimeout(() => {
                momentForm.submit()
            }, 3)
        })
    }
</script>

<script>
    function visibility3() {
        var x = document.getElementById('login_password');
        if (x.type === 'password') {
            x.type = "text";
            $('#eyeShow').show();
            $('#eyeSlash').hide();
        } else {
            x.type = "password";
            $('#eyeShow').hide();
            $('#eyeSlash').show();
        }
    }
</script>
<script>
    function myFunction() {
        var x = document.getElementById("*passwordbox-id*");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<script src="{{ asset('default/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('default/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('default/assets/js/bootstrap.min.js') }}"></script>
@endsection



<!-- Preview Images Scripts -->
@push('scripts')
<script>
    let filesElement = document.getElementById('files')

    let filesPrevewZone = document.getElementById('files-preview')


    filesElement.addEventListener('change', event => {

        files = event.target.files;

        if (files.length > 0) {

            for (let i = 0; i < files.length; i++) {

                const file = files[i];

                let fileReader = new FileReader();

                fileReader.onload = e => {

                    let radioWrapperDiv = document.createElement('div');
                    radioWrapperDiv.setAttribute('class', 'col-md-4 mt-3');

                    let inputElement = document.createElement('input');
                    inputElement.setAttribute('type', 'radio');
                    // inputElement.setAttribute('class', 'd-none');
                    inputElement.setAttribute('name', 'cover_image');
                    inputElement.setAttribute('value', i);
                    inputElement.setAttribute('id', `property-file-input-${i}`)

                    let labelElement = document.createElement('label');
                    labelElement.setAttribute('for', `property-file-input-${i}`)

                    labelElement.onclick = labelClickEvent => {
                        labelClickEvent.target.nextElementSibling.click()
                        target.parentElement().addClass('shadow-sm border')
                    }

                    let imageElement = document.createElement('img');
                    imageElement.setAttribute('src', e.target.result);
                    imageElement.setAttribute('class', 'w-100');

                    labelElement.appendChild(imageElement)
                    radioWrapperDiv.appendChild(labelElement)
                    radioWrapperDiv.appendChild(inputElement)

                    filesPrevewZone.appendChild(radioWrapperDiv)
                }

                fileReader.readAsDataURL(file);
            }
        }
    })
</script>
@endpush

<!-- Mutistep form code -->
@push('scripts')
<script>
    $(document).ready(function () {

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;

        setProgressBar(current);

        $(".next").click(function () {
            current_fs = $(this).parent().parent();
            next_fs = $(this).parent().parent().next();

            //Validation
            if (!validateFieldSet(current_fs)) return;

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 500
            });
            setProgressBar(++current);
        });

        $(".previous").click(function () {

            current_fs = $(this).parent().parent();
            previous_fs = $(this).parent().parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 500
            });
            setProgressBar(--current);
        });

        function setProgressBar(curStep) {
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width", percent + "%")
        }

        $(".submit").click(function () {
            return false;
        })

        /** 
         * Check if the current fieldset has been filled correctly
         * 
         * @return Boolean (true if filled correctly else false)
         */
        function validateFieldSet(currentFieldset) {

            var inputs = currentFieldset.find('input.required')
            var textareas = currentFieldset.find('textarea.required')
            var selects = currentFieldset.find('select.required')

            var fieldsetValid = true;

            inputs.each(function () {
                let fieldValue = $(this).val();
                if (fieldValue === '' || fieldValue === undefined || fieldValue === null) {
                    $(this).addClass('is-invalid')

                    fieldsetValid = false;
                }
            })

            textareas.each(function () {
                let fieldValue = $(this).val();

                if ($(this).prop('id') == 'description') {
                    console.log(document.getElementById("description").value)
                }

                if (fieldValue === '' || fieldValue === undefined || fieldValue === null) {
                    $(this).addClass('is-invalid')
                    fieldsetValid = false;
                }
            })

            selects.each(function () {

                if ($(this).prop('multiple')) {

                    console.log($(this).val())

                    if (!$(this).val().length) {

                        $(this).addClass('is-invalid')

                        if ($(this).prop('id') == 'types') {

                            $('#types-error-display').removeClass('d-none');

                        }

                        fieldsetValid = false;
                    }

                } else {
                    let fieldValue = $(this).val();
                    if (fieldValue === '' || fieldValue === undefined || fieldValue === null) {
                        $(this).addClass('is-invalid')
                        fieldsetValid = false;
                    }

                }
            })

            return fieldsetValid;
        }

        $("input").focus(function () {
            $(this).removeClass('is-invalid');
        });

        $("select").focus(function () {
            $(this).removeClass('is-invalid');
        })

        $("textarea").focus(function () {
            $(this).removeClass('is-invalid');
        })

    });
</script>
@endpush

@push('scripts')
<script>
    $(document).ready(function () {
        if (window.File && window.FileList && window.FileReader) {
            $("#files").on("change", function (e) {
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function (e) {
                        var file = e.target;
                        $("<span class=\"pip\">" +
                            "<img class=\"imageThumb\" src=\"" + e.target.result +
                            "\" title=\"" + file.name + "\"/>" +
                            "<br/><span class=\"remove\">Remove image</span>" +
                            "</span>").insertAfter("#files");
                        $(".remove").click(function () {
                            $(this).parent(".pip").remove();
                        });

                        // Old code here
                        /*$("<img></img>", {
                          class: "imageThumb",
                          src: e.target.result,
                          title: file.name + " | Click to remove"
                        }).insertAfter("#files").click(function(){$(this).remove();});*/

                    });
                    fileReader.readAsDataURL(f);
                }
            });
        } else {
            alert("Your browser doesn't support to File API")
        }
    });
</script>
@endpush

<!-- FontAweome JS Dependancy for Unicodes used -->
@push('scripts')
<script src="https://kit.fontawesome.com/dbe4660ebe.js" crossorigin="anonymous"></script>
@endpush
