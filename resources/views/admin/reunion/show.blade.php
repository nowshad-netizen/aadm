@extends('layouts.backend.app')
@section('title','')
@push('custom-css')
<link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" ref="stylesheet">
@endpush
@section('content')
    
<div class="container-fluid">
  <div class="row clearfix">
        <div class="block-header">
                <a class="btn btn-primary waves-effect" href="/admin/authors/pending">
                    <i class="material-icon">pending</i>
                    <span></span>
                </a>
                </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        User Data
                    </h2>
                    
                    </div>
                </div>
                <div class="body">
                    <div class="table-responsive" >
                        <table  class="table table-bordered table-striped table-hover display" id="example" >
                            <thead>
                               
                                <tr>
                                    <th>SR</th>
                                    <th>Information</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tfoot>
                               
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>ALUMNI ASSOCIATION, DEPARTMENT OF MATHEMATICS</td>
                                    <td>GOVT. B.M COLLEGE ,BARISHAL</td>

                                </tr>
                            <tr>
                                <td>1</td>
                                <td>ID</td>
                                <td>{{$user->id}}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Name</td>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Number</td>
                                <td>{{$user->number}}  
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Bangla name</td>
                                <td>{{$user->bame}}</td>
                            </tr>
                            
                            <tr>
                                <td>5</td>
                                <td>Father's Name</td>
                                <td>{{$user->f_name}}</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Mothers Name</td>
                                <td>{{$user->m_name}} </td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Presend Address</td> 
                                <td>{{$user->present_address}}</td>
                            </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Parmanent Address</td> 
                                    <td>{{$user->permanent_address}}</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Date of Birth</td>
                                    <td>{{$user->dob}}</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Religion</td>
                                    <td>{{$user->religion}}</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>blood group</td>
                                    <td>{{$user->blood}}</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>Passed out Year</td>
                                    <td>{{$user->passed}}</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>Hons:session</td>
                                    <td>{{$user->hon_session}}</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>Masters: session </td>
                                    <td>{{$user->masters_session}}</td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td>Job Descriptiion </td>
                                    <td>{{$user->about_job}}</td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td>facebook link </td>
                                    <td><a href="{{$user->fblink}}">Facebook link</a></td>
                                </tr> 
                                <tr>
                                    <td>17</td>
                                    <td>Email</td> 
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <td>18</td>
                                    <td>spouse Name</td>   
                                    <td>{{$user->spous_name}}</td>
                                </tr>  
                                <tr>
                                    <td>19</td>
                                    <td>spouse Occupation </td>
                                    <td>{{$user->occupation}}</td>
                                </tr>
                                <tr>
                                    <td>20</td>
                                    <td>number of kids</td>
                                    <td>{{$user->number_of_kids}}</td>
                                </tr>
                                <tr>
                                    <td>21</td>
                                    <td>special Intterest</td>
                                    <td>{{$user->interest}}</td>
                                </tr>
                                <tr>
                                    <td>22</td>
                                    <td>Payment Date</td>
                                    <td>{{$user->payment_date}}</td>
                                </tr> 
                                <tr>
                                    <td>23</td>
                                    <td>Varified By(Name)</td>
                                    <td>{{$user->approve_by}}</td>
                                </tr> 
                                <tr>
                                    <td>24</td>
                                    <td>created_at</td>
                                    <td>{{$user->created_at}}</td>
                                </tr>   
                                <tr>
                                    <td>Signature : </td>
                                    <td>
                                        General Secretary:________
                                    </td>
                                    <td>President:_________</td>
                                
                                </tr>  
                
                            </tbody>
                        </table>
                    </div>
                </div>
 
                            
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->

</div>
@endsection
@push('js')
       <!-- Jquery DataTable Plugin Js -->
       <script>
            function myFunction() {
              confirm("are you sure you want to delete it !");
            }
            </script>
        <script>
            $('#example').append('<caption style="caption-side: bottom">Alumni Assocition ,Department of Mathematics</caption>');

            $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                "paging":   false,
                "ordering": false,
                "info":     false,
                buttons: [
                    'print',
                    {
                extend: 'excel',
                messageTop: 'Alumni Assocition ,Department of Mathematics'
                },
                {
                extend: 'pdf',
                messageBottom: 'Alumni Assocition ,Department of Mathematics'
            },
            

                ]
                
            } );
        } );
 
        </script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
       <script src="{{ asset('assets/backend/js/pages/tables/jquery-datatable.js') }}"></script>
@endpush

