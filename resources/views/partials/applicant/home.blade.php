    <div class="row">
        <div class="card col-md-4  col-sm-6 mt-2">
            <div class="card-header bg-blue">
                <i class="fa fa-comments fa-5x"></i>
                <div class="float-right">
                    <h1 class="float-right">0</h1><br>
                    <p class="float-right">Unread Messages</p>
                </div>
            </div>
            <div class="card-body">
                <a class="btn float-right btn-primary btn-sm">VIEW MESSAGES</a>
            </div>

        </div>
        <div class="card col-md-4  col-sm-6 mt-2">
            <div class="card-header bg-success">
                <i class="fa fa-folder-open fa-5x"></i>
                <div class="float-right">
                    <h1 class="float-right">0</h1><br>
                    <p class="float-right">Submitted Applications</p>
                </div>
            </div>
            <div class="card-body">
                <a class="btn float-right btn-outline-success btn-sm">VIEW SUBMITTED APPLICATIONS</a>
            </div>

        </div>
        <div class="card col-md-4  col-sm-6 mt-2">
            <div class="card-header bg-orange">
                <i class="fa fa-university fa-5x"></i>
                <div class="float-right">
                    <h1 class="float-right">{{$openProgammes}}</h1><br>
                    <p class="float-right">Open {{$openProgammes ==1 ? 'Programme':'Programmes'}}</p>
                </div>
            </div>
            <div class="card-body">
                <a  href="{{route('apply-admission')}}" class="btn float-right btn-primary btn-sm">APPLY NOW</a>
            </div>

        </div>


    </div>
 <div class="container-fluid">
     <div class="row">
         <div class="col-md-12 table-responsive">
           <table class="table">
               <thead>
                   <tr>
                       {{-- <th>Course</th> --}}
                       {{-- <th>Intake Period</th>
                       <th>Duration</th>
                       <th>Fees Statement</th>
                       <th>Fees Cleared</th>
                       <th>Application Ref.No</th>
                       <th>Application Date</th>
                       <th>Status</th>
                       <th>Message</th>
                       <th>Mode of Study</th>
                       <th>Check Progress </th>
                       <th>Action</th> --}}
                   </tr>
               </thead>
               <tbody>
                   @foreach(auth()->user()->application as $application)
                  <tr>
                    <td>{{$application->programme->name}}</td>
                    <td>{{ $application->programme->intake->name }}---{{ $application->programme->academicYear->name }}</td>
                    <td>{{$application->programme->duration}}</td>
                    <td>
                        @if(!is_null($application->fees_statement))
                        {{$application->fees_statement}}
                        @else
                        <a href="{{route('completeApplicationStep2',['programme'=>$application->programme->slug])}}" class="text-danger">Clear {{'KES.'.number_format($application->programme->category->amount,2)}} Fees</a>
                        @endif
                    </td>
                    <td>
                        @if($application->fees_cleared == 'yes')
                        <span class="text-success">{{$application->fees_cleared}}</span>
                        @endif
                        @if($application->fees_cleared == 'no')
                        <span class="text-danger">{{$application->fees_cleared}}</span>
                        @endif
                    </td>
                    <td>{{$application->ref_no}}</td>
                    <td>{{date('Y-m-d',strtotime($application->created_at))}}</td>
                    <td>
                        @if($application->applicationStatus->name == 'pending')
                        <span class="badge badge-secondary">{{$application->applicationStatus->name}}</span>
                        @endif
                        @if($application->applicationStatus->name == 'on-hold')
                        <span class="badge badge-warning">{{$application->applicationStatus->name}}</span>
                        @endif
                        @if($application->applicationStatus->name == 'scheduled')
                        <span class="badge badge-success">{{$application->applicationStatus->name}}</span>
                        @endif
                        @if($application->applicationStatus->name == 'done')
                        <span class="badge badge-primary">{{$application->applicationStatus->name}}</span>
                        @endif
                    </td>
                    <td>Message</td>
                    <td>{{$application->modeOfStudy->name}}</td>
                    <td>Dashboard</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del{{$application->id}}">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="del{{$application->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <form action="{{route('application.delete',$application)}}" method="POST" class="modal-dialog" role="document">
                                @csrf
                                @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Application</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete your,<b>{{$application->programme->name}} application</b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
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
     </div>
 </div>
    <div class="row">
        courses I have taken|their progress|
        notifications 
        add emails for both to receive email after first steps and every step
        add percent to know how far remaining
        from show programme add the ability to intake it
        programme status is it open or closed
        put the target number needed if it reaches then it closes itself automatically it is  no longer open then see programme appliacnt and target as admin

        can only apply once and this feature

        when I delete the course I had taken is when i can select another course
    </div>
