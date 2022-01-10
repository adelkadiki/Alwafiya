<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipment;
use App\Package;
use App\http\Requests\ShipRequest;
use App\http\Requests\PackRequest;
use App\http\Requests\ContactRequest;
use DB;
use App\Mail\InfoEmail;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Arr;
use Carbon\Carbon;



class WebpageController extends Controller
{
    //

    public function index(){
      return view('webpages.index');
    }

    public function mainpage(){

      $date = date('Y-m-d');
      $date1= Carbon::parse($date);

    $shipments=  DB::table('shipments')
      ->where('status', '=', 'Arrived')
      ->get();

       foreach($shipments as $ship){
        $date2=  Carbon::parse($ship->date);
        $interval= $date2->diffInDays($date1);

           if($interval > 30){
             DB::table('shipments')->where('id', $ship->id)
             ->update(['status'=>'Archived']);
           }
        }

      return view('system.mainpage');
    }



    public function addship(){
      return view('system.addship');
    }

    public function submitship(Request $req, Shipment $shipment)
    {

      $req->validate([
        'destination'=>'required',
        'date'=>'required'
      ]);

      Shipment::create($req->all());

      return redirect()->back()->with('message', 'Shippment was added');
    }

    public function newship(){
      $shipments = DB::table('shipments')->where('status', '=', 'Launched') ->get();

      return view('system.newship', compact('shipments'));
    }

    public function addpack(){
        $shipments = DB::table('shipments')->where('status', '=', 'Launched') ->get();
      return view('webpages.addpack', compact('shipments'));
    }

    public function dist(){
        $shipments = DB::table('shipments')->where('status', '=', 'Launched')->get();
      return view('webpages.disnt', compact('shipments'));
    }

    public function submitpack(Request $req){


      $req->validate([
        'shipment_id'=>'required',
        'customer'=>'required',
         'custid'=>'required',
        'phone'=>'required',
        'description'=>'required',
        'recepient'=>'required',
        'recpphone'=>'required',
        'dimentions'=>'required',
        'street'=>'required',
        'city'=>'required',
        'postcode'=>'required',
        'quantity'=>'required|numeric',
        'weight'=>'required|numeric',
      ]);

      Package::create($req->all());
    
      return view('webpages.submit');

    }

    public function packlist(Request $req, Shipment $shipment){
      //dd($shipment->id);
      $packages= DB::table('packages')->where('shipment_id', '=', $shipment->id)->get();

      session()->put('shipment_id', $shipment->id);
      session()->put('link', '/packlist/');
      return view('system.packlist')->with(compact('packages'));
    //dd($packages->customer);
    }

    public function packdetails(Request $req, Package $package){

       $package = DB::table('packages')->where('id', '=', $package->id)->get();

       $id= session('shipment_id');
       $link = session('link');
      return view('system.packdetails')->with(compact('package'))
      ->with(compact('id'))->with(compact('link'));

        }

    public function updatepack(Package $package){

    //  $pack = DB::table('packages')->where('id', '=', $package->id)->get();
      return view('system.updatepack')->with(compact('package'));
    }

    public function editship(Shipment $shipment){
    
      return view('system.editship')->with(compact('shipment'));
    }

    public function shipedit(Request $req, Shipment $shipment){
      $updated = DB::table('shipments')->where('id','=', $req->id);
      $updated->update(['date'=>$req->date]);
      return redirect('/mainpage');
    
    }

    public function packupdate(Request $req){

     
      
      $cost = floatval($req->cost);
      
      $package = Package::find($req->id);
      $package->cost = $cost;
      $package->save();
      //$package->update(['cost'=>$cost]);
      $package->fill($req->all())->save();
      
        return view('system.mainpage');
    }

    public function editinfo(Shipment $shipment){
      //$shipments = DB::table('shipments')->where('status', '=', 'Launched') ->get();
      $shipments=Shipment::find($shipment->id);
      return view('system.editinfo', compact('shipments'));
    //dd($shipment->id);
    }

    public function arrival(Shipment $shipment){
      $packages= DB::table('packages')->where('shipment_id', '=', $shipment->id)->get();
      session()->put('shipment_id', $shipment->id);
      return view('system.arrival')->with(compact('packages'));
    }

