@extends('layouts.account')
@section('leftmenu')
<!-- <li>
<a href="registror/"><i class="fa fa-flesh fa-fw"></i> Home</a>
</li> -->
  <!-- <p>my leftmenu</p> -->
@endsection

@section('content')
  <div class="row">

                <div class="col-lg-2 col-md-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                  <div class="col-xs-9 text-right">
                                    <div class="huge"><center>26</center></div>
                                    <div><a href="/registror/students"><b style="color:white; cursor: progress;">Admitted Students</b></a></div>
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
                <div class="col-lg-2 col-md-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                  <div class="col-xs-9 text-right">
                                    <div class="huge"><center>26</center></div>
                                    <div><a href="/registror/applicants"><b style="color:white; cursor: progress;">Pending Applicants</b></a></div>
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
                <div class="col-lg-2 col-md-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                 <div class="col-xs-9 text-right">
                                    <div class="huge"><center>26</center></div>
                                    <div>Rejected Applicants </div>
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
                <div class="col-lg-2 col-md-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                   <div class="col-xs-9 text-right">
                                    <div class="huge"><center>26</center></div>
                                    <div>Library Records</div>
                                </div>
                            </div>
                        </div>
                      </div>
                      
                </div>
                <div class="col-lg-2 col-md-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                    <div class="col-xs-9 text-right">
                                    <div class="huge"><center>26</center></div>
                                    <div>Library Records</div>
                                </div>
                            </div>
                        </div>
                      </div></div>
                      <div class="col-lg-2 col-md-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                               <div class="row">
                                  <div class="col-xs-9 text-right">
                                    <div class="huge"><center>26</center></div>
                                    <div>Library Records</div>
                                </div>
                            </div>
                        </div>
                      </div>
                      </div>
                     
                      <!-- Applicants -->
            <?php if(Request::is('registror/applicants')): ?>
           <div class=row>
              <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            APPLICANTS
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Home</a>
                                </li>
                                 </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <h4>List Applicants</h4>
                                    <p>
                                    <table width="100%" class="table table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Applicant Names</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Program</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($applications as $applicants):?>
                                  <tr><td> {{$applicants->first_name}}&nbsp;
                                  {{$applicants->last_name}} </td>
                                  <td> {{$applicants->email}} </td>
                                  <td> {{$applicants->phone}} </td>
                                  <td> {{$applicants->program_name}} </td>
                                  <td> <a href="/registror/applicants?Applicant={{ $applicants->id}}"><k class="fa fa-times" style="font-size:18px;color:red" title="reject"></k></a> ||
                                  <a href="/registror/applicants?Applicant={{ $applicants->id}}"><k class="fa fa-check" style="font-size:18px;color:lightgreen" title="Admit"></k></a>||
                                  <a href="/registror/applicants?Applicant={{ $applicants->id}}"><k class="fa fa-eye" style="font-size:18px;color:blue" title="Profile"></k></a>
                                  </td>
                                  
                                  </tr>  
                                  <?php endforeach?>
                                  
                              </tbody>
                               </table>         
                                    </p>
                              </div>
                              </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                  </div>
                  
                  <?php endif ?> 
              <!-- Students -->
              <?php if(Request::is('registror/students')): ?>
           <div class=row>
              <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           students
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Home</a>
                                </li>
                                 </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <h4>List Students</h4>
                                    <p>
                                    <table width="100%" class="table table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Applicant Names</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Program</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($data as $applicants):?>
                                  <tr><td> {{$data->first_name}}&nbsp;
                                  {{$applicants->last_name}} </td>
                                  <td> {{$applicants->email}} </td>
                                  <td> {{$applicants->phone}} </td>
                                  <td> {{$applicants->program_name}} </td>
                                  <td> <a href="/registror/applicants?Applicant={{ $applicants->id}}"><k class="fa fa-times" style="font-size:18px;color:red" title="reject"></k></a> ||
                                  <a href="/registror/applicants?Applicant={{ $applicants->id}}"><k class="fa fa-check" style="font-size:18px;color:lightgreen" title="Admit"></k></a>||
                                  <a href="/registror/applicants?Applicant={{ $applicants->id}}"><k class="fa fa-eye" style="font-size:18px;color:blue" title="Profile"></k></a>
                                  </td>
                                  
                                  </tr>  
                                  <?php endforeach?>
                                  
                              </tbody>
                               </table>         
                                    </p>
                              </div>
                              </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                  </div>
                  
                  <?php endif ?> 

                  <!-- marks page -->
                  <?php if(Request::is('registror/marks')): ?>
           <div class=row>
              <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Marks
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Home</a>
                                </li>
                                 </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <h4>List Students</h4>
                                    <p>
                                    <table width="100%" class="table table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Applicant Names</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Program</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($marks as $applicants):?>
                                  <tr><td> {{$data->first_name}}&nbsp;
                                  {{$applicants->last_name}} </td>
                                  <td> {{$applicants->email}} </td>
                                  <td> {{$applicants->phone}} </td>
                                  <td> {{$applicants->program_name}} </td>
                                  <td> <a href="/registror/applicants?Applicant={{ $applicants->id}}"><k class="fa fa-times" style="font-size:18px;color:red" title="reject"></k></a> ||
                                  <a href="/registror/applicants?Applicant={{ $applicants->id}}"><k class="fa fa-check" style="font-size:18px;color:lightgreen" title="Admit"></k></a>||
                                  <a href="/registror/applicants?Applicant={{ $applicants->id}}"><k class="fa fa-eye" style="font-size:18px;color:blue" title="Profile"></k></a>
                                  </td>
                                  
                                  </tr>  
                                  <?php endforeach?>
                                  
                              </tbody>
                               </table>         
                                    </p>
                              </div>
                              </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                  </div>
                  
                  <?php endif ?> 
                  <!-- students learning status -->
                   <!-- marks page -->
                   <?php if(Request::is('registror/status')): ?>
           <div class=row>
              <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Suspended students
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Home</a>
                                </li>
                                 </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <h4>List Students</h4>
                                    <p>
                                    <table width="100%" class="table table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Applicant Names</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Program</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($marks as $applicants):?>
                                  <tr><td> {{$data->first_name}}&nbsp;
                                  {{$applicants->last_name}} </td>
                                  <td> {{$applicants->email}} </td>
                                  <td> {{$applicants->phone}} </td>
                                  <td> {{$applicants->program_name}} </td>
                                  <td> <a href="/registror/applicants?Applicant={{ $applicants->id}}"><k class="fa fa-times" style="font-size:18px;color:red" title="reject"></k></a> ||
                                  <a href="/registror/applicants?Applicant={{ $applicants->id}}"><k class="fa fa-check" style="font-size:18px;color:lightgreen" title="Admit"></k></a>||
                                  <a href="/registror/applicants?Applicant={{ $applicants->id}}"><k class="fa fa-eye" style="font-size:18px;color:blue" title="Profile"></k></a>
                                  </td>
                                  
                                  </tr>  
                                  <?php endforeach?>
                                  
                              </tbody>
                               </table>         
                                    </p>
                              </div>
                              </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                  </div>
                  
                  <?php endif ?> 
              
   


 </div>

@endsection
