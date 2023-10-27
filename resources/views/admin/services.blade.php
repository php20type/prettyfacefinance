@extends("layouts.admin")
@section("content")
    <div class="container-fluid my-3">
       <table class="table table-striped data-table">
           <thead>
           <tr>
               <th>Clinic</th>
               <th>Service</th>
           </tr>
           </thead>
           <tbody>
           @foreach($services as $service)
               <tr>
                   <td>{{$service->clinic->name}}</td>
                   <td>{{$service->name}}</td>
               </tr>
           @endforeach
           </tbody>
       </table>
    </div>
@endsection