    public function shipmentstatus(Shipment $shipment){
      $ship=Shipment::find($shipment->id);

      return view('system.shipmentstatus', compact('ship'));
    }

    public function updshipstatus(Request $req){
      $shipment = Shipment::find($req->id);
      $shipment->update(['status'=>$req->status]);
      //$packages = DB::table('packages')->where('shipment_id', $req->id)->update(['status'=>$req->status]) ;
      DB::table('packages')->where('shipment_id', $req->id)->update(['status'=>$req->status]) ;
      return view('system.mainpage');
    }

    public function departure(){
      $shipments = DB::table('shipments')->where('status','=','Departed')->get();

      return view('system.departure', compact('shipments'));
    }

    public function back(){
      $link = session('link');
      return redirect($link);
    }

    public function arrivedship(){
      $shipments = DB::table('shipments')->where('status','Arrived')->get();
        return view('system.arrivedship', compact('shipments'));
      //$date = date("Y-m-d");


    }

    public function sendemail(Package $package){

      $shipid = session('shipment_id');
      $pack = Package::find($package->id);
      return view('system.sendemail')->with(compact('pack'))->with(compact('shipid'));
    }

    public function submitemail(Request $req){
    
      $fcost = floatval($req->cost);
     //dd(gettype($fcost));
       
     $package = Package::find($req->id);
     $package->cost = $fcost;
     $package->save(); 
    //   $package->update(['cost'=>$req->cost]);
     //   $package->update(['cost'=>$fcost]);
    // DB::table('packages')->where('id', $req->id)->update(['cost'=>$fcost]);
     //DB::table('packages')->update(['cost'=>DB::row($fcost)]);
       $email = $package->email;

       if($email==null){

       return back()->with('message', 'The cost is added to system, no email sent because this clinet has no email');
     }else {

      $info =  array('name'=> $package->customer , 'id'=>$package->id, 'cost'=>$fcost);
      Mail::to($package->email)->send(new InfoEmail($info));
      return view('system.mainpage');
    }

      }

      public function arrivedpacklist(Shipment $shipment){

        $packages = DB::table('packages')->where('shipment_id',$shipment->id)->get();
        $id=$shipment->id;
        session()->put('shipment_id', $shipment->id);
        session()->put('link', '/arrivedpacklist/');
        return view('system.arrivedpacklist')->with(compact('packages'));
      }

      public function departpacklist(Shipment $shipment){
        $packages= DB::table('packages')->where('shipment_id', '=', $shipment->id)->get();
       
        // session()->put('shipment_id', $shipment->id);
        //session()->put('link', '/departpacklist/');
        session()->put(['shipment_date'=>$shipment->date, 'shipment_dest'=>$shipment->destination, 'shipment_id'=>$shipment->id, 'link'=>'/departpacklist/']);
        return view('system.departpacklist')->with(compact('packages'));;
      }

      public function deletepack(Package $package){
          $package->delete();
         return redirect('/mainpage');
      }

      public function findpack(){
        return view('system.findpack');
      }

      public function searchpack(Request $req){
        if($req->ajax()){

       $output="";

       $data = DB::table('packages')->where('customer', 'like', '%'.$req->search.'%')
       ->orWhere('id', 'like', '%'.$req->search.'%')->get();

       if($data){
            foreach($data as $pack){
                   $output .='<tr style="text-align:center;"><td>'.$pack->customer.'</td><td>'.$pack->id.'</td>
                   <td><a href="searchres/'.$pack->id.'">Details</a></td></tr>';
                }
                  }
                    }
                    return Response($output);
               }

      public function searchres(Package $pack, Request $req){

      $package = DB::table('packages')->where('id', $pack->id)->get();

       $id = $pack->shipment_id;
       $shipment = Shipment::find($id);
         return view('system.searchres')->with(compact('package'))->with(compact('shipment')) ;
       //dd($shipment->date);

      }

      public function delivery(Package $package){
        $pack = Package::find($package->id);
        $id = session('shipment_id');
        return view('system.delivery')->with(compact('pack'))->with(compact('id'));
      }

      public function deliverysubmit(Request $req){
      
        $package = Package::find($req->id);
        $package->status = $req->status;
        $package->save();
        //$package->update(['status'=>$req->status]);
        $id = session('shipment_id');
        return Redirect::route('arrived.pack', $id);
      }

