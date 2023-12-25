<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
@include('includes.header')
<h2>MAP</h2>
<div id="map" style="height:600px;"></div>
<script>
  var map = L.map("map",{
    maxBounds:[
      [20, 122],
      [45, 153]
    ],
    maxBoundsViscosity: 0.8
  }).setView([35.6895, 139.6917],5);
  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",{
    attribution:""
  }).addTo(map);
  @if($users->isNotEmpty())
    @foreach($users as $user)
      @if($user->hometown && $user->name)
        var hometown = "{{$user->hometown}}";
        var userName = "{{$user->name}}";
        //ユーザーの居住地が都道府県名と一致する場合、ユーザー名を表示
        var[latitude, longitude] = [{{$user->getHometownCoordinates($user->hometown)[0]}},{{$user->getHometownCoordinates($user->hometown)[1]}}];
        L.marker([latitude,longitude]).addTo(map).bindPopup("{{$user->hometown}}に{{$user->name}}が住んでいます");
      @endif
    @endforeach
  @endif
</script>