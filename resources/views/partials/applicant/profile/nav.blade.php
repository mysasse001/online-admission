<ul id="progressbar"
                class="d-none text-center text-muted w-100 list-unstyled d-flex justify-content-around d-none">
                <li class="flex-grow-1" >
                    <a style="{{request()->routeIs('step1') ? 'color:blue':'color:gray'}}" href="{{route('step1')}}" class="{{request()->routeIs('step1') ? 'active font-weight-bold':'text-black'}}"><b>STEP 1</b><BR><span
                        class="d-none d-md-inline">PRIMARY INFORMATION</a>
                </span>
                </li>
                <li class="flex-grow-1 " >
                    <a style="{{request()->routeIs('step2') ? 'color:blue':'color:gray'}}" style="color:gray" href="{{route('step2')}}" class="{{request()->routeIs('step2') ? 'active font-weight-bold':'text-black'}}"><b>STEP 2</b><br><span class="d-none d-md-inline">PERSONAL INFORMATION</span></a>
                </li>
                <li class="flex-grow-1" >
                    <a style="{{request()->routeIs('step3') ? 'color:blue':'color:gray'}}" href="{{route('step3')}}" class="{{request()->routeIs('step3') ? 'active font-weight-bold':''}}">
                    <b>STEP 3</b><br><span class="d-none d-md-inline">EDUCATION BACKROUND</span></a></li>
                    <li class="flex-grow-1" >
                        <a style="{{request()->routeIs('step4') ? 'color:blue':'color:gray'}}" href="{{route('step4')}}" class="{{request()->routeIs('step4') ? 'active font-weight-bold':''}}">
                        <b>STEP 4</b><br><span class="d-none d-md-inline">WORK EXPERIENCE</span>
                        </a>
                    </li>
                    <li class="flex-grow-1" >
                        <a style="{{request()->routeIs('step5') ? 'color:blue':'color:gray'}}" href="{{route('step5')}}" class="{{request()->routeIs('step5') ? 'active font-weight-bold':''}}">
                        <b>STEP 5</b><br><span class="d-none d-md-inline">CONTACT INFORMATION</span>
                        </a>
                    </li>
                    <li class="flex-grow-1" >
                        <a style="{{request()->routeIs('step6') ? 'color:blue':'color:gray'}}" href="{{route('step6')}}" class="{{request()->routeIs('step6') ? 'active font-weight-bold':''}}">
                        <b>STEP 6</b><br><span class="d-none d-md-inline">NEXT OF KIN</span>
                        </a>
                    </li>
                    {{-- <li class="flex-grow-1" >
                        <a style="{{request()->routeIs('step7') ? 'color:blue':'color:gray'}}" href="{{route('step7')}}" class="{{request()->routeIs('step7') ? 'active font-weight-bold':''}}">
                        <b>STEP 7</b><br><a class="d-none d-md-inline">EMERGENCY CONTACTS
                        </a>
                        </span>
                    </li> --}}
                    <li class="flex-grow-1" >
                        <a style="{{request()->routeIs('step8') ? 'color:blue':'color:gray'}}" href="{{route('step8')}}" class="{{request()->routeIs('step8') ? 'active font-weight-bold':''}}">
                        <b>STEP 7</b><br><span class="d-none d-md-inline">REFEREE CONTACT
                            </span>
                        </a>
                    </li>
                   
                <li class="flex-grow-1" >
                    <a style="{{request()->routeIs('step9') ? 'color:blue':'color:gray'}}" href="{{route('step9')}}" class="{{request()->routeIs('step9') ? 'active font-weight-bold':''}}">
                    <b>STEP 8</b><br><span class="d-none d-md-inline">PROGRAMME APPLICATION</span>
                    </a>
                </li>
            </ul>