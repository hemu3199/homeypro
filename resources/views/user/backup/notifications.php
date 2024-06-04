@if(session('message'))   
  <div class="alert alert-success" style="padding:10px;width:100%;color:green; font-size:15px ">{{session('message')}}</div>
   @elseif(session('error'))
   <div class="alert alert-danger" style="padding:10px;width:100%;color:red;font-size:15px ">{{session('error')}}</div>
@endif
  @if ($errors->any())
   <div class="alert alert-danger">
            <ul >
               @foreach ($errors->all() as $error)
           <li style="color:red">{{ $error }}</li>
        @endforeach
      </ul>
  </div>
 @endif


validators {
   return back()->withErrors($validator)->withInput();


} 

try{

}

 catch (\Exception $e) {
            // Handle the exception and display the error message
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
   return back()->with('message', 'Details Submitted successfully!!');


 if($validator->fails())
            {
                          return redirect('properties_list')->with('error', 'error!!');
            }
try{
    return redirect('properties_list')->with('message', 'Property added successfully!!');
}
      catch (\Exception $e) {
        // Handle the exception and display the error message
                 return redirect('properties_list')->with('error', 'An error occurred: ' . $e->getMessage());
                    }