      public function track(){
        return view('webpages.track');
      }

      public function trackpack(Request $req){

         $req->validate([
           'id' => 'required'
         ]);

        $package = Package::find($req->id);
        if($package==null){
          return back()->with('message', 'الطرد غير موجود يرجى التحقق من الرقم');
        }elseif($package->status=='Arrived'){
          return back()->with('message', 'الطرد وصل وجاهز للإستلام');
        }elseif($package->status=='Departed'){
          return back()->with('message', 'تم شحن الطرد ');
        }elseif($package->status=='Request' or $package->status=='Launched' ){
          return back()->with('message', 'تلقينا طلبك وسيتم التواصل معك لاستلام الطرد');
        }elseif($package->status=='Delivered'){
          return back()->with('message', 'تم تسليم الطرد ');
        }

      }

      public function manyreq(){
        return view('webpages.manyreq');
      }

      public function archived(){
        $shipments = DB::table('shipments')->where('status','=','Archived')->get();
        return view('system.archived')->with(compact('shipments')) ;
      }

      public function deleteship(Shipment $shipment){
        $ship = Shipment::find($shipment->id);
          if($ship->status=='Departed' or $ship->status=='Arrived'){
            return back()->with('message', 'You cannot delete shipments on this stage');
          }else{
            $ship->delete();
            return view('system.mainpage');
          }

      }

      public function findship(){
        return view('system.findship');
      }

      public function searchship(Request $req){
        if($req->ajax()){

       $output="";

       $data = DB::table('shipments')->where('destination', 'like', '%'.$req->search.'%')
       ->orWhere('date', 'like', '%'.$req->search.'%')->get();

       if($data){
            foreach($data as $ship){
                   $output .='<tr style="text-align:center;"><td>'.$ship->destination.'</td><td>'.$ship->date.'</td>
                   <td>'.$ship->status.'</td></tr>';
                }
                  }
                    }
                    return Response($output);
      }

      public function searhshippack(Shipment $shipment){
        dd($shipment->id);
      }

      public function contact(Request $req){

       $req->validate([
          'name' => 'required',
          'email' => 'required|email',
          'message'=> 'required'
       ],[
         'name.required' => 'يرجي كتابة الأسم',
         'email.required' => 'يرجي كتابة البريد الإلكتروني',
         'email.email' => 'يرجي كتابة بريد إلكتروني صحيح',
         'message.required' => 'يرجي كتابة الرسالة التي ترغب أن تبعثها للشركة'
       ]);

         $name = $req->name;
         $message = $req->message;
         $mailFrom = $req->email;
                  
         mail("info@alwafiya.com", $name, $message, "From: $mailFrom\r\n");
        // $info =  array('name'=> $req->name , 'email'=>$req->email, 'message'=>$req->message );
        // Mail::to("info@alwafiya.com")->send(new ContactForm($info));
         return back()->with('message', 'Thank you for your message we will contact you as soon as possible');

      }

    //   Edit

    public function mobtrack(Request $req){

        $package = Package::find($req->id);

        if($package==null){
            return response()->json('package is not found');
        }elseif($package->status=='Arrived'){
            return response()->json('package arrived');
        }elseif($package->status=='Delivered'){
            return response()->json('package deliverred');
        }


    }

    public function mobpacksub(Request $req){

  //   dd($req->all());
    //   package::create($req->all());
    //   return response()->json("Package submitted");

       $package = new Package();

       $package->shipment_id = $req->shipment_id ;
       $package->customer = $req->customer ;
       $package->custid = $req->custid ;
       $package->email = $req->email;
       $package->phone = $req->phone ;
       $package->description = $req->description ;
       $package->recepient = $req->recepient ;
       $package->recpphone = $req->recepient ;
       $package->dimentions = $req->dimentions ;
       $package->street = $req->street ;
       $package->city = $req->city ;
       $package->postcode = $req->postcode ;
       $package->quantity = $req->quantity ;
       $package->weight = $req->weight ;

       $package->save();

       return response()->json("package submitted");

    }

    public function getlaunchships(){

        $shipments = DB::table('shipments')->where('status', '=', 'Launched') ->get();
        return response()->json($shipments);
    }

    // Edit
}
