 <!-- dashboard-footer -->
                    			
                </div>
                <!-- content end -->	
                <div class="dashbard-bg gray-bg"></div>
            </div>
            <!-- wrapper end -->
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script src="{{asset('homey/js/jquery.min.js')}}"></script>
        <script src="{{asset('homey/js/plugins.js')}}"></script>
        <script src="{{asset('homey/js/scripts.js')}}"></script>
        <script src="{{asset('homey/js/charts.js')}}"></script>
        <script src="{{asset('homey/js/dashboard.js')}}"></script>
         <script src=" https://maps.googleapis.com/maps/api/js?key=AIzaSyAfgl4gAJUnYIZ-R9FiFXzv8W7kripTP1s&sensor=false&libraries=places"></script>
        <script src="{{asset('homey/js/map-single.js')}}"></script>

           <script src="{{asset('homey/js/notify.min.js')}}"></script>
              <script src="{{asset('homey/js/app.js')}} "></script>
              <script src="{{asset('homey/js/custom.js')}} "></script>

        <script>
$(document).ready(function () {
$("#header").removeClass("sticky-header");

});

window.parseMessage = function (e){
for(var a in e){
return e[a][0] ;
}
}
function notify(id=null,message='Something went wrong',position='top right',type='error',willReload=false,url=null,timeout=3000){
if(id!=null && id != 'input[name=error]' && id!='input[name=error]') $(id).notify(
message,
{
position:position,
className:type
}
);
else $.notify(
message,
{
position:'top right',
className:type
}
);
if (willReload) setTimeout(function () {
if(url==null)window.location.reload();
else window.location.href = url;
}, timeout)
}
</script>

    </body>
</html>
